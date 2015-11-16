<?php

/**
* 
*/
class Employee_model extends CI_model
{
	function getEmployeeID($name){
		$this->db->select('employee.id');
		$this->db->from('employee');
		$this->db->where('employee_name',$name);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getTotalProject(){
		$this->db->select('count(id) AS total');
		$this->db->from('employee_project');
		$this->db->where('employee_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getTotalTask(){
		$this->db->select('count(id) AS total');
		$this->db->from('task');
		$this->db->where('assign',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getTotalNote(){
		$this->db->select('count(note.id) AS total');
		$this->db->from('note');
		$this->db->join('employee_project','employee_project.project_id = note.project_id','inner');
		$this->db->where('employee_project.employee_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getTotalTicket(){
		$this->db->select('count(id) AS total');
		$this->db->from('ticket');
		$this->db->where('issuer',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}


	function getAllProject(){
		$this->db->select('project.id,project.name, project.url, project.completion, project.status');
		$this->db->from('project');
		$this->db->join('employee_project','project.id = employee_project.project_id','inner');
		$this->db->where('employee_project.employee_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getAllTask(){
		$this->db->select('task.id,task.task, task.status,project.name as project_name,team_leader.name as teamleader_name');
		$this->db->from('task');
		$this->db->join('project','project.id = task.project_id','inner');
		$this->db->join('team_leader','team_leader.id = task.generator','inner');
		$this->db->where('assign',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function getAllNote(){
		$this->db->select('note.id,note.title,note.body, project.name');
		$this->db->from('note');
		$this->db->join('employee_project','employee_project.project_id = note.project_id','inner');
		$this->db->join('project','note.project_id = project.id','inner');
		$this->db->where('employee_project.employee_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getAllTicket(){
		$this->db->select('ticket.id,ticket.problem,project.name as project,ticket.status');
		$this->db->from('ticket');
		$this->db->join('project','project.id = ticket.project_id','inner');
		$this->db->where('issuer',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getSearchProject($search){
		$query = 'select project.id,project.name, project.url, project.completion, project.status
					from project
					inner join employee_project on employee_project.project_id = project.id
					where employee_project.employee_id = '.$this->session->session_data['user_id'].'
					and
					(project.name like "%'.$search.'%"
						or project.status like "%'.$search.'%"
						or project.url like "%'.$search.'%"						
					)
					';
		$query = $this->db->query($query);
		//echo $this->db->last_query();
		return $query->result();
	}

	public function update_password($new_password){
		$data = array(
               'password' => $new_password,
               );

		$this->db->where('id', $this->session->session_data['user_id']);
		$this->db->update('user', $data);
		
	}


	public function getEmployeeData(){
		$this->db->from('employee');
		$this->db->where('id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTask($id){
		$this->db->from('task');
		$this->db->where('project_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

}
?>