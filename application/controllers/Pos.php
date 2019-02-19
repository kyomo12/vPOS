<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {
function __construct()
	{
	   parent::__construct();		
   /*  is_logged_in(); */ 
	   $this->load->model('pos_model','',TRUE);
	}

function pos_list()
        {
        	$data['title']='Category list';

        	$data['lists']=$this->pos_model->pos()->result();
        	initial_view($data);
        	$this->load->view('pos/pos_list');
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
public function new_size()
	{
		    $data['title']='New material';
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('height', 'heigth', 'trim|required');
		    $this->form_validation->set_rules('width', 'width', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/material/size_new_form');
		    footer();
		   }
		   else {	
		   	$data_in = array('height' => $this->input->post('height'),'width' => $this->input->post('width'));

		   	insert('sizes',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Created the size');
            redirect('pos/new_size');
          }
		
	}
public function edit_size()
	{        $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['lists']=table_by_id('sizes','id',$id);
		    $data['title']='Edit SiZE';
		   initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('height', 'height', 'trim|required');
		    $this->form_validation->set_rules('width', 'width', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/material/size_update_form');
		    footer();
		   }
		   else {	
		   $data_in = array('height' => $this->input->post('height'),'width' => $this->input->post('width'));
		   	update('sizes','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the size');
            redirect('pos/sizes');
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
public function update_owner()
	{
		    $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['title']='update owner';
		    $data['lists']=table_by_id('pos_owner','id',$id);
		    initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		    $this->form_validation->set_rules('middle_name', 'middle name', 'trim|required');
		    $this->form_validation->set_rules('email', 'email', 'trim|required');
		    $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[10]|max_length[13]');
		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/owner/update_owner');
		    footer();
		   }
		   else {	
		   	$data_in = array('first_name' => $this->input->post('first_name'),
		   		             'last_name'=>$this->input->post('last_name'),
		   		             'middle_name'=>$this->input->post('middle_name'),
		   		             'email'=>$this->input->post('email'),
		   		             'mobile'=>$this->input->post('mobile')
		   		             
		   		         );

		   	update('pos_owner','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the owner');
            redirect('pos/pos_owner');
          }	
	}
public function new_user()
	{
		    $data['title']='New user';
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
		   	$this->load->view('pos/user/new_user');
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

		   	insert('user',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! registered the owner');
            redirect('pos/new_user');
          }	
	}

public function update_pos()
	{
		    $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    $data['lists']=table_by_id('pos','id',$id);
		    $data['title']='update pos';
		    $data['activities']=model_list('activities')->result();
		    $data['curr_activities']=$this->common->get_pos_activity($id)->result();
		    $data['owners']=$this->pos_model->owners()->result();
        	$data['catlist']=$this->pos_model->categories()->result();
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('name', 'first name', 'trim|required');
		    $this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('till_no', 'till no', 'trim|required');
		    $this->form_validation->set_rules('owner_id', 'middle name', 'trim|required');
		    $this->form_validation->set_rules('category_id', 'region', 'trim|required');
		    $this->form_validation->set_rules('region', 'district', 'trim|required');
		    $this->form_validation->set_rules('district', 'district', 'required');
		    $this->form_validation->set_rules('ward', 'ward', 'required');
		    $this->form_validation->set_rules('village_mtaa', 'ward', 'trim');
		    $this->form_validation->set_rules('status', 'status', 'trim|required');
            $this->form_validation->set_rules('longtude', 'longtude', 'trim|required');
            $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');

		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/pos_update_form');
		    footer();
		   }
		   else {	
		   	$data_in = array('name' => $this->input->post('name'),
		   		'latitude'=>$this->input->post('latitude'),
		   		'longtude'=>$this->input->post('longtude'),
		   		'category_id'=>$this->input->post('category_id'),
		   		'pos_status'=>$this->input->post('pos_status'),
		   		'village_mtaa'=>$this->input->post('village_mtaa'),
		   		'ward'=>$this->input->post('ward'),
		   		'region'=>$this->input->post('region'),
		   		'district'=>$this->input->post('district'),
		   		'till_no'=>$this->input->post('till_no'),
		   		'owner_id'=>$this->input->post('owner_id'),
		   		'pos_status'=>$this->input->post('status')
		   	);
		   	var_dump($array);
		   	$array=$this->input->post('activity');
            remove('pos_activities','pos_id',$this->input->post('id'));
            foreach ($array as $key=>$value ) {
		   		$data_innn = array('pos_id' =>$this->input->post('id') ,'activity_id'=>$value );
		   		insert('pos_activities',$data_innn);
		   	}
		   	update('pos','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Update the material');
            redirect('pos/pos_list');
          }
		
	}
public function new_pos()
	{
		    $data['title']='New pos';
		    $data['owners']=$this->pos_model->owners()->result();
        	$data['catlist']=$this->pos_model->categories()->result();
        	$data['activities']=model_list('activities')->result();
		   initial_view($data);
        	$this->load->library('form_validation');
        	//owner
        	 $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        	 //$this->form_validation->set_rules('activity', 'activity', 'trim|required');
		    $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		   $this->form_validation->set_rules('middle_name', 'middle name', 'trim');
		    $this->form_validation->set_rules('email', 'email', 'trim');
		    $this->form_validation->set_rules('mobile', 'mobile', 'trim|required|min_length[10]|max_length[13]|is_unique[pos_owner.mobile]');
        	//
		    $this->form_validation->set_rules('name', ' name', 'trim|required');
		    $this->form_validation->set_rules('till_no', 'till no', 'trim|required');
		    /*$this->form_validation->set_rules('owner_id', 'middle name', 'trim|required');*/
		    $this->form_validation->set_rules('category_id', 'region', 'trim|required');
		    $this->form_validation->set_rules('region', 'district', 'trim|required');
		    $this->form_validation->set_rules('district', 'district', 'required');
		    $this->form_validation->set_rules('ward', 'ward', 'required');
		    $this->form_validation->set_rules('village_mtaa', 'ward', 'trim');
		    $this->form_validation->set_rules('status', 'status', 'trim|required');
            $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
            $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');

		    //$this->form_validation->set_rules('description', 'description', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/pos_new_form');
		    footer();
		   }
		   else {	
		   	$array=$this->input->post('activity');

		   	$data_owner = array('first_name' => $this->input->post('first_name'),
		   		             'last_name'=>$this->input->post('last_name'),
		   		             'middle_name'=>$this->input->post('middle_name'),
		   		             'email'=>$this->input->post('email'),
		   		             'mobile'=>$this->input->post('mobile'),
		   		             'created_by'=>1//user_id()
		   		         );
		   	$owner_id=insert('pos_owner',$data_owner);
		   	$data_in = array('name' => $this->input->post('name'),
		   		'latitude'=>$this->input->post('latitude'),
		   		'longtude'=>$this->input->post('longtude'),
		   		'category_id'=>$this->input->post('category_id'),
		   		'pos_status'=>$this->input->post('pos_status'),
		   		'village_mtaa'=>$this->input->post('village_mtaa'),
		   		'ward'=>$this->input->post('ward'),
		   		'region'=>$this->input->post('region'),
		   		'district'=>$this->input->post('district'),
		   		'till_no'=>$this->input->post('till_no'),
		   		'owner_id'=>$owner_id,
		   		'pos_status'=>$this->input->post('status'),
		   		'created_by'=>1
		   	);
		   	
		   	$pos_id=insert('pos',$data_in);
		   	foreach ($array as $key=>$value ) {
		   		$data_innn = array('pos_id' =>$pos_id ,'activity_id'=>$value );
		   		insert('pos_activities',$data_innn);
		   	}
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Created the pos');
            redirect('pos/new_pos');
          }
		
	}
public function new_rate()
	{
		    $data['title']='New material';
		   initial_view($data);
        	$this->load->library('form_validation');
		     $this->form_validation->set_rules('council', 'council', 'trim|required');
		    $this->form_validation->set_rules('rate_per_area', 'rate per area', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('pos/tax_rate/tax_new_form');
		    footer();
		   }
		   else {	
		   	 $data_in = array('council' => $this->input->post('council'),'rate_per_area' => $this->input->post('rate_per_area'));

		   	insert('rate',$data_in);
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Created the rate');
            redirect('pos/new_rate');
          }
		
	}
public function edit_rate()
	{        $id=$this->uri->segment(3);
		    if (empty($id)) $id=$this->input->post('id');
		    
		    $data['title']='Edit CONCIL';
		   initial_view($data);
        	$this->load->library('form_validation');
        	$this->form_validation->set_rules('id', 'id', 'trim|required');
		    $this->form_validation->set_rules('council', 'council', 'trim|required');
		    $this->form_validation->set_rules('rate_per_area', 'rate per area', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$data['lists']=table_by_id('rate','id',$id);
		   	$this->load->view('pos/tax_rate/tax_update_form',$data);
		    footer();
		   }
		   else {	
		   $data_in = array('council' => $this->input->post('council'),'rate_per_area' => $this->input->post('rate_per_area'));
		   	update('rate','id',$data_in,$this->input->post('id'));
            //$this->parent_model->insert($data);
            $this->session->set_flashdata('message_name',
				 'Success! Updated the rate');
            redirect('pos/tax_rates');
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
function pos_owner()
        {
        	$data['title']='Owner list';
        	$data['lists']=$this->pos_model->owners()->result();
        	initial_view($data);
        	$this->load->view('pos/owner/owner_list');
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
function sizes()
        {
        	$data['title']='Category list';
        	$data['lists']=model_list('sizes')->result();//$this->pos_model->sizes()->result();
        	initial_view($data);
        	$this->load->view('pos/material/size_list');
        	footer();	
        }
function tax_rates()
        {
        	$data['title']='Tax list';
        	$data['lists']=model_list('rate')->result();//$this->pos_model->sizes()->result();
        	initial_view($data);
        	$this->load->view('pos/tax_rate/rate_list');
        	footer();	
        }
function get_activity()
       {
       	$id=$this->input->post('activity');
       	$lists=table_by_id('activities','id',$id);
       	foreach ($lists as $list):
       		$data = array('name' => strtoupper($list->name),
       		              'id' => strtoupper($list->id) );
       	endforeach;
       	 //header('Content-Type: application/json');
       		echo json_encode($data);

       }
function details()
   {
   	$data['id']=$id=$this->uri->segment(3);
   	$data['detail']=$this->pos_model->pos_details($id)->result();
   	$data['activities']=$this->common->get_pos_activity($id)->result();
   	$data['material']=$this->common->get_pos_materials($id)->result();
   	initial_view($data);
     $this->load->view('pos/profile');
    footer();
   }
}
