<?php
	function setSkillList(&$theme,$firebase)
	{	
		$skill_list = json_decode($firebase->get('/skill_list'),true);
		if($skill_list!=null)
    		sort($skill_list);
		$theme['skill_list'] = $skill_list;
	}		 
    /*   function setting country names */  
	function setCountryList(&$theme,$firebase)
	{	
		$country_list = json_decode($firebase->get('/country_list'),true);
		$theme['country_list'] = $country_list;
	}
    
   /* function setting personal details */    
	function updatePersonalDetails($firebase,$name,$gender,$dob,$email,$contact,$city,$state,$country)
	{
  		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
  		$key = array('name','gender','dob','email','contact','city','state','country');
  		$values = array($name,$gender,$dob,$email,$contact,$city,$state,$country);
  		$final = array_combine($key,$values);
  		$firebase->set(DEFAULT_PATH.'personal_details',$final);
  		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
  		return $firebase->get(DEFAULT_PATH.'personal_details');	
	}
    	
    /* function setting social details */    
	function updateSocialDetails($firebase,$facebook,$twitter,$linkedin)
	{
  		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
  		$firebase->set(DEFAULT_PATH.'social_details/facebook_id',$facebook);
  		$firebase->set(DEFAULT_PATH.'social_details/twitter_id',$twitter);
  		$firebase->set(DEFAULT_PATH.'social_details/linkedin_id',$linkedin);
  		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
  		return $firebase->get(DEFAULT_PATH.'social_details');	
	}
   
    /* function setting experience details */ 
	function addExperience($data,$firebase)
	{   
   		$key = array("company","role","start_date","till_date","location"); 
   		if(isset($data['current_date']))
   		{
   			$data['till_date'] = $data['current_date'];
   		}
   		$values = array($data['company_name'], $data['role'], $data['from_date'], $data['till_date'], $data['location']);    
   		$final = array_combine($key,$values);
   		if(!empty($data['company_name']) && !empty($data['role']) && !empty($data['from_date']) && !empty($data['till_date']) && !empty($data['location']))
   			$firebase->push(DEFAULT_PATH.'experience/',$final);
   		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y")); 
	}
    
    /* function setting certification details */ 
	function addCertification($data,$firebase)
	{       
		$key = array("course_title","organization","percent","rating");
   		$values = array($data['course_title'],$data['organization'], $data['percent'], $data['grade']);
		$final = array_combine($key,$values);
		if(!empty($data['course_title']) && !empty($data['organization']) && !empty($data['percent']) && !empty($data['grade']))
			$firebase->push(DEFAULT_PATH.'certification/',$final);
		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
	}

    /* function adding education details */ 
	function addEducation($data,$firebase)
	{
 		$key = array("college","course","year");
   		$values = array($data['college'],$data['course'], $data['year']);
		$final = array_combine($key,$values);
		if(!empty($data['college']) && !empty($data['course']) && !empty($data['year']))
			$firebase->push(DEFAULT_PATH.'education_details/',$final);
		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
	}
	
	 /* function adding skills */ 
	function addSkills($data,$firebase)
	{
  		$title = $data['skill_title'];
  		$skills=$firebase->get(DEFAULT_PATH.'skills/');
  		$arr_skill=json_decode($skills,true);
  		if($arr_skill==null)
  			$arr_skill=array();
  		foreach($title as $skill_value)
		{
  			if(!in_array($skill_value,$arr_skill))
  			{
  				if(strcmp($skill_value,"Other")==0)
  				{
  					if(!empty($data['other_skill']))
  						$firebase->push(DEFAULT_PATH.'skills/',$data['other_skill']);
  				}
  				else
  				{
  					$firebase->push(DEFAULT_PATH.'skills/',$skill_value);
  				}
  			}
  		}
  		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
	}

    /* function adding new award */
	function addAward($data,$firebase)
	{
		$key = array("award_title","given_by");
		$values = array($data['award_title'],$data['award_by']);
		$final = array_combine($key,$values);
		if(!empty($data['award_title']) && !empty($data['award_by']))
			$firebase->push(DEFAULT_PATH.'awards/',$final);
		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
	}
   
    /* function showing  details */
    function showDetails(&$theme,$firebase)
	{
		$personal = json_decode($firebase->get(DEFAULT_PATH.'personal_details'),true);
		$theme['pd']=$personal;
		$social_link = json_decode($firebase->get(DEFAULT_PATH.'social_details'),true);
		$theme['social']=$social_link; 
		$exp = $firebase->get(DEFAULT_PATH.'experience');
  		$arr_exp = json_decode($exp,true);
  		if($arr_exp!=null) 
		{ 
   			$theme['exp']=array_reverse($arr_exp);
		}
		$cer = $firebase->get(DEFAULT_PATH.'certification');
  		$arr_cer = json_decode($cer,true);
  		if($arr_cer!=null) 
		{ 	
   			$theme['certification']=array_reverse($arr_cer);
		}
		$education = $firebase->get(DEFAULT_PATH.'education_details');
  		$arr_edu = json_decode($education,true);
  		if($arr_edu!=null) 
		{
			$theme['edn']=array_reverse($arr_edu);
		}
		$skill = $firebase->get(DEFAULT_PATH.'skills');
  		$arr_skill = json_decode($skill,true);
  		if($arr_skill!=null) 
  		{ 
     		$theme['skills']=array_unique($arr_skill);
  		} 
  		$award = $firebase->get(DEFAULT_PATH.'awards');
  		$arr_award = json_decode($award,true);
  		if($arr_award!=null) 
		{ 
  			$theme['awards']=array_reverse($arr_award);
		}
	}
     
    /* function updating experience */  
	function updateExperience($firebase,$key_exp,$company,$role,$location,$start_date,$till_date)
	{
		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
		$arr = array('company'=>$company,'role'=>$role,'location'=>$location,'start_date'=>$start_date,'till_date'=>$till_date);
		$firebase->set(DEFAULT_PATH.'experience/'.$key_exp,$arr);
		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
		return $firebase->get(DEFAULT_PATH.'experience/'.$key_exp);
	}         
   
  	 /* function updating certification */
	function updateCertification($firebase,$key_cer,$title,$organization,$rating,$percent)
	{
		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
		$arr = array('course_title'=>$title,'organization'=>$organization,'rating'=>$rating,'percent'=>$percent);
		$firebase->set(DEFAULT_PATH.'certification/'.$key_cer,$arr);
		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
		return $firebase->get(DEFAULT_PATH.'certification/'.$key_cer);
	}
	
	/* function updating education*/
	function updateEducation($firebase,$key_edu,$college,$course,$year)
	{
 		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
 		$arr = array('college'=>$college,'course'=>$course,'year'=>$year);
 		$firebase->set(DEFAULT_PATH.'education_details/'.$key_edu,$arr);
 		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
 		return $firebase->get(DEFAULT_PATH.'education_details/'.$key_edu);
	}
	
	/* function updating award */
	function updateAward($firebase,$key_award,$award_title,$given_by)
	{
 		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
 		$firebase->set(DEFAULT_PATH.'awards/'.$key_award.'/award_title',$award_title);
 		$firebase->set(DEFAULT_PATH.'awards/'.$key_award.'/given_by',$given_by);
 		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
 		return $firebase->get(DEFAULT_PATH.'awards/'.$key_award);
	}
			
	/* function updating profile picture */
	function updatePicture($picture,$firebase)
	{
 		$CI=&get_instance();
  		define('DEFAULT_PATH','users/'.$CI->session->userdata('user').'/');
 		$firebase->set(DEFAULT_PATH.'picture',$picture);
 		$firebase->set(DEFAULT_PATH.'last_updated',date("m/d/Y"));
 		return $firebase->get(DEFAULT_PATH.'picture');
	}
?>