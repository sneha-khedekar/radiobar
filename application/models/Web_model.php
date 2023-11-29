<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Web_model extends CI_Model {
	
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

    public function getsubcategories_orderby($table,$condition){
      $this->db->order_by('sub_orderby');
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

    
    public function getproduct_series($table,$condition){
        $this->db->order_by('ps_order');
        $record = $this->db->get_where($table,$condition);
        if($record->num_rows() > 0):
          return $record->result_array();
        else:
          return "no";
        endif;  
      }

      
    public function hsimage_details($id)
    {
        $this->db->select('*');
        $this->db->from('homeslider');
        $this->db->where('hs_status','1');
        $this->db->where('hs_id',$id);
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
 
   public function testimonial_details($id)
    {
         $this->db->select('*');
        $this->db->from('testimonials');
        $this->db->where('t_status','1');
        $this->db->where('t_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function client_details($id)
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->where('c_status','1');
        $this->db->where('c_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

        public function blogs_details($id)
    {
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->where('b_status','1');
        $this->db->where('b_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function events_details($id)
    {
        $this->db->select('*');
        $this->db->from('events');
        $this->db->where('ae_status','1');
        $this->db->where('ae_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function news_details($id)
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('an_status','1');
        $this->db->where('an_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
 
     public function category_details($id)
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $this->db->where('cat_status','1');
        $this->db->where('cat_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

   public function subcategory_details($id)
   {
           $this->db->select('*');
           $this->db->from('sub_category');
           $this->db->where('sub_status','1');
           $this->db->where('sub_id',$id);
           $query = $this->db->get();
           return $query->result_array();
   }

    public function view_subcategory()
    {
        $this->db->select('sc.*,cat_name');
        $this->db->from('sub_category sc');
        $this->db->where('sub_status','1');
        $this->db->join('product_category pc','pc.cat_id = sc.cat_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function view_series()
    {
        $this->db->select('ps.*,sc.*,cat_name');
        $this->db->from('product_series ps');
        $this->db->where('ps_status','1');
        $this->db->join('product_category pc','pc.cat_id =ps.cat_id');
        $this->db->join('sub_category sc','sc.sub_id =ps.sub_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function application_details($id)
    {
       $this->db->select('*');
       $this->db->from('applications');
       $this->db->where('a_status','1');
       $this->db->where('a_id',$id);
       $query = $this->db->get();
       return $query->result_array();
    }

    public function industry_details($id)
    {
       $this->db->select('*');
       $this->db->from('industry');
       $this->db->where('i_status','1');
       $this->db->where('i_id',$id);
       $query = $this->db->get();
       return $query->result_array();
    }


    public function getDistinctproduct_series($id)
    {
       $this->db->select('ps_name,ps_id');
       $this->db->from('product p');
       $this->db->where('p_status','1');
       $this->db->where('p_industry',$id);

       $this->db->join('product_series ps','ps.ps_id = p.p_series');
       $this->db->group_by('p_series');
       $query = $this->db->get();
       return $query->result_array();
    }

    
}