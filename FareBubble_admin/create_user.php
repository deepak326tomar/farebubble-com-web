<?php

$var = 'India';
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=create_user';
$action="Add";
$user_name	=	'';
$user_role	=	'';
$user_dob	=	'';
$user_address=	'';
$user_gender =  '';
$user_mobile=	'';
$user_email	=   '';
$user_login	=   '';
$user_password=	'';
$user_status=	'';
$form_area = 'style="display:none;"';





//print_r($_POST);exit;
/*********        INSERT DATA  START    ****** **/

if(isset($_POST['button_add']) && ($_POST['button_add']!=''))
{
if((isset($_REQUEST['name']) && $_REQUEST['name']!=''))
	{
		$tot_role = totalrows("tbl_users","WHERE  user_mobile ='".$_POST['mobile']."' and user_deletestatus='False'");
		if($tot_role > 0)
		{
			$button='button_add';
			$stat = '3';
			$user_name	=	$_POST['name'];
			$user_role	=	$_POST['user_role'];
			$user_dob	=	$_POST['gender'];
			$user_address=	$_POST['dob'];
			$user_gender =  $_POST['email'];
			$user_mobile=	$_POST['mobile'];
			$user_email	=   '';
			$user_login	=   '';
			$user_password=	'';
			$user_status=	'';
		}
		else
		{
			$add_date=date("Y-m-d H:i:s");
			$data=array(
						'user_name' =>  $_POST['name'],
						'user_role' => $_POST['user_role'],
						'user_gender' => $_POST['gender'],
						'user_dob' => $_POST['dob'],
						'user_email' => $_POST['email'],
						'user_mobile' => $_POST['mobile'],
						'user_address' => $_POST['address'],
						'user_login' => $_POST['user_name'],
						'user_password' => $_POST['password'],
						'user_status' => $_POST['user_status'],
						'user_addby' => $_SESSION['user_id'],
						'user_adddate' => $add_date,
						'user_deletestatus'=>'False'
						);

			insert('tbl_users',$data);
			$user_id = mysql_insert_id();
			save_action_history("1",$user_id);
			$caption = 'Save';
			$stat = '1';
		}
	}
	
	
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
	$user_id=$_REQUEST['user_id'];
	$update_date=date("Y-m-d H:i:s");
	$data=array(
			
						'user_name' =>  $_POST['name'],
						'user_role' => $_POST['user_role'],
						'user_gender' => $_POST['gender'],
						'user_dob' => $_POST['dob'],
						'user_email' => $_POST['email'],
						'user_mobile' => $_POST['mobile'],
						'user_address' => $_POST['address'],
						'user_login' => $_POST['user_name'],
						'user_password' => $_POST['password'],
						'user_status' => $_POST['user_status'],
						'user_updatedate'=>$update_date,
						'user_updateby'=>$_SESSION['user_id']
						);
	update("tbl_users",$data,"where user_id = '$user_id'");
$stat = '2';
	save_action_history("2",$user_id);
	
}
/*********        UPDATE DATA  END    ****** **/

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];

/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD START     ****** **/
	if($action=='edit')
	{
		$Title = 'Edit';
		$user_id = $_REQUEST['user_id'];
		$button = 'button_edit';
		$button_title = 'Update';
		$form_area = '';
		$manu = selectfetch("*","tbl_users","where user_id = '$user_id'");
	
		$user_id		=	$manu->user_id;
		$user_name		=	$manu->user_name;
		$user_role	=	$manu->user_role;
		$user_dob	=	$manu->user_dob;
		$user_address	=	$manu->user_address;
		$user_gender	=	$manu->user_gender;
		$user_mobile	=	$manu->user_mobile;
		$user_email	=	$manu->user_email;
		$user_login	=	$manu->user_login;
		$user_password	=	$manu->user_password;
		$user_status	=	$manu->user_status;
	}
	
/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD END      ****** **/

/*********        DELETE SINGLE START     ****** **/
	if($action=='del')
	{
	    
		$user_id = $_REQUEST['user_id'];
		$delete_date=date("Y-m-d H:i:s");
		
		$tot_dist = 0;//totalrows("tbl_district","where district_state_id=$state_id");
		if($tot_dist <=0 )
		{
			$data_delete = array(	'user_deletedate' =>$delete_date,
									'user_deleteby' => $_SESSION['user_id'],
									'user_deletestatus' => 'True');
			update("tbl_users",$data_delete,"where user_id=".$user_id);
			
			save_action_history("3",$user_id);
			$stat='4';
		}
		else
		{
			$stat='5';
		}
		
		
		
		if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=create_user&stat='.$stat.'";</script>';
			}
	}
	
/*********        DELETE SINGLE END               ****** **/

/*********        UPDATE SINGLE STATUS START      ****** **/
	if( $action=='status')
	{
		$update_date=date("Y-m-d H:i:s");
		$user_id = $_REQUEST['user_id'];
		$val = $_REQUEST['val'];
		$new_val = '';
		
		if($val == 'Enabled')
		{
			$new_val = 'Disabled';
				$data = array('user_status'=>$new_val,
							  'user_updatedate'=>$update_date,
							  'user_updateby'=>$_SESSION['user_id']);
				update("tbl_users",$data,"WHERE user_id ='".$user_id."'");
				save_action_history("2",$user_id);
				$stat=$new_val." Succesfully";
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('user_status'=>$new_val,
							  'user_updatedate'=>$update_date,
							  'user_updateby'=>$_SESSION['user_id']);
			    update("tbl_users",$data,"WHERE user_id ='".$user_id."'");
				save_action_history("2",$user_id);
				$stat=$new_val." Succesfully";
		}
	}
/*********        UPDATE SINGLE STATUS END      ****** **/
/*********         MULTIPLE DELETE START                ****** **/
	if($action=='delall' && isset($_REQUEST['ch1']))
	{
		$del1 = 0;
		foreach($_REQUEST['ch1'] as $key => $value)
		{
				delete("tbl_role", "where role_id = '".$value."'");
		}
	}
/*********         MULTIPLE DELETE END                ****** **/
/*********       MULTIPLE ENABLED AND DISABLED STATUS START      ****** **/
	if($action=='active' && isset($_REQUEST['ch1']))
	{
	$update_date=date("Y-m-d H:i:s");
		foreach($_REQUEST['ch1'] as $key => $value)
		{
			$data = array('role_status'=>'Enabled',
					      'role_update_date'=>$update_date,
						  'role_update_by'=>$_SESSION['user_id']);
			update("tbl_role",$data,"where role_id = '$value'");
		}
		$stat="Enabled Succesfully";
	}
	elseif($action=='inactive' &&  isset($_REQUEST['ch1']))
	{
	$update_date=date("Y-m-d H:i:s");
		foreach($_REQUEST['ch1'] as $key => $value)
		{
				$data = array('role_status'=>'Disabled',
					      'role_update_date'=>$update_date,
						  'role_update_by'=>$_SESSION['user_id']);
			update("tbl_role",$data,"where role_id = '$value'");
		}
	}
/*********       MULTIPLE ENABLED AND DISABLED STATUS END       ****** **/
}
$con_sear ='';

$srch = 'page=user_type';
if(isset($_REQUEST['searchbut']) && $_REQUEST['searchbut']!='')
{
	$srch .= "&searchbut=Search";
	if(isset($_REQUEST['state_name']) && $_REQUEST['state_name']!='')
	{
		$srch .="&state_name=".$_REQUEST['state_name'];
		$con_sear .=" AND state_name LIKE '%".$_REQUEST['state_name']."%'";
	}
	if(isset($_REQUEST['state_code']) && $_REQUEST['state_code'])
	{
		$srch .="&state_code=".$_REQUEST['state_code'];
		$con_sear .=" AND state_code=".$_REQUEST['state_code'];
	}
}
if(isset($_REQUEST['sel_no']) && $_REQUEST['sel_no']!='')
{
	$_SESSION['row_parpage'] = $_REQUEST['sel_no'];
	$rows_per_page = $_SESSION['row_parpage'];
	$srch .="&sel_no=".$_REQUEST['sel_no'];
}
else
{
	$rows_per_page = 10;
}
$tot_users = totalrows("tbl_users","where user_id!='' and user_deletestatus='False' ".$con_sear." " );

	$sqll = mysql_query("select * From tbl_users where user_id!='' and user_deletestatus='False' ".$con_sear." order by user_id desc");	
	//$pager = new PS_Pagination( $con,$sql, $rows_per_page, 3, $srch );
	//$pager->setDebug(true);
	//$settings = $pager->paginate();

	if($stat==1)
	{
		$msg_lte = "Add Successfully !!";
		$type = "success";
		$font_style = 'fa-check';
	}
	if($stat==2)
	{
		$msg_lte = "Update Successfully !!";
		$type = "success";
		$font_style = 'fa-check';
	}
	if($stat==3)
	{
		$msg_lte = "Record Already Exist !!";
		$type = "warning";
		$font_style = 'fa-warning';
	}
	if($stat==4)
	{
		$msg_lte = "Deleted Successfully !!";
		$type = "success";
		$font_style = 'fa-check';
	}
	if($stat==5)
	{
		$msg_lte = "Some Data Are Connected With This So Delete Them First !!";
		$type = "success";
		$font_style = 'fa-check';
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
				<div class="row-fluid" id="abc" <?php echo $form_area; ?>>
                              
                              <div class="portlet-body form">
                                 <!-- BEGIN FORM-->
                                 <form action="#" method="post" class="form-horizontal">
                                    <h3 class="form-section">Person Info</h3>
                                    <div class="row-fluid">
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">Name<span class="required">*</span></label>
                                             <div class="controls">
                                                <input type="text" name="name" value="<?php echo $user_name; ?>" class="m-wrap span12" placeholder="Chee Kin">
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
									   
									   <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">User Role<span class="required">*</span></label>
                                             <div class="controls">
                                                <select name="user_role" class="m-wrap span12">
												<option value="">Select Role</option>
												 <?php 
									 $role_sql="select * from tbl_role where role_id!='' AND role_status='Enabled' and role_delete_status='False'";
									 $role_qry=mysql_query($role_sql);
									 while($role_row=mysql_fetch_array($role_qry))
									 {
								?>
								 <option value="<?php echo $role_row['role_id'];?>" <?php echo selected($user_role,$role_row['role_id']);?>><?php echo $role_row['role_name'];?></option>
								 <?php
									 }
								 ?>
								 </select>
                                             </div>
                                          </div>
                                       </div>
                                      
                                       <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row-fluid">
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">Gender</label>
                                             <div class="controls">
                                                <select name="gender" class="m-wrap span12">
                                                   <option value="Male" <?php echo selected($user_gender,"Male");?>>Male</option>
                                                   <option value="Female" <?php echo selected($user_gender,"Female");?>>Female</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label" >Date of Birth</label>
                                             <div class="controls">
                                                <input type="text" name="dob" value="<?php echo $user_dob; ?>" class="m-wrap span12" placeholder="dd/mm/yyyy">
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                    </div>
                                    <!--/row-->        
                                    <div class="row-fluid">
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">Email</label>
                                             <div class="controls">
                                                <input type="email" name="email" value="<?php echo $user_email; ?>" class="m-wrap span12" placeholder="Chee Kin">
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                      <div class="span6 ">
                                          <div class="control-group error">
                                             <label class="control-label">Mobile<span class="required">*</span></label>
                                             <div class="controls">
                                                <input type="text" name="mobile" value="<?php echo $user_mobile; ?>" class="m-wrap span12" placeholder="Lim">
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                    </div>
									 <div class="row-fluid">
                                       <div class="span12 ">
                                          <div class="control-group">
                                             <label class="control-label">Address</label>
                                             <div class="controls">
                                                <textarea name="address" class="m-wrap span12"><?php echo $user_address; ?></textarea>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!--/row-->                               
                                    <h3 class="form-section">Login Details</h3>
                                    
                                    <div class="row-fluid">
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">User Name<span class="required">*</span></label>
                                             <div class="controls">
                                                <input type="text" name="user_name" value="<?php echo $user_login; ?>" class="m-wrap span12"> 
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label" >Password<span class="required">*</span></label>
                                             <div class="controls">
                                                <input type="password" name="password" value="<?php echo $user_password; ?>" class="m-wrap span12"> 
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                    </div>
                                    <!--/row-->           
                                    <div class="row-fluid">
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">Confirm Password<span class="required">*</span></label>
                                             <div class="controls">
                                                <input type="password" name="cnf_password" value="<?php echo $user_password; ?>" class="m-wrap span12"> 
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                       <div class="span6 ">
                                          <div class="control-group">
                                             <label class="control-label">Status<span class="required">*</span></label>
                                             <div class="controls">
                                                <select name="user_status" class="m-wrap span12">
												<option value="Enabled" <?php echo selected($user_status,"Enabled");?>>Enabled</option>
								                <option value="Disabled" <?php echo selected($user_status,"Disabled");?>>Disabled</option>
												</select>
                                             </div>
                                          </div>
                                       </div>
                                       <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="form-actions">
                                       <button type="submit" name="<?php echo $button; ?>" value="<?php echo $button_title; ?>" class="btn blue"><i class="icon-ok"></i> <?php echo $button_title; ?></button>
                                       
                                    </div>
                                 </form>
                                 <!-- END FORM-->                
                              </div>
					
				</div>
				</form>
				<br>

				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Managed Table</h4>
								<div class="tools">
									<!---<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>--->
								</div>
							</div>
							<div class="portlet-body">
                              <?php if(!empty($msg_lte)){ echo msg_lte($msg_lte,$type,$font_style);} ?> 
								<div class="clearfix">
									<div class="btn-group">
										<button id="sample_editable_1_new" class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
									</div>
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">Export to Excel</a></li>
										</ul>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											<th>Name</th>
											<th>Role</th>
											<th class="hidden-480">Gender</th>
											<th class="hidden-480">Mobile No</th>
											<th class="hidden-480">Email</th>
											<th class="hidden-480">User Login</th>
											<th class="hidden-480">Password</th>
                                            <th class="hidden-480">Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row  = mysql_fetch_array($sqll))
									{
										$role_id = $row['user_role'];
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="1" /></td>
											<td><?php echo $row['user_name']; ?></td>
											<td class="hidden-480"><?php echo $name = getvalue("role_name","tbl_role","where role_id='$role_id'"); ?></td>
											<td class="hidden-480"><?php echo $row['user_gender']; ?></td>
											<td class="hidden-480"><?php echo $row['user_mobile']; ?></td>
											<td class="hidden-480"><?php echo $row['user_email']; ?></td>
											<td class="hidden-480"><?php echo $row['user_login']; ?></td>
											<td class="center hidden-480"><?php echo $row['user_password']; ?></td>
                                            <td>
                                            <a href="<?php echo  $self;?>&user_id=<?php echo $row['user_id']; ?>&val=<?php echo $row['user_status']; ?>&action=status"><img title="<?php echo  $row['user_status'];?>" src="assets/img/<?php  echo  $row['user_status'];?>.jpg" width="16" height="16" border="0" /></a> 
                                            </td>
											<td >
												<a href="index.php?page=create_user&action=edit&user_id=<?php echo $row['user_id']; ?>"><img src="assets/img/pencil.jpg"/></a>
												&nbsp; 
												<a href="index.php?page=create_user&action=del&user_id=<?php echo $row['user_id']; ?>"><img src="assets/img/cross.jpg"/></a>
											</td>
										</tr>
										<?php
									}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END EXAMPLE TABLE PORTLET-->
					</div>
				</div>
					
			</div>
			<!-- END PAGE CONTAINER-->	
		<!-- END PAGE -->	 	
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
		
	
<script>
$('#sample_editable_1_new').click(function(){
	$("#abc").toggle(500);
	
});
</script>	
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