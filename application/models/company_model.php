<?php

/**
* 
*/
class Company_model extends CI_Model
{

//User Related Function
	public function getUser(){
		$this->db->from('user');
		$query = $this->db->get();
		return $query->result();
	}

	public function newUser($user){
		$this->db->insert('user', $user); 
	}

	public function deleteUser($username){
		$this->db->where('username',$username);
		$this->db->delete('user');		
	}
	
	public function update_password($new_password){
		$data = array(
               'password' => $new_password,
               );
		$this->db->where('id', $this->session->session_data['user_id']);
		$this->db->update('user', $data);
		
	}

	public function updateCategory($name, $cat){
		$data = array(
               'category' => $cat,
            );
		$this->db->where('username', $name);
		$this->db->update('user', $data); 
	}

//Project Related Function
	public function getTotalProject(){
		$this->db->select('count(name) AS total');
		$this->db->from('project');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTotalCompleteProject(){
		$this->db->select('count(id) AS total');
		$this->db->from('project');
		$this->db->where('status','complete');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllProject(){
		$this->db->from('project');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->order_by('name');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getProject(){
		$this->db->select('project.name,project.completion');
		$this->db->from('project');
		$this->db->where('status','ongoing');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->limit(3);
		$query=$this->db->get();
		return $query->result();
	}

	public function getProjectByID($id){
		$this->db->from('project');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}

	public function getProjectId($project_name){
		$this->db->select('id');
		$this->db->from('project');
		$this->db->where('name',$project_name);
		$query = $this->db->get();
		return $query->result();
	}

	public function getProjectByEmployeeID($id){
		$this->db->from('project');
		$this->db->join('employee_project','project.id = employee_project.project_id','inner');
		$this->db->where('employee_project.employee_id',$id);
		$query=$this->db->get();
		return $query->result();
	}

	public function create_project_link($project_link){
		$this->db->insert('project_link', $project_link); 	
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
		return $query->result();
	}

	public function new_project($project){
		$this->db->insert('project', $project); 

	}

	public function updateProject($project){
		$data = array(
              	'id' 				=> $project['id'],
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
	}

//Employee Related Function
	public function getTotalEmployee(){
		$this->db->select('count(name) AS total');
		$this->db->from('employee');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getEmployee(){
		$this->db->select('id,name,address,phone');
		$this->db->from('employee');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllEmployee(){
		$this->db->from('employee');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->order_by('name');
		$query = $this->db->get();
		return $query->result();
	}

	public function getEmployeeByID($id){
		$this->db->from('employee');
		$this->db->where('id',$id);
		$query=$this->db->get();
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
					) order by name
					';
		$query = $this->db->query($query);
		return $query->result();
	}

	public function getEmployeeByProject($id){
		$this->db->distinct();
		$this->db->select('employee.id,employee.name');
		$this->db->from('task');
		$this->db->join('project','project.id = task.project_id','inner');
		$this->db->join('employee','employee.id = task.assign','inner');
		$this->db->where('project.id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function new_employee($employee){
		$this->db->insert('employee', $employee);
		
	}

	public function updateEmployee($employee){
		$data = array(
              	'id' 				=> $employee['id'],
				'name'				=>$employee['name'],
				'address'			=>$employee['address'],
				'phone'				=>$employee['phone'],
               );

		$this->db->where('id', $employee['id']);
		$this->db->update('employee', $data);
	}

	public function upgradeEmployeeToTeamleader($employee){
		$this->db->insert('team_leader', $employee);
		$this->updateCategory($employee['name'],'teamleader');  
	}

	public function deleteEmployee($id){
		$this->db->delete('employee', array('id' => $id));
	}

//Teamleader Related Function
	public function getTotalTeamleader(){
		$this->db->select('count(name) AS total');
		$this->db->from('team_leader');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTeamleader(){
		$this->db->select('name,address,phone');
		$this->db->from('team_leader');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllTeamLeader(){
		$this->db->from('team_leader');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$this->db->order_by('name');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTeamleaderById($id){
		$this->db->from('team_leader');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}

	/*
	public function getTeamleaderId($teamleader_name){
		$this->db->select('id');
		$this->db->from('team_leader');
		$this->db->where('name',$teamleader_name);
		$query = $this->db->get();
		return $query->result();
	}*/

	public function getTeamleaderByProject($id){
		$this->db->from('team_leader');
		$this->db->join('project_link','project_link.teamleader_id = team_leader.id','inner');
		$this->db->where('project_link.project_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTeamleaderByName($name){
		$this->db->from('team_leader');
		$this->db->where('name',$name);
		$query=$this->db->get();
		return $query->result();
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

	public function updateTeamleader($teamleader){
		$data = array(
              	'id' 				=> $teamleader['id'],
				'name'				=>$teamleader['name'],
				'address'			=>$teamleader['address'],
				'phone'				=>$teamleader['phone'],
               );

		$this->db->where('id', $teamleader['id']);
		$this->db->update('team_leader', $data);
	}

	public function deleteTeamleader($id){
		$this->db->delete('team_leader', array('id' => $id));
	}
	public function degradeTeamleaderToEmployee($teamleader){
		$this->db->insert('employee', $teamleader);
		$this->updateCategory($teamleader['name'],'employee');  
	}

//Task Related Function
	public function getTaskByEmployeeId($id){
		$this->db->select('task.task, task.status, project.name');
		$this->db->from('task');
		$this->db->join('project','project.id = task.project_id','inner');
		$this->db->where('task.assign',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTask(){
		$this->db->select('task.id, task.task,team_leader.name as generator,employee.name as assign,task.status, project.name as project');
		$this->db->from('task');
		$this->db->where('task.company_id',$this->session->session_data['user_id']);
		$this->db->join('project','task.project_id=project.id','inner');
		$this->db->join('team_leader','team_leader.id=task.generator','inner');
		$this->db->join('employee','employee.id=task.assign','inner');
		$this->db->order_by('task.task');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTotalTask(){
		$this->db->select('count(id) as total');
		$this->db->from('task');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}
	public function getTotalFinishedTask(){
		$this->db->select('count(id) as total');
		$this->db->from('task');
		$this->db->where('status','complete');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();	
	}

	public function getOngoingTask($project_id,$employee_id){
		$this->db->select('count(id) as ongoing');
		$this->db->from('task');
		$this->db->where('project_id',$project_id);
		$this->db->where('assign',$employee_id);
		$this->db->where('status','ongoing');
		$query = $this->db->get();
		return $query->result();
	}

	public function getFinishedTask($project_id,$employee_id){
		$this->db->select('count(id) as finished');
		$this->db->from('task');
		$this->db->where('project_id',$project_id);
		$this->db->where('assign',$employee_id);
		$this->db->where('status','complete');
		$query = $this->db->get();
		return $query->result();
	}

	public function getContributionByEmployee($project_id,$employee_id){
		$query = 'select(
				(select count(task) from task where assign = '.$employee_id.')/(select count(task) from task where project_id = '.$project_id.')
			) * 100 as contribution';
		$query = $this->db->query($query);
		return $query->result();
	}

//Ticket Related Function
	public function getTicket(){
		$this->db->select('ticket.id, ticket.problem,employee.name as issuer, project.name as project');
		$this->db->from('ticket');
		$this->db->where('ticket.company_id',$this->session->session_data['user_id']);
		$this->db->join('employee','employee.id=ticket.issuer','inner');
		$this->db->join('project','ticket.project_id=project.id','inner');
		$this->db->order_by('ticket.problem');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTicketByEmployeeId($id){
		$this->db->select('ticket.problem,ticket.status,project.name');
		$this->db->from('ticket');
		$this->db->join('project','project.id = ticket.project_id','inner');
		$this->db->where('ticket.issuer',$id);
		$query = $this->db->get();
		return $query->result();	
	}

	public function getTotalTicket(){
		$this->db->select('count(id) AS total');
		$this->db->from('ticket');
		$this->db->where('company_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

//Note Related Function
	public function getNote(){
		$this->db->select('note.id,note.title,note.body,project.name');
		$this->db->from('note');
		$this->db->where('note.sender',$this->session->session_data['user_id']);
		$this->db->join('project','project.id=note.project_id','inner');
		$this->db->order_by('note.title');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTotalNote(){
		$this->db->select('count(id) AS total');
		$this->db->from('note');
		$this->db->where('sender',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();	
	}

	public function getNoteByID($id){
		$this->db->from('note');
		$this->db->where('id',$id);
		$query=$this->db->get();
		return $query->result();
	}

	public function new_note($note){
		$this->db->insert('note', $note);
		
	}

	public function updateNote($note){
		$this->db->where('id', $note['id']);
		$this->db->update('note',$note);
	}

//Other Function
	public function deleteAll($data){
		$this->db->where('id',$data['id']);
		$this->db->delete($data['table_name']);
	}

	public function getCompanyDetails(){
		$this->db->from('company');
		$this->db->where('id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

}
?>