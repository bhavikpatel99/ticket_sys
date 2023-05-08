<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Welcome to ticket_system';
		$this->load->view('template/header',$data);
		$this->load->view('task/list');
		$this->load->view('template/footer');
	}
}