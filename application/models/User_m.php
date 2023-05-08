<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model 
{
	public function getuser($dis)
	{
		$this->db->where($dis);
		$x=$this->db->get("tbluser");
	
		if($x->num_rows()>0)
			return $x->result()[0];
		else
			return false;
	}
    // Function to get all user list
    public function userlist()
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
            "firstName"=>$this->input->post("txtfname"),
			"middelName"=>$this->input->post("txtmname"),
			"lastName"=>$this->input->post("txtlname"),
            "designation"=>$this->input->post("txtdesignation"),
			"gender"=>$this->input->post("customRadio"),
			"email"=>$this->input->post("txtemail"),
			"phone"=>$this->input->post("txtphone"),
			"dateOfBirth"=>$this->input->post("txtdob"),
			"line1"=>$this->input->post("txtline1"),
			"line2"=>$this->input->post("txtline2"),
			"city"=>$this->input->post("txtcity"),
			"state"=>$this->input->post("txtstate"),
			"pincode"=>$this->input->post("txtpincode"),
			"password"=>$this->input->post("txtpwd")
        ];
        $result = $this->db->where('userId',$id)->update('tbluser',$data);
        return $result;
    }
}
?>