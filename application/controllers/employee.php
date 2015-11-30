<?php

/**
* 
*/
class Employee extends CI_Controller
{
	//private static $data = array();
	function __construct(){
		parent::__construct();
		$this->load->model('employee_model');
		echo 'Constructor';
		//$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');
	}

	function project_list(){
		
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$data['category'] = 'project_list';
		$data['project'] = $this->employee_model->getAllProject();
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}
	function project_search(){
		$data['type']="project";
		$this->load->view('employee/header');$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/search',$data);
		$this->load->view('employee/footer');
	}

	public function detailsProject(){
		$id =  $this->uri->segment(3);
		$data['sidebar_menu'] = array();
		$data['category'] = "project_details";
		$data['employee'] = $this->employee_model->getEmployeeProjectById($id);
		$complete_task = array();
		$task_no = array();
		foreach ($data['employee'] as $row) {
			$task_count = $this->employee_model->getTaskCount($row->id);
			$complete_task_count = $this->employee_model->getCompeletTaskCount($row->id);
			foreach ($task_count as $task) {
				array_push($task_no, $task->task_no);
			}
			foreach ($complete_task_count as $row) {
				array_push($complete_task, $row->complete);
			}

		}
		$data['task'] = $task_no;
		$data['task_complete'] = $complete_task;
		//var_dump($data['task']);
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}
	public function search(){
		$data['search'] = $this->input->post('search');
		$this->load->model('company_model');
		$data['project'] = $this->employee_model->getSearchProject($data['search']);
		$this->load->view('employee/header');$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$data['category']="search_project";
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}

	public function view_task(){
		$this->load->view('employee/header');$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$data['task'] = $this->employee_model->getAllTask();
		$data['category'] = 'task';
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}

	public function update_task(){
		$tas = $this->input->post('tasks');
		$data['task'] = $this->employee_model->getAllTask();
		$db_task = array();
		$status = 'ongoing';
		$key = 0;
		foreach ($data['task'] as $row) {
				array_push($db_task, $row->id);
		}
		
		for($i=0;$i<count($db_task);$i++){
			$key = 0;
			for($j=0;$j<count($tas);$j++){
				if($tas[$j]==$db_task[$i]){
					//echo $tas[$j];
					$key = 1;
					break;
				}
			}
			if($key ==1 ){
				$this->employee_model->updateTask($db_task[$i],'complete');	
			}
			else if($key == 0){
				$this->employee_model->updateTask($db_task[$i],'ongoing');
			}
		}
		redirect('employee/view_task','referesh');
	}
	public function create_ticket(){
		$prev =  $_SERVER['HTTP_REFERER'];
		$data['from'] = substr($prev, strrpos($prev, '/') + 1);
		//echo $data['from'];
	
		$data['project'] = $this->employee_model->getAllProject();
		$data['sidebar_menu'] = array('Create Ticket'); 
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/new',$data);
		$this->load->view('employee/footer');
		
	}
	public function view_own_ticket(){
		$data['sidebar_menu'] = array('Create Ticket'); 
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$data['ticket'] = $this->employee_model->getOwnTicket();
		$data['category'] = 'ticket';
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}

	public function add_ticket(){
		$project_name = $this->input->post('project');
		//echo $project_name;
		if($project_name == 'name'){
			echo 'Please fill the form correctrly';
		}
		else{
			$project = $this->employee_model->getProjectByName($project_name);
			foreach ($project as $row) {
				$project_id = $row->id;
			}
		
			$ticket = array(
				'company_id'		=> $this->session->session_data['company_id'],
				'problem'			=> $this->input->post('problem'),
				'issuer'			=> $this->session->session_data['user_id'],
				'project_id'		=> $project_id,
				'status'			=> 'open',
			);
			//var_dump($ticket);
			$this->employee_model->addTicket($ticket);
			redirect('employee/view_own_ticket','referesh');
		}
		
	}

	public function update_ticket(){
		$project = $this->employee_model->getProjectByName($this->input->post('project'));
			foreach ($project as $row) {
				$project_id = $row->id;
			}
		$ticket_id = $this->input->post('ticket_id');

		$ticket = array(
				'company_id'		=> $this->session->session_data['company_id'],
				'problem'			=> $this->input->post('problem'),
				'issuer'			=> $this->session->session_data['user_id'],
				'project_id'		=> $project_id,
				'status'			=> 'open',
			);
		$this->employee_model->updateTicket($ticket,$ticket_id);
		redirect('employee/view_own_ticket','referesh');
	}
	
	public function deleteTicket(){
		$id = $this->uri->segment(3);
		//echo $id;
		$this->employee_model->deleteTicket($id);
		redirect('employee/view_own_ticket','referesh');
	}

	public function changeTicketStatus(){
		$id = $this->uri->segment(3);
		$tic = $this->employee_model->getTicketById($id);
		$status = "close";
		foreach ($tic as $row) {
			if($row->status == "close")
				$status = "open";
		}
		$this->employee_model->changeTicketStatus($id,$status);
		redirect('employee/view_own_ticket','referesh');

	}

	public function view_ticket(){
		$data['project'] = $this->employee_model->getAllProject();
		foreach ($data['project'] as $row) {
			$data['ticket'] = $this->employee_model->getOthersTicket($row->id);
		}
		$data['sidebar_menu'] = array();
		$data['category'] = "view_ticket";
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}

	public function detailsOtherTicket(){
		$id = $this->uri->segment(3);
		$data['ticket_solution'] = $this->employee_model->getTicketSolutionById($id);
		$data['ticket'] = $this->employee_model->getTicketByTicketId($id);
		$data['comment'] = 'enable';
		foreach ($data['ticket_solution'] as $row) {
			if($row->id == $this->session->session_data['user_id']){
				$data['comment'] = 'disable';
				break;
			}

		}
		foreach ($data['ticket'] as $row) {
			if($row->status == "close")
				$data['comment'] = 'disable';
				break;
		}
		$data['sidebar_menu'] = array();
		$data['category'] = "details_ticket_others";
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}

	public function add_comment(){
		//$id =  $this->input->post('id');
		$comment = array(
				'ticket_id'		=> $this->input->post('id'),
				'solver'		=> $this->session->session_data['user_id'],
				'solution'		=> $this->input->post('solution'),
			);
		//var_dump($comment);
		$this->employee_model->addComment($comment);
		redirect('employee/detailsOtherTicket/'.$this->input->post('id'));
	}

	public function editComment(){
		$prev =  $_SERVER['HTTP_REFERER'];
		$id = substr($prev, strrpos($prev, '/') + 1);
		$data['ticket_solution'] = $this->employee_model->getTicketSolutionById($id);
		$data['ticket'] = $this->employee_model->getTicketByTicketId($id);
		$data['comment'] = $this->employee_model->getComment($id);
		$data['sidebar_menu'] = array();
		$data['category'] = "edit_comment";
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');

	}

	public function updateComment(){
		$prev =  $_SERVER['HTTP_REFERER'];
		$id = substr($prev, strrpos($prev, '/') + 1);
		$comment = array(
				'solution'		=> $this->input->post('solution'),
			);

		$this->employee_model->updateComment($comment,$id);
		redirect('employee/detailsOtherTicket/'.$id);
	}

	public function editTicket(){
		$id = $this->uri->segment(3);
		$data['ticket'] = $this->employee_model->getTicketByTicketId($id);
		$data['project'] = $this->employee_model->getAllProject();
		$data['sidebar_menu'] = array();
		$data['category'] = "edit_ticket";
		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}	



	public function detailsTicket(){
		$id = $this->uri->segment(3);
		echo $id;
	}

	public function view_note(){
		$this->load->view('employee/header');$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$data['note'] = $this->employee_model->getAllNote();
		$data['category'] = 'note';
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
	}

	public function change_password(){
		$this->load->view('employee/header');$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/change_password');
		$this->load->view('employee/footer');
	}

	public function password_change(){
		$old_Password = md5($this->input->post('oldPassword'));
		$new_password = md5($this->input->post('newPassword'));
		$re_new_password = md5($this->input->post('ReNewPassword'));
		$db_password = $this->session->session_data['password'];
		if(strcmp($old_Password,$db_password)==0){
			if(strcmp($new_password, $re_new_password)==0){
				if(strcmp($new_password, $old_Password)==0){
					$data['error_message']='Both Old Password and New Password are same';
					$this->load->view('login/error',$data);
				}
				else{
					$this->employee_model->update_password($new_password);
					$this->load->view('login/index');
					//echo 'Both New Password Match';
				}
			}
			else{
				$data['error_message']='Both New Password Not Match';
				$this->load->view('login/error',$data);
			}
		}
		else{
			$data['error_message']='Old Password Not Match';
			$this->load->view('login/error',$data);
		}
	}

	function profile(){
		$data['sidebar_menu'] = array();
		$data['category'] = "profile";
		$data['company'] = $this->employee_model->profileCompany();
		$data['personal'] = $this->employee_model->getPersonalData();
		$data['total_project'] = $this->employee_model->getTotalProject();
		$data['project'] = $this->employee_model->getAllProject();
		$data['total_task'] = $this->employee_model->getTotalTask();
		$data['complete_task'] = $this->employee_model->getCompleteTask();
		$data['teamleader'] = $this->employee_model->getTeamleader();
		$data['total_ticket'] = $this->employee_model->getTotalGeneratedTicket();
		$data['total_ticket_solved'] = $this->employee_model->getTotalSolvedTicket();
		$data['note'] = $this->employee_model->getTotalNote();
		//$data['project'] = $this->employee_model->getAllProject();
		//$data['company'] = $this->employee_model->profileCompany();
		//$data['company'] = $this->employee_model->profileCompany();

		$this->load->view('employee/header');
		$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
		/*$i=0;
		$data['category'] = 'profile';
		$data['employee'] = $this->employee_model->getEmployeeData();
		$data['project'] = $this->employee_model->getAllProject();
		echo count($data['project']);
		
		foreach ($data['project'] as $row) {
			$data['task'][$i++] = $this->employee_model->getTask($row->id);
		}
		
		$this->load->view('employee/header');$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');$this->load->view('employee/sidebar',$data);
		//var_dump($task[0]);
		$this->load->view('employee/view',$data);
		$this->load->view('employee/footer');
		*/
	}

}
?>