<?php

namespace App\Controllers;
use App\Models\PropertyModel;
use App\Models\CommonModel;
use App\Models\StateModel;
use App\Models\CityModel;


class Property extends BaseController
{
    
    /*********************************** function to get states name ************************************/

    public function states()
    {
        $CommonModel = new CommonModel();
        $states = $CommonModel->selectData("states");
        // echo '<pre>';
        // print_r($states);
        // die();
        $data['states'] = $states;
        
        return view('property/add_property', $data);
    }

    /*********************************** function to get cities name ************************************/

    public function cities()
    {
       $stateId= $this->request->getPost("statesId");
       
       $CommonModel = new CommonModel();
       $citydata = $CommonModel->selectData("cities", array("state_id" => $stateId));
       
       $output =  "";
       foreach ($citydata as $city) {

             $output .= "<option value='$city->id'>$city->city</option>";
       }
       echo json_encode($output);
    }

/************************************ function to add property ******************************* */

    public function add_property()
{
    $PropertyModel = new PropertyModel();
   

    // Handle multiple file uploads
    $images = $this->request->getFiles();
    $validImages = [];
    $imageNames = [];

    // Check if 'equipment_image' field exists
    if (isset($images['equipment_image'])) {
        foreach ($images['equipment_image'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . '../assets/uploads', $newName);
                $imageNames[] = $newName; // Store the new name of the file
            } else {
                // Log or handle file upload errors
                log_message('error', 'File upload error: ' . $file->getErrorString());
            }
        }
    } else {
        log_message('error', 'No files uploaded');
    }

    // Convert array of image names to a comma-separated string
    $imageNamesString = !empty($imageNames) ? implode(',', $imageNames) : null;


    $StateModel = new StateModel();
    $CityModel = new CityModel();

    $stateId = $this->request->getPost('state');
    $cityId = $this->request->getPost('city');

    // Fetch state name
    $state = $StateModel->where('id', $stateId)->first();
    $stateName = $state['name'] ?? 'state not found.';

    // Fetch city name
    $city = $CityModel->select('cities.city as city_name')
                      ->join('states', 'cities.state_id = states.id')
                      ->where('cities.id', $cityId)
                      ->first();
    $cityName = $city['city_name'] ?? 'City not found.';

    
    // Get data from the form and map it to the database fields
    $data = [
        'name' => $this->request->getPost('name'),
        'description' => $this->request->getPost('description'),
        'state' => $stateName,
        'city' => $cityName,
        'zipcode' => $this->request->getPost('zipcode'),
        'address' => $this->request->getPost('address'),
        'built_year' => $this->request->getPost('built_year'),
        'total_area' => $this->request->getPost('total_area'),
        'price' => $this->request->getPost('price'),
        'parking' => $this->request->getPost('parking'),
        'equipment_image' => $imageNamesString
    ];

    // Save data to the database
    if ($PropertyModel->save($data)) {
        return $this->response->setJSON(['status' => 'success', 'message' => 'Property added successfully']);
    } else {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to add property'], 500);
    }
}

    
}
