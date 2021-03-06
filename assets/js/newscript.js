/*Activator */

function activate(i){
	if(i){
	  $("#activator").show();
	}
	else{
	  $("#activator").hide();
	}
  }
function validateExperience()
{
	var company = document.getElementById('company_name').value;
	var role = document.getElementById('role').value;
	var location = document.getElementById('location').value;
	var from = document.getElementById('from_date').value;
	var till = document.getElementById('till_date').value;
	var current = document.getElementById('current_date').checked;
	if(till.length==0 && current)
	{
		till=current;
	}
	if(till.length>0){
		if(new Date(till)< new Date(current)){
			$('#invalid_experience_modal').modal({show: 'true' });
			return false;
		}
	}	
	if((company=='') || (role=='') || (location=='') || (from=='') || (till==''))
	{
		$('#invalid_experience_modal').modal({show: 'true' });
		return false;
	}	
}
function validateCertification()
{
	var course = document.getElementById('course_title').value;
	var authority = document.getElementById('organization').value;
	if((course=='') || (authority==''))
	{
		$('#invalid_certification_modal').modal({show: 'true' });
		return false;
	}	
}
function validateEducation()
{
	var college = document.getElementById('college').value;
	var course = document.getElementById('course').value;
	var year = document.getElementById('year').value;
	if((college=='') || (course=='') || (year==''))
	{
		$('#invalid_education_modal').modal({show: 'true' });
		return false;
	}	
}
function validateAward()
{
	var title = document.getElementById('award_title').value;
	var given_by = document.getElementById('award_by').value;
	if((title=='') || (given_by==''))
	{
		$('#invalid_award_modal').modal({show: 'true' });
		return false;
	}	
}
function validateSkill()
{
	var myarray=$('.chosen-choices .search-choice span');
	if(myarray.length==0)
	{
		$('#invalid_skill_modal').modal({show: 'true' });
		return false;
	}	
}
/* function for adding custom skill */
function addSkill()
{
	var myarray=$('.chosen-choices .search-choice span');
	var bool=false;
	document.getElementById('other_skill').required=false;
	for(i=0;i<myarray.length;i++)
	{
		if(myarray[i].innerHTML=="Other")
		{
			$(myarray[i]).next().click(function(){
				document.getElementById('other_skill_block').style.display="none";
				document.getElementById('other_skill').required=false;
			}) ;
			document.getElementById('other_skill_block').style.display="block";
			bool=true;
			document.getElementById('other_skill').required=true;
			break;
		}
	}
	if(!bool)
	{
		document.getElementById('other_skill_block').style.display="none";
	}
}
function bindEvent()
{
	$('.chosen-choices').attr('onchange','addSkill()');
	$('.search-field input').attr('onkeyup','addSkill()');
	$('.chosen-choices').attr('onclick','addSkill()');
	addSkill();
}
/*  base64 encoding  of image */
function encodeImageFileAsURL() 
{
	var filesSelected = document.getElementById("profile_pic").files;
	var myFile = document.getElementById("profile_pic").files[0];
	var filetype=myFile.type;
	activate(1);
	var ValidImageTypes = ["image/gif", "image/jpeg", "image/png", "image/jpg", "image/GIF", "image/JPEG", "image/PNG", "image/JPG"];	
	if((filesSelected.length > 0) && ($.inArray(filetype,ValidImageTypes)>=0)) 
	{
		document.getElementById('pic_camera').removeAttribute("data-toggle");
   		document.getElementById('pic_camera').removeAttribute("data-target");
		var fileToLoad = filesSelected[0];
		var fileReader = new FileReader();
		fileReader.onload = function(e)
			{
				var srcData = e.target.result; // <--- data: base64
				$.post("updatepicture",{picture: srcData},function(response)
				{console.log(response);
					if($.parseJSON(response)!=null){
						document.getElementById('profile_image').src=$.parseJSON(response);
						activate(0);
					}
						
				});
 			}
		fileReader.readAsDataURL(fileToLoad);
	}
	if($.inArray(filetype,ValidImageTypes)<0)
	{
		$('#invalid_img_modal').modal({
        show: 'true' });
	}
}    
$(document).ready(function(){
   	$('[data-toggle="tooltip"]').tooltip(); 
});
 	
/*function for setting experience date */ 
function setExpDate(key)
{
	$("#"+key+"_start_date").datepicker({
		todayBtn:  1,
		autoclose: true,
	}).on('changeDate', function (selected) {
		var minDate = new Date(selected.date.valueOf());
		$("#"+key+"_till_date").datepicker('setStartDate', minDate);
	});
	$("#"+key+"_till_date").datepicker({format: 'mm/dd/yyyy',
		autoclose: true})
	.on('changeDate', function (selected) {
		var maxDate = new Date(selected.date.valueOf());
		$("#"+key+"_start_date").datepicker('setEndDate', maxDate);
	});     
}
function toggleLastDate(key)
{
	if(document.getElementById('current_date').checked)  
	{
 		document.getElementById('till_date').disabled=true;
 		document.getElementById('till_date').value='';
 	}
	else 
	{ 
		document.getElementById('till_date').disabled=false;
	}
}	

/*function for making disable checkbox */ 
 
function toggleCheckbox()
{
	var x=document.getElementById('till_date').value  ;
	if(x.length>0)  
	{
 		document.getElementById('current_date').checked=false;
 		document.getElementById('current_date').setAttribute("disabled","disabled");
 	}
	else 
	{ 
		document.getElementById('current_date').removeAttribute("disabled");
	}
}

/*function for making disable till date */
function toggleTillDate(key)
{
	if(document.getElementById(key + '_current_date').checked)  
	{
 		document.getElementById(key+"_till_date").disabled=true;
 	}
	else 
	{ 
		document.getElementById(key+"_till_date").disabled=false;
	}
}
/*function for making disable checkbox */ 
function disableCheckbox(key)
{
	var x=document.getElementById(key+'_till_date').value  ;
	if(x.length>0)  
	{
	 	document.getElementById(key+'_current_date').checked=false;
 		document.getElementById(key+'_current_date').setAttribute("disabled","disabled");
 	}
	else 
	{ 
		document.getElementById(key+'_current_date').removeAttribute("disabled");
		document.getElementById(key+'_current_date').checked=true;
		document.getElementById(key+"_till_date").disabled=true;
	}
}
function pd_edit()
{
	$("#pd_view").hide();
	$("#pd_edit_icon").hide();
	$("#personal_details_form").fadeIn();
}
	
function pd_view()
{
	$("#personal_details_form").hide();
	$("#pd_edit_icon").show();
	$("#pd_view").fadeIn();
}
	
function exp_edit(key)
{
	document.getElementById(key+'_exp_view').style.display="none";
	$(document.getElementById(key+'_form')).fadeIn();
}
	
function exp_view(key)
{
	document.getElementById(key+'_form').style.display="none";
	$(document.getElementById(key+'_exp_view')).fadeIn();
}
function cer_edit(key)
{
	document.getElementById(key+'_cer_view').style.display="none";
	$(document.getElementById(key+'_form')).fadeIn();
}
	
function cer_view(key)
{
	document.getElementById(key+'_form').style.display="none";
	$(document.getElementById(key+'_cer_view')).fadeIn();
}
function award_edit(key)
{
	document.getElementById(key+'_award_view').style.display="none";
	$(document.getElementById(key+'_form')).fadeIn();
}
	
function award_view(key)
{
	document.getElementById(key+'_form').style.display="none";
	$(document.getElementById(key+'_award_view')).fadeIn();
}
function education_edit(key)
{
	document.getElementById(key+'_education_view').style.display="none";
	$(document.getElementById(key+'_form')).fadeIn();
}
function education_view(key)
{
	document.getElementById(key+'_form').style.display="none";
	$(document.getElementById(key+'_education_view')).fadeIn();
}
function social_edit()
{
	$("#social_view").hide();
	$("#social_edit_icon").hide();
	$("#social_details_form").fadeIn();
}
function social_view()
{
	$("#social_details_form").hide();
	$("#social_edit_icon").show();
	$("#social_view").fadeIn();
}
/*function updating personal details*/
function updatePersonalDetails()
{
	var name=document.getElementById('name').value;
	var gender=document.getElementById('gender').value;
	var dob=document.getElementById('dob').value;
	var email=document.getElementById('email').value;
	var contact=encodeURIComponent(document.getElementById('contact').value);
	var city=document.getElementById('city').value;
	var state=document.getElementById('state').value;
	var country=document.getElementById('country').value;
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) 
	{
    	$('#invalid_email_modal').modal({
    	show: 'true' });
    	return false;
	}
	var phoneno = /^\d{10}$/;  
	if(!contact.match(phoneno))
	{  
 		$('#invalid_contact_modal').modal({
    	show: 'true' });
 		return false;  
	}
	activate(1); 
	$.ajax({
		'type':'POST',
		'url':'updatepersonal',
		'data':{"name":name,"gender":gender,"dob":dob,"email":email,"contact":contact,"city":city,"state":state,"country":country},
		success:function(responseText){
				document.getElementById('pd_name').innerHTML = JSON.parse(responseText).name;
				document.getElementById('pd_gender').innerHTML = JSON.parse(responseText).gender;
				document.getElementById('pd_dob').innerHTML = JSON.parse(responseText).dob;
				document.getElementById('pd_email').innerHTML = JSON.parse(responseText).email;
				document.getElementById('pd_contact').innerHTML = JSON.parse(responseText).contact;
				document.getElementById('pd_city').innerHTML = JSON.parse(responseText).city;
				document.getElementById('pd_state').innerHTML = JSON.parse(responseText).state;
				document.getElementById('pd_country').innerHTML = JSON.parse(responseText).country;
				pd_view();
				activate(0);
		}
	});
}
	
/*function updating social links*/
function updateSocialMedia()
{
	var facebook=encodeURIComponent(document.getElementById('facebook_id').value);
	var twitter=encodeURIComponent(document.getElementById('twitter_id').value);
	var linkedin=encodeURIComponent(document.getElementById('linkedin_id').value);
	activate(1);
	$.ajax({
		'type':'POST',
		'url':'updatesocial',
		'data':{"facebook":facebook,"twitter":twitter,"linkedin":linkedin},
		success:function(responseText){
				document.getElementById('pd_facebook').innerHTML = JSON.parse(responseText).facebook_id;
				document.getElementById('pd_twitter').innerHTML = JSON.parse(responseText).twitter_id;
				document.getElementById('pd_linkedin').innerHTML = JSON.parse(responseText).linkedin_id;
				social_view();
				activate(0);
				}
			});
}

/*function updating  experience*/
function updateExperience(key,company,role,location,start,till_date)
{
	var current=document.getElementById(key+'_current_date').checked;
	var till;
	if(current==true)
		till="present";
	else
		till=till_date;
	if (company.length != 0 && role.length != 0 && location.length != 0 && start.length != 0 && till.length != 0)
	 {
		var current_date=document.getElementById(key+'_current_date').value;
		activate(1);
		$.ajax({
		'type':'POST',
		'url':'updateexperience',
		'data':{"key_experience":key,"company":company,"role":role,"location":location,"start":start,"till":till},
		success:function(responseText){
				document.getElementById(key+'_exp1').innerHTML = JSON.parse(responseText).role;
				document.getElementById(key+'_exp2').innerHTML = JSON.parse(responseText).company;
				document.getElementById(key+'_exp3').innerHTML = JSON.parse(responseText).location;
				document.getElementById(key+'_exp4').innerHTML = JSON.parse(responseText).start_date;
				document.getElementById(key+'_exp5').innerHTML = JSON.parse(responseText).till_date;
				exp_view(key);
				activate(0);
				}
			});
		removeModalFromButton(key);
	 }
   	else
	{
		addModalToButton(key);
	}
 }
 
/* function updating certification  */
function updateCertification(key,title,organization)
{
  	if (title.length != 0 && organization.length != 0 ) 
  	{
		activate(1);
		$.ajax({
		'type':'POST',
		'url':'updatecertification',
		'data':{"key_certification":key,"cer_title":title,"organization":organization},
		success:function(responseText){
				document.getElementById(key+'_cer1').innerHTML = JSON.parse(responseText).course_title;
	        	document.getElementById(key+'_cer2').innerHTML = JSON.parse(responseText).organization;
				cer_view(key);
				activate(0);
				}
			});
   	}
   	else 
  	{
    	addModalToButton(key);
  	}
}
 
 /* function updating education */
function updateEducation(key,college,course,year)
{
	if (course.length != 0 && college.length != 0 && year.length != 0)
	{
		activate(1);
		$.ajax({
		'type':'POST',
		'url':'updateeducation',
		'data':{"key_education":key,"edu_college":college,"edu_course":course,"edu_year":year},
		success:function(responseText){
				document.getElementById(key+'_edu1').innerHTML = JSON.parse(responseText).college;
				document.getElementById(key+'_edu2').innerHTML = JSON.parse(responseText).course;
				document.getElementById(key+'_edu3').innerHTML = JSON.parse(responseText).year;
				education_view(key);
				activate(0);
				}
			});
		removeModalFromButton(key);
	}
   	else {
		addModalToButton(key);
	}
}
 
/* function updating award  */
function updateAward(key,award_title,given_by)
{
	if (award_title.length != 0  && given_by.length!=0) 
	{
		activate(1);
		$.ajax({
		'type':'POST',
		'url':'updateaward',
		'data':{"key_award":key,"award_title":award_title,"given_by":given_by},
		success:function(responseText){
				document.getElementById(key+'_awd1').innerHTML = JSON.parse(responseText).award_title;
				document.getElementById(key+'_awd2').innerHTML = JSON.parse(responseText).given_by;
				award_view(key);
				activate(0);
				}
			});
		removeModalFromButton(key);
	}	
	else 
	{
		addModalToButton(key);
	}
}

/* function adding modal to button*/
function addModalToButton(key)
{
	document.getElementById(key+'_save_btn').setAttribute("data-toggle","modal");
	document.getElementById(key+'_save_btn').setAttribute("data-target","#"+key+"_modal");
} 

/* function removing modal to button*/
function removeModalFromButton(key)
{
	document.getElementById(key+'_save_btn').removeAttribute("data-toggle");
	document.getElementById(key+'_save_btn').removeAttribute("data-target");
} 
/*function deleting experience*/  
function deleteExperience(key)
{	
	activate(1);
 	$.ajax({
 		'type':"POST",
 		'url':'deleteexperience',
 		'data':{'k_exp':key},
 		success:function(){
 			var element = document.getElementById(key+'_exp_block');
			element.parentNode.removeChild(element);
			activate(0);
 		}
 	});
 }
/*function deleting certification*/
function deleteCertification(key)
{	
	activate(1);
 	$.ajax({
 		'type':"POST",
 		'url':'deletecertification',
 		'data':{'k_cer':key},
 		success:function(){
 			var element = document.getElementById(key+'_cer_block');
			element.parentNode.removeChild(element);
			activate(0);
 		}
 	});
}	
 
/*function deleting education*/ 
function deleteEducation(key)
{	
	activate(1);
	$.ajax({
 		'type':"POST",
 		'url':'deleteeducation',
 		'data':{'k_edu':key},
 		success:function(){
 			var element = document.getElementById(key+'_education_block');
			element.parentNode.removeChild(element);
			activate(0);
 		}
 	});
}
 
/*function deleting skill*/			
function deleteSkill(key)
{	
	activate(1);
	$.ajax({
 		'type':"POST",
 		'url':'deleteskill',
 		'data':{'k_skill':key},
 		success:function(){
 			var element = document.getElementById(key+'_skl');
			element.parentNode.removeChild(element);
			activate(0);
 		}
 	});
}
 
/*function deleting award*/
function deleteAward(key)
{	activate(1);
	$.ajax({
 		'type':"POST",
 		'url':'deleteaward',
 		'data':{'k_award':key},
 		success:function(){
 			var element = document.getElementById(key+'_award_block');
			element.parentNode.removeChild(element);
			activate(0);
 		}
 	});
}

