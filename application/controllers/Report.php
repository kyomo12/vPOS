<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
function __construct()
	{
	   parent::__construct();		
   /*  is_logged_in(); */ 
	   $this->load->model('pos_model','',TRUE);
	}

function tax_per_district()
        {
        	$data['title']='New Category';
        	$data['catlist']=$this->pos_model->categories()->result();
        	$data['districts']=$this->common->get_districts()->result();
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('council', 'council', 'trim|required');
		    $this->form_validation->set_rules('category_id', 'category', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('report/tax_council_form');
		    footer();
		   }
		   else{
		   	$council=$this->input->post('council');
		   	$category=$this->input->post('category_id');
		   	$data['lists']=$list=$this->common->get_tax_list_per_council($council,$category);
		   	//var_dump($list);
		   	$data['total_sum']=$this->common->get_tax_sum_per_council($council,$category);
		   	$this->load->view('report/tax_per_council',$data);
		    footer();

		   }	
        }
function pos()
        {
        	$data['title']='POS';
        	$data['catlist']=$this->pos_model->categories()->result();
        	$data['districts']=$this->common->get_districts()->result();
		   initial_view($data);
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('council', 'council', 'trim|required');
		    $this->form_validation->set_rules('category_id', 'category', 'trim|required');
		    $this->form_validation->set_rules('status', 'status', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	$this->load->view('report/pos_report_form');
		    footer();
		   }
		   else{
		   	$council=$this->input->post('council');
		   	$category=$this->input->post('category_id');
		   	$status=$this->input->post('status');
		   	$data['lists']=$list=$this->common->get_pos_list_per_council($council,$category,$status)->result();
		   	//var_dump($list);
		   	/*$data['total_sum']=$this->common->get_tax_sum_per_council($council,$category);*/
		   	$this->load->view('report/pos_per_council',$data);
		    footer();

		   }	
        }
function notification()
        {
        	$data['title']='notification';

        	$data['lists']=$this->pos_model->notifications()->result();
        	initial_view($data);
        	$this->load->view('notification/notification_list');
        	footer();	
        }
public function send_reminder()
	{       

           $data['id']=$id=$this->uri->segment(3);
           $data['list']=$this->pos_model->notification_by_id($id)->result();
		   //$data['teacher']=$this->teacher_model->table_list()->result();
        	$this->load->library('form_validation');
		    $this->form_validation->set_rules('id', 'c', 'trim|required');
		   if($this->form_validation->run() == FALSE)
		   { 
		   	//$data['teacher']=$this->teacher_model->table_list()->result();
		   	$this->load->view('pos/smsnotes/send2agent_reminder',$data);
		   }
		   else {	
		   	$data = array('no_reminders' => ($this->input->post('reminder')+1)
		   	             );
            update('notification','id',$data,$this->input->post('id'));
            $this->session->set_flashdata('message_name',
				 'Success! Updated');
            
            redirect('report/notification');
          }
		
	}
}
