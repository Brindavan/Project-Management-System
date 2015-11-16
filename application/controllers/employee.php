<?php

/**
* 
*/
class Employee extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('employee_model');
	}

	function header(){
		$data['sidebar_menu'] = array('New','Edit');
		$this->load->view('employee/header');
		$this->load->view('employee/sidebar',$data);
	}

	function footer(){
		$this->load->view('employee/footer');
	}
	function project_list(){
		$this->header();
		$data['category'] = 'project_list';
		$data['project'] = $this->employee_model->getAllProject();
		$this->load->view('employee/view',$data);
		$this->footer();
	}
	function project_search(){
		$data['type']="project";
		$this->header();
		$this->load->view('employee/search',$data);
		$this->footer();
	}

	public function search(){
		$data['search'] = $this->input->post('search');
		$this->load->model('company_model');
		$data['project'] = $this->employee_model->getSearchProject($data['search']);
		$this->header();
		$data['category']="search_project";
		$this->load->view('employee/view',$data);
		$this->footer();
	}

	public function view_task(){
		$this->header();
		$data['task'] = $this->employee_model->getAllTask();
		$data['category'] = 'task';
		$this->load->view('employee/view',$data);
		$this->footer();
	}
	
	public function view_ticket(){
		$this->header();
		$data['ticket'] = $this->employee_model->getAllTicket();
		$data['category'] = 'ticket';
		$this->load->view('employee/view',$data);
		$this->footer();
	}
	public function view_note(){
		$this->header();
		$data['note'] = $this->employee_model->getAllNote();
		$data['category'] = 'note';
		$this->load->view('employee/view',$data);
		$this->footer();
	}

	public function change_password(){
		$this->header();
		$this->load->view('employee/change_password');
		$this->footer();
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
		$i=0;
		$data['category'] = 'profile';
		$data['employee'] = $this->employee_model->getEmployeeData();
		$data['project'] = $this->employee_model->getAllProject();
		echo count($data['project']);
		/*
		foreach ($data['project'] as $row) {
			$data['task'][$i++] = $this->employee_model->getTask($row->id);
		}*/
		$this->header();
		//var_dump($task[0]);
		$this->load->view('employee/view',$data);
		$this->footer();

	}

}
?>