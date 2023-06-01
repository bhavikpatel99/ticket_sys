<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_m extends CI_Model 
{
     // Function to get all user list
     public function get_emp()
     {
        $this->db->select('*');
        $this->db->from('tbluser');
        $this->db->where('userLevel','1');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
     }
     // Function to get all task list
     public function get_task()
     {
         $this->db->from('tbltask t');
         $this->db->join('tbluser b','b.userId=t.empId');
         $quary = $this->db->get();
         return $quary->result();
     }
     // Function to select particular record from table name tbltask
    function get_task_id($id){
        $query = $this->db->select('t.*,b.empName')
                      ->from('tbltask t')
                      ->join('tbluser b', 'b.userId = t.empId')
                      ->where('t.empId', $id)
                      ->or_where('t.entry_By', $id)
                      ->get();

    return $query->result();
     }
     // Delete Task
     function delete_task($id){
         $this->db->where('taskId',$id);
         $this->db->delete('tbltask');
         
     }
     // Update Query For Selected Task
     function update_task($id){
         $data = [
            "task" => $this->input->post("txttask"),
			"assignDate" => date("Y-m-d", strtotime($this->input->post("txtassigndate"))),
			"dueDate" => date("Y-m-d", strtotime($this->input->post("txtduedate"))),
         ];
         $result = $this->db->where('taskId',$id)->update('tbltask',$data);
         return $result;
     }
}
?>