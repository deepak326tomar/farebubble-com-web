<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=change_password';
$action="Add";
$plan_id	='';
$plan_name ='';

$plan_valid_from ='';
$plan_valid_to ='';
$plan_ammount ='';

$plan_status ='';
$sqll = '';
$form_area = 'style="display:none;"';
//print_r($_POST);exit;
/*********        INSERT DATA  START    ****** **/

if(isset($_REQUEST['stat']))
{
	$stat = $_REQUEST['stat'];
	if($stat==1)
	{
		$msg_lte = "Password is Change Successfully !!";
		$type = "success";
		$font_style = 'fa-check';
	}
	
	if($stat==3)
	{
		$msg_lte = "Old password is not correct !!";
		$type = "warning";
		$font_style = 'fa-warning';
	}
	
if($stat==4)
	{
		$msg_lte = "old pass and new password is not Match !!";
		$type = "warning";
		$font_style = 'fa-warning';
	}
	
	if($stat==5)
	{
		$msg_lte = "All fields are mandatory!!";
		$type = "warning";
		$font_style = 'fa-warning';
	}
}


$userid=$_SESSION['user_id'];




if(isset($_POST['button_add']) && ($_POST['button_add']!=''))
{

	if($_SESSION['user_id']== 0)
	{
					if((isset($_REQUEST['old_password']) && $_REQUEST['old_password']!='') && (isset($_REQUEST['new_password']) && $_REQUEST['new_password']!='') && (isset($_REQUEST['confirm_password']) && $_REQUEST['confirm_password']!='') )
						{
													if($_REQUEST['new_password']==$_REQUEST['confirm_password'])
													{
	$tot_comp = totalrows($conn,"tbl_settings","WHERE  pass_real ='".$_POST['old_password']."'");
													
																		if($tot_comp > 0)
																		{
																		$data=array('pass_real' =>  $_POST['new_password']);
																		update($conn,"tbl_settings",$data,"where id = 1");	
																		$stat='1';		
																		}
																		else
																		{
																		$stat = '3';
																		}
													}
													else
													{
														$stat='4';
													}
							
							
							} else
							{
														$stat='5';
							}
		
		} else if($_SESSION['user_id']>=1)
		
		//start for user
		
		{
		if((isset($_REQUEST['old_password']) && $_REQUEST['old_password']!='') && (isset($_REQUEST['new_password']) && $_REQUEST['new_password']!='') && (isset($_REQUEST['confirm_password']) && $_REQUEST['confirm_password']!='') )
		{
		
 //$_SESSION['user_id'];

if($_REQUEST['new_password']==$_REQUEST['confirm_password'])
													{
$tot_comp1 =totalrows($conn,"tbl_users","WHERE  user_password ='".$_POST['old_password']."' and user_id=$userid and user_status='Enabled'");
					
													if($tot_comp1>0)
													{
													$data=array('user_password' =>  $_POST['new_password']);
													update($conn,"tbl_users",$data,"where user_id=$userid");	
													$stat='1';		
													}else
													{
													
													$stat='3';
													
													}
													} else
													{
													$stat='4';
													}														

		} else
		{
		$stat='5';
		}

		} 


			if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=change_password&stat='.$stat.'";</script>';
			}


}

?>
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->	
		<!-- BEGIN SIDEBAR -->
		
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
		
        
        
        		<form method="post" name="role_form" action="">
		<?php if(!empty($msg_lte)){ echo msg_lte($msg_lte,$type,$font_style);} ?>                     
        		<div class="row-fluid">
					<div class="span6">
						
                        
      
                        
                        
                        <div class="control-group">
                            <label class="control-label">Old Password</label>
                            <div class="controls">
                                <input type="text" name="old_password" placeholder="Enter Old Password" class="m-wrap large" />
                                <!--<span class="help-inline">eg.5</span>-->
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">New Password</label>
                            <div class="controls">
                                <input type="text" name="new_password" id="new_password" placeholder="Enter New Password" class="m-wrap large" />
                                
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label">Confirm Password</label>
                            <div class="controls">
                                <input type="text" name="confirm_password" id="confirm_password" onKeyUp="check_password();" placeholder="Enter confirm Password" class="m-wrap large" />
                            
                            </div>
                        
                        </div>
                        
                        
						
						
						
							<button class="btn blue" name="<?php echo $button; ?>" type="submit" value="<?php echo $button_title; ?>">
							<i class="icon-ok"></i>
							<?php echo $button_title; ?>
							</button>
							
						
					</div>
					
				</div>
				</form>
				<br>


					
			</div>
			<!-- END PAGE CONTAINER-->	
		<!-- END PAGE -->	 	
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
		<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage("table_managed");
			App.init();
		});
	</script>	
	
	
	
	
</body>
<!-- END BODY -->
</html>