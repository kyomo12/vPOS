<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	     {
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('email', 'email', 'trim|required');
   $this->form_validation->set_rules('password', 'password', 'trim|callback_check_database');

   if($this->form_validation->run() == FALSE)
   { 
     $this->load->view('login');
   }
   else
   {
           //redirect('student/'); 
  }


}
function home()
    {
    	$this->load->view('home');
    }


	public function index2()
	{
		$this->load->view('welcome_message');
	}
	function demo()
	 {
	 	$data['title']='';
	 	initial_view($data);
	 	//$this->load->view('common/content.php');
	 	$this->load->view('common/profile.php');
	 	footer();

	 }

}
