<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model 
{
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
            "userLevel"=>$this->input->post("txtemptype"),
			"password"=>md5($this->input->post("txtpwd")),
         ];
         $result = $this->db->where('userId',$id)->update('tbluser',$data);
         return $result;
     }
      // Function to get all task list
      public function get_task()
      {
          $this->db->from('tbltask t');
          $this->db->join('tbluser b','b.userId=t.assign_To');
          $quary = $this->db->get();
          return $quary->result();
      }
        //  get task by id for edit
    public function get_task_by_id($id)
    {
        $this->db->from('tbltask t');
        $this->db->join('tbluser b','b.userId=t.assign_To');
        $this->db->where('t.taskId', $id);
        $quary = $this->db->get();
        return $quary->result();
    }
      // Delete Task
      function delete_task($id){
        $this->db->where('taskId',$id);
        $this->db->delete('tbltask');
        
    }
}
?>