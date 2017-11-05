<!DOCTYPE HTML>
<html>
  <head>
    	<title>Portfolio</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      <link rel="stylesheet" href="<?=base_url('assets/css/newstyle.css');?>"/>
        <script type="text/javascript" src="<?=base_url().'assets/js/newscript.js'?>"></script>
      <script type="text/javascript">
        $(document).ready(function(){
          $('.chosen').chosen();
          $('#dob').datepicker({format: 'mm/dd/yyyy',
            autoclose: true});  
          $("#from_date").datepicker({
              todayBtn:  1,
              autoclose: true,
          }).on('changeDate', function (selected) {
              var minDate = new Date(selected.date.valueOf());
              $('#till_date').datepicker('setStartDate', minDate);
          });
          $("#till_date").datepicker({format: 'mm/dd/yyyy',
              autoclose: true})
          .on('changeDate', function (selected) {
              var maxDate = new Date(selected.date.valueOf());
              $('#from_date').datepicker('setEndDate', maxDate);
          });  
        });
      </script>
      <style>      
        .chosen-container {
            width: 100% !important;
          }
        input[type='file'] 
        {
           display: none;
        }
        .datepicker table{
          border-width:0;
        }
        @keyframes sk-threeBounceDelay{
          0%,100%,80%{
            transform:scale(0);
          }
          40%{
            transform:scale(1);
          }
        }
        .sk-spinner-three-bounce.sk-spinner {
          margin: 0 auto;
          width: 70px;
          text-align: center;
        }
        .sk-spinner-three-bounce .sk-bounce1 {
          -webkit-animation-delay: -.4s;
          animation-delay: -.4s;
        }
        .sk-spinner-three-bounce .sk-bounce2 {
          -webkit-animation-delay: -.3s;
          animation-delay: -.3s;
        }
        .sk-spinner-three-bounce .sk-bounce3 {
          -webkit-animation-delay: -.2s;
          animation-delay: -.2s;
        }
        .sk-spinner-three-bounce .sk-bounce4 {
          -webkit-animation-delay: -.1s;
          animation-delay: -.1s;
        }
        .sk-spinner-three-bounce div {
          width: 10px;
          height: 70px;
          border-radius: 10px;
          display: inline-block;
          -webkit-animation: sk-threeBounceDelay 1.4s infinite ease-in-out;
          animation: sk-threeBounceDelay 1.4s infinite ease-in-out;
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
          opacity: .5;
        }
        .sk-bounce1{
          background : blue;
        }
        .sk-bounce2{
          background : red;
        }
        .sk-bounce3{
          background : yellow;
        }
        .sk-bounce4{
          background : green;
        }
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
   <div id="activator" style="display:none;position:fixed;top:46%;left:47%;z-index:60000;">
    <div class="sk-spinner sk-spinner-three-bounce">
      <div class="sk-bounce1 "></div>
      <div class="sk-bounce2 "></div>
      <div class="sk-bounce3 "></div>
      <div class="sk-bounce4 "></div>
    </div>
   </div>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Portfolio</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><?=anchor('user/logout','Logout')?></li>
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
  				<div class="col-md-4 col-md-offset-1 col-sm-6 col-xs-6 xs_center pt-lg" style="margin-top:60px">
  					<div id="default_mail"><?php if(isset($username)) echo $username?></div>
  					<form id="change_pic_form" name="change_pic_form">
  						<div>
  							<label for="profile_pic" class="text-info pic_lbl" id="pic_camera">
       							 <i class="glyphicon glyphicon-camera"></i>
       							 <span>Change Profile Picture</span>
    						</label>
  							<input type="file" id="profile_pic" class="pic" name="profile_pic" onchange="encodeImageFileAsURL()"/>
  						</div>
  						<div class="modal fade" id="invalid_img_modal" role="dialog">
    						<div class="modal-dialog">
    		    				<!-- Modal content-->
      							<div class="modal-content">
        							<div class="modal-header">
          								<label class="close" data-dismiss="modal">&times;</label>
         				 				<h4 class="modal-title">Personal Information</h4>
        							</div>
        							<div class="modal-body">
          								<p>Invalid image type. Upload only "jpeg", "png", "gif" or "jpg" images.</p>
        							</div>
        							<div class="modal-footer">
          								<button type="button" id="invalid_img_modal_btn" name="invalid_img_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
        							</div>
      							</div>
      						</div>
      		 			</div>
  					</form>
  				</div>
  				<div class="col-md-2 col-sm-2"></div>
  			</div>
  			<div class="row">
  				<div class="col-md-2 col-xs-0 col-sm-0"></div>
  				<div class="col-md-8 col-sm-12 col-xs-12">
  					<div class="row">
  						<div class="h1 col-md-10 col-sm-10 col-xs-10 pt-md pb-md">Personal Information</div>
  						<div class="col-md-2 col-sm-2 col-xs-2 h1 pt-md text-right"><i id="pd_edit_icon" onclick="pd_edit()" class="fa fa-edit pr-lg pt-sm" data-toggle="tooltip" title="Edit personal information"></i></div>
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
            <form class="details_form mt-sm pb-lg pl-lg pr-lg pt-md personal_details_form" name="personal_details_form" id="personal_details_form">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php if(isset($pd['name'])) echo $pd['name']?>"/>
              </div>
              <div class="form-group">
                  <label for="gender">Gender:</label>
                  <select name="gender" id="gender" class="form-control" >
                    <option value="">Select Gender</option>
                <option value="male" <?php if (isset($pd['gender']) && $pd['gender']=="male"){?>selected<?php }?>>Male</option>
                <option value="female" <?php if(isset($pd['gender']) &&$pd['gender']=="female"){?>selected<?php }?>>Female</option>
              </select>    
                </div>
              <div class="form-group">
                <label for="dob">DOB</label>
                <input type="text" data-date-end-date="0d" id="dob" name="dob" class="form-control" placeholder="mm/dd/yyyy" value="<?php if(isset($pd['dob'])) echo $pd['dob']?>">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php if(isset($pd['email'])) echo $pd['email']?>">
              </div>
              <div class="modal fade" id="invalid_email_modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <label class="close" data-dismiss="modal">&times;</label>
                        <h4 class="modal-title">Personal Information</h4>
                      </div>
                      <div class="modal-body">
                          <p>Invalid email address!</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="invalid_email_modal_btn" name="invalid_email_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>  
              <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact" value="<?php if(isset($pd['contact'])) echo $pd['contact']?>">
              </div>
              <div class="modal fade" id="invalid_contact_modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <label class="close" data-dismiss="modal">&times;</label>
                        <h4 class="modal-title">Personal Information</h4>
                      </div>
                      <div class="modal-body">
                          <p>Invalid contact number! Enter 10 digit number.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="invalid_contact_modal_btn" name="invalid_contact_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>  
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control" placeholder="City" value="<?php if(isset($pd['city'])) echo $pd['city']?>">
              </div>  
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" id="state" name="state" class="form-control" placeholder="State" value="<?php if(isset($pd['state'])) echo $pd['state']?>">
              </div>  
              <div class="form-group">
                <label for="country">Country</label>
                <select name="country" id="country" class="form-control">
                    <option value="">Select Country</option>
                <?php 
                  foreach($country_list  as $country_name){?>
                  <option value="<?=$country_name?>" <?php if (isset($pd['country']) && $pd['country']==$country_name){?>selected<?php }?>><i class="af flag"></i><?=$country_name?></option>
                <?php }?>
              </select>  
              </div>
              <div class="btn_container">
                <button type="button" name="personal_details_save" id="personal_details_save" class="btn btn-info mr-sm" onclick="updatePersonalDetails()">Save</button>
                <button type="button" name="personal_details_cancel" id="personal_details_cancel" class="btn btn-default" onclick="pd_view()">Cancel</button>
              </div>
              <div class="clearfix"></div>      
            </form>
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
                  <div class="col-md-2 col-sm-3 col-xs-4 text-right">
                    <i class="fa fa-edit" data-toggle="tooltip" title="Click here to edit" id="<?=$k?>_edit_icon" onclick="exp_edit('<?=$k?>')"></i>
                    <i class="fa fa-trash-o" data-toggle="tooltip" title="Click here to delete" id="<?=$k?>_delete_icon" onclick="deleteExperience('<?=$k?>')"></i>
                  </div>
                </div>
                <div>
                  <span id="<?=$k?>_exp2"><?=$value['company']?></span>
                </div>
                <div><span id="<?=$k?>_exp3"><?=$value['location']?></span> | (<span id="<?=$k?>_exp4"><?=$value['start_date']?></span> &ndash; <span  id="<?=$k?>_exp5"><?=$value['till_date']?></span>)</div>
              </div>
              <form  id="<?=$k?>_form" name="<?=$k?>_form" class="details_form pb-lg pl-lg pr-lg pt-md ">
                <div class="form-group">
                  <label for="<?=$k?>_company">Company Name</label>
                  <input type="text" class="form-control" id="<?=$k?>_company" name="<?=$k?>_company" placeholder="Company Name" value="<?=$value['company']?>" />
                </div>
                <div class="form-group">
                  <label for="<?=$k?>_role">Title</label>
                  <input type="text" class="form-control" id="<?=$k?>_role" name="<?=$k?>_role" placeholder="Title" value="<?=$value['role']?>"/>
                </div>
                <div class="form-group">
                  <label for="<?=$k?>_location">Job Location</label>
                  <input type="text" class="form-control" id="<?=$k?>_location" name="<?=$k?>_location" placeholder="Job Location" value="<?=$value['location']?>" />
                </div>
                <div class="form-group">
                  <label for="<?=$k?>_start_date">From Date</label>
                  <input type="text" class="form-control" id="<?=$k?>_start_date" name="<?=$k?>_start_date" placeholder="mm/dd/yyyy" value="<?=$value['start_date']?>" onmouseover="setExpDate('<?=$k?>')"/>
                </div>
                <div class="form-group">
                  <label for="<?=$k?>_till_date">Till Date</label>
                  <input type="text" class="form-control" id="<?=$k?>_till_date" name="<?=$k?>_till_date" placeholder="mm/dd/yyyy" <?php if($value['till_date']=="present"){?>disabled<?php }if($value['till_date']!="present"){?>value="<?=$value['till_date']?>" <?php }?>  onchange="disableCheckbox('<?=$k?>')" onmouseover="setExpDate('<?=$k?>')"/>
                </div>
                <label>
                  <input type="checkbox" name="<?=$k?>_current_date" id="<?=$k?>_current_date" <?php if($value['till_date']!="present"){?>disabled<?php }if($value['till_date']=="present"){?>checked<?php }?> value="present" onchange="toggleTillDate('<?=$k?>')"/>
                  Currently working
                </label>
                <div class="btn_container">
                    <button type="button" id="<?=$k?>_save_btn" name="<?=$k?>_save_btn" class="btn btn-info mr-sm"
                        onclick="updateExperience('<?=$k?>', 
                                  document.getElementById('<?=$k?>_company').value,
                                  document.getElementById('<?=$k?>_role').value, 
                                  document.getElementById('<?=$k?>_location').value, 
                                  document.getElementById('<?=$k?>_start_date').value, 
                                  document.getElementById('<?=$k?>_till_date').value
                                  )">Save
                  </button>
                  <button type="button" id="<?=$k?>_cancel_btn" name="<?=$k?>_cancel_btn" class="btn btn-default ml-sm" onclick="exp_view('<?=$k?>')">Cancel</button>
                  </div>
                  <div class="clearfix"></div>  
                  <div class="modal fade" id="<?=$k?>_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                              <label class="close" data-dismiss="modal">&times;</label>
                            <h4 class="modal-title">Experience</h4>
                          </div>
                          <div class="modal-body">
                              <p>All fields are mandatory.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="<?=$k?>_modal_btn" name="<?=$k?>_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>  
              </form>
            </div>
          <?php }}?>
          <div>
            <a class="btn btn-info btn-block" href="#experience_details" data-toggle="collapse">Add more experience</a>
          </div>
          <div id="experience_details" class="collapse">
            <form class="mt-sm pb-lg pl-lg pr-lg pt-md details_form" name="experience_details_form" id="experience_details_form" method="post" onsubmit="return validateExperience()">
              <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" name="company_name" placeholder="Company Name" class="form-control" required="required"/>
              </div>
              <div class="form-group">
                <label for="role">Title</label>
                <input type="text" id="role" name="role" class="form-control" placeholder="Title" required="required"/>
              </div>
              <div class="form-group">
                <label for="location">Job Location</label>
                <input type="text" id="location" name="location" class="form-control" placeholder="Job Location" required="required"/>
              </div>
              <div class="form-group">
                <label for="from_date">From Date</label>
                <input type='text' name="from_date" id='from_date' class="form-control"  placeholder="mm/dd/yyyy" required="required"/>
              </div>
              <div class="form-group">
                <label for="till_date">Till Date</label>
                <input type='text' name="till_date" id='till_date' class="form-control" onchange="toggleCheckbox()"  placeholder="mm/dd/yyyy" required="required"/>  
              </div>
              <label for="current_date">
                <input type="checkbox" name="current_date" id="current_date" value="present" title="Check if currently working" onchange="toggleLastDate()"/>
                Currently working
              </label>
              <div class="btn_container">
                <button type="submit" class="btn btn-info mr-sm" id="experience_save" name="experience_save">Add</button> 
                <button type="button" id="experience_cancel" name="experience_cancel" class="btn btn-default ml-sm" href="#experience_details" data-toggle="collapse">Cancel</button>
              </div>
              <div class="clearfix"></div>
              <div class="modal fade" id="invalid_experience_modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <label class="close" data-dismiss="modal">&times;</label>
                        <h4 class="modal-title">Experience</h4>
                      </div>
                      <div class="modal-body">
                          <p>All fields are mandatory.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="invalid_experience_modal_btn" name="invalid_experience_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>  
            </form>
          </div>
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
                  <div class="col-md-2 col-sm-3 col-xs-4 text-right">
                    <i class="fa fa-edit" data-toggle="tooltip" title="Click here to edit" id="<?=$keys?>_edit_icon" onclick="cer_edit('<?=$keys?>')"></i>
                    <i class="fa fa-trash-o" data-toggle="tooltip" title="Click here to delete" id="<?=$keys?>_delete_icon"  onclick="deleteCertification('<?=$keys?>')"></i>
                  </div>
                </div>
                <div><span id="<?=$keys?>_cer2"><?=$value['organization']?></span></div>
  
              </div>
              <form  id="<?=$keys?>_form" name="<?=$keys?>_form" class="details_form pb-lg pl-lg pr-lg pt-md ">
                <div class="form-group">
                  <label for="<?=$keys.$value['course_title']?>">Certification Course</label>
                  <input type="text" class="form-control" id="<?=$keys.$value['course_title']?>" name="<?=$keys.$value['course_title']?>" value="<?=$value['course_title']?>">
                </div>
                <div class="form-group">
                  <label for="<?=$keys.$value['organization']?>">Certification Authority</label>
                  <input type="text" class="form-control" id="<?=$keys.$value['organization']?>" name="<?=$keys.$value['organization']?>" value="<?=$value['organization']?>">
                </div>
                <div class="btn_container">
                    <button type="button" id="<?=$keys?>_save_btn" name="<?=$keys?>_save_btn" class="btn btn-info mr-sm"
                        onclick="updateCertification('<?=$keys?>', document.getElementById('<?=$keys.$value['course_title']?>').value, 
                                  document.getElementById('<?=$keys.$value['organization']?>').value)">Save
                    </button>
                    <button type="button" id="<?=$keys?>_cancel_btn" name="<?=$keys?>_cancel_btn" class="btn btn-default ml-sm" onclick="cer_view('<?=$keys?>')">Cancel</button>
                  </div>
                  <div class="clearfix"></div>  
                  <div class="modal fade" id="<?=$keys?>_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                              <label class="close" data-dismiss="modal">&times;</label>
                            <h4 class="modal-title">Certification</h4>
                          </div>
                          <div class="modal-body">
                              <p>All fields are mandatory.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="<?=$keys?>_modal_btn" name="<?=$keys?>_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>    
              </form>
            </div>
          <?php }}?>
          <div>
            <a class="btn btn-info btn-block" href="#certification_details" data-toggle="collapse">Add more certification</a>
          </div>
          <div id="certification_details" class="collapse">
            <form class="mt-sm pb-lg pl-lg pr-lg pt-md  details_form" name="certification_details_form" id="certification_details_form" method="post" onsubmit="return validateCertification()">
              <div class="form-group">
                <label for="course_title">Certification Course</label>
                <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Certification Course" required="required"/>
              </div>
              <div class="form-group">
                <label for="organization">Certification Authority</label>
                <input type="text" class="form-control" id="organization" name="organization" placeholder="Certification Authority" required="required"/>
              </div>
              <div class="btn_container">
                <button type="submit" class="btn btn-info mr-sm" id="certification_save" name="certification_save">Add</button>
                <button class="btn btn-default ml-sm" id="certification_cancel" name="certification_cancel" href="#certification_details" data-toggle="collapse">Cancel</button>
              </div>
              <div class="clearfix"></div>
              <div class="modal fade" id="invalid_certification_modal" role="dialog">
                  <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                            <label class="close" data-dismiss="modal">&times;</label>
                          <h4 class="modal-title">Certification</h4>
                        </div>
                        <div class="modal-body">
                            <p>All fields are mandatory.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="invalid_certification_modal_btn" name="invalid_certifications_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>    
            </form>
          </div>
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
                  <div class="col-md-2 col-sm-3 col-xs-4 text-right">
                    <i class="fa fa-edit" data-toggle="tooltip" title="Click here to edit" id="<?=$x?>_edit_icon" onclick="education_edit('<?=$x?>')"></i>
                    <i class="fa fa-trash-o" data-toggle="tooltip" title="Click here to delete" id="<{$x}>_delete_icon" onclick="deleteEducation('<?=$x?>')"></i>
                  </div>
                </div>
                <div><span id="<?=$x?>_edu1"><?=$value['college']?></span> | <span id="<?=$x?>_edu3"><?=$value['year']?></span></div>
              </div>
              <form  id="<?=$x?>_form" name="<?=$x?>_form" class="details_form pb-lg pl-lg pr-lg pt-md ">
                <div class="form-group">
                  <label for="<?=$x.$value['college']?>">College/University</label>
                  <input type="text" class="form-control" id="<?=$x.$value['college']?>" name="<?=$x.$value['college']?>" placeholder="College/University" value="<?=$value['college']?>" />
                </div>
                <div class="form-group">
                  <label for="<?=$x.$value['course']?>">Course</label>
                  <input type="text" class="form-control" id="<?=$x.$value['course']?>" name="<?=$x.$value['course']?>" placeholder="Course" value="<?=$value['course']?>" />
                </div>
                <div class="form-group">
                  <label for="<?=$x.$value['year']?>">Completion Year</label>
                  <input type="number" min="1900" max="2999" class="form-control" id="<?=$x.$value['year']?>" name="<?=$x.$value['year']?>" placeholder="Completion Year" value="<?=$value['year']?>" />
                </div>
                <div class="btn_container">
                  <button type="button" id="<?=$x?>_save_btn" name="<?=$x?>_save_btn" class="btn btn-info mr-sm"  onclick="updateEducation('<?=$x?>', document.getElementById('<?=$x.$value['college']?>').value, document.getElementById('<?=$x.$value['course']?>').value, document.getElementById('<?=$x.$value['year']?>').value)">Save</button>
                  <button type="button" id="<?=$x?>_cancel_btn" name="<?=$x?>_cancel_btn" class="btn btn-default ml-sm" onclick="education_view('<?=$x?>')">Cancel</button>
                </div>
                <div class="clearfix"></div>  
                <div class="modal fade" id="<{$x}>_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                              <label class="close" data-dismiss="modal">&times;</label>
                            <h4 class="modal-title">Education</h4>
                          </div>
                          <div class="modal-body">
                              <p>All fields are mandatory.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="<?=$x?>_modal_btn" name="<?=$x?>_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>
              </form>
            </div>
            <?php }}?>
            <div><a class="btn btn-info btn-block" href="#education_details" data-toggle="collapse">Add more education</a></div>
          <div id="education_details" class="collapse">
            <form class="mt-sm pb-lg pl-lg pr-lg pt-md  details_form" name="education_details_form" id="award_details_form" method="post" onsubmit="return validateEducation()">
              <div class="form-group">
                <label for="college">College/University</label>
                <input type="text" class="form-control" id="college" name="college" placeholder="College/University" required="required"/>
              </div>
              <div class="form-group">
                <label for="course">Course</label>
                <input type="text" class="form-control" id="course" name="course" placeholder="Course" required="required"/>
              </div>
              <div class="form-group">
                <label for="year">Completion Year</label>
                <input type="number" min="1900" max="2999" class="form-control" id="year" name="year" placeholder="Completion Year" required="required"/>
              </div>
              <div class="btn_container">
                <button type="submit" class="btn btn-info mr-sm" id="education_save" name="education_save">Add</button>
                <button type="button" class="btn btn-default ml-sm" id="education_cancel" name="education_cancel" href="#education_details" data-toggle="collapse">Cancel</button>
              </div>
              <div class="clearfix"></div>
              <div class="modal fade" id="invalid_education_modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <label class="close" data-dismiss="modal">&times;</label>
                        <h4 class="modal-title">Education</h4>
                      </div>
                      <div class="modal-body">
                          <p>All fields are mandatory.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="invalid_education_modal_btn" name="invalid_education_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>  
            </form>
          </div>
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
                <span class="close" title="Delete" data-toggle="tooltip" onclick="deleteSkill('<?=$ke?>')">&times;</span><?=$skl?>
              </div>
            <?php }}?>
            <div>
              <a class="btn btn-info btn-block mt-sm" href="#skill_details" data-toggle="collapse">Add more skills & endorsements</a>
            </div>
          <div id="skill_details" class="collapse">
            <form class="mt-sm pb-lg pl-lg pr-lg pt-md  details_form" name="skill_details_form" id="skill_details_form" method="post" onsubmit="return validateSkill()">
              <div class="form-group" onclick="bindEvent()">
                <label for="skill_title">Select Skills</label>
                <select  id="skill_title" name="skill_title[]" class="chosen form-control" multiple="true" data-sel="<?=$skill_list?>" >
                      <?php foreach($skill_list as $skill_value){?>
                        <option value="<?=$skill_value?>"><?=$skill_value?></option>
                      <?php }?>
                    </select>
                  </div>  
                  <div class="other_skill" id="other_skill_block">
                    <label for="other_skill">Other Skill</label>
                    <input type="text" name="other_skill" id="other_skill" />
                  </div>
              <div class="btn_container">
                <button type="submit" class="btn btn-info mr-sm" id="skills_save" name="skills_save" >Add</button>
                <button type="button" class="btn btn-default ml-sm" id="skills_cancel" name="skills_cancel" href="#skill_details" data-toggle="collapse">Cancel</button>    
              </div>
              <div class="clearfix"></div>
              <div class="small text-info">Note: Select 'Other' option to add skill if your skill is not in dropdown list.</div>  
              <div class="modal fade" id="invalid_skill_modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <label class="close" data-dismiss="modal">&times;</label>
                        <h4 class="modal-title">Skills & Endorsements</h4>
                      </div>
                      <div class="modal-body">
                          <p>Please select some options.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="invalid_skill_modal_btn" name="invalid_education_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>  
            </form>
          </div>
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
                  <div class="col-md-2 col-sm-3 col-xs-4 text-right">
                    <i class="fa fa-edit" data-toggle="tooltip" title="Click here to edit" id="<?=$keyz?>_edit_icon" onclick="award_edit('<?=$keyz?>')"></i>
                    <i class="fa fa-trash-o" data-toggle="tooltip" title="Click here to delete" id="<?=$keyz?>_delete_icon" onclick="deleteAward('<?=$keyz?>')"></i>
                  </div>
                </div>
                <div><span id="<?=$keyz?>_awd2"><?=$value['given_by']?></span></div>
              </div>
              <form id="<?=$keyz?>_form" name="<?=$keyz?>_form" class="details_form pb-lg pl-lg pr-lg pt-md ">
                <div class="form-group">
                  <label for="<?=$keyz.$value['award_title']?>">Title</label>
                  <input type="text" class="form-control" id="<?=$keyz.$value['award_title']?>" name="<?=$keyz.$value['award_title']?>" placeholder="Title" value="<?=$value['award_title']?>" />
                </div>
                <div class="form-group">
                  <label for="<?=$keyz.$value['given_by']?>">Issuer</label>
                  <input type="text" class="form-control" id="<?=$keyz.$value['given_by']?>" placeholder="Issuer" name="<?$keyz.$value['given_by']?>" value="<?=$value['given_by']?>" />
                </div>
                <div class="btn_container">
                  <button type="button" id="<?=$keyz?>_save_btn" name="<?=$keyz?>_save_btn" class="btn btn-info mr-sm"  onclick="updateAward('<?=$keyz?>', document.getElementById('<?=$keyz.$value['award_title']?>').value, document.getElementById('<?=$keyz.$value['given_by']?>').value)">Save</button>
                  <button type="button" id="<?=$keyz?>_cancel_btn" name="<?=$keyz?>_cancel_btn" class="btn btn-default ml-sm" onclick="award_view('<?=$keyz?>')">Cancel</button>
                </div>
                <div class="clearfix"></div>  
                <div class="modal fade" id="<?=$keyz?>_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                              <label class="close" data-dismiss="modal">&times;</label>
                            <h4 class="modal-title">Awards & Honours</h4>
                          </div>
                          <div class="modal-body">
                              <p>All fields are mandatory.</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" id="<?=$keyz?>_modal_btn" name="<?=$keyz?>_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>  
              </form>
            </div>
            <?php }}?>
            <div><a class="btn btn-info btn-block" href="#award_details" data-toggle="collapse">Add more awards & honours</a></div>
          <div id="award_details" class="collapse">
            <form class="mt-sm pb-lg pl-lg pr-lg pt-md details_form" name="award_details_form" id="award_details_form" method="post" onsubmit="return validateAward()">
              <div class="form-group">
                <label for="award_title">Title</label>
                <input type="text" class="form-control" id="award_title" name="award_title" placeholder="Title" required="required"/>
              </div>
              <div class="form-group">
                <label for="award_by">Issuer</label>
                <input type="text" class="form-control" id="award_by" name="award_by" placeholder="Issuer" required="required"/>
              </div>
              <div class="btn_container">
                <button type="submit" class="btn btn-info mr-sm" id="awards_save" name="awards_save">Add</button>
                <button type="button" class="btn btn-default ml-sm" id="awards_cancel" name="awards_cancel" href="#award_details" data-toggle="collapse">Cancel</button>
              </div>
              <div class="clearfix"></div>
              <div class="modal fade" id="invalid_award_modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                          <label class="close" data-dismiss="modal">&times;</label>
                        <h4 class="modal-title">Awards & Honours</h4>
                      </div>
                      <div class="modal-body">
                          <p>All fields are mandatory.</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="invalid_award_modal_btn" name="<{$keyz}>_modal_btn" class="btn btn-info" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>  
            </form>
          </div>
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
        <div class="row">
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
          <div class="col-md-8 col-xs-12 col-sm-12 social-information">
            <div class="row">
              <div class="h1 col-md-10 col-sm-10 col-xs-10">Social Links</div>
              <div class="col-md-2 col-sm-2 col-xs-2 h1 text-right">
                <i id="social_edit_icon" class="fa fa-edit pr-lg" data-toggle="tooltip" onclick="social_edit()" title="Edit social media links"></i>
              </div>
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
            <form class="details_form mt-sm pb-lg pl-lg pr-lg pt-md social_details_form" name="social_details_form" id="social_details_form">
              <div class="form-group">
                <label for="facebook_id">Facebook Id</label>
                <input type="text" id="facebook_id" name="facebook_id" class="form-control" placeholder="Facebook Id" value="<?php if(isset($social['facebook_id'])) echo $social['facebook_id']?>"/>
              </div>  
              <div class="form-group">
                <label for="twitter_id">Twitter Id</label>
                <input type="text"  id="twitter_id" name="twitter_id" class="form-control" placeholder="Twitter Id" value="<?php if(isset($social['twitter_id'])) echo $social['twitter_id']?>"/>
              </div>  
              <div class="form-group">
                <label for="linkedin_id">Linkedin Id</label>
                <input type="text" id="linkedin_id" name="linkedin_id" class="form-control" placeholder="Linkedin Id" value="<?php if(isset($social['linkedin_id'])) echo $social['linkedin_id']?>"/>
              </div>  
              <div class="btn_container">
                <button name="social_details_save" id="social_details_save" type="button" class="btn btn-info mr-sm" onclick="updateSocialMedia()">Save</button>
                <button name="social_details_cancel" id="social_details_cancel" type="button" class="btn btn-default ml-sm" onclick="social_view()">Cancel</button>
              </div>
              <div class="clearfix"></div>    
            </form>
          </div>
          <div class="col-md-2 col-xs-0 col-sm-0"></div>
        </div>
  			</div>
  		</div>
  	</body>
</html> 	