<?php
/**
* 
*/
class Teamleader extends CI_Controller
{
	private static $teamleaderID=NULL;
	function __construct(){
		parent::__construct();
		$this->load->model('teamleader_model');
		$data['teamleader'] = $this->teamleader_model->getTeamleaderId($this->session->session_data['username']);
		foreach ($data['teamleader'] as $row) {
			$teamleaderID = $row->id; 
		}
		$session_username = $this->session->session_data['username'].'<br>';
		$session_userid= $this->session->session_data['user_id'].'<br>';
		$session_category = $this->session->session_data['category'].'<br>';
	}


//User Related Funciton
	
	public function change_password(){
		$data['sidebar_menu'] = array();
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/change_password');
		$this->load->view('teamleader/footer');
	}

	public function password_change(){
		$old_Password = md5($this->input->post('oldPassword'));
		$new_password = md5($this->input->post('newPassword'));
		$re_new_password = md5($this->input->post('ReNewPassword'));
		$db_password = $this->session->session_data['password'];
		//echo $old_Password.'<br>';
		//echo $new_password.'<br>';
		//echo $re_new_password.'<br>';
		if(strcmp($old_Password,$db_password)==0){
			if(strcmp($new_password, $re_new_password)==0){
				if(strcmp($new_password, $old_Password)==0){
					$data['error_message']='Both Old Password and New Password are same';
					$this->load->view('login/error',$data);
				}
				else{
					$this->teamleader_model->update_password($new_password);
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

//project Related Function
	function project_list(){
		$data['search'] = NULL;
		$this->load->model('teamleader_model');
		$data['project'] = $this->teamleader_model->getAllProject();
		$data['sidebar_menu'] = array('Employee to project');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['category']="project_list";
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public function employeetoproject(){
		$data['category']="employee_to_project";
		$data['sidebar_menu'] = array('Employee to project');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['employee_project'] = $this->teamleader_model->getEmployeeProject();
		$data['employee'] = $this->teamleader_model->getAllEmployee();
		$data['project'] = $this->teamleader_model->getAllProject();
		//$data['category']="project_list";
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');	
	}

	public function add_employee_project(){
		$key = 0;
		$data['result'] = $this->teamleader_model->getSameEmployeeProject();
		//var_dump($data);

		$employee_project = array( 
			'teamleader_id'		=> $this->session->session_data['user_id'],
		);
		$emp = $this->input->post('employee');
		$pro = $this->input->post('project');
		$employee = $this->teamleader_model->getEmployeeByName($emp);
		$project = $this->teamleader_model->getProjectByName($pro);
		foreach ($project as $row) {
			$project_id =  $row->id;
		}
		foreach ($employee as $row) {
			$employee_id =  $row->id;
			//$employee_id = $row->id;
		}
		$employee_project = array( 
			'teamleader_id'		=> $this->session->session_data['user_id'],
			'project_id'		=> $project_id,
			'employee_id'		=> $employee_id,
		);
		if(empty($data['result'])!=0){
			$this->teamleader_model->employeeProject($employee_project);
					redirect('/teamleader/employeetoproject/', 'refresh');	
		}
			
		else{
			foreach ($data['result'] as $row) {
					if($row->employee_id == $employee_project['employee_id'] && $row->project_id == $employee_project['project_id']){
						$key = 1;
						break;
					}
				}
				if($key == 1){
					echo 'same employee already exist to same project';
				}
				else{
					$this->teamleader_model->employeeProject($employee_project);
					redirect('/teamleader/employeetoproject/', 'refresh');	
				}
		}
	}

	public function project_search(){
		$data['type']="project";
		$data['sidebar_menu'] = array('Employee to project');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/search',$data);
		$this->load->view('teamleader/footer');
	}

	public function detailsProject(){
		$project_id =  $this->uri->segment(3);
		$data['category'] = "Project Report";
		$data['sidebar_menu'] = array();
		$data['project'] = $this->teamleader_model->getProjectByProjectId($project_id);
		$data['employee']= $this->teamleader_model->getEmployeeByProjectId($project_id);
		$data['ticket'] = $this->teamleader_model->getTicketByProjectId($project_id);
		$cont = array();
		$ongoing = array();
		$finished = array();
		foreach ($data['employee'] as $row) {
			//$param['employee_id'] = $row->id;
			$res =  $this->teamleader_model->getContributionByEmployee($project_id,$row->id);
			$status_ongoing = $this->teamleader_model->getOngoingTask($project_id,$row->id);
			$status_finished	= $this->teamleader_model->getFinishedTask($project_id,$row->id);

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
			//$data['contribution'][$i++] = 
			//$data['employee_name'] = $row->name;
		}
		$data['contribution'] = $cont;
		$data['ongoing'] = $ongoing;
		$data['finished'] = $finished;

		//var_dump($data['finished']);

		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public function deleteEmployeeProject(){
		$id =  $this->uri->segment(3);
		$this->teamleader_model->deleteEmployeeProject($id);
		redirect('/teamleader/employeetoproject','refresh');
	}

	public function assign_employee(){
		$this->employeetoproject();
	}

//Employee Related Function
	public function employee_list(){
		$this->load->model('teamleader_model');
		$data['employee'] = $this->teamleader_model->getAllEmployee();
		$data['sidebar_menu'] = array('Employee to project');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['category']="employee_list";
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public function detailsEmployee(){
		$id =  $this->uri->segment(3);
		$data['category'] = 'employee_details';
		$data['sidebar_menu'] = array();
		$data['project'] = $this->teamleader_model->getEmployeeProjectByEmployeeID($id);
		//$data['all_task'] = $this->teamleader_model->getAllTask();
		$data['task'] = $this->teamleader_model->getEmployeeTaskByEmployeeID($id);
		$data['ticket'] = $this->teamleader_model->getEmployeeTicketByEmployeeID($id);
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public function employee_search(){
		$data['type']="employee";
		$data['category'] = "search_employee";
		$data['sidebar_menu'] = array();
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		//$this->load->view('teamleader/view',$data);
		
		$this->load->view('teamleader/search',$data);
		$this->load->view('teamleader/footer');
	}

	public function search_employee(){     
		$data['search'] = $this->input->post('search');
		//$this->load->model('company_model');
		$data['employee'] = $this->teamleader_model->getSearchEmployee($data['search']);
		$data['sidebar_menu'] = array();
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['category']="search_employee";
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

//Task Related Function
	public function view_task(){
		$data['sidebar_menu'] = array('Create Task');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['task'] = $this->teamleader_model->getAllTask();
		$data['category'] = 'task';
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public  function createtask(){
		$data['sidebar_menu'] = array('Create Task');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['project'] = $this->teamleader_model->getAllProject();
		$data['employee'] = $this->teamleader_model->getAllEmployeeInProject();
		$data['from'] = 'create_task';
		$this->load->view('teamleader/new',$data);
		$this->load->view('teamleader/footer');	
	}

	public function add_task(){
		$task = $this->input->post('task');
		$project = $this->input->post('project');
		$employee = $this->input->post('employee');
		if($project == "name" || $employee == "name"){
			echo "Please enter properly";
		}
		$data['employee'] = $this->teamleader_model->getEmployeeIdByName($employee);
		$data['project'] = $this->teamleader_model->getProjectIdByName($project);
		foreach ($data['employee'] as $row) {
			$employee_id = $row->id;
		}

		foreach ($data['project'] as $row) {
			$project_id = $row->id;
		}
		$task = array(
				'company_id'		=> $this->session->session_data['company_id'],
				'task'				=> $task,
				'generator'			=> $this->session->session_data['user_id'],
				'project_id'		=> $project_id,
				'assign'			=> $employee_id,
				'status'			=> 'ongoing',
			);
		$this->teamleader_model->newTask($task);
		redirect('teamleader/view_task','refresh');
	}

	public function editTask(){
		$id = $this->uri->segment(3);
		$data['sidebar_menu'] = array('Create Task');
		$data['category'] = "edit_task";
		$data['task'] = $this->teamleader_model->getTaskById($id);
		$data['project'] = $this->teamleader_model->getAllProject();
		$data['employee'] = $this->teamleader_model->getAllEmployee();
		//var_dump($data['project']);
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public function update_task(){
		$id = $this->input->post('id');
		$task = $this->input->post('task');
		$employee = $this->input->post('employee');
		$project = $this->input->post('project');
		$data['employee'] = $this->teamleader_model->getEmployeeIdByName($employee);
		$data['project'] = $this->teamleader_model->getProjectIdByName($project);
		foreach ($data['employee'] as $row) {
			$employee_id = $row->id;
		}

		foreach ($data['project'] as $row) {
			$project_id = $row->id;
		}
		$task = array(
				'task'			=> $task,
				'project_id'	=>$project_id,
				'assign'		=> $employee_id,			
			);

		$this->teamleader_model->updateTask($task,$id);
		redirect('teamleader/view_task','refresh');
	}

	public function deleteTask(){
		$id = $this->uri->segment(3);
		$this->teamleader_model->deleteTask($id);
		redirect('teamleader/view_task','refresh');
	}

//Ticket Related Function
	public function view_ticket(){
		$data['sidebar_menu'] = array();
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['ticket'] = $this->teamleader_model->getTicket();
		$data['category'] = 'ticket';
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

	public function detailsTicket(){
		$id = $this->uri->segment(3);
		$data['sidebar_menu'] = array();
		$data['category'] = "ticket_details";
		$data['ticket'] = $this->teamleader_model->getTicketById($id);
		$data['ticket_details'] = $this->teamleader_model->getTicketDetailsById($id);
		
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

//Note Related Function
	public function view_note(){
		$data['sidebar_menu'] = array();
		$data['note'] = $this->teamleader_model->getNote();
		$data['category'] = 'note';
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}


//Other Related Function
	function search(){
		$data['search'] = $this->input->post('search');
		$this->load->model('teamleader_model');
		$data['project'] = $this->teamleader_model->getSearchProject($data['search']);
		$data['sidebar_menu'] = array('Employee to project');
		$this->load->view('teamleader/header');
		$this->load->view('teamleader/sidebar',$data);
		$data['category']="search_project";
		$this->load->view('teamleader/view',$data);
		$this->load->view('teamleader/footer');
	}

//Profile Related Function	

}
?>