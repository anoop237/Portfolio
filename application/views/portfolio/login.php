<!DOCTYPE HTML>
<html>
  <head>
    	<title>Portfolio</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="http://www.jigyaasa.net/layout/themes/bootstrap3-2016/foundation/js/jquery-1.10.2.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <script type="text/javascript" src="<?=base_url().'assets/js/newscript.js'?>"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <link rel="stylesheet" href="<?=base_url('assets/css/newstyle.css');?>"/>
      <style>
        .loginmodal-container {
            padding: 30px;
            max-width: 350px;
            width: 100% !important;
            background-color: #F7F7F7;
            margin: 0 auto;
            border-radius: 2px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            font-family: roboto;
            margin-top:100px;
          }
          .login-help {
              font-size: 12px;
            }
            .loginmodal-container input[type=email], input[type=password] {
              height: 44px;
              font-size: 16px;
              width: 100%;
              margin-bottom: 10px;
              -webkit-appearance: none;
              background: #fff;
              border: 1px solid #d9d9d9;
              border-top: 1px solid #c0c0c0;
              /* border-radius: 2px; */
              padding: 0 8px;
              box-sizing: border-box;
            }
            .loginmodal-container input[type=submit] {
              width: 100%;
              display: block;
              margin-bottom: 10px;
              position: relative;
              padding: 17px 0px;
              font-family: roboto;
              font-size: 16px;
              background:#5bc0de;
              color:#fff;
          }
          .alert{
            margin-top:60px;
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
      </style>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Portfolio</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Portfolio</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><?=anchor('user/register','Create Account')?></li>
        </ul>
      </div>
    </nav>
        </ul>
      </div>
    </nav>
      <div class="container">  
      <?php if($error2=$this->session->flashdata("login_failed")):?>
        <div class="alert alert-danger alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $error2;?>
        </div> 
      <?php endif;?>
        <div  id="login-modal" >
        <div>
        <div class="loginmodal-container">
          <h1>Login Form</h1><br>
          <?=form_open('user/login');?>
            <input type="email" name="user" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="login" value="Login">
          <?=form_close();?>  
          <div class="login-help">
          <?php echo anchor('user/register','Create Account')?>
          </div>
        </div>
      </div>
      </div>
      </div>
    </body>
</html>