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
		$data['category'] = 'employee_project';
		$this->load->view('teamleader/view',$data);
		$this->footer();
	}

}
?>