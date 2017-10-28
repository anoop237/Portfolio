<?php
include_once APPPATH."third_party/firebase/firebaseStub.php";
include_once APPPATH."third_party/firebase/firebaseInterface.php";
include_once APPPATH."third_party/firebase/firebaseLib.php";
const DEFAULT_URL = 'https://akg-learn.firebaseio.com/';

class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('portfolio');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index(){
		if($this->session->userdata("user")){
				return redirect("portfolio/dashboard");
			}
		$this->load->view('portfolio/login');
	}
	public function register(){
		$firebase = new \Firebase\FirebaseLib("https://akg-learn.firebaseio.com/","4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		//
		//$r=$firebase->set('country_list',array('india','austrailia'));
		$this->form_validation->set_rules('user','Username','required|trim');
		$this->form_validation->set_rules('pass','Password','required|trim');
		$this->form_validation->set_rules('pass_again','Re-Password','required|trim');
		if($this->form_validation->run() && ($_POST['pass']==$_POST['pass_again'])){
			$result=json_decode($firebase->get('users'),true);
			$a = 0;
			if(is_array($result)){
				foreach($result as $k=>$val)
				{
					if($val['username']==$_POST['user'])
					{
						$a = 1;
						break;
					}
				}
			}
			if($a===0){
				$k=$firebase->push('users/','');
				$k=json_decode($k,true);
				$firebase->set('users/'.$k['name'].'/password',$_POST['pass']);
				$firebase->set('users/'.$k['name'].'/username',$_POST['user']);
				$this->session->set_flashdata('registration_success','Registration sussessful...');
				redirect('user/login');
			}
			if($a===1){
				$this->session->set_flashdata('registration_failed','Registration failed...username already exist');
				redirect('user/login');
			}
		
		}else{
			$this->load->view('portfolio/register');
		}
	}
	public function login(){
		$firebase = new \Firebase\FirebaseLib("https://akg-learn.firebaseio.com/","4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		//
		//$r=$firebase->set('country_list',array('india','austrailia'));
		$this->form_validation->set_rules('user','Username','required|trim');
		$this->form_validation->set_rules('pass','Password','required|trim');
		if($this->form_validation->run()){
			$result=json_decode($firebase->get('users'),true);
			$a = 0;
			if(is_array($result)){
				foreach($result as $k=>$val)
				{
					if(($val['username']==$_POST['user']) && ($val['password']==$_POST['pass']))
					{
						$a = 1;
						$this->session->set_userdata('user',$k);
						break;
					}
				}
			}
			if($a===1){
				
				redirect('portfolio/dashboard');
			}
			if($a===0){
				$this->session->set_flashdata('login_failed','Invalid Username or Password ...');
				redirect('user');
			}
		
		}else{
			$this->load->view('portfolio/login');
		}
	}
	public function logout(){
		$this->session->unset_userdata('user');
		redirect('user/login');
	}
}


?>