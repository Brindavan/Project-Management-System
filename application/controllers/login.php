
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');

	}

	public function index()
	{
		//echo 'good';
		$this->load->view('login/index');
	}

	public function dashboard(){
		//echo 'chceking';
		//echo $this->session->userdata('item');
		$login = array(
		'username'		=> $this->input->post('username'),
		'password'		=> md5($this->input->post('password')),
		//'remember'		=> 
		);
		//echo $login['username'].'<br>';
		//echo $login['password'].'<br>';
		
		//echo $login['remember'].'<br>';

		$this->load->model('login_model');
		$data = $this->login_model->getUserDetails($login);
		if($data==NULL){
			$error['error_message'] = "Username doesn't Exist";
			$this->load->view('login/error',$error);
			//echo $error_message;
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
   				//var_dump($this->session->userdata);
   				
				switch ($category) {
					case 'company':
						$data['sidebar_menu']=array('Menu 1', 'Menu 2');
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
						echo 'Employee';
						break;

					case 'teamleader':
						//echo 'Teamleader';
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
			
			//echo $data->username;
		}
			//var_dump($data);
	}
}
?>