<?php 	
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=role_per';
$action="Add";
$roleper_roleid ='';
$roleper_mainmenu	='';
$roleper_submenu = '';
$roleper_status ='';
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
if((isset($_REQUEST['roleper_name']) && $_REQUEST['roleper_name']!=''))
	{
		$tot_role = totalrows("tbl_role_per","WHERE roleper_roleid ='".$_POST['roleper_name']."' and roleper_deletestatus='False'");
		if($tot_role > 0)
		{
			$button='button_add';
			$stat = '3';
		}
		else
		{
			$main_menu = implode(',',$_POST['main_menu']);
            $sub_menu = implode(',',$_POST['sub_menu']);
			$add_date=date("Y-m-d H:i:s");
			$data=array(
						'roleper_roleid' =>  $_POST['roleper_name'],
						'roleper_mainmenu' => $main_menu,
						'roleper_submenu' => $sub_menu,
						'roleper_status' => $_POST['roleper_status'],
						'roleper_adddate' => $add_date,
						'roleper_addby' => $_SESSION['user_id'],
						'roleper_deletestatus'=>'False',
						);

			insert('tbl_role_per',$data);
			$role_id = mysql_insert_id();
			save_action_history("1",$role_id);
			$button='add';
			$caption = 'Save';
			$stat = '1';
		}
	}
	
	if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=role_per&stat='.$stat.'";</script>';
			}
	
	
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
	$roleper_id=$_REQUEST['roleper_id'];
	$update_date=date("Y-m-d H:i:s");
	$main_menu = implode(',',$_POST['main_menu']);
            $sub_menu = implode(',',$_POST['sub_menu']);
			$add_date=date("Y-m-d H:i:s");
			$data=array(
						'roleper_roleid' =>  $_POST['roleper_name'],
						'roleper_mainmenu' => $main_menu,
						'roleper_submenu' => $sub_menu,
						'roleper_status' => $_POST['roleper_status'],
						'roleper_adddate' => $add_date,
						'roleper_addby' => $_SESSION['user_id'],
						'roleper_deletestatus'=>'False',
						);
	update("tbl_role_per",$data,"where roleper_id = '$roleper_id'");
	$stat = '2';
	save_action_history("2",$roleper_id);
	if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=role_per&stat='.$stat.'";</script>';
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
		$roleper_id = $_REQUEST['roleper_id'];
		$button = 'button_edit';
		$button_title = 'Update';
		$form_area = '';
		$manu = selectfetch("*","tbl_role_per","where roleper_id = '$roleper_id'");
	
		$roleper_id		=	$manu->roleper_id;
		$roleper_roleid		=	$manu->roleper_roleid;
		$roleper_mainmenu		=	$manu->roleper_mainmenu;
		$roleper_submenu		=	$manu->roleper_submenu;
		$roleper_status	=	$manu->roleper_status;
	}
	
/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD END      ****** **/

/*********        DELETE SINGLE START     ****** **/
	if($action=='del')
	{
	    
		$roleper_id = $_REQUEST['roleper_id'];
		$delete_date=date("Y-m-d H:i:s");
		$role =  getvalue("roleper_roleid","tbl_role_per","where roleper_id='$roleper_id'");
		$tot_role = totalrows("tbl_users","where user_role=$role and user_deletestatus='False'");
		if($tot_role <=0 )
		{
			$data_delete = array(	'roleper_deletedate' =>$delete_date,
									'roleper_deleteby' => $_SESSION['user_id'],
									'roleper_deletestatus' => 'True');
			update("tbl_role_per",$data_delete,"where roleper_id=".$roleper_id);
			$stat="Delete Succesfully";
			save_action_history("3",$roleper_id);
			$stat='4';
		}
		else
		{
			$stat='5';
		}
		if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=role_per&stat='.$stat.'";</script>';
			}

	}
	
/*********        DELETE SINGLE END               ****** **/

/*********        UPDATE SINGLE STATUS START      ****** **/
	if( $action=='status')
	{
		$update_date=date("Y-m-d H:i:s");
		$roleper_id = $_REQUEST['roleper_id'];
		$val = $_REQUEST['val'];
		$new_val = '';
		
		if($val == 'Enabled')
		{
			$new_val = 'Disabled';
				$data = array('roleper_status'=>$new_val,
							  'roleper_updatedate'=>$update_date,
							  'roleper_updateby'=>$_SESSION['user_id']);
				update("tbl_role_per",$data,"WHERE roleper_id ='".$roleper_id."'");
				save_action_history("2",$roleper_id);
				$stat=$new_val." Succesfully";
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('roleper_status'=>$new_val,
							  'roleper_updatedate'=>$update_date,
							  'roleper_updateby'=>$_SESSION['user_id']);
			    update("tbl_role_per",$data,"WHERE roleper_id ='".$roleper_id."'");
				save_action_history("2",$roleper_id);
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
$tot_role = totalrows("tbl_role_per","where roleper_id!='' and roleper_deletestatus='False' ".$con_sear." " );
if($tot_role>0)
{
	$sqll = mysql_query("select * From tbl_role_per where roleper_id!='' and roleper_deletestatus='False' ".$con_sear." order by roleper_id desc");	
	//$pager = new PS_Pagination( $con,$sql, $rows_per_page, 3, $srch );
	//$pager->setDebug(true);
	//$settings = $pager->paginate();
}
?>
   <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />

<link href="assets/css/jquery.treeview.css" rel="stylesheet" />
<script src="assets/js/jquery.treeview.js"></script>
	<script type="text/javascript">
		$(function() {
			$("#tree").treeview({
				collapsed: true,
				animated: "medium",
				control:"#sidetreecontrol",
				persist: "location"
			});
		})
	</script>
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
						   <div class="form-controls">
							  <select id="form_2_education" class="span6 chosen-with-diselect" name="roleper_name" data-placeholder="Choose an Role" tabindex="1" style="width:218.718px;">
							  <option value=""></option>
							  <?php 
									 $role_sql="select * from tbl_role where role_id!='' AND role_status='Enabled' and role_delete_status='False'";
									 $role_qry=mysql_query($role_sql);
									 while($role_row=mysql_fetch_array($role_qry))
									 {
								?>
								 <option value="<?php echo $role_row['role_id'];?>" <?php echo selected($roleper_roleid,$role_row['role_id']);?>><?php echo $role_row['role_name'];?></option>
								 <?php
									 }
								 ?>
							  </select>
						   </div>
						</div>
						
						<div class="col-container-right"> 
                                <ul id="tree">
                                
                                 <?php 
									 $mod_sql="select * from tbl_module where id!='' AND status='Enabled'";
									 $mod_qry=mysql_query($mod_sql);
									 while($mod_row=mysql_fetch_array($mod_qry))
									 {
										$roleper_mainmenu_ex = explode(',',$roleper_mainmenu);
								
								?>
                                
                                   <li><span><input type="checkbox" name="main_menu[]" value="<?php echo $mod_row['id'];?>" <?php echo checked_multi($mod_row['id'],$roleper_mainmenu_ex); ?>/></span><?php echo $mod_row['name'];?>
                                      <ul>
                                      
                                      <?php 
						                $module_id=$mod_row['id'];
										 $sub_sql="select * from tbl_submodule where sub_id!='' AND sub_mainid='".$module_id."' AND sub_status='Enabled'";
										  $sub_qry=mysql_query($sub_sql);
										 while($sub_row=mysql_fetch_array($sub_qry))
										  {
											$roleper_submenu_ex = explode(',',$roleper_submenu);  
									  ?>
                                       <li>
                                 <input type="checkbox" name="sub_menu[]" value="<?php echo $sub_row['sub_id'];?>" <?php echo checked_multi($sub_row['sub_id'],$roleper_submenu_ex); ?>/><?php echo $sub_row['sub_name'];?>
                                      </li>
                                       <?php
										 }
										?>
												
                                     </ul>
                           
                                   </li>
                                  <?php
										 }
										?> 
                                   
                                   
                                </ul>
                              
                              
                              </div>
							  <br>
						<div class="control-group">
						   <label class="control-label">Role Status</label>
						   <div class="controls">
							  <select class="large m-wrap" name="roleper_status" tabindex="1">
								 <option value="Enabled" <?php echo selected($roleper_status,"Enabled");?>>Enabled</option>
								 <option value="Disabled" <?php echo selected($roleper_status,"Disabled");?>>Disabled</option>
							  </select>
						   </div>
						</div>
						<br>
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
											<th class="hidden-480">Role Main Menu</th>
											<th class="hidden-480">Role Sub Menu</th>
											<th class="hidden-480">Role Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row  = mysql_fetch_array($sqll))
									{
										$role_id = $row['roleper_roleid'];
										$roleper_main_ex = explode(',',$row['roleper_mainmenu']);
										$roleper_main_ex_count = count($roleper_main_ex);
										
										$roleper_sub_ex = explode(',',$row['roleper_submenu']);
										$roleper_sub_ex_count = count($roleper_sub_ex);
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="1" /></td>
											<td><?php echo $name = getvalue("role_name","tbl_role","where role_id='$role_id'"); ?></td>
											<td class="hidden-480">
											<?php 
                                            for($i=0;$i<$roleper_main_ex_count;$i++)
                                            {
												$mainnav = $roleper_main_ex[$i];
											echo	$menus = getvalue("name","tbl_module","where id='$mainnav'").', ';
											}												
											?></td>
											<td class="hidden-480"><?php 
                                            for($i=0;$i<$roleper_sub_ex_count;$i++)
                                            {
												$subnav = $roleper_sub_ex[$i];
											echo	$submenus = getvalue("sub_name","tbl_submodule","where sub_id='$subnav'").', ';
											}												
											?></td>
											<td class="center hidden-480">
                                           <a href="<?php echo  $self;?>&roleper_id=<?php echo $row['roleper_id']; ?>&val=<?php echo $row['roleper_status']; ?>&action=status"><img title="<?php echo  $row['roleper_status'];?>" src="assets/img/<?php  echo  $row['roleper_status'];?>.jpg" width="16" height="16" border="0" /></a> 
                                            
											
                                            </td>
											<td >
												<a href="index.php?page=role_per&action=edit&roleper_id=<?php echo $row['roleper_id']; ?>"><img src="assets/img/pencil.jpg"/></a>
												&nbsp; 
												<a href="index.php?page=role_per&action=del&roleper_id=<?php echo $row['roleper_id']; ?>"><img src="assets/img/cross.jpg"/></a>
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
		
	   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>

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