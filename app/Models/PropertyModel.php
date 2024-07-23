<?php
namespace App\Models;  
use CodeIgniter\Model;


class PropertyModel extends Model{
    protected $table = 'property';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'name',       
        'description', 
        'state',
        'city',
        'zipcode',
        'address',
        'built_year',
        'total_area',
        'price',
        'parking',
        'equipment_image',
        'created_at'

    ];

}  
?>