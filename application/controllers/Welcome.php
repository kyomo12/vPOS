<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	function demo()
	 {
	 	$data['title']='';
	 	initial_view($data);
	 	$this->load->view('common/content.php');
	 	footer();

	 }
}
