<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_m extends CI_Model 
{
    public function get()
    {
        return $this->db->get('tbluser')->result();
    }

    public function insert()
    {
        return $this->db->insert('tbluser', array(
            'empName' => $this->input->post('txtempname'),
            'emailId' => $this->input->post('txtemail'),
            'whatsappNumber'=> $this->input->post('txtwnumber'),
            'deptName' => $this->input->post('txtdeptname'),
            'entryBy' => $this->session->empName,
            'userLevel' => $this->input->post('txtrole'),
            'password' => md5($this->input->post('txtpwd'))
        ));
    }

    public function delete($id)
    {
        $this->db->where($id);
        return $this->db->delete('tbluser');
    }
}
?>