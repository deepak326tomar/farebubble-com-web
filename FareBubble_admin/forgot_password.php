<?php
include 'includes/apptop.php';
require_once('PHPMailer-master/class.phpmailer.php');

if( (isset($_POST['submit'])) && $_POST['submit']!='')
{
    $admin_email=trim($_POST['email']);
	$row=mysqli_fetch_array(mysqli_query($conn,"select * from tbl_settings where email='".$admin_email."'"));
	if($row['email']==$admin_email && $admin_email!='' && $row['email']!='')
	{
	$username=$row['username'];
	$pass_real=$row['pass_real'];
	
	$email = new PHPMailer();
	$from="info@fareskart.us";
$email->From      = 'info@fareskart.us';
$email->FromName  = 'Fareskart.us';
$email->IsHTML(true);
$email->Subject   ='Fareskart Admin Username and Password'; 
$b='';
 $body_mail = '<!DOCTYPE HTML>
<html>
<head>


<!-- Responsive Meta Tag --><meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    <title>Fareskart Forgot Password</title>

    <style type="text/css">
    
    	
	    body{
            width: 100%; 
            background-color: #ffffff; 
            margin:0; 
            padding:0; 
            -webkit-font-smoothing: antialiased;
        }
        
        p,h1,h2,h3,h4{
	        margin-top:0;
			margin-bottom:0;
			padding-top:0;
			padding-bottom:0;
        }
        
        span.preheader{display: none; font-size: 1px;}
        
        html{
            width: 100%; 
        }
        
        table{
            font-size: 14px;
            border: 0;
        }
        
        /* ----------- responsivity ----------- */
        @media only screen and (max-width: 640px){
			/*------ top header ------ */
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            /*--------logo-----------*/
            .logo{width: 128px !important;}
			/*----- main image -------*/
			.main-image{width: 420px !important; height: auto !important;}
			
			/*--------- banner ----------*/
			.banner{width: 420px !important; height: auto !important;}
			/*-------- container --------*/			
			.container580{width: 440px !important;}
			.container560{width: 420px !important;}
           
			/*-------- secions ----------*/
			.section-item{width: 420px !important;}
            .section-img{width: 420px !important; height: auto !important;}
			
			/*-------- features ----------*/
            .feature-img{width: 420px !important; height: auto !important;}
           
			/*-------- footer ------------*/
			.website{width: 203px !important;}
			.email{width: 203px !important; text-align: right !important;}
			.social{width: 440px !important;}
		}
		
		@media only screen and (max-width: 479px){
			
			/*------ top header ------ */
            .main-header{line-height: 28px !important;}
            .main-subheader{line-height: 28px !important;}
            
            /*--------logo-----------*/
            .logo{width: 260px !important;}
			/*----- main image -------*/
			.main-image{width: 260px !important; height: auto !important;}
			
			/*--------- banner ----------*/
			.banner{width: 260px !important; height: auto !important;}
			/*-------- container --------*/			
			.container580{width: 280px !important;}
			.container560{width: 260px !important;}
           
			/*-------- secions ----------*/
			.section-item{width: 260px !important;}
            .section-img{width: 260px !important; height: auto !important;}
			
			/*-------- features ----------*/
            .feature-img{width: 260px !important; height: auto !important;}
           
			/*-------- footer ------------*/
			.website{width: 280px !important; text-align: center !important;}
			.email{width: 280px !important; text-align: center !important;}
			.social{width: 280px !important;}
			.unsubscribe{line-height: 26px !important;}
			.vertical-divider{display: none !important;}
		}
		
	</style>
</head>

<body >

	
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">
		
		<tr><td height="20"></td></tr>
		
		<tr style="border:1px solid #f00;">
			<td align="center">
				<table style="border:1px solid #f00 !important;">
				<table border="0" align="center" width="580" cellpadding="0" cellspacing="0" bgcolor="#fff" class="container580" >
				
					<tr><td height="20"></td></tr>
					
					<tr>
						<td align="center">
						
							<table border="0" align="center" width="540" cellpadding="0" cellspacing="0" class="container560">
								<tr>
									<td>
										
										<table border="0" align="left" cellpadding="0" cellspacing="0" class="logo">
											<tr>
												<td align="center">
													<table border="0" cellpadding="0" cellspacing="0">
														<tr>
															<td>
																<a href="https://www.fareskart.us" style="display: block; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="logo" width="200" height="100" border="0" style="display: block;" src="https://www.fareskart.us/images/logo.png" alt="logo" /></a>
															</td>			
														</tr>
													</table>		
												</td>
											</tr>
										</table>
										
										<table border="0" align="left" cellpadding="0" cellspacing="0">
				                			<tr>
				                				<td height="20" width="20"></td>
				                			</tr>
				                		</table>
				                		
				                		<table border="0" align="right" cellpadding="0" cellspacing="0" class="logo">
											<tr>
												<td align="center">
													<!--<table border="0" cellpadding="0" cellspacing="0">
							                			<tr><td height="8"></td></tr>
							                			<tr>
							                				<td>
																<a href="" style="display: block; border-style: none !important; border: 0 !important;"><img editable="true" mc:edit="forward" width="137" height="12" border="0" style="display: block;" src="images/forward.png" alt="logo" /></a>
															</td>
							                			</tr>
							                		</table>	-->	
												</td>
											</tr>
				                		</table>
				                				
									</td>
								</tr>
							</table>
							
						</td>
					</tr>
					
					<tr><td height="25"></td></tr>
					
				</table>
			</td>
		</tr>


		

		<tr mc:repeatable>
			<td align="center">
				
				<table border="0" align="center" width="580" cellpadding="0" cellspacing="0" bgcolor="#F00" class="container580">
				
					<!--<tr><td height="10"></td></tr>-->
					
					<tr>
						<td align="center">
				        	<!--<img editable="true" mc:edit="main-image" src="images/main-img.png" style="display: block;" width="560" height="240" border="0" alt="main image" class="main-image" />-->
                            <p style="color:#FFF !important;font-size:18px;font-family:Arial, Helvetica, sans-serif;line-height:20px;padding:5px 0px;">Hi Admin, Your User Name and Password is given below:</p>
				        </td>
					</tr>
					
					<!--<tr><td height="10"></td></tr>-->
					
				</table>
				
			</td>
		</tr>
		
		<tr mc:repeatable><td height="15"></td></tr>
			

		<tr mc:repeatable>
			<td align="center">
				
				<table border="0" align="center" width="580" cellpadding="0" cellspacing="0" bgcolor="#82C325" class="container580">
				
					<tr><td height="10"></td></tr>
					
					<tr>
						<td align="left">
						
							<table border="0" align="center" width="560" cellpadding="0" cellspacing="0" class="container560">
								<tr>
									<td>
										
										<table border="0" align="left" cellpadding="0" cellspacing="0" class="section-item">
											<tr>
												<td align="left">
													<span style="color:#fff !important;font-family:Arial, Helvetica, sans-serif;font-size:15px;margin:5px 5px;line-height:20px;"> Username</span>
												</td>	<td align="left">
													<span style="color:#fff !important;font-family:Arial, Helvetica, sans-serif;font-size:15px;margin:5px 5px;line-height:20px;"> '.$username.' </span>
												</td>		
											</tr>
                                           <tr>
												<td align="left">
													<span style="color:#fff !important;font-family:Arial, Helvetica, sans-serif;font-size:15px;margin:5px 5px;line-height:20px;"> Password</span>
												</td>
												<td align="left">
													<span style="color:#fff !important;font-family:Arial, Helvetica, sans-serif;font-size:15px;margin:5px 5px;line-height:20px;"> '.$pass_real.' </span>
												</td>			
											</tr>
											
										</table>		
										
										
									</td>
								</tr>
							</table>
							
						</td>
					</tr>
					
					<tr><td height="10"></td></tr>
					
				</table>
				
			</td>
		</tr>
		<tr>
			<td align="center">	
				<table border="0" align="center" width="580" cellpadding="0" cellspacing="0" class="container580">
					<tr><td height="20"></td></tr>
					
					
					
					
					
					
		</table>
				</table>
			</td>
		</tr>
		
		<tr><td height="30"></td></tr>
	</table>
</body>
</html>';

//$admin_email1='rksmile88@gmail.com';
$email->Body      = $body_mail;
$email->AddAddress($admin_email);
//$email->AddAddress($admin_email1);


if(!$email->Send())
{
 echo "Mailer Error: " . $email->ErrorInfo;
 echo '<script type="text/javascript">alert("Unknown email error Please tyr again letter!");</script>';
		echo '<script type="text/javascript">window.location="forgot_password.php";</script>';
	exit;
	
}		// $from='Rs Manglam<info@rsmanglam.com>';
	echo '<script type="text/javascript">alert("Password Sent  Successfully On Your Email Id");</script>';	
	echo '<script type="text/javascript">window.location="login.php";</script>';
	
	exit;
	}else
	{
		echo '<script type="text/javascript">alert("Your email id is wrong!");</script>';
		echo '<script type="text/javascript">window.location="forgot_password.php";</script>';
	exit;
	
	}
	
	
	}


 ?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Fareskart us</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/metro.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
  <link href="assets/css/style_responsive.css" rel="stylesheet" />
  <link href="assets/css/style_default.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
  <link rel="shortcut icon" href="favicon.icon">
  <style>
  	body
	{
	  background:url(assets/img/rsmangalam-bg.png) !important;
	}
  </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <!-- BEGIN LOGO -->
  <div class="logo">
   </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="row-fluid">
    <!--<div class="logo_img">
  	<a href="login.php"><img src="assets/img/logo.png"></a>
  </div>-->
  <div class="container">
  
            <div class="span8">
   
  <div class="content">
  
    <!-- BEGIN LOGIN FORM -->
    <form class="form-vertical login-form" enctype="multipart/form-data" method="post">
    
      <h3 class="form-title">Forgot Password</h3>
      <div class="alert alert-error hide">
        <button class="close" data-dismiss="alert"></button>
        <span>Enter Your Email.</span>
      </div>
      <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <div class="controls">
          <div class="input-icon left">
            <i class="icon-envelope"></i>
            <input class="m-wrap placeholder-no-fix" type="email" placeholder="Enter your email" name="email"/>
          </div>
        </div>
      </div>
      
      <div class="form-actions">
        
        <button type="submit" name="submit" value="submit" class="btn green pull-right">
        Submit <i class="m-icon-swapright m-icon-white"></i>
        </button>            
      </div>
      
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    
    <!-- END REGISTRATION FORM -->
    </div>
  </div>
  </div>
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright">
    Design & Developed By Software Xprts Services Delhi
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>  
  <script src="assets/uniform/jquery.uniform.min.js"></script> 
  <script src="assets/js/jquery.blockui.js"></script>
  <script type="text/javascript" src="assets/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="assets/js/app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>