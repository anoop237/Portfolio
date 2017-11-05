<!DOCTYPE HTML>
<html>
  <head>
      <title>Portfolio</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url('assets/css/newstyle.css');?>"/>
      <style>     
        .navbar-inverse{
          border-radius:0;
          border:0;
          background:#5bc0de;
        }
        .navbar-inverse .navbar-brand {
          color: #fff;
          font-size:28px;
        }
        .navbar-inverse .navbar-nav>li>a{
          color:#fff;
        }
        .mt-sm{
          margin-top:5px;
        } 
        .pb-lg{
          padding-bottom:20px;
        } 
        .pl-lg{
          padding-left:20px;
        } 
        .pr-lg{
          padding-right:20px;
        } 
        .pt{
          padding-top:3px;
        }
        .pt-md{
          padding-top:15px;
        }
        .ml-md{
          margin-left:15px;
        }
      </style>
    </head>
 	<body>
   
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Portfolio</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><?=anchor('profile','Back')?></li>
        </ul>
      </div>
    </nav>
  		<div class="container" style="padding-top:70px">
  			<div class="row">
  				<div class="col-md-2"></div>
  				<div class="col-md-3 col-sm-4 col-xs-6">
  					<div id="profile">	
  						<div class="profile_pic center-block">
              <?php 
                if($src!=null)
                {
                  $source=$src;
                }
                else
                { 
                     $source=base_url().'assets/images/profile_pic.png';
                }
              ?>
              <img id="profile_image" class="img-thumbnail" src= <?=$source?> alt="profile_pic"/>
              </div>
  					</div>
  				</div>
  				<div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-6 xs_center pt-lg" style="margin-top:80px">
  					<div id="default_mail"><?php if(isset($username)) echo $username?></div>
  				</div>
  				<div class="col-md-2 col-sm-2"></div>
  			</div>
  			<div class="row">
  				<div class="col-md-2 col-xs-0 col-sm-0"></div>
  				<div class="col-md-8 col-sm-12 col-xs-12">
  					<div class="row">
  						<div class="h1 col-md-10 col-sm-10 col-xs-10 pt-md pb-md">Personal Information</div>
  					</div>
  					<div class="personal-information" id="pd_view">
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">Name</div>
  								<div id="pd_name" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['name'])) echo $pd['name'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">Gender</div>
  								<div id="pd_gender" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['gender'])) echo $pd['gender'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">DOB</div>
  								<div id="pd_dob" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['dob'])) echo $pd['dob'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">Email</div>
  								<div id="pd_email" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['email'])) echo $pd['email'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">Contact</div>
  								<div id="pd_contact" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['contact'])) echo $pd['contact'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">City</div>
  								<div id="pd_city" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['city'])) echo $pd['city'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">State</div>
  								<div id="pd_state" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['state'])) echo $pd['state'];?></div>
  							</div>
  						</div>
  						<div>
  							<div class="row">
  								<div class="col-md-6 col-sm-4 col-xs-3">Country</div>
  								<div id="pd_country" class="text-info col-md-6 col-sm-8 col-xs-9"><?php if(isset($pd['country'])) echo $pd['country']?></div>
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="col-md-2 col-xs-0 col-sm-0"></div>
  			</div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-sm-12 col-xs-12  experience-information">
            <div class="row">
              <div class="h1 col-md-12 col-sm-12 col-xs-12">Experience</div>
            </div>
            <?php if(isset($exp)){foreach($exp as $k=>$value){?>
            <div class="experience-block" id="<?=$k?>_exp_block">
              <div id="<?=$k?>_exp_view">
                <div class="row">
                  <h2 class="col-md-10 col-sm-9 col-xs-8 type2_heading"><span id="<?=$k?>_exp1"><?=$value['role']?></span></h2>
                </div>
                <div>
                  <span id="<?=$k?>_exp2"><?=$value['company']?></span>
                </div>
                <div><span id="<?=$k?>_exp3"><?=$value['location']?></span> | (<span id="<?=$k?>_exp4"><?=$value['start_date']?></span> &ndash; <span  id="<?=$k?>_exp5"><?=$value['till_date']?></span>)</div>
              </div>
              
            </div>
          <?php }}?>
         
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-xs-12 col-sm-12 certification-information">
            <div class="row">
              <div class="h1 col-md-12 col-sm-12 col-xs-12">Certification</div>
            </div>
            <?php if(isset($certification)){foreach($certification as $keys=>$value){?>
              <div class="certification-block" id="<?=$keys?>_cer_block">
                <div id="<?=$keys?>_cer_view">
                <div class="row">
                  <h2 class="col-md-10 col-sm-9 col-xs-8 type2_heading"><span id="<?=$keys?>_cer1"><?=$value['course_title']?></span></h2>
                </div>
                <div><span id="<?=$keys?>_cer2"><?=$value['organization']?></span></div>
  
              </div>
            </div>
          <?php }}?>
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-sm-12 col-xs-12  education-information">
            <div class="row">
              <div class="h1 col-md-12 col-sm-12 col-xs-12">Education</div>
            </div>
            <?php if(isset($edn)){foreach($edn as $x=>$value){?>
              <div class="education-block" id="<?=$x?>_education_block">
                <div id="<?=$x?>_education_view">
                <div class="row">
                  <h2 class="col-md-10 col-sm-9 col-xs-8 type2_heading"><span id="<?=$x?>_edu2"><?=$value['course']?></span></h2>
                </div>
                <div><span id="<?=$x?>_edu1"><?=$value['college']?></span> | <span id="<?=$x?>_edu3"><?=$value['year']?></span></div>
              </div>
            </div>
            <?php }}?>
            
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-sm-12 col-xs-12 skill-information">
            <div class="row">
              <div class="h1 col-md-12 col-sm-12 col-xs-12">Skills & Endorsements</div>
            </div>
            <?php if(isset($skills)){foreach($skills as $ke =>$skl){?>
              <div class="skill-block" id="<?=$ke?>_skl">
                <?=$skl?>
              </div>
            <?php }}?>
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-xs-12 col-sm-12  award-information">
            <div class="row">
              <div class="h1 col-md-12 col-sm-12 col-xs-12">Awards & Honours</div>
            </div>
            <?php if(isset($awards)){foreach($awards as $keyz=>$value){?>
              <div class="award-block" id="<?=$keyz?>_award_block">
                <div id="<?=$keyz?>_award_view">
                <div class="row">
                  <h2 class="col-md-10 col-sm-9 col-xs-8 type2_heading"><span id="<?=$keyz?>_awd1"><?=$value['award_title']?></span></h2>
                </div>
                <div><span id="<?=$keyz?>_awd2"><?=$value['given_by']?></span></div>
              </div>
              
            </div>
            <?php }}?>
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-xs-12 col-sm-12 social-information">
            <div class="row">
              <div class="h1 col-md-10 col-sm-10 col-xs-10">Social Links</div>
            </div>
            <ul class="list-unstyled personal-information" id="social_view">
              <li>
                <i class="fa fb_icon">&#xf082;</i>
                <span id="pd_facebook" class="ml-md text-info"><?php if(isset($social['facebook_id'])) echo $social['facebook_id']?></span>
              </li>
              <li>
                <i class="fa twitter_icon">&#xf081;</i>
                <span id="pd_twitter" class="ml-md text-info"><?php if(isset( $social['twitter_id'])) echo $social['twitter_id']?></span>
              </li>
              <li>
                <i class="fa fa-linkedin-square"></i>
                <span id="pd_linkedin" class="ml-md text-info"><?php if(isset($social['linkedin_id'])) echo $social['linkedin_id']?></span>
              </li>
            </ul>
            
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
  			</div>
  		</div>
  	</body>
</html> 	