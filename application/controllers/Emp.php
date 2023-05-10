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
			$data['title'] = 'ticket_system || Employee';
			$data['emp_lst'] = $this->Emp_m->get();
			$this->load->view('template/header',$data);
			$this->load->view('emp/list',$data);
			$this->load->view('template/footer');
		}
	}
	// Add new emp
	public function add()
	{
			$data = array(
				'empName' => $this->input->post('txtempname'),
				'emailId' => $this->input->post('txtemail'),
				'whatsappNumber'=> $this->input->post('txtwnumber'),
				'deptName' => $this->input->post('txtdeptname'),
				'entryBy' => $this->session->empName,
				'userLevel' => $this->input->post('txtrole'),
				'password' => md5($this->input->post('txtpwd'))
			);		
            $this->Emp_m->insert($data);
            $msg = $this->session->set_flashdata('success', 'Record added!');
            redirect('Emp',$msg);
	}
	// Edit emp
	public function edit()
	{
			$data = array(
				'empName' => $this->input->post('txtempname'),
				'emailId' => $this->input->post('txtemail'),
				'whatsappNumber'=> $this->input->post('txtwnumber'),
				'deptName' => $this->input->post('txtdeptname'),
				'entryBy' => $this->session->empName,
				'userLevel' => $this->input->post('txtrole'),
				'password' => md5($this->input->post('txtpwd'))
			);		
            $this->Emp_m->insert($data);
            $msg = $this->session->set_flashdata('success', 'Record added!');
            redirect('Emp',$msg);
	}
	// Delete Emp
	public function delete()
	{
		    $id = $this->input->post('id');
            $this->Emp_m->delete($id);
            $msg = $this->session->set_flashdata('success', 'Record deleted!');
            redirect('Emp', $msg);
	}
}