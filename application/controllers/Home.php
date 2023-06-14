<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Home_m');
    }
	
	public function index()
	{
		if(is_null($this->session->uid))
		{
			$this->load->view('login');
		}
		else
		{
			$data['title'] = 'Welcome to Hemratna Jewellers';
			$data['task_lst'] = $this->Home_m->get_task();
			$this->load->view('template/header');
			$this->load->view('index',$data);
			$this->load->view('template/footer');
		}
	}

	// Function to Fetch selected record from database.
	function show_task_id() {
		$id = $this->uri->segment(3);
		$this->Home_m->get_task_by_id($id);
		// $this->load->view('task/list', $data);
	}
	// Delete User
	public function delete($id)
	{
		$this->show_task_id($id);
		$this->Home_m->delete_task($id);
		$this->session->set_flashdata('alert', 'Task Deleted');
		redirect('Home');
	}
}