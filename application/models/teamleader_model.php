<?php 

/**
* 
*/
class Teamleader_model extends CI_Model
{
	function getTeamleaderId($name){
		$this->db->from('team_leader');
		$this->db->where('name',$name);
		$query = $this->db->get();
		return $query->result();
	}
	
	function getNote(){
		$this->db->select('note.id, note.title, note.body, project.name as name');
		$this->db->from('note');
		$this->db->join('project','note.project_id = project.id','inner');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	} 


	
	function getTicket(){
		$this->db->select('ticket.id,ticket.problem,employee.name as issuer,ticket.status, project.name as project');
		$this->db->from('ticket');
		$this->db->join('project','ticket.project_id = project.id','inner');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id','inner');
		$this->db->join('employee','ticket.issuer = employee.id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	//Project related function
	function getProject(){
		$this->db->select('project.name,project.completion');
		$this->db->from('project');
		$this->db->join('project_link','project_link.project_id = project.id','inner');
		$this->db->join('team_leader','team_leader.id = project_link.teamleader_id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$this->db->limit(3);
		$query=$this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	public function getAllProject(){
		$this->db->select('project.id,project.name,project.url,project.status,project.completion');
		$this->db->from('project');
		$this->db->join('project_link','project.id = project_link.project_id','inner');
		$this->db->join('team_leader','project_link.teamleader_id = team_leader.id');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		//echo $this->db->last_query();
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
		//echo $this->db->last_query();
		return $query->result();
	}

	function getEmployeeByProjectID($p_id){
	
	}
	function getEmployeeProject(){
		$this->db->select('employee_project.id as project_id,employee.name as employee_name,project.name as project_name,
							task.id as task_id,task.task');
		$this->db->from('employee');
		$this->db->join('employee_project','employee.id = employee_project.employee_id','inner');
		$this->db->join('team_leader','team_leader.id = employee_project.teamleader_id','inner');
		$this->db->join('project','project.id = employee_project.project_id','inner');
		$this->db->join('task','task.assign = employee.id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	//Employee Realated database function
	public function getAllEmployee(){
		$this->db->select('employee.id, employee.name,employee.address,employee.phone');
		$this->db->from('employee');
		$this->db->join('team_leader','employee.company_id = team_leader.company_id','inner');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$query = $this->db->get();
		//echo $this->db->last_query();
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
		//echo $this->db->last_query();
		return $query->result();
	}

	//Task related db queries functions

	function getTask(){
		$this->db->from('task');
		$this->db->join('team_leader','team_leader.id = task.generator');
		$this->db->where('team_leader.name',$this->session->session_data['username']);
		$this->db->limit(5);
		$query = $this->db->get();
		//echo $this->db->last_query();
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
}

?>