<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_search';
$action="Add";
$id	='';
$form_area = 'style="display:none;"';
if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	if($action=='del')
	{
	  $id = $_REQUEST['id'];
	  
			delete($conn,"tbl_search_data","where id=".$id);
			echo '<script type="text/javascript">window.location="index.php?page=manage_search&stat='.$stat.'";</script>';
	}
}

$tot_discount = totalrows($conn,"tbl_search_data","where 1" );
	$sqll = mysqli_query($conn,"SELECT *  from  tbl_search_data where 1 ORDER BY id DESC");	
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
				$excel_query="select * from tbl_search_data where 1";						
										  if(isset($_POST['sent'])){
											ExportExcel($conn,$excel_query);
                                          }
                                          ?>

				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Total Search =<?php echo $tot_discount;?></h4>
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
										<td><input type="submit" name="sent" value="Generate excel"></td>
										</table>
										</form>
									</div>
								
									
								</div> 
								
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											<th>Trip Type</th>
											<th>Reservation From</th>
                                            <th>Reservation To</th>
                                            <th>Dept. Date</th>
											<th>Return Date</th>
                                            <th>Adult</th>
											<th>Child</th>
                                            <th>Partner</th>
                                    		<th class="hidden-480">Search Date</th>
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
											<td><?php if($row['trip_type']=='1'): echo 'Two Way';else: echo 'One Way';endif; ?></td>
											<td><?php echo $row['from_city']; ?></td>
											<td><?php echo $row['to_city']; ?></td>
											<td><?php echo $row['travel_date']; ?></td>
											<td><?php echo $row['return_date']; ?></td>
											<td><?php echo $row['no_adult']; ?></td>
											<td><?php echo $row['no_child']; ?></td>
							                <td><?php echo $row['no_infant']; ?></td>
                                            <td class="hidden-480"><?php echo $row['search_date']; ?></td>
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
	<?php include("view/tb_search.php");?>	
	
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
