<?php
/**
* 
*/
class Teamleader extends CI_Controller
{
	
	function __construct(argument)
	{
		parent::__construct();
		$session_username = $this->session->session_data['username'].'<br>';
		$session_userid= $this->session->session_data['user_id'].'<br>';
		$session_category = $this->session->session_data['category'].'<br>';
		echo $this->session->session_data['username'];
	}

}
?>