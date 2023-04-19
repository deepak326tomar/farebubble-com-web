<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_footer_script';
$action="Add"; 
$id	='';
$script_name1	='';
$script_name2   ='';
$script_name3	='';
$script_name4   ='';
$script_name5	='';

$Script1   ='';
$Script2   ='';
$Script3   ='';
$Script4   ='';
$Script5   ='';

$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=manage_footer_script&day=today';	

$current_date=date('Y-m-d');	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='yesterday')

{
echo $day;
$self='index.php?page=manage_footer_script&day=yesterday';		

$current_date=date('Y-m-d',strtotime("-1 days"));	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=manage_footer_script&day=month';		

$current_date=date('m');	

$d_query="and DATE_FORMAT(add_date,'%m')='$current_date'";

}

else

{

$d_query="";	

}

//print_r($_POST);exit;
/*********        INSERT DATA  START    ****** **/


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
		$msg_lte = "Receipt Already Generated For This Student You Can Not Delete!";
		$type = "success";
		$font_style = 'fa-check';
	}
}


if(isset($_POST['button_add']) && ($_POST['button_add']!=''))
{
	
if((isset($_REQUEST['script_name1']) && $_REQUEST['script_name1']!=''))
	{
		



			$add_date=date("Y-m-d H:i:s");
			$data=array(
			            
						'script_name1' =>  $_POST['script_name1'],
						'script_name2' =>  $_POST['script_name2'],
                        'script_name3' =>  $_POST['script_name3'],
					    'script_name4' =>  $_POST['script_name4'],
						'script_name5' =>  $_POST['script_name5'],
						
					    'Script1' =>  strip_tags($_POST['Script1']),
						'Script2' =>  strip_tags($_POST['Script2']),
						'Script3' =>  strip_tags($_POST['Script3']),
						'Script4' =>  strip_tags($_POST['Script4']),
						'Script5' =>  strip_tags($_POST['Script5']),
						
					
					
					
						'status' => $_POST['status'],
						'add_by' => $_SESSION['user_id'],
						'add_date' => $add_date,
						'delete_status'=>'False'
						);

			insert($conn,'tb_footer_script',$data);
			$booklet_id = mysqli_insert_id($conn);
			save_action_history($conn,"1",$booklet_id);
			$caption = 'Save';
				$stat = '1';
		
		
		if(isset($stat))
			{
	echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
			}
		
		
	}
	
	
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
	$id=$_REQUEST['id'];

	$tot_comp = totalrows($conn,"tb_footer_script","WHERE  script_name1 ='".trim(strtoupper($_POST['script_name1']))."' and delete_status='False' and id!='$id'");
		if($tot_comp > 0)
		{
			$button='button_add';
			 $stat = '3';
		}else
		{



	$update_date=date("Y-m-d H:i:s");
							

	                    $data=array(
			              
			            
						'script_name1' =>  $_POST['script_name1'],
						'script_name2' =>  $_POST['script_name2'],
                        'script_name3' =>  $_POST['script_name3'],
					    'script_name4' =>  $_POST['script_name4'],
						'script_name5' =>  $_POST['script_name5'],
						
					    'Script1' =>  strip_tags($_POST['Script1']),
						'Script2' =>  strip_tags($_POST['Script2']),
						'Script3' =>  strip_tags($_POST['Script3']),
						'Script4' =>  strip_tags($_POST['Script4']),
						'Script5' =>  strip_tags($_POST['Script5']),
						
						'status' => $_POST['status'],
						'update_date'=>$update_date,
						'update_by'=>$_SESSION['user_id']
						);
	update($conn,"tb_footer_script",$data,"where id = '$id'");
	$stat = '2';
	save_action_history($conn,"2",$id);
	}
	if(isset($stat))
			{
		echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
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
		$id = $_REQUEST['id'];
		$button = 'button_edit';
		$button_title = 'Update';
		$form_area = '';
		$manu = selectfetch($conn,"*","tb_footer_script","where id = '$id'");
	
		$id		=	$manu->id;
		$script_name1		=	$manu->script_name1;
		$script_name2		=	$manu->script_name2;
		$script_name3		=	$manu->script_name3;
		$script_name4		=	$manu->script_name4;
		$script_name5		=	$manu->script_name5;
		
		$Script1		=	$manu->Script1;
		$Script2		=	$manu->Script2;
		$Script3		=	$manu->Script3;
		$Script4		=	$manu->Script4;
		$Script5		=	$manu->Script5;

		$status	=	$manu->status;
	}
	
/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD END      ****** **/

/*********        DELETE SINGLE START     ****** **/
	if($action=='del')
	{
	    
		 $id = $_REQUEST['id'];
		$delete_date=date("Y-m-d H:i:s");
		
		$tot_dist = 0;//totalrows($conn,"tbl_district","where district_state_id=$state_id");
		if($tot_dist <=0 )
		{
			$data_delete = array(	'delete_date' =>$delete_date,
									'delete_by' => $_SESSION['user_id'],
									'delete_status' => 'True');
									
				 			
			update($conn,"tb_footer_script",$data_delete,"where id=".$id);
			$stat="4";
			save_action_history($conn,"3",$id);
			
		}
		else
		{
			$stat="Some Data Are Connected With This So Delete Them First";
		}
		
		
		
		if(isset($stat))
			{
					
			echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
			}
		
		
		
	}
	
/*********        DELETE SINGLE END               ****** **/

/*********        UPDATE SINGLE STATUS START      ****** **/
	if( $action=='status')
	{
		$update_date=date("Y-m-d H:i:s");
		$id = $_REQUEST['id'];
		$val = $_REQUEST['val'];
		$new_val = '';
		
		if($val == 'Enabled')
		{
			$new_val = 'Disabled';
				$data = array('status'=>$new_val,
							  'update_date'=>$update_date,
							  'update_by'=>$_SESSION['user_id']);
				update($conn,"tb_footer_script
",$data,"WHERE id ='".$id."'");
				save_action_history($conn,"2",$id);
				$stat='2';
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('status'=>$new_val,
							  'update_date'=>$update_date,
							  'update_by'=>$_SESSION['user_id']);
				update($conn,"tb_footer_script
",$data,"WHERE id ='".$id."'");
				save_action_history($conn,"2",$id);
				$stat='2';
		}
		
		if(isset($stat))
	{
	echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
	}
		
		
	}
/*********        UPDATE SINGLE STATUS END      ****** **/
/*********         MULTIPLE DELETE START                ****** **/
	
/*********         MULTIPLE DELETE END                ****** **/
/*********       MULTIPLE ENABLED AND DISABLED STATUS START      ****** **/
	
/*********       MULTIPLE ENABLED AND DISABLED STATUS END       ****** **/
}






	$sqll = mysqli_query($conn,"select * From tb_footer_script where id!='' and delete_status='False' $d_query  order by id desc");	
	$tot_discount = mysqli_num_rows($sqll);
	//$pager = new PS_Pagination( $con,$sql, $rows_per_page, 3, $srch );
	//$pager->setDebug(true);
	//$settings = $pager->paginate();

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
				<form method="post" name="role_form" enctype="multipart/form-data" action="">
				<div class="row-fluid" id="abc" <?php echo $form_area; ?>>
					 <div class="row-fluid">
                     <div class="span4">
                      <div class="control-group">
                       <label class="control-label">Script Name</label>
                        <div class="controls">
                         <input type="text" name="script_name1" placeholder="Script Name" value="<?php echo $script_name1; ?>" class="m-wrap width100" />
                          </div>
                          </div>
						   </div>

                          <div class="span8">
                        <div class="control-group">
                            <label class="control-label">Script</label>
                            <div class="controls">
                         <textarea  name="Script1" rows="4" cols="50" class="m-wrap width100"  placeholder="Enter Script" ><?php echo $Script1; ?></textarea>
                           </div>
                        </div>
						</div>	
                        </div>
				   <div class="row-fluid">
                     <div class="span4">
                      <div class="control-group">
                       <label class="control-label">Script Name</label>
                        <div class="controls">
                         <input type="text" name="script_name2" placeholder="Script Name" value="<?php echo $script_name2; ?>" class="m-wrap width100" />
                          </div>
                          </div>
						   </div>

                          <div class="span8">
                        <div class="control-group">
                            <label class="control-label">Script</label>
                            <div class="controls">
                         <textarea  name="Script2" rows="4" cols="50" class="m-wrap width100"  placeholder="Enter Script" ><?php echo $Script2; ?></textarea>
                           </div>
                        </div>
						</div>	
                        </div>
					
					
					  <div class="row-fluid">
                     <div class="span4">
                      <div class="control-group">
                       <label class="control-label">Script Name</label>
                        <div class="controls">
                         <input type="text" name="script_name3" placeholder="Script Name" value="<?php echo $script_name3; ?>" class="m-wrap width100" />
                          </div>
                          </div>
						   </div>

                          <div class="span8">
                        <div class="control-group">
                            <label class="control-label">Script</label>
                            <div class="controls">
                         <textarea  name="Script3" rows="4" cols="50" class="m-wrap width100"  placeholder="Enter Script" ><?php echo $Script3; ?></textarea>
                           </div>
                        </div>
						</div>	
                        </div>
					 <div class="row-fluid">
                     <div class="span4">
                      <div class="control-group">
                       <label class="control-label">Script Name</label>
                        <div class="controls">
                         <input type="text" name="script_name4" placeholder="Script Name" value="<?php echo $script_name4; ?>" class="m-wrap width100" />
                          </div>
                          </div>
						   </div>

                          <div class="span8">
                        <div class="control-group">
                            <label class="control-label">Script</label>
                            <div class="controls">
                         <textarea  name="Script4" rows="4" cols="50" class="m-wrap width100"  placeholder="Enter Script" ><?php echo $Script4; ?></textarea>
                           </div>
                        </div>
						</div>	
                        </div>
					<div class="row-fluid">
                     <div class="span4">
                      <div class="control-group">
                       <label class="control-label">Script Name</label>
                        <div class="controls">
                         <input type="text" name="script_name5" placeholder="Script Name" value="<?php echo $script_name5; ?>" class="m-wrap width100" />
                          </div>
                          </div>
						   </div>

                          <div class="span8">
                        <div class="control-group">
                            <label class="control-label">Script</label>
                            <div class="controls">
                         <textarea  name="Script5" rows="4" cols="50" class="m-wrap width100"  placeholder="Enter Script" ><?php echo $Script5; ?></textarea>
                           </div>
                        </div>
						</div>	
                        </div>
					
					
					
					
					
					
					

						
						
						<div class="row-fluid">
                      <div class="span4">
						<div class="control-group">
						   <label class="control-label">Status</label>
						   <div class="controls">
							  <select class="m-wrap" name="status" tabindex="1">
								 <option value="Enabled" <?php echo selected($status,"Enabled");?>>Enabled</option>
								 <option value="Disabled" <?php echo selected($status,"Disabled");?>>Disabled</option>
							  </select>
						   </div>
						</div>
						</div>
					  </div>
					  
							<button class="btn blue" name="<?php echo $button; ?>" type="submit" value="<?php echo $button_title; ?>">
							<i class="icon-ok"></i>
							<?php echo $button_title; ?>
							</button>
							
						
				
					
				</div>
				</form>
				<br>

				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Total Footer Script=<?=$tot_discount?></h4>
								<div class="tools">
									<!--<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>-->
								</div>
							</div>
							<div class="portlet-body">
                            
                             <?php if(!empty($msg_lte)){ echo msg_lte($msg_lte,$type,$font_style);} ?> 
								<div class="clearfix">
									<!--<div class="btn-group">
										<button id="sample_editable_1_new" class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
									</div>-->
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
										</button>
										<!-- <ul class="dropdown-menu">
											<li><a href="#">Print</a></li>
											<li><a href="#">Save as PDF</a></li>
											<li><a href="#">Export to Excel</a></li>
										</ul> -->
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											
                                             <th>Script Name 1 </th>
											 <th>Script Name 2 </th>
	                                         <th>Script Name 3 </th>
                                             <th>Script Name 4 </th>
	                                         <th>Script Name 5 </th> 
											
											<th class="hidden-480">Add Date</th>
											<th class="hidden-480">Add By</th>
                                            <th class="hidden-480">Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row  = mysqli_fetch_assoc($sqll))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="<?=$row['id']?>" /></td>
											
                                              <td><?php echo $row['script_name1']; ?></td>
                                              <td><?php echo $row['script_name2']; ?></td>
                                              <td><?php echo $row['script_name3']; ?></td>
                                              <td><?php echo $row['script_name4']; ?></td>
											   <td><?php echo $row['script_name5']; ?></td>
											 
											<td class="hidden-480"><?php echo $row['add_date']; ?></td>
											<td class="center hidden-480">
											<?php 
											if($row['add_by']=='0'){ echo 'Admin'; }else{ echo getvalue("user_name","tbl_users","where user_id='".$row['add_by']."'"); } 
											?>
											</td>
                                            <td>
											<a href="<?php echo  $self;?>&id=<?php echo $row['id']; ?>&val=<?php echo $row['status']; ?>&action=status"><img title="<?php echo  $row['status'];?>" src="assets/img/<?php  echo  $row['status'];?>.jpg" width="16" country="16" border="0" /></a>
											
                                            </td>
											<td >
												<a href="<?php echo  $self;?>&action=edit&id=<?php echo $row['id']; ?>"><img src="assets/img/pencil.jpg"/></a>
												&nbsp; 
												<!--<a href="<?php echo  $self;?>&action=del&id=<?php echo $row['id']; ?>"><img src="assets/img/cross.jpg"/></a>-->
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