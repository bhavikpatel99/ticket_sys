<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_m extends CI_Model 
{
	public function login($dis)
	{
		$this->db->where($dis);
		$x=$this->db->get("tbluser");
	
		if($x->num_rows()>0)
			return $x->result()[0];
		else
			return false;
	}
     // Function to get all user list
     public function get_emp()
     {
         $quary = $this->db->get('tbluser');
         return $quary->result();
     }
     // Function to select particular record from table name tbluser.
     function show_user_id($data){
         $this->db->select('*');
         $this->db->from('tbluser');
         $this->db->where('userId', $data);
         $query = $this->db->get();
         $result = $query->result();
         return $result;
     }
     // Delete User
     function delete_user($id){
         $this->db->where('userId',$id);
         $this->db->delete('tbluser');
         
     }
     // Update Query For Selected Student
     function update_User($id){
         $data = [
            "empName"=>$this->input->post("txtempname"),
			"emailId"=>$this->input->post("txtemail"),
			"whatsappNumber"=>$this->input->post("txtwnumber"),
			"deptName"=>$this->input->post("txtdeptname"),
			"password"=>md5($this->input->post("txtpwd")),
         ];
         $result = $this->db->where('userId',$id)->update('tbluser',$data);
         return $result;
     }
}
?>