<?php

class Common_model extends CI_Model

{
    function __construct()
    {
        parent::__construct();
        
    }
    public function insert($table, $data){
        // Inserting into your table
         $this->db->insert($table, $data);
         return $this->db->insert_id();
     }
     public function update($table, $data, $id, $prime){
         // Inserting into your table
          $this->db->set($data);
          $this->db->where($prime, $id);
          
          $this->db->update($table);
          return true;
      }
     public function delete($table, $id, $primaryid){
         $this->db->where($primaryid, $id);
         $this->db->delete($table);
         return true;
     }
    public function checklogin($u, $p)
    {
        $this->db->select('*');
        $this->db->from('shope_users');
        $this->db->where('userName', $u);
        $this->db->where('userPassword', $p);
        $this->db->where('userActive', 1);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    public function checkadminlogin($u, $p, $l)
    {
        $this->db->select('*');
        $this->db->from('shope_users');
        $this->db->where('userName', $u);
        $this->db->where('userPassword', $p);
        $this->db->where('userActive', 1);
        $this->db->where('userLevel', $l);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }
    function getall($table, $orderby, $ascdes){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($orderby, $ascdes);
        $query = $this->db->get();
        return $query->result();
    }
    function getvalue($table,$prime,$id,$value){
        
        $this->db->where($prime, $id);
        $query = $this->db->get($table);
        return $query->row($value);
    }
    function getrow($table,$prime,$id){
        
        $this->db->where($prime, $id);
        $query = $this->db->get($table);
        return $query->row_array();
    }
    function get_category(){
		$query = $this->db->get('category_name');
		return $query;	
	}
    function get_sub_category($category_id){
		$query = $this->db->get_where('shope_sub_categories', array('sub_category_id' => $category_id));
		return $query;
	
    }

    
}   




?>