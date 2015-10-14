<?php

/**
* 
*/
class Company_model extends CI_Model
{
	
	public function getEmployee(){
		$this->db->select('name,address,phone');
		$this->db->from('employee');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->limit(5);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getTeamleader(){
		$this->db->select('name,address,phone');
		$this->db->from('team_leader');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->limit(5);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getProject(){
		$this->db->select('project.name,project.completion');
		$this->db->from('project');
		$this->db->where('status','ongoing');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->limit(3);
		$query=$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getTotalEmployee(){
		$this->db->select('count(name) AS total');
		$this->db->from('employee');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getTotalTeamleader(){
		$this->db->select('count(name) AS total');
		$this->db->from('team_leader');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTotalProject(){
		$this->db->select('count(name) AS total');
		$this->db->from('project');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSearchProject($search){
		$query = 'select project.id,project.name, project.url, project.completion, project.status
					from project
					where project.company_id = '.$this->session->session_data['user_id'].'
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

	public function getAllProject(){
		$this->db->from('project');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();

		
		return $query->result();
	}

	public function getAllEmployee(){
		$this->db->from('employee');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getAllTeamLeader(){
		$this->db->from('team_leader');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getSearchEmployee($search,$from){
		$query = 'select id,name,address, phone
					from '.$from.'
					where company_id = '.$this->session->session_data['user_id'].'
					and
					(name like "%'.$search.'%"
						or address like "%'.$search.'%"
						or phone like "%'.$search.'%"						
					)
					';
		$query = $this->db->query($query);
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getTask(){
		$this->db->select('task.id, task.task,team_leader.name as generator,employee.name as assign,task.status, project.name as project');
		$this->db->from('task');
		$this->db->where('task.company_id',$this->session->session_data['user_id']);
		$this->db->join('project','task.project_id=project.id','inner');
		$this->db->join('team_leader','team_leader.id=task.generator','inner');
		$this->db->join('employee','employee.id=task.assign','inner');

		//$this->db->from('task');
		$query = $this->db->get();
		echo $this->db->last_query();
		return $query->result();
	}

	public function getNote(){
		$this->db->select('note.id,note.title,note.body,project.name');
		$this->db->from('note');
		$this->db->where('note.sender',$this->session->session_data['user_id']);
		$this->db->join('project','project.id=note.project_id','inner');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getTicket(){
		$this->db->select('ticket.id, ticket.problem,employee.name as issuer, project.name as project');
		$this->db->from('ticket');
		$this->db->where('ticket.company_id',$this->session->session_data['user_id']);
		$this->db->join('employee','employee.id=ticket.issuer','inner');
		$this->db->join('project','ticket.project_id=project.id','inner');
		//$this->db->from('task');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getUser(){
		$this->db->from('user');
		$query = $this->db->get();
		echo $this->db->last_query();
		return $query->result();
	}

	public function update_password($new_password){
		$data = array(
               'password' => $new_password,
               );

		$this->db->where('id', $this->session->session_data['user_id']);
		$this->db->update('user', $data);
		
	}

}
?>