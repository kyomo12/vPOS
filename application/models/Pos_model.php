<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos_model extends CI_Model
{
function categories()
{
	$this->db->select('*');
	$this->db->from('category');
	return $this->db->get();
}
function activities()
{
	$this->db->select('*');
	$this->db->from('activities');
	return $this->db->get();
}
function pos()
{
	$this->db->select('pos.*,pos_owner.first_name ,pos_owner.last_name,pos_owner.mobile,category.name as cat_name');
	$this->db->from('pos');
	$this->db->join('category','category_id=`category`.`id`');
	$this->db->join('pos_owner','owner_id=`pos_owner`.`id`');
	return $this->db->get();
}
function pos_details($id)
  {
  		$this->db->select('pos.*,pos_owner.first_name ,pos_owner.last_name,pos_owner.mobile,category.name as cat_name');
	$this->db->from('pos');
	$this->db->join('category','category_id=`category`.`id`');
	$this->db->join('pos_owner','owner_id=`pos_owner`.`id`');
	$this->db->where('`pos`.`id`',$id);
	return $this->db->get();

  }
function materials()
{
	$this->db->select('*');
	$this->db->from('materials');
	return $this->db->get();
}
function owners()
{
	$this->db->select('*');
	$this->db->from('pos_owner');
	return $this->db->get();
}
function notifications()
  {
    $this->db->select('notification.*,pos_owner.first_name,pos_owner.last_name,pos.name,category.name as cat_name');
    $this->db->from('notification');
    $this->db->join('pos','pos.id=pos_id');
	$this->db->join('pos_owner','owner_id=pos_owner.id');
	$this->db->join('category','category.id=category_id');
	return $this->db->get();
  }
function notification_by_id($id)
   {
    $this->db->select('notification.*,pos_owner.first_name,pos_owner.last_name,pos.name,category.name as cat_name');
    $this->db->from('notification');
    $this->db->join('pos','pos.id=pos_id');
	$this->db->join('pos_owner','owner_id=pos_owner.id');
	$this->db->join('category','category.id=category_id');
	$this->db->where('notification.id',$id);
	return $this->db->get();
  }

}