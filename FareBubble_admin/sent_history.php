<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=sent_history';
$action="Add";
$height_id	='';
$height_ft ='';
$height_status ='';
$sqll = '';
$form_area = 'style="display:none;"';
//print_r($_POST);exit;
/*********        INSERT DATA  START    ****** **/


	$sqll = mysql_query("select * From tbl_match_profile where matching_profile_delete_status='False' ORDER BY matching_profile_id DESC");	
$count1=mysql_num_rows($sqll);

$action=$_GET['action'];

if($action=='del')
	{
	    
		$matching_profile_id = $_REQUEST['matching_profile_id'];
		$delete_date=date("Y-m-d H:i:s");
		
		$tot_dist = 0;//totalrows("tbl_district","where district_state_id=$state_id");
		if($tot_dist <=0 )
		{
			$data_delete = array(	'matching_profile_delete_date' =>$delete_date,
									'matching_profile_delete_by' => $_SESSION['user_id'],
									'matching_profile_delete_status' => 'True');
			update("tbl_match_profile",$data_delete,"where matching_profile_id=".$matching_profile_id);
			$stat="4";
			save_action_history("3",$matching_profile_id);
			
		}
		else
		{
			$stat="Some Data Are Connected With This So Delete Them First";
		}
		
		if(isset($stat))
			{
			echo '<script type="text/javascript">window.location="index.php?page=sent_history&stat='.$stat.'";</script>';
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
				
				</form>
				<br>

				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Total Sent To Profiles=<? echo $count1; ?></h4>
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
									<!--<div class="btn-group">
										<button id="sample_editable_1_new" class="btn green">
										Add New <i class="icon-plus"></i>
										</button>
									</div>-->
									<!--<div class="btn-group pull-right">
										<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#">Print</a></li>
											<li><a href="#">Save as PDF</a></li>
											<li><a href="#">Export to Excel</a></li>
										</ul>
									</div>-->
								</div>
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;">Id</th>
											
                                            <th>Sent Date</th>
                                           <th class="hidden-480">Sent to </th>
											<th class="hidden-480">Sent Profiles</th>
											<th class="hidden-480">Send by</th>
                                            <th class="hidden-480">Delete</th>
											
										</tr>
									</thead>
									<tbody>
									<?php
									while($row  = mysql_fetch_array($sqll))
									{
									
									
									$k=explode(',',$row['matching_profile']);
									// $count=count($a); 
									
									$a=array_unique($k);
									
									
									
								
									
									foreach($a as $i)
									{
										$k=urlencode(base64_encode($i));
								$get_universal_id=getvalue("member_id","tb_enquiry","where enquiry_id=$i");
								
 $a='<a href="view_profile.php?action=view&enquiry_id='.$k.'" target="_blank">'.$get_universal_id.'</a> ';
$b.=$a;
									
												
									}
									
									
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="1" /></td>
											<td><?php echo date("d-m-Y", strtotime($row['matching_profile_add_date'])); ?></td>
                                            <td><?php echo getvalue("member_id","tb_enquiry","where enquiry_id='".$row['enquiry_id']."'");  echo ",". getvalue("email","tb_enquiry","where enquiry_id='".$row['enquiry_id']."'");  ?> </td>
                                           
                                          
                                           
                                           
                                           
                                           
                                           
                                           
                                           
											<td class="hidden-480"><?php  echo $b;  ?></td>
											<td class="center hidden-480">
											<?php 
											if($row['matching_profile_add_by']=='0'){ echo 'Admin'; }else{ echo getvalue("user_name","tbl_users","where user_id='".$row['matching_profile_add_by']."'"); } 
											?>
											</td>
                                            <td class="hidden-480"><a href="<?php echo  $self;?>&action=del&matching_profile_id=<?php echo $row['matching_profile_id']; ?>"><img src="assets/img/cross.jpg"/></a></td>
											
										</tr>
										<?php
										$b='';
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