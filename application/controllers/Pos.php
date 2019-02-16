<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {
function __construct()
	{
	   parent::__construct();		
   /*  is_logged_in(); */ 
	   $this->load->model('pos_model','',TRUE);
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
public function new_pos()
	{
		    $data['title']='New material';
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('name', 'activity name', 'trim|required|is_unique[activities.name]');
		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/pos_new_form');
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
function pos_categories()
        {
        	$data['title']='Category list';
        	$data['lists']=$this->pos_model->categories()->result();
        	initial_view($data);
        	$this->load->view('pos/categories_list');
        	footer();	
        }
function activities()
        {
        	$data['title']='Category list';
        	$data['lists']=$this->pos_model->activities()->result();
        	initial_view($data);
        	$this->load->view('pos/activity_list');
        	footer();	
        }
function materials()
        {
        	$data['title']='Category list';
        	$data['lists']=$this->pos_model->materials()->result();
        	initial_view($data);
        	$this->load->view('pos/material/material_list');
        	footer();	
        }
}
