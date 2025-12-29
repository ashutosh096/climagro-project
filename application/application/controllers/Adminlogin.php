<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminlogin extends CI_Controller
{ 
	public function index(){
		$data['title']="Admin Login";
		
		$this->load->model("admin-model/adminmodel");
		$compDtl = $this->adminmodel->companyprofile('1');
		$data['profiledetail'] = $compDtl;

		$this->load->view("adminlogin", $data);
	}

	public function accesslogin(){
		$data['title']="Admin Login";
		$this->load->model("admin-model/adminmodel");
		$compDtl = $this->adminmodel->companyprofile('1');
		$data['profiledetail'] = $compDtl;

		if($this->form_validation->run('adminlogin')==false)
			{
				$this->load->view("adminlogin", $data);

			}
		else
		{
			$usernamae = $this->input->post('email');
			$password  = $this->input->post('password');
			$this->load->model('admin-model/adminmodel');
			$login_id = $this->adminmodel->loginadmin($usernamae, $password);
			if($login_id)
			{
				$this->session->set_userdata("user_id", $login_id);
				echo redirect("administrator/dashboard");
			}
			else{
				$data['loginerror'] = "Username or Password is wrong";				
				$this->load->view("adminlogin", $data);
			}


		}
	}


	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata("user_id"))
		return redirect("administrator/dashboard");
	}


}
?>