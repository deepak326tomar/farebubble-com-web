<?php	
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=user_type';
$action="Add";
$role_id ='';
$role_name	='';
$role_status ='';
$sqll = '';
$form_area = 'style="display:none;"';



if(isset($_REQUEST['stat']))
{
	$stat = $_REQUEST['stat'];
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
	
	
}


//print_r($_POST);exit;
/*********        INSERT DATA  START    ****** **/
if(isset($_POST['button_add']) && ($_POST['button_add']!=''))
{
	
if((isset($_REQUEST['role_name']) && $_REQUEST['role_name']!=''))
	{
		$tot_role = totalrows("tbl_role","WHERE  role_name ='".$_POST['role_name']."' and role_delete_status='False'");
		if($tot_role > 0)
		{
			$button='button_add';
			$stat = '3';
			
		}
		else
		{
			$add_date=date("Y-m-d H:i:s");
			$data=array(
						'role_name' =>  $_POST['role_name'],
						'role_status' => $_POST['role_status'],
						'role_add_by' => $_SESSION['user_id'],
						'role_add_date' => $add_date,
						'role_delete_status'=>'False'
						);

			insert('tbl_role',$data);
			$role_id = mysql_insert_id();
			save_action_history("1",$role_id);
			$button='add';
			$caption = 'Save';
			$stat = '1';
		}
	}
	
	if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=user_type&stat='.$stat.'";</script>';
			}
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
	$role_id=$_REQUEST['role_id'];
	$update_date=date("Y-m-d H:i:s");
	$data=array(
			
						'role_name' =>  $_POST['role_name'],
						'role_status' => $_POST['role_status'],
						'role_update_date'=>$update_date,
						'role_update_by'=>$_SESSION['user_id']
						);
	update("tbl_role",$data,"where role_id = '$role_id'");
	$stat = '2';
	save_action_history("2",$role_id);
	if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=user_type&stat='.$stat.'";</script>';
			}
	
}
/*********        UPDATE DATA  END    ****** **/

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];

/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD START     ****** **/
	if($action=='edit')
	{
		$Title = 'Edit';
		$role_id = $_REQUEST['role_id'];
		$button = 'button_edit';
		$button_title = 'Update';
		$form_area = '';
		$manu = selectfetch("*","tbl_role","where role_id = '$role_id'");
	
		$role_id		=	$manu->role_id;
		$role_name		=	$manu->role_name;
		$role_status	=	$manu->role_status;
	}
	
/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD END      ****** **/

/*********        DELETE SINGLE START     ****** **/
	if($action=='del')
	{
	    
		$role_id = $_REQUEST['role_id'];
		$delete_date=date("Y-m-d H:i:s");
		
		$tot_dist = totalrows("tbl_role_per","where roleper_roleid=$role_id and roleper_deletestatus='False'");
		if($tot_dist <=0 )
		{
			$data_delete = array(	'role_delete_date' =>$delete_date,
									'role_delete_by' => $_SESSION['user_id'],
									'role_delete_status' => 'True');
			update("tbl_role",$data_delete,"where role_id=".$role_id);
			
			save_action_history("3",$role_id);
			$stat='4';
		}
		else
		{
			$stat='5';
		}
	
	if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=user_type&stat='.$stat.'";</script>';
			}
	
		
	}
	
/*********        DELETE SINGLE END               ****** **/

/*********        UPDATE SINGLE STATUS START      ****** **/
	if( $action=='status')
	{
		$update_date=date("Y-m-d H:i:s");
		$role_id = $_REQUEST['role_id'];
		$val = $_REQUEST['val'];
		$new_val = '';
		
		if($val == 'Enabled')
		{
			$new_val = 'Disabled';
				$data = array('role_status'=>$new_val,
							  'role_update_date'=>$update_date,
							  'role_update_by'=>$_SESSION['user_id']);
				update("tbl_role",$data,"WHERE role_id ='".$role_id."'");
				save_action_history("2",$role_id);
				$stat=$new_val." Succesfully";
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('role_status'=>$new_val,
							  'role_update_date'=>$update_date,
							  'role_update_by'=>$_SESSION['user_id']);
			    update("tbl_role",$data,"WHERE role_id ='".$role_id."'");
				save_action_history("2",$role_id);
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
$tot_role = totalrows("tbl_role","where role_id!='' and role_delete_status='False' ".$con_sear." " );
if($tot_role>0)
{
	$sqll = mysql_query("select * From tbl_role where role_id!='' and role_delete_status='False' ".$con_sear." order by role_id desc");	
	//$pager = new PS_Pagination( $con,$sql, $rows_per_page, 3, $srch );
	//$pager->setDebug(true);
	//$settings = $pager->paginate();
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
					<div class="span6">
						<div class="control-group">
                            <label class="control-label">Role Name</label>
                            <div class="controls">
                                <input type="text" name="role_name" placeholder="Enter Role Name" value="<?php echo $role_name; ?>" class="m-wrap large" />
                                <span class="help-inline">Operator</span>
                            </div>
                        </div>
						
						<div class="control-group">
						   <label class="control-label">Role Status</label>
						   <div class="controls">
							  <select class="large m-wrap" name="role_status" tabindex="1">
								 <option value="Enabled" <?php echo selected($role_status,"Enabled");?>>Enabled</option>
								 <option value="Disabled" <?php echo selected($role_status,"Disabled");?>>Disabled</option>
							  </select>
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
											<th>Role Name</th>
											<th class="hidden-480">Role Status</th>
											<th class="hidden-480">Role Add Date</th>
											<th class="hidden-480">Role Add By</th>
                                            <th class="hidden-480">Role Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row  = mysql_fetch_array($sqll))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="1" /></td>
											<td><?php echo $row['role_name']; ?></td>
											<td class="hidden-480"><?php echo $row['role_status']; ?></td>
											<td class="hidden-480"><?php echo $row['role_add_date']; ?></td>
											<td class="center hidden-480">
											<?php 
											if($row['role_add_by']=='0'){ echo 'Admin'; }else{ echo getvalue("user_name","tbl_users","where user_id='".$row['role_add_by']."'"); } 
											?>
											</td>
                                            <td class="hidden-480">
											
											<a href="<?php echo  $self;?>&role_id=<?php echo $row['role_id']; ?>&val=<?php echo $row['role_status']; ?>&action=status"><img title="<?php echo  $row['role_status'];?>" src="assets/img/<?php  echo  $row['role_status'];?>.jpg" width="16" height="16" border="0" /></a>
											
											
                                            </td>
											<td >
												<a href="index.php?page=user_type&action=edit&role_id=<?php echo $row['role_id']; ?>"><img src="assets/img/pencil.jpg"/></a>
												&nbsp; 
												<a href="index.php?page=user_type&action=del&role_id=<?php echo $row['role_id']; ?>"><img src="assets/img/cross.jpg"/></a>
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