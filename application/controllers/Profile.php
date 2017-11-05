 <?php
 include_once APPPATH."third_party/firebase/firebaseStub.php";
 include_once APPPATH."third_party/firebase/firebaseInterface.php";
 include_once APPPATH."third_party/firebase/firebaseLib.php";
 const DEFAULT_URL = 'https://akg-learn.firebaseio.com/';
 //error_reporting(0);
 class Profile extends CI_Controller{
    public function __construct(){
		parent::__construct();
		$this->load->helper('portfolio');
        $this->load->helper('url');
        $this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index(){
		$this->load->view('portfolio/profile_login');
    }
    public function view(){
		$firebase = new \Firebase\FirebaseLib("https://akg-learn.firebaseio.com/","4XtuVdwSGUrlB5O8BiMri8alEPEKfKkupH2kRg3p");
        $this->form_validation->set_rules('user','Username','required|trim');
        $user=array();
		if($this->form_validation->run()){
			$result=json_decode($firebase->get('users'),true);
			$a = 0;
			if(is_array($result)){
				foreach($result as $k=>$val)
				{
					if(($val['username']==$_POST['user']))
					{
						$a = 1;
                        $user=json_decode($firebase->get('users/'.$k),true);
						break;
					}
				}
			}
            if($a===1){
                $data=array();
                $data['username'] = $user['username'];
                $data['src']= $user['picture'];
                if(array_key_exists('personal_details',$user))
                    $data['pd'] = $user['personal_details'];
                if(array_key_exists('social_details',$user))
                    $data['social'] = $user['social_details'];
                if(array_key_exists('experience',$user))
                    $data['exp'] = array_reverse($user['experience']);
                if(array_key_exists('education_details',$user))
                    $data['edn'] = array_reverse($user['education_details']);
                if(array_key_exists('certification',$user))
                    $data['certification'] = array_reverse($user['certification']);
                if(array_key_exists('skills',$user))
                    $data['skills'] = $user['skills'];
                if(array_key_exists('awards',$user))
                    $data['awards'] = $user['awards'];
                $this->load->view('portfolio/profile_view',$data);
			}
			if($a===0){
				$this->session->set_flashdata('error','Invalid Email ...');
				redirect('profile');
			}
		
		}else{
			$this->load->view('portfolio/profile_login');
		}
	}
}
?>