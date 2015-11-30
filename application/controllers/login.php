
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login/index');
	}

	public function register(){
		$this->load->view('login/register');
	}
	public function newCompany(){
		$company = array(
				'name' 		=> $this->input->post('name'),
				'address' 	=> $this->input->post('address'),
				'phone'		=> $this->input->post('phone'),
		);
		
		$this->login_model->newCompany($company);
		echo '<script type="text/javascript">';
			echo 'alert("Your Account has been created. Both username and password is your company name. You can change your password after.")';
		echo '</script>';
		redirect(base_url(),'refresh');	
	}

	public function dashboard(){
		$login = array(
			'username'		=> $this->input->post('username'),
			'password'		=> md5($this->input->post('password')),
		);
		$this->load->model('login_model');
		$data = $this->login_model->getUserDetails($login);
		if($data==NULL){
			$error['error_message'] = "Username doesn't Exist";
			//var_dump($data);
			$this->load->view('login/error',$error);
		}
		else{
			foreach ($data as $row ) {
				$db_password = $row->password;
				$category = $row->category;
			}
			if($login['password']!= $row->password){
					$error['error_message']="Username and Password Doesn't Match";
					$this->load->view('login/error',$error);
			}
			else{
   				switch ($category) {
					case 'company':
						$data['sidebar_menu']=array();
						$this->load->view('company/header');
						$this->load->view('company/sidebar',$data);
						$this->load->model('Company_model');
						$data['employee'] = $this->Company_model->getEmployee();
						$data['teamleader'] = $this->Company_model->getTeamleader();
						$data['project'] = $this->Company_model->getProject();
						$data['total_employee'] =$this->Company_model->getTotalEmployee();
						$data['total_teamleader'] =$this->Company_model->getTotalTeamleader();
						$data['total_project'] =$this->Company_model->getTotalProject();
						$this->load->view('company/dashboard',$data);
						$this->load->view('company/footer');
						break;

					case 'employee':
						$this->load->model('employee_model');
						$data['total_project'] = $this->employee_model->getTotalProject();
						$data['total_task'] = $this->employee_model->getTotalTask();
						$data['total_note'] = $this->employee_model->getTotalNote();
						$data['total_ticket'] = $this->employee_model->getTotalTicket();
						$data['project'] = $this->employee_model->getAllProject();
						$data['task'] = $this->employee_model->getAllTask();
						$data['note'] = $this->employee_model->getAllNote();
						$data['ticket'] = $this->employee_model->getAllTicket();
						$data['sidebar_menu']=array('Project List','View Task','View Ticket','View Note');
						$this->load->view('employee/header');
						$this->load->view('employee/sidebar',$data);
						$this->load->view('employee/dashboard',$data);
						$this->load->view('employee/footer');
						break;

					case 'teamleader':
						$this->load->model('teamleader_model');
						$data['project'] = $this->teamleader_model->getProject();
						$data['note'] = $this->teamleader_model->getNote();
						$data['task'] = $this->teamleader_model->getTask();
						$data['ticket'] = $this->teamleader_model->getTicket();
						$data['sidebar_menu']=array('Menu 1', 'Menu 2');
						$this->load->view('teamleader/header');
						$this->load->view('teamleader/sidebar',$data);
						$this->load->view('teamleader/dashboard',$data);
						$this->load->view('teamleader/footer');
					break;	
					
					default:
						$error['error_message']="Something doesn't work correctly";
						$this->load->view('login/error',$error);
						break;
				}
			}
		}
	}
}
?>