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

		function header(){
			$data['sidebar_menu'] = array();
			$this->load->view('teamleader/header');
			$this->load->view('teamleader/sidebar',$data);
		}

		function footer(){
			$this->load->view('teamleader/footer');
		}
		//Project related function
		function project_list(){
			$data['search'] = NULL;
			$data['sidebar_menu'] = array("Masdfdasfenu 1","Menu 2");
			$this->load->model('teamleader_model');
			$data['project'] = $this->teamleader_model->getAllProject();
			$this->header();
			$data['category']="project_list";
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		public function project_search(){
			$data['type']="project";
			$this->header();
			$this->load->view('teamleader/search',$data);
			$this->footer();
		}

		//search related function
		function search(){
			$data['search'] = $this->input->post('search');
			$this->load->model('teamleader_model');
			$data['project'] = $this->teamleader_model->getSearchProject($data['search']);
			$this->header();
			$data['category']="search_project";
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		//employee related function
		public function employee_list(){
			$this->load->model('teamleader_model');
			$data['employee'] = $this->teamleader_model->getAllEmployee();
			$this->header();
			$data['category']="employee_list";
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		public function employee_search(){
			$data['type']="employee";
			$this->header();
			$this->load->view('teamleader/search',$data);
			$this->footer();
		}

		public function search_employee(){
			$data['search'] = $this->input->post('search');
			//$this->load->model('company_model');
			$data['employee'] = $this->teamleader_model->getSearchEmployee($data['search']);
			$this->header();
			$data['category']="search_employee";
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		//Task related function
		public function view_task(){
			$this->header();
			$data['task'] = $this->teamleader_model->getAllTask();
			$data['category'] = 'task';
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		public function assign_employee(){
			$this->header();
			$data['project_employee'] = $this->teamleader_model->getEmployeeProject();
			$data['category'] = 'assign_employee';
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		public function view_ticket(){
			$this->header();
			$data['ticket'] = $this->teamleader_model->getTicket();
			$data['category'] = 'ticket';
			$this->load->view('teamleader/view',$data);
			$this->footer();
		}

		//Note Related function
		public function view_note(){
		$this->header();
		$data['note'] = $this->teamleader_model->getNote();
		$data['category'] = 'note';
		$this->load->view('Company/view',$data);
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

		//$this->footer();
		/*
		* To Do: First make session and check old password is correct or not
		* Second: Check new password is matched to retyped new password
		* Third: Call model to update the password
		*/
	}
}
?>