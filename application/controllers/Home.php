<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
			$this->load->view('login');
		}
		else
		{
			$data['title'] = 'Welcome to Hemratna Jewellers';
			$data['task_lst'] = $this->Task_m->get_task();
			$this->load->view('template/header',$data);
			$this->load->view('index');
			$this->load->view('template/footer');
		}
	}
}