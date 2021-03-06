<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
function __construct()
	{
	   parent::__construct();		
   /*  is_logged_in(); */ 
	   $this->load->model('pos_model','',TRUE);
	}

function list()
        {
        	$data['title']='Category list';

        	$data['lists']=$this->common->users()->result();
        	initial_view($data);
        	$this->load->view('pos/user/user_list');
        	footer();	
        }
public function new_category()
	{
		    $data['title']='New Category';
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('name', 'category name', 'trim|required|is_unique[category.name]');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/new_category');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'));
		   	insert('category',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Created the category');
            redirect('pos/new_category');
          }
		
	}
public function edit_category()
	{        $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['lists']=table_by_id('category','id',$id);;
		    $data['title']='Edit Category';
		   initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('name', 'category name', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/edit_category');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'));
		   	//insert('category',$data_in);
		   	update('category','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the category');
            redirect('pos/pos_categories');
          }
		
	}
public function new_activity()
	{
		    $data['title']='New activity';
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('name', 'activity name', 'trim|required|is_unique[activities.name]');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/new_activity');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'));

		   	insert('activities',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Created the activity');
            redirect('pos/new_activity');
          }
		
	}
public function edit_activity()
	{        $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['lists']=table_by_id('activities','id',$id);
		    $data['title']='Edit Activity';
		   initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('name', 'category name', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/edit_activity');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'));
		   	update('activities','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the activity');
            redirect('pos/activities');
          }
		
	}
public function new_material()
	{
		    $data['title']='New material';
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('name', 'activity name', 'trim|required|is_unique[activities.name]');
		    $this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/material/material_new_form');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'),'description'=>$this->input->post('description'));

		   	insert('materials',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Created the material');
            redirect('pos/new_material');
          }
		
	}
public function edit_material()
	{        $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['lists']=table_by_id('materials','id',$id);
		    $data['title']='Edit material';
		   initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('name', 'material name', 'trim|required');
		    $this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/material/material_update_form');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'),'description'=>$this->input->post('description'));
		   	update('materials','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the material');
            redirect('pos/materials');
          }
		
	}
public function new_owner()
	{
		    $data['title']='New owner';
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		    $this->form_validation->set_rules('middle_name', 'middle name', 'trim|required');
		    $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[pos_owner.email]');
		    $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[10]|max_length[13]|is_unique[pos_owner.mobile]');
		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/owner/new_owner');
		    footer();
		   }
		   else {	
		   	$data_in = array('first_name' => $this->input->post('first_name'),
		   		             'last_name'=>$this->input->post('last_name'),
		   		             'middle_name'=>$this->input->post('middle_name'),
		   		             'email'=>$this->input->post('email'),
		   		             'mobile'=>$this->input->post('mobile'),
		   		             'created_by'=>1//user_id()
		   		         );

		   	insert('pos_owner',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! registered the owner');
            redirect('pos/new_owner');
          }	
	}
public function update_user()
	{
		    $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['title']='update user';
		    $data['lists']=table_by_id('user','id',$id);
		    initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		    //$this->form_validation->set_rules('middle_name', 'middle name', 'trim|required');
		    $this->form_validation->set_rules('email', 'email', 'trim|required');
		    $this->form_validation->set_rules('role_id', 'role', 'trim|required');
		    $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[10]|max_length[13]');
		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/user/update_user');
		    footer();
		   }
		   else {	
		   	$data_in = array('first_name' => $this->input->post('first_name'),
		   		             'last_name'=>$this->input->post('last_name'),
		   		             'role_id'=>$this->input->post('role_id'),
		   		             'email'=>$this->input->post('email'),
		   		             'mobile'=>$this->input->post('mobile')
		   		             
		   		         );

		   	update('user','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the user');
            redirect('user/list');
          }	
	}
public function new_user()
	{
		    $data['title']='New user';
		    $data['roles']=$this->common->roles()->result();
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		    $this->form_validation->set_rules('middle_name', 'middle name', 'trim|required');
		    $this->form_validation->set_rules('role_id', 'role', 'trim|required');
		    $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[pos_owner.email]');
		    $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[10]|max_length[13]|is_unique[pos_owner.mobile]');
		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/user/new_user');
		    footer();
		   }
		   else {	
		   	$data_in = array('first_name' => $this->input->post('first_name'),
		   		             'last_name'=>$this->input->post('last_name'),
		   		             //'middle_name'=>$this->input->post('middle_name'),
		   		             'email'=>$this->input->post('email'),
		   		             'mobile'=>$this->input->post('mobile'),
		   		             'role_id'=>$this->input->post('role_id'),
		   		             'created_by'=>1//user_id()
		   		         );

		   	insert('user',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! registered the user');
            redirect('pos/new_user');
          }	
	}
function send2owner()
         {
         	$this->load->view('pos/smsnotes/send2owner');
         }
function send2agent()
         {
         	$this->load->view('pos/smsnotes/send2agent');
         }
}
