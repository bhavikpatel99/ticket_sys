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
			$id = $this->session->uid;
			$data['title'] = 'Hemratna Jewellers || Task';
			$data['emp_lst'] = $this->Task_m->get_emp();
			$this->load->view('template/header',$data);
			$this->load->view('task/list',$data);	
			$this->load->view('template/footer');
		}
	}

	// Send Task
	public function send_task()
	{
		if(is_null($this->session->uid))
		{
			redirect('Login');
		}
		else
		{
			$id = $this->session->uid;
			$data['title'] = 'Hemratna Jewellers || Task || Send Task';
			$data['task_lst'] = $this->Task_m->get_task();
			$data['emp_lst'] = $this->Task_m->get_emp();
			$data['task_lst_id'] = $this->Task_m->get_send_task_id($id);
			$this->load->view('template/header',$data);
			$this->load->view('task/send_task_lst',$data);	
			$this->load->view('template/footer');
		}
	}

	// Recive Task
	public function recive_task()
	{
		if(is_null($this->session->uid))
		{
			redirect('Login');
		}
		else
		{
			$id = $this->session->uid;
			$data['title'] = 'Hemratna Jewellers || Task || Recive Task';
			$data['task_lst'] = $this->Task_m->get_task();
			$data['emp_lst'] = $this->Task_m->get_emp();
			$data['task_lst_id'] = $this->Task_m->get_recive_task_id($id);
			$this->load->view('template/header',$data);
			$this->load->view('task/recive_task_lst',$data);	
			$this->load->view('template/footer');
		}
	}
	// Add Task
	public function add()
	{
		// data array
		$data = array(
			"assign_To" => $this->input->post("txtemp"),
			"assign_By" => $this->session->empName,
			"task" => $this->input->post("txttask"),
			"assignDate" => date("Y-m-d", strtotime($this->input->post("txtassigndate"))),
			"dueDate" => date("Y-m-d", strtotime($this->input->post("txtduedate"))),
			"entry_By" => $this->session->uid
		);
		$this->db->insert('tbltask', $data);
		$this->session->set_flashdata('alert', 'Task Assigned');
		redirect("Task");
	}
	
	// Function to Fetch selected record from database.
	function show_task_id() {
		$id = $this->uri->segment(3);
		$data['single_task'] = $this->Task_m->get_task_by_id($id);
		$this->load->view('task/list', $data);
	}
	// Delete User
	public function delete($id)
	{
		$this->show_task_id($id);
		$this->Task_m->delete_task($id);
		$this->session->set_flashdata('alert', 'Task Deleted');
		redirect('Task');
	}
	// edit
	public function edit($id)
	{
		$data['title'] = 'Edit Task';
		$id = $this->uri->segment(3);
		$data['taskinfo'] = $this->Task_m->get_task_by_id($id);
		$this->load->view('template/header',$data);
		$this->load->view('task/edit',$data,$id);
		$this->load->view('template/footer');
	}
	// Update User
	public function update() {
		$id = $this->uri->segment(3);
		$this->Task_m->update_task($id);
		redirect('Task');
	}
	// toogal task status
	public function toggle_status()
	{
		$id = $this->uri->segment(3);
		$taskStatus = $this->Task_m->get_task_status($id);
		$newStatus = ($taskStatus == 1) ? 0 : 1;
		$this->Task_m->update_task_status($id, $newStatus);
		redirect('Task/recive_task');
	}
}