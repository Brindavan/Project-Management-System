<?php 

/**
* 
*/
class Teamleader_model extends CI_Model
{

//User Related Funciton
	function getTeamleaderId($name){
		$this->db->from('team_leader');
		$this->db->where('name',$name);
		$query = $this->db->get();
		return $query->result();
	}

	public function update_password($new_password){
		$data = array(
               'password' => $new_password,
               );
		$this->db->where('username', $this->session->session_data['username']);
		$this->db->update('user', $data);
	}

//project Related Function
	function getProject(){
		$this->db->select('project.name,project.completion');
		$this->db->from('project');
		$this->db->join('project_link','project_link.project_id = project.id','inner');
		$this->db->join('team_leader','team_leader.id = project_link.teamleader_id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$this->db->limit(3);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllProject(){
		$this->db->select('project.id,project.name,project.url,project.status,project.completion');
		$this->db->from('project');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		return $query->result();
	}

	function getSearchProject($search){
		$query = 'select project.id,project.name, project.url, project.completion, project.status
					from project
					inner join project_link,team_leader
					where
					project_link.project_id = project.id and
					team_leader.id = project_link.teamleader_id and
					team_leader.name = "'.$this->session->session_data['username'].'"
					and
					(project.name like "%'.$search.'%"
						or project.status like "%'.$search.'%"
						or project.url like "%'.$search.'%"						
					);
					';
		$query = $this->db->query($query);
		return $query->result();
	}
	
	function getProjectByProjectId($id){
		$this->db->from('project');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getProjectByName($name){
		$this->db->from('project');
		$this->db->where('name',$name);
		$query = $this->db->get();
		return $query->result();
	}

	public function getProjectIdByName($name){
		$this->db->select('id');
		$this->db->from('project');
		$this->db->where('name',$name);
		$query = $this->db->get();
		return $query->result();
	}
//Employee-Project Related Function
	function getEmployeeProject(){
		$this->db->select('employee_project.id as project_id,employee.name as employee_name,project.name as project_name');
		$this->db->from('employee');
		$this->db->join('employee_project','employee.id = employee_project.employee_id','inner');
		$this->db->join('project','project.id = employee_project.project_id','inner');
		$this->db->where('employee_project.teamleader_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}
	function getEmployeeProjectByEmployeeID($id){
		$this->db->from('project');
		$this->db->join('employee_project','Project.id = employee_project.project_id','inner');
		$this->db->where('employee_project.teamleader_id',$this->session->session_data['user_id']);
		$this->db->where('employee_project.employee_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function deleteEmployeeProject($id){
		$this->db->where('id',$id);
		$this->db->delete('employee_project');	
	}
	
	function getSameEmployeeProject(){
		$this->db->from('employee_project');
		$this->db->where('teamleader_id',$this->session->session_data['user_id']);
		$query = $this->db->get();
		return $query->result();
	}

	public function employeeProject($employee_project){
		$this->db->insert('employee_project', $employee_project); 
	}

//Employee Related Function
	function getEmployeeByProjectID($id){
		$this->db->distinct();
		$this->db->select('employee.id,employee.name');
		$this->db->from('task');
		$this->db->join('project','project.id = task.project_id','inner');
		$this->db->join('employee','employee.id = task.assign','inner');
		$this->db->where('project.id',$id);
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
	public function getEmployeeByName($name){
		$this->db->from('employee');
		$this->db->where('name',$name);
		$query = $this->db->get();
		return $query->result();
	}
	public function getAllEmployee(){
		$this->db->select('employee.id, employee.name,employee.address,employee.phone');
		$this->db->from('employee');
		$this->db->join('team_leader','employee.company_id = team_leader.company_id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllEmployeeInProject(){
		$this->db->select('employee.id, employee.name,employee.address,employee.phone');
		$this->db->from('employee');
		$this->db->join('team_leader','employee.company_id = team_leader.company_id','inner');
		$this->db->join('employee_project','employee_project.employee_id = employee.id');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getEmployeeIdByName($name){
		$this->db->select('id');
		$this->db->from('employee');
		$this->db->where('name',$name);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSearchEmployee($search){
		$query = 'select employee.id,employee.name,employee.address, employee.phone
					from employee
					inner join team_leader
					where
					employee.company_id = team_leader.company_id and
					team_leader.name = "'.$this->session->session_data['username'].'"
					and
					(employee.name like "%'.$search.'%"
						or employee.address like "%'.$search.'%"
						or employee.phone like "%'.$search.'%"						
					)
					';
		$query = $this->db->query($query);
		return $query->result();
	}

//Task Related Function
	public function getOngoingTask($project_id,$employee_id){
		$this->db->select('count(task) as ongoing');
		$this->db->from('task');
		$this->db->where('project_id',$project_id);
		$this->db->where('assign',$employee_id);
		$this->db->where('status','ongoing');
		$query = $this->db->get();
		return $query->result();
	}

	public function getFinishedTask($project_id,$employee_id){
		$this->db->select('count(task) as finished');
		$this->db->from('task');
		$this->db->where('project_id',$project_id);
		$this->db->where('assign',$employee_id);
		$this->db->where('status','complete');
		$query = $this->db->get();
		return $query->result();
	}
	function getEmployeeTaskByEmployeeID($id){
		$this->db->select('task.task, task.status, project.name');
		$this->db->from('task');
		$this->db->join('project','project.id = task.project_id','inner');
		$this->db->where('assign',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function newTask($task){
		$this->db->insert('task',$task);
	}

	public function updateTask($task,$id){
		$this->db->where('id', $id);
		$this->db->update('task', $task);
		
	}

	public function deleteTask($id){
		$this->db->where('id',$id);
		$this->db->delete('task');	
	}

	public function getTask(){
		$this->db->from('task');
		$this->db->join('team_leader','team_leader.id = task.generator');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	public function getAllTask(){
		$this->db->select('task.id,task.task,project.name as project,employee.name as assign,task.status');
		$this->db->from('task');
		$this->db->join('team_leader','team_leader.id = task.generator','inner');
		$this->db->join('employee','employee.id = task.assign','inner');	
		$this->db->join('project','project.id=task.project_id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTaskById($id){
		$this->db->select('task.id,task.task,project.name as project,employee.name as assign,task.status');
		$this->db->from('task');
		$this->db->join('employee','employee.id = task.assign','inner');	
		$this->db->join('project','project.id=task.project_id','inner');
		$this->db->where('task.id',$id);
		$query = $this->db->get();
		return $query->result();
	}

//Ticket Related Function
	function getTicket(){
		$this->db->select('ticket.id,ticket.problem,employee.name as issuer,ticket.status, project.name as project');
		$this->db->from('ticket');
		$this->db->join('project','ticket.project_id = project.id','inner');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id','inner');
		$this->db->join('employee','ticket.issuer = employee.id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		return $query->result();
	}

	public function getTicketById($id){
		$this->db->select('ticket.id,ticket.problem,employee.name as issuer,ticket.status, project.name as project');
		$this->db->from('ticket');
		$this->db->join('project','ticket.project_id = project.id','inner');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id','inner');
		$this->db->join('employee','ticket.issuer = employee.id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$this->db->where('ticket.id',$id);
		$query = $this->db->get();
		return $query->result();	
	}

	public function getTicketDetailsById($id){
		$this->db->select('ticket_employee.id,ticket_employee.solution,employee.name');
		$this->db->from('ticket_employee');
		$this->db->join('ticket','ticket.id = ticket_employee.ticket_id','inner');
		$this->db->join('employee','employee.id = ticket_employee.solver','inner');
		$this->db->where('ticket_employee.ticket_id',$id);
		$query = $this->db->get();
		return $query->result();

	}

	public function getTicketByProjectId($id){
		$this->db->select('ticket.problem,employee.name,ticket.status');
		$this->db->from('ticket');
		$this->db->join('employee','employee.id = ticket.issuer','inner');
		$this->db->where('ticket.project_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getEmployeeTicketByEmployeeID($id){
		$this->db->select('ticket.problem, project.name, ticket.status');
		$this->db->from('ticket');
		$this->db->join('project','project.id = ticket.project_id','inner');
		$this->db->where('issuer',$id);
		$query = $this->db->get();
		return $query->result();
	}

//Note Related Function
	public function getNote(){
		$this->db->select('note.id, note.title, note.body, project.name as name');
		$this->db->from('note');
		$this->db->join('project','note.project_id = project.id','inner');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		return $query->result();
	}  

//Other Related Function

//Profile Related Function
}

?>