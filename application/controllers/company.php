<?php

/**
* 
*/
class Company extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$session_username = $this->session->session_data['username'].'<br>';
		$session_userid= $this->session->session_data['user_id'].'<br>';
		$session_category = $this->session->session_data['category'].'<br>';
		$this->load->model('company_model');
	}

//Project related function
	public function project_list(){
		$data['search'] = NULL;
		$data['project'] = $this->company_model->getAllProject();
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['category']="project_list";
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');
	}
	
	public function project_search(){
		$data['type']="project";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/search',$data);
		$this->load->view('company/footer');
	}

	public function create_project(){
		$project = array(
					'id'				=> NULL,
					'company_id'		=> $this->session->session_data['user_id'],
					'name'				=> $this->input->post('project_name'),
					'start_date'		=> date("Y-m-d")." ".date("H:i:s"),
					'finish_date'		=> $this->input->post('completion_date'),
					'actual_finish_date'=> NULL,
					'url'				=> $this->input->post('location'),
					'completion'		=> 0,
					'status'			=> 'ongoing',
			);
		$this->company_model->new_project($project);
		$param['teamleader']	= $this->input->post('teamleader');
		$param['project_name']  = $project['name'];
 		$this->project_link($param);
 		redirect('/company/project_list/', 'refresh');
	}

	public function project_link($param){
		if($param['teamleader']!='name'){
			$pro_id = $this->company_model->getProjectId($param['project_name']);
			//iF found error then, remove comment of line 60(just below) and remove the next line(61) and uncomment the function in Model.
			//$team_id = $this->company_model->getTeamleaderId($param['teamleader']);
			$team_id = $this->company_model->getTeamleaderByName($param['teamleader']);
			foreach ($pro_id as $row) {
				$project_id = $row->id;
			}
			foreach ($team_id as $row) {
				$teamleader_id = $row->id;
			}
			$project_link = array(
				'id'			=> NULL,
				'project_id'	=> $project_id,
				'company_id'	=> $this->session->session_data['user_id'],
				'teamleader_id' => $teamleader_id
			);
			$this->company_model->create_project_link($project_link);
		}
	}

	public function editProject(){
		$project_id =  $this->uri->segment(3);
		$data['project'] = $this->company_model->getProjectById($project_id);
		$data['type'] = "Project";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/edit.php',$data);
		$this->load->view('company/footer');
	}

	public function Projectdetails(){
		$project_id =  $this->uri->segment(3);
		$data['project'] = $this->company_model->getProjectById($project_id);
		$data['teamleader'] = $this->company_model->getTeamleaderByProject($project_id);
		$data['employee']= $this->company_model->getEmployeeByProject($project_id);
		$cont = array();
		$ongoing = array();
		$finished = array();
		foreach ($data['employee'] as $row) {
			$res =  $this->company_model->getContributionByEmployee($project_id,$row->id);
			$status_ongoing = $this->company_model->getOngoingTask($project_id,$row->id);
			$status_finished	= $this->company_model->getFinishedTask($project_id,$row->id);
			foreach ($res as $row) {
				array_push($cont, $row->contribution);
			}
			if(count($status_ongoing)>0){
				foreach ($status_ongoing as $sts) {
					array_push($ongoing, $sts->ongoing);
				}
			}
			if(count($status_finished)>0){
				foreach ($status_finished as $sts) {
					array_push($finished, $sts->finished);
				}
			}
		}
		$data['contribution'] = $cont;
		$data['ongoing'] = $ongoing;
		$data['finished'] = $finished;
		$data['category'] = "project_report";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');
	}

	public function update_project(){
		$project = array(
				'id' 				=> $this->input->post('id'),
				'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$this->input->post('name'),
				'start_date'		=>$this->input->post('start_date'),
				'finish_date'		=>$this->input->post('finish_date'),
				'actual_finish_date'=>$this->input->post('actual_finish_date'),
				'url'				=>$this->input->post('url'),
				'completion'		=>$this->input->post('completion'),
				'status'			=>$this->input->post('status'),
			);
		$this->company_model->updateProject($project);
		redirect('/company/project_list/', 'refresh');
	}

	public function deleteProject(){
		
		$data['table_name'] = 'project';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/project_list/','refresh');
	}

//Employee Related Function
	public function employee_list(){
		$data['employee'] = $this->company_model->getAllEmployee();
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['category']="employee_list";
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');	
	}

	public function employee_search(){
		$data['type']="employee";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/search',$data);
		$this->load->view('company/footer');
	}

	public function search_employee(){
		$data['search'] = $this->input->post('search');
		$data['from']='employee';
		
		$data['employee'] = $this->company_model->getSearchEmployee($data['search'],$data['from']);
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['category']="search_employee";
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');
	}

	public function add_Employee(){
		$employee = array(
					'id'				=> NULL,
					'company_id'		=> $this->session->session_data['user_id'],
					'name'				=> $this->input->post('employee_name'),
					'address'			=> $this->input->post('address'),
					'phone'				=> $this->input->post('phone')
			);
		$user = array(
					'username'			=> $this->input->post('employee_name'),
					'password'			=> md5($this->input->post('employee_name')),
					'category'			=> 'employee',
			);
		$this->company_model->new_employee($employee);
		$this->company_model->newUser($user);
 		redirect('/company/employee_list/', 'refresh');
	}

	public function Employeedetails(){
		$employee_id = $this->uri->segment(3);
		$data['category'] = "employee_report";
		$data['employee'] = $this->company_model->getEmployeeById($employee_id);
		$data['project'] = $this->company_model->getProjectByEmployeeID($employee_id);
		$data['task'] = $this->company_model->getTaskByEmployeeId($employee_id);
		$data['ticket'] = $this->company_model->getTicketByEmployeeId($employee_id);
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');
	}

	public function editEmployee(){
		$employee_id = $this->uri->segment(3);
		$data['employee'] = $this->company_model->getEmployeeById($employee_id);
		$data['type'] = "Employee";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/edit.php',$data);
		$this->load->view('company/footer');
	}

	public function update_employee(){
		$employee = array(
				'id' 				=> $this->input->post('id'),
				'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$this->input->post('name'),
				'address'			=>$this->input->post('address'),
				'phone'				=>$this->input->post('phone'),
			);
		$this->company_model->updateEmployee($employee);
		redirect('/company/employee_list/', 'refresh');
	}

	public function deleteEmployee(){
		$username = null;
		$data['table_name'] = 'employee';
		$data['id'] = $this->uri->segment(3);
		$data['employee'] = $this->company_model->getEmployeeById($data['id']);
		foreach ($data['employee'] as $emp) {
			$username = $emp->name;
		}
		$this->company_model->deleteUser($username);
		$this->company_model->deleteAll($data);
		redirect('/company/employee_list/','refresh');	
	}

	public function upgradeEmployee(){
		$data['id'] = $this->uri->segment(3);
		$data['employee'] = $this->company_model->getEmployeeById($data['id']);
		foreach ($data['employee'] as $emp) {
			$teamleader = array(
						//'id'			=> $data['id'],
						'company_id'	=> $emp->company_id,
						'name'			=> $emp->name,
						'address'		=>$emp->address,
						'phone'			=>$emp->phone,
					);
		}
		$this->company_model->deleteEmployee($data['id']);
		$this->company_model->upgradeEmployeeToTeamleader($teamleader);
		redirect('/company/employee_list/','refresh');
	}
	
//Teamleader Related Function
	public function teamleader_list(){
		
		$data['employee'] = $this->company_model->getAllTeamLeader();
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['category']="teamleader_list";
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');	
	}

	public function teamleader_search(){
		$data['type']="teamleader";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/search',$data);
		$this->load->view('company/footer');
	}

	public function search_teamleader(){
		$data['search'] = $this->input->post('search');
		$data['from']='team_leader';
		
		$data['employee'] = $this->company_model->getSearchEmployee($data['search'],$data['from']);
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['category']="search_teamleader";
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');
	}

	public function add_TeamLeader(){
		$teamleader = array(
					'id'				=> NULL,
					'company_id'		=> $this->session->session_data['user_id'],
					'name'				=> $this->input->post('teamleader_name'),
					'address'			=> $this->input->post('address'),
					'phone'				=> $this->input->post('phone')
			);
		$this->company_model->new_teamleader($teamleader);
		redirect('/company/teamleader_list/', 'refresh');		
	}

	public function editTeamleader(){
		$teamleader_id = $this->uri->segment(3);
		$data['teamleader'] = $this->company_model->getTeamleaderById($teamleader_id);
		$data['type'] = "Teamleader";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/edit.php',$data);
		$this->load->view('company/footer');
	}

	public function update_teamleader(){
		$teamleader = array(
				'id' 				=> $this->input->post('id'),
				'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$this->input->post('name'),
				'address'			=>$this->input->post('address'),
				'phone'				=>$this->input->post('phone'),
			);
		
		$this->company_model->updateTeamleader($teamleader);
		redirect('/company/teamleader_list/', 'refresh');
	}

	public function degradeTeamleader(){
		$data['id'] = $this->uri->segment(3);
		$data['teamleader'] = $this->company_model->getTeamleaderById($data['id']);
		foreach ($data['teamleader'] as $emp) {
			$employee = array(
						//'id'			=> $data['id'],
						'company_id'	=> $emp->company_id,
						'name'			=> $emp->name,
						'address'		=>$emp->address,
						'phone'			=>$emp->phone,
					);
			
		}
		$this->company_model->deleteTeamleader($data['id']);
		$this->company_model->degradeTeamleaderToEmployee($employee);
		redirect('/company/teamleader_list/','refresh');

	}

	public function deleteTeamleader(){
		$data['table_name'] = 'team_leader';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/teamleader_list/','refresh');	
	}

//Task Related Function
	public function view_task(){
		$data['sidebar_menu']=array();
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		
		$data['task'] = $this->company_model->getTask();
		$data['category'] = 'task';
		$this->load->view('Company/view',$data);
		$this->load->view('company/footer');
	}
	
//Ticket Related Function
	public function view_ticket(){
		$data['sidebar_menu']=array();
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		
		$data['ticket'] = $this->company_model->getTicket();
		$data['category'] = 'ticket';
		$this->load->view('Company/view',$data);
		$this->load->view('company/footer');
	}

	public function deleteTicket(){
		$data['table_name'] = 'ticket';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/view_ticket/','refresh');	
	}

//Note Related Function
	public function view_note(){
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		
		$data['note'] = $this->company_model->getNote();
		$data['category'] = 'note';
		$this->load->view('Company/view',$data);
		$this->load->view('company/footer');
	}

	public function add_note(){
		$pro_id = $this->company_model->getProjectId($this->input->post('project_list'));
		foreach ($pro_id as $row) {
				# code...
				$id = $row->id;
		}
 		$note = array(
					'id'				=> NULL,
					'title'				=> $this->input->post('title'),
					'body'				=> $this->input->post('body'),
					'sender'			=> $this->session->session_data['user_id'],
					'project_id'		=> $id,
			);
		$this->company_model->new_note($note);
		redirect('/company/view_note/', 'refresh');
	}

	public function editNote(){
		$note_id = $this->uri->segment(3);
		$data['note'] = $this->company_model->getNoteById($note_id);
		$data['current_project'] = $this->company_model->getNote();
		$data['project_list'] = $this->company_model->getAllProject();
		$data['type'] = "Note";
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/edit.php',$data);
		$this->load->view('company/footer');
	}

	public function update_note(){
		$pro_id = $this->company_model->getProjectId($this->input->post('project_list'));
		foreach ($pro_id as $row) {
				# code...
				$project_id = $row->id;
		}
 		$note = array(
					'id'				=> NULL,
					'title'				=> $this->input->post('title'),
					'body'				=> $this->input->post('body'),
					'sender'			=> $this->session->session_data['user_id'],
					'project_id'		=> $project_id,
			);
		$this->company_model->updateNote($note);
		redirect('/company/view_note/', 'refresh');
	}

	public function deleteNote(){
		$data['table_name'] = 'note';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/view_note/','refresh');	
	}

//Other Function

	public function search(){
		$data['search'] = $this->input->post('search');
		$data['project'] = $this->company_model->getSearchProject($data['search']);
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['category']="search_project";
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');
	}

	public function add_new(){
		$prev =  $_SERVER['HTTP_REFERER'];
		$data['from'] = substr($prev, strrpos($prev, '/') + 1);
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		switch ($data['from']) {
			case 'project_list':
			case 'project_search':
				$data['teamleader'] = $this->company_model->getAllTeamLeader();
				$this->load->view('company/new',$data);
			break;
			case 'employee_list':
			case 'employee_search':
				$this->load->view('company/new',$data);
			 break;
			
			case 'teamleader_list':
			case 'teamleader_search':
				$this->load->view('company/new',$data);
			 break;

			case 'view_note':
				$data['project_list'] = $this->company_model->getAllProject();

				$this->load->view('company/new',$data);
			 break;
		}
		$this->load->view('company/footer');
	}
	
//Profile Related Function
	public function profile(){
		$data['sidebar_menu'] = array();
		$data['category'] = "profile";
		$data['personal'] = $this->company_model->getCompanyDetails();
		$data['total_project'] = $this->company_model->getTotalProject();
		$data['complete_project'] = $this->company_model->getTotalCompleteProject();
		$data['project'] = $this->company_model->getAllProject();
		$data['total_employee'] = $this->company_model->getTotalEmployee();
		$data['total_teamleader'] = $this->company_model->getTotalTeamleader();
		$data['total_ticket'] = $this->company_model->getTotalTicket();
		$data['total_note'] = $this->company_model->getTotalNote();
		$data['total_task'] = $this->company_model->getTotalTask();
		$data['total_finished_task'] = $this->company_model->getTotalFinishedTask();
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/view',$data);
		$this->load->view('company/footer');

	}
	public function change_password(){
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->view('company/change_password');
		$this->load->view('company/footer');
	}

	public function password_change(){
		$old_Password = md5($this->input->post('oldPassword'));
		$new_password = md5($this->input->post('newPassword'));
		$re_new_password = md5($this->input->post('ReNewPassword'));
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$db_password = $this->session->session_data['password'];
		if(strcmp($old_Password,$db_password)==0){
			if(strcmp($new_password, $re_new_password)==0){
				if(strcmp($new_password, $old_Password)==0){
					$data['error_message']='Both Old Password and New Password are same';
					$this->load->view('login/error',$data);
				}
				else{
					
					$this->company_model->update_password($new_password);
					$this->load->view('login/index');
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

	public function dashboard(){
		$data['sidebar_menu']=array('Menu 1', 'Menu 2');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$data['employee'] = $this->Company_model->getEmployee();
		$data['teamleader'] = $this->Company_model->getTeamleader();
		$data['project'] = $this->Company_model->getProject();
		$data['total_employee'] =$this->Company_model->getTotalEmployee();
		$data['total_teamleader'] =$this->Company_model->getTotalTeamleader();
		$data['total_project'] =$this->Company_model->getTotalProject();
		$this->load->view('company/dashboard',$data);
		$this->load->view('company/footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/login/index/', 'refresh');
	}
}
?>