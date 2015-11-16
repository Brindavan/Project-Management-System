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
	}
	
	public function header(){
		$data['sidebar_menu']=array('New');
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
	}

	public function footer(){
		$this->load->view('company/footer');
	}
	
	public function project_search(){
		$data['type']="project";
		$this->header();
		$this->load->view('company/search',$data);
		$this->footer();
	}

	public function project_list(){
		$data['search'] = NULL;
		$this->load->model('company_model');
		$data['project'] = $this->company_model->getAllProject();
		$this->header();
		$data['category']="project_list";
		$this->load->view('company/view',$data);
		$this->footer();
	}

	public function search(){
		$data['search'] = $this->input->post('search');
		$this->load->model('company_model');
		$data['project'] = $this->company_model->getSearchProject($data['search']);
		$this->header();
		$data['category']="search_project";
		$this->load->view('company/view',$data);
		$this->footer();
	}

	public function employee_list(){
		$this->load->model('company_model');
		$data['employee'] = $this->company_model->getAllEmployee();
		$this->header();
		$data['category']="employee_list";
		$this->load->view('company/view',$data);
		$this->footer();	
	}

	public function teamleader_list(){
		$this->load->model('company_model');
		$data['employee'] = $this->company_model->getAllTeamLeader();
		$this->header();
		$data['category']="teamleader_list";
		$this->load->view('company/view',$data);
		$this->footer();	
	}

	public function employee_search(){
		$data['type']="employee";
		$this->header();
		$this->load->view('company/search',$data);
		$this->footer();
	}

	public function teamleader_search(){
		$data['type']="teamleader";
		$this->header();
		$this->load->view('company/search',$data);
		$this->footer();
	}
	public function search_employee(){
		$data['search'] = $this->input->post('search');
		$data['from']='employee';
		$this->load->model('company_model');
		$data['employee'] = $this->company_model->getSearchEmployee($data['search'],$data['from']);
		$this->header();
		$data['category']="search_employee";
		$this->load->view('company/view',$data);
		$this->footer();
	}

	public function search_teamleader(){
		$data['search'] = $this->input->post('search');
		$data['from']='team_leader';
		$this->load->model('company_model');
		$data['employee'] = $this->company_model->getSearchEmployee($data['search'],$data['from']);
		$this->header();
		$data['category']="search_teamleader";
		$this->load->view('company/view',$data);
		$this->footer();
	}

	public function change_password(){
		$this->header();
		$this->load->view('company/change_password');
		$this->footer();
	}

	public function password_change(){
		$old_Password = md5($this->input->post('oldPassword'));
		$new_password = md5($this->input->post('newPassword'));
		$re_new_password = md5($this->input->post('ReNewPassword'));
		//$this->header();
		//$this->load->view('company/dashboard');
		//echo $old_Password.'<br>';
		//echo $new_password.'<br>';
		//echo $re_new_password.'<br>';
		//echo $this->session->session_data['user_id'].'<br>';
		//echo $this->session->session_data['username'].'<br>';
		//echo $this->session->session_data['category'].'<br>';
		$db_password = $this->session->session_data['password'];
		//echo $old_Password.'<br>';
		//echo $db_password.'<br>';
		if(strcmp($old_Password,$db_password)==0){
			if(strcmp($new_password, $re_new_password)==0){
				if(strcmp($new_password, $old_Password)==0){
					$data['error_message']='Both Old Password and New Password are same';
					$this->load->view('login/error',$data);
				}
				else{
					$this->load->model('company_model');
					$this->company_model->update_password($new_password);
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

		//$this->footer();
		/*
		* To Do: First make session and check old password is correct or not
		* Second: Check new password is matched to retyped new password
		* Third: Call model to update the password
		*/
	}

	public function view_task(){
		$data['sidebar_menu']=array();
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->model('company_model');
		$data['task'] = $this->company_model->getTask();
		$data['category'] = 'task';
		$this->load->view('Company/view',$data);
		$this->footer();
	}
	
	public function view_ticket(){
		$data['sidebar_menu']=array();
		$this->load->view('company/header');
		$this->load->view('company/sidebar',$data);
		$this->load->model('company_model');
		$data['ticket'] = $this->company_model->getTicket();
		$data['category'] = 'ticket';
		$this->load->view('Company/view',$data);
		$this->footer();
	}
	public function view_note(){
		$this->header();
		$this->load->model('company_model');
		$data['note'] = $this->company_model->getNote();
		$data['category'] = 'note';
		$this->load->view('Company/view',$data);
		$this->footer();
	}


	public function add_new(){


	$prev =  $_SERVER['HTTP_REFERER'];
	$data['from'] = substr($prev, strrpos($prev, '/') + 1);
	//echo $data['from'];
	$this->header();
	$this->load->model('company_model');
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


		default:
			# code...
			break;
	}

	
	$this->footer();

	/*
	project_list
	project_search

	employee_list
	employee_search

	teamleader_list
	teamleader_search

	view_note
	*/

	}

	public function create_project(){
		/*echo $this->input->post('project_name').'<br>';
		echo $this->input->post('completion_date').'<br>';
		echo $this->input->post('location').'<br>';
		echo $this->input->post('teamleader').'<br>';
		*/
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
		$this->load->model('company_model');
		$this->company_model->new_project($project);
		$param['teamleader']	= $this->input->post('teamleader');
		$param['project_name']  = $project['name'];
 		$this->project_link($param);
 		
 		redirect('/company/project_list/', 'refresh');
		
	}

	public function add_Employee(){
		/*echo $this->input->post('project_name').'<br>';
		echo $this->input->post('completion_date').'<br>';
		echo $this->input->post('location').'<br>';
		echo $this->input->post('teamleader').'<br>';
		*/
		$employee = array(
					'id'				=> NULL,
					'company_id'		=> $this->session->session_data['user_id'],
					'name'				=> $this->input->post('employee_name'),
					'address'			=> $this->input->post('address'),
					'phone'				=> $this->input->post('phone')
			);
		$this->load->model('company_model');
		$this->company_model->new_employee($employee);
		
 		redirect('/company/employee_list/', 'refresh');
		
	}

	public function add_TeamLeader(){
		/*echo $this->input->post('project_name').'<br>';
		echo $this->input->post('completion_date').'<br>';
		echo $this->input->post('location').'<br>';
		echo $this->input->post('teamleader').'<br>';
		*/
		$teamleader = array(
					'id'				=> NULL,
					'company_id'		=> $this->session->session_data['user_id'],
					'name'				=> $this->input->post('teamleader_name'),
					'address'			=> $this->input->post('address'),
					'phone'				=> $this->input->post('phone')
			);
		$this->load->model('company_model');
		$this->company_model->new_teamleader($teamleader);
		
 		redirect('/company/teamleader_list/', 'refresh');
		
	}

	public function add_note(){
		/*echo $this->input->post('project_name').'<br>';
		echo $this->input->post('completion_date').'<br>';
		echo $this->input->post('location').'<br>';
		echo $this->input->post('teamleader').'<br>';
		*/
		
		$this->load->model('company_model');
		$pro_id = $this->company_model->getProjectId($this->input->post('project_list'));
		//$param['teamleader']	= $this->input->post('teamleader');
		//$param['project_name']  = $project['name'];
 		//$this->project_link($param);
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
	
	public function project_link($param){
	
		if($param['teamleader']!='name'){
			$this->load->model('company_model');
			$pro_id = $this->company_model->getProjectId($param['project_name']);
			$team_id = $this->company_model->getTeamleaderId($param['teamleader']);
			foreach ($pro_id as $row) {
				# code...
				$project_id = $row->id;
			}
			foreach ($team_id as $row) {
				# code...
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


/*
The following function are used to edit the dabase
*/
	public function editProject(){
		$project_id =  $this->uri->segment(3);
		//echo 'Project ID: '.$project_id;
		$this->load->model('company_model');
		$data['project'] = $this->company_model->getProjectById($project_id);
		$data['type'] = "Project";

		$this->header();
		$this->load->view('company/edit.php',$data);
		$this->footer();
			//$data['search'] = $this->input->post('search');
	}

	public function editEmployee(){
		$employee_id = $this->uri->segment(3);
		$this->load->model('company_model');
		$data['employee'] = $this->company_model->getEmployeeById($employee_id);
		$data['type'] = "Employee";
		$this->header();
		$this->load->view('company/edit.php',$data);
		$this->footer();
	}

	public function editTeamleader(){
		$teamleader_id = $this->uri->segment(3);
		$this->load->model('company_model');
		$data['teamleader'] = $this->company_model->getTeamleaderById($teamleader_id);
		$data['type'] = "Teamleader";
		$this->header();
		$this->load->view('company/edit.php',$data);
		$this->footer();
	}

	public function editNote(){
		//echo 'this';
		$note_id = $this->uri->segment(3);
		//echo $note_id;
		$this->load->model('company_model');
		$data['note'] = $this->company_model->getNoteById($note_id);
		$data['current_project'] = $this->company_model->getNote();
		$data['project_list'] = $this->company_model->getAllProject();
		$data['type'] = "Note";
		$this->header();
		$this->load->view('company/edit.php',$data);
		$this->footer();
	}

	public function update_project(){
		//echo $this->session->session_data['user_id'];
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
		$this->load->model('company_model');
		$this->company_model->updateProject($project);
		redirect('/company/project_list/', 'refresh');
	}

/*
	The below function is to update the database
*/
	public function update_employee(){
		//echo $this->session->session_data['user_id'];
		$employee = array(
				'id' 				=> $this->input->post('id'),
				'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$this->input->post('name'),
				'address'			=>$this->input->post('address'),
				'phone'				=>$this->input->post('phone'),
			);
		$this->load->model('company_model');
		$this->company_model->updateEmployee($employee);
		redirect('/company/employee_list/', 'refresh');
	}

	public function update_teamleader(){
		//echo $this->session->session_data['user_id'];
		$teamleader = array(
				'id' 				=> $this->input->post('id'),
				'company_id'		=>$this->session->session_data['user_id'],
				'name'				=>$this->input->post('name'),
				'address'			=>$this->input->post('address'),
				'phone'				=>$this->input->post('phone'),
			);
		$this->load->model('company_model');
		$this->company_model->updateTeamleader($teamleader);
		redirect('/company/teamleader_list/', 'refresh');
	}

	public function update_note(){
	$this->load->model('company_model');
	//echo $this->input->post('project_list');
	
		$pro_id = $this->company_model->getProjectId($this->input->post('project_list'));
		//var_dump($pro_id);
		//$param['teamleader']	= $this->input->post('teamleader');
		//$param['project_name']  = $project['name'];
 		//$this->project_link($param);
 		//var_dump($pro_id);
 		
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


/*
	The below functions are for delete from database

*/

	public function deleteProject(){
		$this->load->model('company_model');
		$data['table_name'] = 'project';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/project_list/','refresh');
	}

	public function deleteEmployee(){
		$this->load->model('company_model');
		$data['table_name'] = 'employee';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/employee_list/','refresh');	
	}

	public function deleteTeamleader(){
		$this->load->model('company_model');
		$data['table_name'] = 'team_leader';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/teamleader_list/','refresh');	
	}

	public function deleteNote(){
		$this->load->model('company_model');
		$data['table_name'] = 'note';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/view_note/','refresh');	
	}

	public function deleteTicket(){
		$this->load->model('company_model');
		$data['table_name'] = 'ticket';
		$data['id'] = $this->uri->segment(3);
		$this->company_model->deleteAll($data);
		redirect('/company/view_ticket/','refresh');	
	}


/*			if(strcmp($project['teamleader'],'name')==0)
			$project['teamleader']=NULL;

		$project_link = array(
					'id'		=>NULL,
					'project_id' \\\\\\\
			);
		$project_link['teamleader']	= $this->input->post('teamleader');
*/
}
?>