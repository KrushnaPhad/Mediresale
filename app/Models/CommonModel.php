<?php
namespace App\Models;  
use CodeIgniter\Model;


class CommonModel extends Model{

   public function selectData($table, $where = array())
   {
    $builder = $this->db->table($table);
    $builder->select("*");
    $builder->where($where);
    $query = $builder->get();
   //  echo $this->db->getLastQuery();
   //  die();
    return $query->getResult();
   }


   // public function getStateNameById($stateId)
   //  {
   //      $this->table = 'states';
   //      return $this->where('id', $stateId)->first();
   //  }

   //  public function getCityNameById($cityId)
   //  {
   //      $this->table = 'cities';
   //      return $this->where('state_id', $cityId)->first();
   //  }

}  