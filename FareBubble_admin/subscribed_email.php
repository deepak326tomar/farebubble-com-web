<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=subscribed_email';
$action="Add";
$id	='';
$form_area = 'style="display:none;"';
//print_r($_POST);exit;
/*********        INSERT DATA  START    ****** **/

if(isset($_REQUEST['stat']))
{
	$stat = $_REQUEST['stat'];
		if($stat==4)
	{
		$msg_lte = "Deleted Successfully !!";
		$type = "success";
		$font_style = 'fa-check';
	}
	
}


if(isset($_POST['button_add']) && ($_POST['button_add']!=''))
{
	
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
}
/*********        UPDATE DATA  END    ****** **/

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];

/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD START     ****** **/
	if($action=='edit')
	{
		
	}
	
/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD END      ****** **/

/*********        DELETE SINGLE START     ****** **/
	if($action=='del')
	{
	  $id = $_REQUEST['id'];
	  
		$delete_date=date("Y-m-d H:i:s");
		if($id > 0 )
		{
			$data_delete = array('delete_date' =>$delete_date,
									'delete_status' => 'True');
			update($conn,"t_subscribe_news",$data_delete,"where id=".$id);
			$stat="4";
			save_action_history($conn,"4",$id);
			echo '<script type="text/javascript">window.location="index.php?page=subscribed_email&stat='.$stat.'";</script>';
		}
		else
		{
			$stat="Some Data Are Connected With This So Delete Them First";
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
							  'update_date'=>$update_date
							  );
				update($conn,"t_subscribe_news",$data,"WHERE id ='".$id."'");
				save_action_history($conn,"2",$id);
				$stat='2';
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('status'=>$new_val,
							  'update_date'=>$update_date
							  );
				update($conn,"t_subscribe_news",$data,"WHERE id ='".$id."'");
				save_action_history($conn,"2",$id);
				$stat='2';
		}
		
		if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=subscribed_email&stat='.$stat.'";</script>';
			}
	}

/*********        UPDATE SINGLE STATUS END      ****** **/

}

$tot_discount = totalrows($conn,"t_subscribe_news","where status='Enabled' and delete_status='False'" );
//inner join lk_t_subscribe_news_status c on c.product_status_id=b.product_status_id
	$sqll = mysqli_query($conn,"SELECT *  from  t_subscribe_news where delete_status='False' ORDER BY id DESC");	
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
				 <div class="portlet-body form">
				<form method="post" name="role_form" action="" enctype="multipart/form-data">
				<div class="row-fluid" id="abc" <?php echo $form_area; ?>>
					
					
				
				</div>
				</form>
				
				 </div>
				
				<br>
				<?php
                                          
										  include_once("ExportToExcel.php");
				$excel_query="select * from t_subscribe_news where delete_status='False'";						
										  if(isset($_POST['sent'])){
											ExportExcel($conn,$excel_query);
                                          }
                                          ?>

				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Total Enquiry =<?php echo $tot_discount;?></h4>
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
									<!--	<button id="sample_editable_1_new" class="btn green">
										Add New <i class="icon-plus"></i>
										</button> -->
									</div>
								
								<div class="btn-group pull-right">
										<form action=""method="post">
										 <table>
										<td><input type="submit"name="sent"value="Click for excel"></td>
										</table>
										</form>
									</div>
								
									
								</div> 
								
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											
                                            <th>Email</th>
                                            
                                    		<th class="hidden-480">Add Date</th>
											
                                            <th class="hidden-480">Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row=mysqli_fetch_assoc($sqll))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="<?=$row['id']?>" /></td>
											<td><?php echo $row['email']; ?></td>
											
                                            <td class="hidden-480"><?php echo $row['add_date']; ?></td>
											<td>
											<a href="<?php echo  $self;?>&id=<?php echo $row['id']; ?>&val=<?php echo $row['status']; ?>&action=status"><img title="<?php echo  $row['status'];?>" src="assets/img/<?php  echo  $row['status'];?>.jpg" width="16" news="16" border="0" /></a>
											
                                            </td>
											<td>
												&nbsp; 
												<a onclick="return confirm('Are you sure want to delete?')" href="<?php echo  $self;?>&action=del&id=<?php echo $row['id']; ?>"><img src="assets/img/cross.jpg"/></a>
											
											
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
	<?php include("view/product_view.php");?>	
	
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
