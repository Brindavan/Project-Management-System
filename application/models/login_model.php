<?php

/**
* 
*/
class Login_model extends CI_Model
{
	
	

	function getUserDetails($user){
		/*$this->db->select('employee.emp_id as Id, employee.emp_name as Name,employee.phone_no as Phone,employee.address as Address,project.project_name as Project');
		$this->db->from('employee');
		$this->db->join('project', 'employee.project_id = project.project_id','inner'); 
		$query = $this->db->get(); */
		$query = $this->db->get_where('user',array('username' => $user['username']));
		foreach ($query->result() as $row){
			$session_data = array(
					'user_id'	=> $row->id,
					'username'	=> $row->username,
					'category'	=> $row->category,
					'password'	=> $row->password
				);
		}
		//echo $this->db->last_query();
		$this->session->set_userdata('session_data',$session_data);

		return $query->result();
	}
}
?>