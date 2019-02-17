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

}