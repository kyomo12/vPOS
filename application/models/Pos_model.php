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

}