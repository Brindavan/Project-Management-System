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

	public function getProjectByID($id){
		//echo $id;
		$this->db->from('project');
		$this->db->where('id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function getEmployeeByID($id){
		//echo $id;
		$this->db->from('employee');
		$this->db->where('id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function getTeamleaderById($id){
		//echo $id;
		$this->db->from('team_leader');
		$this->db->where('id',$id);
		$query=$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	public function getNoteByID($id){
		//echo $id;
		$this->db->from('note');
		$this->db->where('id',$id);
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
		//echo $this->db->last_query();
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

	public function new_project($project){
		$this->db->insert('project', $project); 
	}

	public function new_employee($employee){
		$this->db->insert('employee', $employee);
		$user = array(
				'id'		=> NULL,
				'username'	=> $employee['name'],
				'password'	=>md5($employee['name']),
				'category'	=>'employee',
			);
		$this->db->insert('user',$user);	 
	}

	public function new_teamleader($teamleader){
		$this->db->insert('team_leader', $teamleader);
		$user = array(
				'id'		=> NULL,
				'username'	=> $teamleader['name'],
				'password'	=>md5($teamleader['name']),
				'category'	=>'teamleader',
			);
		$this->db->insert('user',$user);	 
	}

	public function new_note($note){
		$this->db->insert('note', $note);
		
	}



	public function getProjectId($project_name){
		$this->db->select('id');
		$this->db->from('project');
		$this->db->where('name',$project_name);
		$query = $this->db->get();
		return $query->result();
	}


	public function getTeamleaderId($teamleader_name){
		$this->db->select('id');
		$this->db->from('team_leader');
		$this->db->where('name',$teamleader_name);
		$query = $this->db->get();
		return $query->result();
	}

	public function create_project_link($project_link){
		$this->db->insert('project_link', $project_link); 	
	}


	public function updateProject($project){
		$data = array(
              	'id' 				=> $project['id'],
				//'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$project['name'],
				'start_date'		=>$project['start_date'],
				'finish_date'		=>$project['finish_date'],
				'actual_finish_date'=>$project['actual_finish_date'],
				'url'				=>$project['url'],
				'completion'		=>$project['completion'],
				'status'			=>$project['status'],
               );

		$this->db->where('id', $project['id']);
		$this->db->update('project', $data);
	//echo $this->db->last_query();		
	}

	public function updateEmployee($employee){
		$data = array(
              	'id' 				=> $employee['id'],
				//'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$employee['name'],
				'address'			=>$employee['address'],
				'phone'				=>$employee['phone'],
               );

		$this->db->where('id', $employee['id']);
		$this->db->update('employee', $data);
	//echo $this->db->last_query();		
	}

	public function updateTeamleader($teamleader){
		$data = array(
              	'id' 				=> $teamleader['id'],
				//'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$teamleader['name'],
				'address'			=>$teamleader['address'],
				'phone'				=>$teamleader['phone'],
               );

		$this->db->where('id', $teamleader['id']);
		$this->db->update('team_leader', $data);
	//echo $this->db->last_query();		
	}

	public function updateNote($note){
		$this->db->where('id', $note['id']);
		$this->db->update('note',$note);
	}


	public function deleteAll($data){
		$this->db->where('id',$data['id']);
		$this->db->delete($data['table_name']);
		//echo $data['table_name'];
		//echo $data['id'];

	}
}
?>