<?php
include_once APPPATH."third_party/firebase/firebaseStub.php";
include_once APPPATH."third_party/firebase/firebaseInterface.php";
include_once APPPATH."third_party/firebase/firebaseLib.php";
const DEFAULT_URL = 'https://akg-learn.firebaseio.com/';

class Portfolio extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper('portfolio');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		if(! $this->session->userdata("user")){
			return redirect("user");
		} 
	}
	public function index(){
		redirect('portfolio/dashboard');
	}
	public function dashboard(){
		define('DEFAULT_PATH','users/'.$this->session->userdata('user').'/');
		$data=$_POST;
		$theme=array();
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$result=$firebase->get(DEFAULT_PATH);
		$activated_on=$firebase->get(DEFAULT_PATH.'activated_on');
		if(json_decode($activated_on)==null)
		{
			$firebase->set(DEFAULT_PATH.'activated_on',date("m/d/Y"));
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
		}
		$username = $firebase->get(DEFAULT_PATH.'username');
		$source = $firebase->get(DEFAULT_PATH.'picture');
		$theme['src']=json_decode($source);
		$theme['username']=json_decode($username);
		setSkillList($theme,$firebase);
		setCountryList($theme,$firebase);
		if(isset($data['experience_save']))
		{   
			addExperience($data,$firebase);
			header('location:'.$_SERVER['PHP_SELF']);
			exit();
		}
		if(isset($data['certification_save']))
		{   
			addCertification($data,$firebase);
			header('location:'.$_SERVER['PHP_SELF']);
	    	exit();
		}
		if(isset($data['education_save']))
		{   
			addEducation($data,$firebase);
			header('location:'.$_SERVER['PHP_SELF']);
			exit();
		}
		if(isset($data['skills_save']))
		{   
			addSkills($data,$firebase);
			header('location:'.$_SERVER['PHP_SELF']);
			exit();
		}
		if(isset($data['awards_save']))
		{   
			addAward($data,$firebase);
			header('location:'.$_SERVER['PHP_SELF']);
			exit();
		}
		showDetails($theme,$firebase);
		$this->load->view('portfolio/port',$theme);
	}
	public function updatepersonal(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST; 
		$name = $data['name'];
		$gender = $data['gender'];
		$dob = $data['dob'];
		$email = $data['email'];
		$contact = $data['contact'];
		$city = $data['city'];
		$state = $data['state'];
		$country = $data['country'];
		if(!empty($name))
		{
			$result_personal_details = updatePersonalDetails($firebase,$name,$gender,$dob,$email,$contact,$city,$state,$country);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_personal_details;
			die; 
		} 
	}
	public function updatepicture(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		if(isset($data['picture']))
			$picture = $data['picture'];
		if(strlen($picture)>0)
		{
			$result_pic = updatePicture($picture,$firebase);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_pic; 
		}    
	}
	public function updatesocial(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		$facebook = $data['facebook'];
		$twitter = $data['twitter'];
		$linkedin = $data['linkedin'];
		if((!empty($facebook))||(!empty($linkedin))||(!empty($twitter)))
		{
			$result_social = updateSocialDetails($firebase,$facebook,$twitter,$linkedin);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_social; 
			die;   
		} 
	}
	public function updateexperience(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		$key_exp = $data['key_experience'];
		$company = $data['company'];
		$role = $data['role'];
		$location = $data['location'];
		$start_date = $data['start'];
		$till_date = $data['till'];
		if(!empty($key_exp))
		{
			$result_experience = updateExperience($firebase,$key_exp,$company,$role,$location,$start_date,$till_date);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_experience;
		}
	}
	public function updatecertification(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		$key_cer = $data['key_certification'];
		$title = $data['cer_title'];
		$organization = $data['organization'];
		$rating = $data['rating'];
		$percent = $data['percent'];
		if(!empty($key_cer))
		{
			$result_certification = updateCertification($firebase,$key_cer,$title,$organization,$rating,$percent);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_certification;
		}  
	}
	public function updateeducation(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		$key_edu = $data['key_education'];
		$college = $data['edu_college'];
		$course = $data['edu_course'];
		$year = $data['edu_year'];
		if(!empty($key_edu))
		{
			$result_education = updateEducation($firebase,$key_edu,$college,$course,$year);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_education;
		}
	}
	public function updateaward(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		$key_award = $data['key_award'];
		$award_title = $data['award_title'];
		$given_by = $data['given_by'];
		if(!empty($key_award))
		{
			$result_award = updateAward($firebase,$key_award,$award_title,$given_by);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo $result_award;
		}  
	}
	public function deleteexperience(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		define('DEFAULT_PATH','users/'.$this->session->userdata('user').'/');
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		if(!empty($data["k_exp"]))
		{
			$firebase->delete(DEFAULT_PATH.'experience/'.$data["k_exp"]);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo "success";			
		}
	}
	public function deletecertification(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		define('DEFAULT_PATH','users/'.$this->session->userdata('user').'/');
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		if(!empty($data["k_cer"]))
		{
			 $firebase->delete(DEFAULT_PATH.'certification/'.$data["k_cer"]);
			 $firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			 echo "success";	
		}
	}
	public function deleteeducation(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		define('DEFAULT_PATH','users/'.$this->session->userdata('user').'/');
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		if(!empty($data["k_edu"]))	 
		{
			$firebase->delete(DEFAULT_PATH.'education_details/'.$data["k_edu"]);
			$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo "success";
		}
	}
	public function deleteskill(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		define('DEFAULT_PATH','users/'.$this->session->userdata('user').'/');
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		if(!empty($data["k_skill"]))	 
		{
		 	$firebase->delete(DEFAULT_PATH.'skills/'.$data["k_skill"]);
		 	$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo "success";
		}
	}
	public function deleteaward(){
		if(count($_POST)==0){
			redirect('portfolio/dashboard');
		}
		define('DEFAULT_PATH','users/'.$this->session->userdata('user').'/');
		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL,"4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
		$data=$_POST;
		if(!empty($data["k_award"]))	 
		{
	 		$firebase->delete(DEFAULT_PATH.'awards/'.$data["k_award"]);
	 		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
			echo "success";
		}
	}
}

?>