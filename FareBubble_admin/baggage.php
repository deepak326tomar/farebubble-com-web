<?php
$button='button_add';
$button_title = 'Submit';	
$page_id=$_GET['page_id'];
$self = 'index.php?page=baggage&page_id='.$page_id;
$action="Add";
$id	='';
$b_class ='';
$b_baggage='';

$b_weight ='';
$b_dimension='';
$baggage_type ='';


$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
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

		$tot_comp =0;// totalrows($conn,"checked_baggage","WHERE  b_class ='".trim(strtoupper($_POST['b_class']))."' and delete_status='False'");


		if($tot_comp > 0)
		{
			$button='button_add';
			 $stat = '3';
		}
		else
		{
			$add_date=date("Y-m-d H:i:s");
			$data=array(
						'page_id' =>  $page_id,
						'b_class' =>  trim($_POST['b_class']),
						'b_baggage' =>trim($_POST['b_baggage']),
						'b_weight' =>  trim($_POST['b_weight']),
						'b_dimension' =>  trim($_POST['b_dimension']),
						'baggage_type' =>  trim($_POST['baggage_type']),

						'status' => $_POST['status'],
						'add_by' => $_SESSION['user_id'],
						'add_date' => $add_date,
						'delete_status'=>'False'
						);
			insert($conn,'checked_baggage',$data);
			$booklet_id = mysqli_insert_id($conn);
			save_action_history($conn,"1",$booklet_id);
			$caption = 'Save';
				$stat = '1';
		}
		
		if(isset($stat))
			{
//		echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
			}
	
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
	$id=$_REQUEST['id'];

	$tot_comp =0; //totalrows($conn,"checked_baggage","WHERE  b_class ='".trim(strtoupper($_POST['b_class']))."' and delete_status='False' and id!='$id'");
		if($tot_comp > 0)
		{
			$button='button_add';
			 $stat = '3';
		}else
		{

	$update_date=date("Y-m-d H:i:s");
	$data=array(
						'page_id' =>  $page_id,
						'b_class' =>  trim($_POST['b_class']),
						'b_baggage' =>trim($_POST['b_baggage']),
						'b_weight' =>  trim($_POST['b_weight']),
						'b_dimension' =>  trim($_POST['b_dimension']),
						'baggage_type' =>  trim($_POST['baggage_type']),
						'status' => $_POST['status'],
						'update_date'=>$update_date,
						'update_by'=>$_SESSION['user_id']
						);
	update($conn,"checked_baggage",$data,"where id = '$id'");
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
		$manu = selectfetch($conn,"*","checked_baggage","where id = '$id'");
		
		$id		=	$manu->id;
		$page_id		=	$manu->page_id;
		$b_class		=	$manu->b_class;
		$b_baggage		=	$manu->b_baggage;
		$b_weight		=	$manu->b_weight;
		$b_dimension		=	$manu->b_dimension;
		$baggage_type		=	$manu->baggage_type;
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
									
				 			
			update($conn,"checked_baggage",$data_delete,"where id=".$id);
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
				update($conn,"checked_baggage
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
				update($conn,"checked_baggage
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






	$sqll = mysqli_query($conn,"select * From checked_baggage where id!='' and delete_status='False' and page_id='$page_id'  order by id desc");	
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
					<div class="row">
					<div class="span4">
						
                        
                        <div class="control-group">
						   <label class="control-label">Baggage type</label>
						   <div class="controls">
							  <select class="large m-wrap" name="baggage_type" tabindex="1">
								 <option value="1" <?php echo selected($baggage_type,"1");?>>Checked Baggage</option>
								 <option value="2" <?php echo selected($baggage_type,"2");?>>Carray On</option>
							  </select>
						   </div>
						</div>
                        
                        
                        <div class="control-group">
                            <label class="control-label">Class</label>
                            <div class="controls">
                                <input type="text" name="b_class" placeholder="Enter class" width="245px" value="<?php echo $b_class; ?>" class="large m-wrap" />
                               
                            </div>
                        </div>
						
				</div>
				<div class="row-fluid">		
						  <div class="control-group">
                            <label class="control-label">No of bags</label>
                            <div class="controls">
                                <input type="text" name="b_baggage" placeholder="Enter No of bags" width="245px" value="<?php echo $b_baggage; ?>" class="large m-wrap" />
                               
                            </div>
                        </div>

                          <div class="control-group">
                            <label class="control-label">Weight</label>
                            <div class="controls">
                                <input type="text" name="b_weight" placeholder="Enter Weight" width="245px" value="<?php echo $b_weight; ?>" class="large m-wrap" />
                               
                            </div>
                        </div>
</div>



                        <div class="control-group">
                            <label class="control-label">Dimension(L+W+H)
</label>
                            <div class="controls">
                                <input type="text" name="b_dimension" placeholder="Enter Dimension(L+W+H)" width="245px" value="<?php echo $b_dimension; ?>" class="large m-wrap" />
                               
                            </div>
                        </div>
							                 

                                
                      


						<div class="control-group">
						   <label class="control-label">Status</label>
						   <div class="controls">
							  <select class="large m-wrap" name="status" tabindex="1">
								 <option value="Enabled" <?php echo selected($status,"Enabled");?>>Enabled</option>
								 <option value="Disabled" <?php echo selected($status,"Disabled");?>>Disabled</option>
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
								<h4><i class="icon-globe"></i>Total Airlines=<?=$tot_discount?></h4>
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
									<div class="btn-group">
										<button id="sample_editable_1_new" class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
									</div>
									<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">Print</a></li>
											<li><a href="#">Save as PDF</a></li>
											<li><a href="#">Export to Excel</a></li>
										</ul>
									</div>
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											
                                            <th>Class</th>
                                            <th>Baggage type</th>
                                            <th>Baggage</th>
                                            <th>Weight</th>
                                            <th>Dimension </th>
                                           
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
											
                                            <td><?php echo $row['b_class']; ?></td>
                                            <td><?=($row['baggage_type']==1?'Baggge':'Carray');?></td>
                                           
                                            <td><?php echo $row['b_baggage']; ?></td>
                                            <td><?php echo $row['b_weight']; ?></td>
                                            <td><?php echo $row['b_dimension']; ?></td>


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
												<a href="<?php echo  $self;?>&action=del&id=<?php echo $row['id']; ?>"><img src="assets/img/cross.jpg"/></a>
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