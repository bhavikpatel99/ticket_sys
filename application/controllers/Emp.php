<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Emp_m');
    }
	
	public function index()
	{
		if(is_null($this->session->uid))
		{
			redirect('Login');
		}
		else
		{
			$data['title'] = 'Hemratna Jewellers || Employee';
			$data['emp_lst'] = $this->Emp_m->get_emp();
			$this->load->view('template/header',$data);
			$this->load->view('emp/list',$data);
			$this->load->view('template/footer');
		}
	}
	  // Add New User
	  public function add()
	  {
		  // Get the input values
		  $empName = $this->input->post("txtempname");
		  $emailId = $this->input->post("txtemail");
		  $whatsappNumber = $this->input->post("txtwnumber");
		  $deptName = $this->input->post("txtdeptname");
		  $password = md5($this->input->post("txtpwd"));
		  $userLevel = $this->input->post("txtemptype");
		  $entryBy = $this->session->uid;
	  
		  // Check if the email ID and WhatsApp number are the same
		  $existingRecord = $this->db->where('emailId', $emailId)
									 ->where('whatsappNumber', $whatsappNumber)
									 ->get('tbluser')
									 ->row();
	  
		  if ($existingRecord) {
			  // Set flashdata with the alert message
			  $this->session->set_flashdata('alert', 'Email ID and WhatsApp number already exist. Please provide unique One.');
			  redirect("Emp");
		  } else {
			  // Insert the record
			  $data = array(
				  "empName" => $empName,
				  "emailId" => $emailId,
				  "whatsappNumber" => $whatsappNumber,
				  "deptName" => $deptName,
				  "password" => $password,
				  "userLevel" => $userLevel,
				  "entry_By" => $entryBy
			  );
	  
			  $this->db->insert('tbluser', $data);
			  redirect("Emp");
		  }
	  }
	  
	// Update User
	  // Function to Fetch selected record from database.
	  function show_user_id() {
		  $id = $this->uri->segment(3);
		  $data['single_user'] = $this->Emp_m->show_user_id($id);
		//$this->load->view('Emp/list', $data);
	  }
	  // Delete User
	  public function delete($id)
	  {
		  $this->show_user_id($id);
		  $this->Emp_m->delete_user($id);
		  redirect('Emp');
	  }
	  // edit
	  public function edit($id)
	  {
		  $data['title'] = 'Edit User';
		  $id = $this->uri->segment(3);
		 $data['userinfo'] = $this->Emp_m->show_user_id($id);
		 $this->load->view('template/header',$data);
		 $this->load->view('emp/edit',$data,$id);
		 $this->load->view('template/footer');
	  }
	  // Update User
	  function update() {
		  $id = $this->uri->segment(3);
		  $this->Emp_m->update_User($id);
		  redirect('Emp');
	  }
	
}