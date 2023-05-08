<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		if(is_null($this->session->uid))
		{
			redirect('Login');
		}
		elseif(!is_null($this->session->uid))
		{
			$data['title'] = 'Welcome to ticket_system';
			$this->load->view('template/header',$data);
			$this->load->view('index');
			$this->load->view('template/footer');
		}
		else
		{
			redirect('Login');
		}
	}
}