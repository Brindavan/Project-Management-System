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
		//echo $this->session->session_data['user_id'];
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

	public function getProjectByName($name){
		$this->db->from('project');
		$this->db->where('name',$name);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getEmployeeProjectById($id){
		$this->db->select('employee.id, employee.name');
		$this->db->from('employee');
		$this->db->join('employee_project','employee_project.employee_id = employee.id','inner');
		$this->db->where('employee_project.project_id',$id);
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

	function updateTask($id,$status){
		$data = array(
               'status' => $status,
               );

		$this->db->where('id', $id);
		$this->db->update('task', $data);
		//echo $this->db->last_query().'<br>';
	}

	public function getTaskCount($id){
		$this->db->select('count(task) as task_no');
		$this->db->from('task');
		$this->db->where('assign',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getCompeletTaskCount($id){
		$this->db->select('count(task) as complete');
		$this->db->from('task');
		$this->db->where('assign',$id);
		$this->db->where('status','complete');
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

	function getOwnTicket(){
		$this->db->select('ticket.id,ticket.problem,project.name as project,ticket.status');
		$this->db->from('ticket');
		$this->db->join('project','project.id = ticket.project_id','inner');
		$this->db->where('issuer',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getTicketById($id){
		$this->db->from('ticket');
		$this->db->where('id',$id);
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

	function getOthersTicket($project_id){
		$this->db->select('ticket.id, ticket.problem, employee.name,project.name as project');
		$this->db->from('ticket');
		$this->db->join('employee','employee.id = ticket.issuer','inner');
		$this->db->join('project','project.id = ticket.project_id','inner');
		$this->db->where('ticket.issuer !=',$this->session->session_data['user_id']);
		$this->db->where('ticket.project_id',$project_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function addTicket($ticket){
		$this->db->insert('ticket', $ticket); 
	}

	function updateTicket($ticket,$id){
		$this->db->where('id', $id);
		$this->db->update('ticket', $ticket);
		//echo $this->db->last_query();
	}

	function changeTicketStatus($id,$status){
		$ticket = array(
				'status'		=> $status,
			);
		$this->db->where('id', $id);
		$this->db->update('ticket', $ticket);
	}

	public function deleteTicket($id){
		$this->db->where('id',$id);
		$this->db->delete('ticket');	
	}


	function addComment($comment){
		$this->db->insert('ticket_employee',$comment);
	}

	function getComment($id){
		$this->db->from('ticket_employee');
		$this->db->where('ticket_id',$id);
		$this->db->where('solver',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function updateComment($comment,$id){
		$this->db->where('ticket_id',$id);
		$this->db->where('solver',$this->session->session_data['user_id']);
		$this->db->update('ticket_employee',$comment);
	}
	function getTicketByTicketId($id){
		$this->db->select('project.name as project,project.id as project_id, ticket.id,ticket.problem, employee.name,ticket.status');
		$this->db->from('ticket');
		$this->db->join('employee','employee.id = ticket.issuer','inner');
		$this->db->join('project','project.id = ticket.project_id','inner');
		$this->db->where('ticket.id',$id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function getTicketSolutionById($id){
		$this->db->select('employee.id,employee.name, ticket_employee.solution');
		$this->db->from('ticket_employee');
		$this->db->join('employee','employee.id = ticket_employee.solver','inner');
		$this->db->where('ticket_employee.ticket_id',$id);
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

	public function profileCompany(){
		$this->db->from('company');
		$this->db->where('id',$this->session->session_data['company_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getPersonalData(){
		$this->db->from('employee');
		$this->db->where('id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	
	function getcompleteTask(){
		//echo $this->session->session_data['user_id'];
		$this->db->select('count(id) AS total');
		$this->db->from('task');
		$this->db->where('status','complete');
		$this->db->where('assign',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getTeamleader(){
		$this->db->select('team_leader.name');
		$this->db->from('team_leader');
		$this->db->join('employee_project','employee_project.teamleader_id = team_leader.id','inner');
		$this->db->where('employee_project.employee_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();	
	}

	public function getTotalGeneratedTicket(){
		$this->db->select('count(id) as total');
		$this->db->from('ticket');
		$this->db->where('issuer',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();		
	}

	public function getTotalSolvedTicket(){
		$this->db->select('count(id) as total');
		$this->db->from('ticket_employee');
		$this->db->where('solver',$this->session->session_data['user_id']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();		
	}
}
?>