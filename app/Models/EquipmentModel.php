<?php
namespace App\Models;  
use CodeIgniter\Model;


class EquipmentModel extends Model{
    protected $table = 'equipments';
    protected $primarykey = 'id';
    protected $allowedFields = [
        'title',       
        'serial_number', 
        'price',
        'manifacture_year',
        'description',
        'equipment_image',
        'created_at'

    ];

}  
?>