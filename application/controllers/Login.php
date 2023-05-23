<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_m');
    }

	public function index()
	{
		if(is_null($this->session->uid))
		{
			$data['title'] = 'Welcome to Hemratna Jewellers';
			$this->load->view('login',$data);
		}
		else
		{
			redirect('Home');
		}
	}
	// User Login
	public function dologin()
	{	
		$cond=array(
			"emailId"=>$this->input->post("txtemail"),
			"password"=>md5($this->input->post('txtpwd'))
		);
		$u=$this->User_m->getuser($cond);
		if($u==false)
		{
			$error=array(
				"errorMSG"=>"Invalid username or password.",
				"errorType"=>"LoginError"
			);
			$this->load->view('login',$error);
		}
		else
		{		
			if ($u->userStatus==1) 
			{
				$this->session->uid=$u->userId;
				$this->session->empName=$u->empName;
				$this->session->emailId=$u->emailId;
				$this->session->whatsappNumber=$u->whatsappNumber;
				$this->session->deptName=$u->deptName;
				redirect('Home');
			}
			else
			{
				$this->session->uid=0;
				$error=array(
				"errorMSG"=>"This Admin Is Blocked, Please Contact Your SuperAdmin.",
				"errorType"=>"LoginError"
				);
				$this->load->view('login',$error);
			}
		}
	}
	// UserLogout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}