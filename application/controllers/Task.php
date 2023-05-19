<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Task_m');
    }
	
	public function index()
	{
		if(is_null($this->session->uid))
		{
			redirect('Login');
		}
		else
		{
			$data['title'] = 'Task';
			$data['task_lst'] = $this->Task_m->get_task();
			$data['emp_lst'] = $this->Task_m->get_emp();
			$this->load->view('template/header',$data);
			$this->load->view('task/list',$data);	
			$this->load->view('template/footer');
		}
	}
	// Add Task
	public function add()
	{
		// data array
		$data = array(
			"empId" => $this->input->post("txtemp"),
			"task" => $this->input->post("txttask"),
			"assignDate" => date("Y-m-d", strtotime($this->input->post("txtassigndate"))),
			"dueDate" => date("Y-m-d", strtotime($this->input->post("txtduedate"))),
			"entry_By" => $this->session->uid
		);
		$this->db->insert('tbltask', $data);
		redirect("Task");
	}
	
	  // Function to Fetch selected record from database.
	  function show_task_id() {
		  $id = $this->uri->segment(3);
		  $data['single_task'] = $this->Task_m->show_task_id($id);
		  $this->load->view('task/list', $data);
	  }
	  // Delete User
	  public function delete($id)
	  {
		  $this->show_task_id($id);
		  $this->Task_m->delete_task($id);
		  redirect('Task');
	  }
	  // edit
	  public function edit($id)
	  {
		  $data['title'] = 'Edit Task';
		  $id = $this->uri->segment(3);
		 $data['taskinfo'] = $this->Task_m->show_task_id($id);
		 $this->load->view('template/header',$data);
		 $this->load->view('task/edit',$data,$id);
		 $this->load->view('template/footer');
	  }
	  // Update User
	  function update() {
		  $id = $this->uri->segment(3);
		  $this->Task_m->update_task($id);
		  redirect('Task');
	  }
}