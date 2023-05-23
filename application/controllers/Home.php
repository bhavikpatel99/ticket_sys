<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		if(is_null($this->session->uid))
		{
			$this->load->view('login');
		}
		else
		{
			$data['title'] = 'Welcome to Hemratna Jewellers';
			$this->load->view('template/header',$data);
			$this->load->view('index');
			$this->load->view('template/footer');
		}
	}
}