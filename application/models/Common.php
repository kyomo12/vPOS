<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model
{
function header_view($data=[])
{
	$this->load->view('common/header.php',$data);
	$this->load->view('common/side_navigation.php');
	$this->load->view('common/top_navigation.php');
	
}
function footer()
{
	$this->load->view('common/footer.php');
}
//insert data into the database
function insert($table,$data)
  {
    //$this->db->trans_start();
  	$this->db->insert($table,$data);
  	return $this->db->insert_id();
  	//$this->db->trans_complete();
  }
function update($table,$id_name,$data,$id_value)
  {
    //$this->db->trans_start();
    $this->db->where($id_name,$id_value);
    return $this->db->update($table,$data);
  
    //$this->db->trans_complete();
  }
function table_by_id($table,$id_name,$id_value)
{
    $this->db->select('*');
  $this->db->from($table);
  $this->db->where($id_name,$id_value);
  return $this->db->get()->result();

}
function model_list($table)
   {
    $this->db->select('*');
  $this->db->from($table);
/*  $this->db->join('role','role_id=`role`.`id`');*/
  return $this->db->get();
   }
function users()
 {
  $this->db->select('user.*,role.name as role_name');
  $this->db->from('user');
  $this->db->join('role','role_id=`role`.`id`');
  return $this->db->get();

 }
function roles()
 {
  $this->db->select('*');
  $this->db->from('role');
/*  $this->db->join('role','role_id=`role`.`id`');*/
  return $this->db->get();

 }
function activities_array($array)
{
  $this->db->select('*');
  $this->db->from('activities');
  $this->db->where_in('id',$array);
/*  $this->db->join('role','role_id=`role`.`id`');*/
  return $this->db->get();
}

function get_pos_activity($id)
{
  $this->db->select('*');
  $this->db->from('pos_activities');
  $this->db->join('activities','activities.id=activity_id');

  $this->db->where('pos_id',$id);
  return $this->db->get();

}
function get_pos_materials($id)
    {
  $this->db->select('*');
  $this->db->from(' pos_material');
  $this->db->join('materials','materials.id=material_id');
  $this->db->join('sizes','sizes.id=size_id');
  $this->db->where('pos_id',$id);
  return $this->db->get(); 
    }
function remove($tb,$id_name,$id)
     {
      $this->db->where($id_name,$id);
     return  $this->db->delete($tb);
     }
function ficha($id)
{
    
  return $ciphertext = $this->encryption->encrypt($id);
}
function fichua($id_str)
{
    //$this->load->library('encryption');
 return $this->encryption->decrypt($id_str);
}

  function pos_name_by_id($id=0)
        {
              
         if (!empty($id)){
          $sub = $this->db->query('SELECT name AS `name` FROM `pos` where id='.$id.'')->row()->name;
          $data=strtoupper($sub);
          return $data;
          }
          else return ''; 
            
        }
 function pos_status_by_id($id=0)
        {
              
         if (!empty($id)){
          $sub = $this->db->query('SELECT pos_status AS `status` FROM `pos` where id='.$id.'')->row()->status;
          $data=strtoupper($sub);
          return $data;
          }
          else return ''; 
            
        }
function get_districts()
   {
    $this->db->select('DISTINCT(district)');
    $this->db->from('pos');
    return $this->db->get();

   }

function get_tax_list_per_council($council,$category)
   {
    $district=strtoupper($council);
    return $this->db->query("SELECT sizes.*, SUM(height*width) as area,pos.name as name, sum(height*width*rate_per_area) as tax,district from pos 
    inner join pos_material on `pos_material`.`pos_id`=`pos`.`id` 
    INNER JOIN sizes on size_id=`sizes`.`id`
    INNER JOIN rate on UPPER(council)=district
    Where UPPER(`pos`.`district`)='".$district."' AND category_id =".$category." group by pos.name")->result();

   }
function get_tax_sum_per_council($council,$category)
   {
    $district=strtoupper($council);
    return $this->db->query("SELECT sizes.*, SUM(height*width) as area,pos.name as name, sum(height*width*rate_per_area) as tax,district from pos 
    inner join pos_material on `pos_material`.`pos_id`=`pos`.`id` 
    INNER JOIN sizes on size_id=`sizes`.`id`
    INNER JOIN rate on UPPER(council)=district
    Where UPPER(`pos`.`district`)='".$district."' AND category_id =".$category." group by pos.district")->result();

   }
function get_pos_list_per_council($council,$category,$status)
        {
          $this->db->select('pos.*,pos_owner.first_name ,pos_owner.last_name,pos_owner.mobile,category.name as cat_name');
  $this->db->from('pos');
  $this->db->join('category','category_id=`category`.`id`');
  $this->db->join('pos_owner','owner_id=`pos_owner`.`id`');
  $this->db->where('category_id',$category);
  $this->db->where('upper(district)',strtoupper($council));
  $this->db->where('pos_status',$status);
  return $this->db->get();
        }
}