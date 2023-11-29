<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
    public function __construct(){
        parent::__construct();
    }


    public function getWhere($table,$condition){
    	$record = $this->db->get_where($table,$condition);
    	if($record->num_rows() > 0):
    		return $record->result_array();
    	else:
    		return "no";
    	endif;	
    }


    public function getAllRec($table){
    	$record = $this->db->get($table);
    	if($record->num_rows() > 0):
    		return $record->result_array();
    	else:
    		return "no";
    	endif;	
    }

    
    public function overview_details($id)
 {
        $this->db->select('*');
        $this->db->from('about_overview');
        $this->db->where('ao_status','1');
        $this->db->where('ao_id',$id);
        $query = $this->db->get();
        return $query->result_array();

 }


     public function history_details($id)
 {
        $this->db->select('*');
        $this->db->from('about_history');
        $this->db->where('ah_status','1');
        $this->db->where('ah_id',$id);
        $query = $this->db->get();
        return $query->result_array();

 }

 public function management_details($id)
{
         $this->db->select('*');
        $this->db->from('about_management');
        $this->db->where('am_status','1');
        $this->db->where('am_id',$id);
        $query = $this->db->get();
        return $query->result_array();
}
 
}