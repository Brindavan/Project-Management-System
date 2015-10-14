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
		$data['sidebar_menu']=array('New', 'Update', 'Remove');
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

	public function team_leader_list(){
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

	
}
?>