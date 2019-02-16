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

}