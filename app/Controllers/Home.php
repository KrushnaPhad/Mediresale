<?php

namespace App\Controllers;
use App\Models\EquipmentModel;
use App\Models\LoginModel;
use App\Models\CommonModel;


class Home extends BaseController
{

    
    public $session;
    public function __construct() {
        helper('form','array');
        $this->session = session();
        
    }
/************************************** Login Page view ********************************** */
    public function index(): string
    {
        return view('login/login');
    }
  
/********************************* Login functionality************************************************ */
public function loginAuth()
{
    $session = session();
    $LoginModel = new LoginModel();
    $email = $this->request->getVar('email');   // get email from user login form
    $password = $this->request->getVar('password'); // get password from user login form
    // echo $email;
    // echo $password;

    $data = $LoginModel->where('email', $email)->first();  // get email data form database 
    // print_r($data);
    if($data){
        $pass = $data['password'];  // get password from database using $data variable which stores all data
        
        if($password == $pass){ // compare password enter by user i.e $password and from database i.e $pass
            $ses_data = [
                'id' => $data['id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'isLoggedIn' => TRUE
            ];
            $session->set($ses_data);

            return redirect()->to('/dashboard');

        }else{
            $session->setFlashdata('msg', 'Email or Password is incorrect.');
            return redirect()->to('/');
        }
    }
    else{
        $session->setFlashdata('msg', 'Email or password incorrect.');
        return redirect()->to('/');
    }
}


/******************************************* Log Out *********************************************************/

public function logout(){
    $session=session();
    $LoginModel = new LoginModel();

    $session->destroy(); 
    return redirect()->to('/'); 

    
}

     public function equipments()
    {
        return view('equipments/add_equipments');
    }


    public function add_equipments()
    {
        $EquipmentModel = new EquipmentModel();
        
        // Handle multiple file uploads
        $images = $this->request->getFiles();
        $validImages = [];
        $imageNames = [];
    
        foreach ($images['equipment_image'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . '../assets/uploads', $newName);
                $imageNames[] = $newName; // Store the new name of the file
            }
        }
    
        if (!empty($imageNames)) {
            $imageNamesString = implode(',', $imageNames); // Convert array of image names to a comma-separated string
        } else {
            $imageNamesString = null; // No valid images uploaded, set to null
        }
    
        // Get data from the form and map it to the database fields
        $data = [
            'title' => $this->request->getPost('title'),
            'serial_number' => $this->request->getPost('serial_number'),
            'price' => $this->request->getPost('price'),
            'manifacture_year' => $this->request->getPost('manifacture_year'),
            'description' => $this->request->getPost('description'),
            'equipment_image' => $imageNamesString
        ];
    
        // Save data to the database
        $EquipmentModel->save($data);
        
        // Redirect with a success message
       // Return JSON response
    return $this->response->setJSON(['status' => 'success', 'message' => 'Equipment added successfully']);
    }
    

    public function view_equipments()
    {
        return view('equipments/view_equipments');
    }
}
