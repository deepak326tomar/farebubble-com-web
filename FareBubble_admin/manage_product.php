<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_enquiry';
$action="Add";
$product_id	='';
$product_category_id='';
$product_name ='';

$default_img='';
$image1		='';
$image1		='';
$image2		='';
$image3		='';
$image4		='';
$image5		='';
$price='';
$model='';
$discounted_price='';
$discounted_price_from_date='';
$discounted_price_to_date='';
$mnf_brand_name='';
$related_product='';
$dimensions_length='';
$dimensions_width='';
$dimensions_height='';
$dimensions_unit='';
$weight='';
$weight_unit='';
$available_size='';
$available_color='';
$stock_units='';
$status ='';
$sqll = '';
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
	  $product_id = $_REQUEST['id'];
	  
		$delete_date=date("Y-m-d H:i:s");
		if($product_id > 0 )
		{
			$data_delete = array('delete_date' =>$delete_date,
									'delete_by' => $_SESSION['user_id'],
									'delete_status' => 'True');
			update("tb_enquiry",$data_delete,"where id=".$product_id);
			$stat="4";
			save_action_history("4",$product_id);
			echo '<script type="text/javascript">window.location="index.php?page=manage_enquiry&stat='.$stat.'";</script>';
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
		$product_id = $_REQUEST['id'];
		$val = $_REQUEST['val'];
		$new_val = '';
		
		if($val == 'Enabled')
		{
			$new_val = 'Disabled';
				$data = array('status'=>$new_val,
							  'update_date'=>$update_date,
							  'update_by'=>$_SESSION['user_id']);
				update("tb_enquiry",$data,"WHERE product_id ='".$product_id."'");
				save_action_history("2",$product_id);
				$stat='2';
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('status'=>$new_val,
							  'update_date'=>$update_date,
							  'update_by'=>$_SESSION['user_id']);
				update("tb_enquiry",$data,"WHERE product_id ='".$product_id."'");
				save_action_history("2",$product_id);
				$stat='2';
		}
		
		if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=manage_enquiry&stat='.$stat.'";</script>';
			}
	}

/*********        UPDATE SINGLE STATUS END      ****** **/

}

$tot_discount = totalrows("tb_enquiry","where status='Enabled' and delete_status='False'" );
//inner join lk_tb_enquiry_status c on c.product_status_id=b.product_status_id
	$sqll = mysql_query("SELECT *  from  tb_enquiry where delete_status='False' ORDER BY id DESC");	
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
										<button id="sample_editable_1_new" class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
									</div>
									
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											
                                            <th>Full name</th>
                                            
                                    		<th class="hidden-480">Add Date</th>
											
                                            <th class="hidden-480">Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row=mysql_fetch_array($sqll))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="<?=$row['id']?>" /></td>
											<td><?php echo $row['full_name']; ?></td>
											
                                            <td class="hidden-480"><?php echo $row['add_date']; ?></td>
											<td>
											<a href="<?php echo  $self;?>&id=<?php echo $row['id']; ?>&val=<?php echo $row['status']; ?>&action=status"><img title="<?php echo  $row['status'];?>" src="assets/img/<?php  echo  $row['status'];?>.jpg" width="16" news="16" border="0" /></a>
											
                                            </td>
											<td>
												&nbsp; 
												<a onclick="return confirm('Are you sure want to delete?')" href="<?php echo  $self;?>&action=del&id=<?php echo $row['id']; ?>"><img src="assets/img/cross.jpg"/></a>
												&nbsp; 
												<button type="button" class="view" name="loan_id" onclick="" value="<?php echo $row['id'];?>">View</button>
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
	
	function delete_image_p(img_f_name,id)
	{
		$.ajax({
			url:'ajax/delete_image.php',
			data:{img_f_name:img_f_name,id:id},
			type:'POST',
			success:function(data){
				if(data==1)
				window.location=window.location.href;
				else
				alert('image not deleted successfully');	
			}
		});
	}
	
	
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage("table_managed");
			App.init();
		});
	</script>	
	
	<script>
	$(document).ready(function(){
		var date_input=$('input[name="discounted_price_from_date"]'); //our date input has the name "date"
		var discounted_price_to_date=$('input[name="discounted_price_to_date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
		
		discounted_price_to_date.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
		
	})
	
	
	
</script>
	
	
	
</body>
<!-- END BODY -->
</html>
