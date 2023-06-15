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
        $this->db->or_where('userLevel','2');
        $query = $this->db->get();
        $result = $query->result();
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
     // Select Send Task
     function get_send_task_id($id){
        $query = $this->db->select('t.*, b.empName')
                      ->from('tbltask t')
                      ->join('tbluser b', 'b.userId = t.assign_To')
                      ->where('t.entry_By', $id)
                      ->order_by('t.taskId', 'desc') // Enclose 'desc' in quotes
                      ->get();
        return $query->result();
    }    
     // Select Recive Task
    function get_recive_task_id($id){
        $query = $this->db->select('t.*,b.empName')
                      ->from('tbltask t')
                      ->join('tbluser b', 'b.userId = t.assign_To')
                      ->where('t.assign_To', $id)
                      ->order_by('t.taskId', 'desc')
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
    //  toggel status
    function update_task_status($id, $status)
    { 
        $data = [
            "taskStatus" => $status,
        ];
        $this->db->where('taskId', $id)->update('tbltask', $data);
    }
    
    function get_task_status($id)
    {
        $task = $this->db->where('taskId', $id)->get('tbltask')->row();
        return $task->taskStatus;
    }
     
}
?>