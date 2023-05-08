<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Welcome to ticket_system';
		$this->load->view('template/header',$data);
		$this->load->view('emp/list');
		$this->load->view('template/footer');
	}
}