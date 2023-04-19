<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_flights_deal';
$action="Add";
$id	='';
$type_deals_id ='';
$origin ='';
$Origin_code ='';
$destination	='';
$destination_code	='';
$times ='';
$stops ='';
$from_date ='';
$to_date	='';

$price_in_usd='';
$result_url ='';



$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=manage_flights_deal&day=today';	

$current_date=date('Y-m-d');	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='yesterday')

{
echo $day;
$self='index.php?page=manage_flights_deal&day=yesterday';		

$current_date=date('Y-m-d',strtotime("-1 days"));	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=manage_flights_deal&day=month';		

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
	
if((isset($_REQUEST['origin']) && $_REQUEST['origin']!=''))
	{
		






						
						$f_date=explode("-", $_POST['from_date']);
						$from_date=$f_date[2]."-".$f_date[1]."-".$f_date[0];
						$t_date=explode("-", $_POST['to_date']);
						$to_date=$t_date[2]."-".$t_date[1]."-".$t_date[0];


			$add_date=date("Y-m-d H:i:s");
			$data=array(
			            
						'type_deals_id' =>  $_POST['type_deals_id'],
						
			            'origin' =>  $_POST['origin'],
                        
						'Origin_code' =>  $_POST['Origin_code'],
						
						'destination' =>  $_POST['destination'],
						
						'destination_code' =>  $_POST['destination_code'],
						
						'times' =>  $_POST['times'],
						
						'stops' =>  $_POST['stops'],
						
						'from_date' =>  $from_date,
						
						'to_date' => $to_date,
						
						'price_in_usd' =>  $_POST['price_in_usd'],
						
						'result_url' =>  $_POST['result_url'],
						
						
					

						'status' => $_POST['status'],
						'add_by' => $_SESSION['user_id'],
						'add_date' => $add_date,
						'delete_status'=>'False'
						);

			insert($conn,'t_flight_deal',$data);
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


	$update_date=date("Y-m-d H:i:s");
							$f_date=explode("-", $_POST['from_date']);
						$from_date=$f_date[2]."-".$f_date[1]."-".$f_date[0];
						$t_date=explode("-", $_POST['to_date']);
						$to_date=$t_date[2]."-".$t_date[1]."-".$t_date[0];

	$data=array(
			             'type_deals_id' =>  $_POST['type_deals_id'],
						 'origin' =>  $_POST['origin'],
                         'Origin_code' =>  $_POST['Origin_code'],
						 'destination' =>  $_POST['destination'],
						'destination_code' =>  $_POST['destination_code'],
					    'times' =>  $_POST['times'],
						
						'stops' =>  $_POST['stops'],
					
						'from_date' =>  $from_date,
						
						'to_date' => $to_date,
						
						
						'price_in_usd' =>  $_POST['price_in_usd'],
						
						'result_url' =>  $_POST['result_url'],
						
						
						'status' => $_POST['status'],
						'update_date'=>$update_date,
						'update_by'=>$_SESSION['user_id']
						);
	update($conn,"t_flight_deal",$data,"where id = '$id'");
	$stat = '2';
	save_action_history($conn,"2",$id);
	
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
		$manu = selectfetch($conn,"*","t_flight_deal","where id = '$id'");
	
		$id		=	$manu->id;
		$type_deals_id		=	$manu->type_deals_id;
		$origin		=	$manu->origin;
		$Origin_code		=	$manu->Origin_code;
		$destination		=	$manu->destination;
		$destination_code		=	$manu->destination_code;
		$times		=	$manu->times;
		$stops		=	$manu->stops;
		$from_date		=	$manu->from_date;

			$f_date=explode("-", $from_date);
						$from_date=$f_date[2]."-".$f_date[1]."-".$f_date[0];


		
		$to_date		=	$manu->to_date;

$t_date=explode("-", $to_date);
						$to_date=$t_date[2]."-".$t_date[1]."-".$t_date[0];


	
		$price_in_usd		=	$manu->price_in_usd;
		$result_url		=	$manu->result_url;
		
        
		
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
									
				 			
			update($conn,"t_flight_deal",$data_delete,"where id=".$id);
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
				update($conn,"t_flight_deal
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
				update($conn,"t_flight_deal
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

	$sqll = mysqli_query($conn,"select a.* ,b.destination_type from t_flight_deal a inner join tb_destination_type b on a.type_deals_id=b.id where a.delete_status='False' order by id desc");
	$tot_discount = mysqli_num_rows($sqll);
	

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
                            <label class="control-label">Type Deals</label>
                            <div class="controls">
                                <select class="m-wrap" name="type_deals_id" tabindex="1">
			                   <option value="">---Select Type  Deals---</option>

								<?php $sco_pages=mysqli_query($conn,"select * from tb_destination_type");

							  while($row_sco=mysqli_fetch_assoc($sco_pages))
							  { 
							  	?>
								 <option value="<?php echo $row_sco['id'];?>" <?php echo selected($row_sco['id'],$type_deals_id);?>><?php echo $row_sco['destination_type'];?></option>
							<?php } ?> </select>                               
                            </div>
                        </div>
						</div>
						
                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Origin Name</label>
                            <div class="controls">
                                <input type="text" name="origin" placeholder="Enter origin Name" value="<?php echo $origin; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>

						<div class="span4">
                        <div class="control-group">
                            <label class="control-label">Origin Code</label>
                            <div class="controls">
                                <input type="text" name="Origin_code" placeholder="Enter origin Code" value="<?php echo $Origin_code; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
						
					</div>
						<div class="row-fluid">
					   <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Destination name</label>
                            <div class="controls">
                                <input type="text" name="destination" placeholder="Enter Destination Name" value="<?php echo $destination; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
					   
						<div class="span4">
                        <div class="control-group">
                            <label class="control-label">Destination Code</label>
                            <div class="controls">
                                <input type="text" name="destination_code" placeholder="Enter Destination Code" value="<?php echo $destination_code; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
						<div class="span4">
    <div class="control-group">
        <label class="control-label">Fare in  USD</label>
        <div class="controls">
            <input type="text" name="price_in_usd" placeholder="Enter USD"  value="<?php echo $price_in_usd; ?>" class="m-wrap width100" />
           
        </div>
    </div>
</div>
                        
					</div>
					
					<div class="row-fluid">
					
                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">From Date</label>
                            <div class="controls">
                                <input type="text" data-date-format="dd-mm-yyyy"  id="from_date" name="from_date" placeholder="Enter from date" value="<?php echo $from_date; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
					
					
						<div class="span4">
                        <div class="control-group">
                            <label class="control-label">To Date</label>
                            <div class="controls">
                                <input type="text" name="to_date" id="to_date" data-date-format="dd-mm-yyyy" placeholder="Enter to date" value="<?php echo $to_date; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>

<script>
  $( function() {
$('#from_date').datepicker({ 
    startDate:new Date()
});

$('#to_date').datepicker({ 
   startDate:new Date()
});

  } );
  </script>

                     <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Result url</label>
                            <div class="controls">
                                <input type="text" name="result_url" placeholder="Enter result_url" value="<?php echo $result_url; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
                       
                      	</div>
                       
						

						<div class="row-fluid">
							
                   <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Times</label>
                            <div class="controls">
                                <input type="text" name="times" placeholder="Enter Times" value="<?php echo $times; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
						<div class="span4">
                        <div class="control-group">
                            <label class="control-label">Stops</label>
                            <div class="controls">
                                <input type="text" name="stops" placeholder="Enter Stops" value="<?php echo $stops; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
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
								<h4><i class="icon-globe"></i>Total fares=<?php echo $tot_discount;?></h4>
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
											
                                            <th>Origin </th>
											<th>Origin Code</th>
											<th>Destination </th>
											<th>Destination Code</th>
	                                        
                                          
											<th class="hidden-480">Add Date</th>
											<th class="hidden-480">Add By</th>
                                            <th class="hidden-480">Status</th>
											<th >Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									while($row= mysqli_fetch_assoc($sqll))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="<?php echo $row['id'];?>" /></td>
											
                                            <td><?php echo $row['origin']; ?></td>
											<td><?php echo $row['Origin_code']; ?></td>
                                            <td><?php echo $row['destination']; ?></td>
											<td><?php echo $row['destination_code']; ?></td>
                                            
                                            
										   
											<td class="hidden-480"><?php echo $row['add_date']; ?></td>
											<td class="center hidden-480">
											<?php 
											if($row['add_by']=='0'){ echo 'Admin'; }else{ echo getvalue("user_name","tbl_users","where user_id='".$row['add_by']."'"); } 
											?>
											</td>
                                            <td>
											<a href="<?php echo  $self;?>&page_id=<?php echo $page_id; ?>&id=<?php echo $row['id']; ?>&val=<?php echo $row['status']; ?>&action=status"><img title="<?php echo  $row['status'];?>" src="assets/img/<?php  echo  $row['status'];?>.jpg" width="16" country="16" border="0" /></a>
											
                                            </td>
											<td >
												<a href="<?php echo  $self;?>&action=edit&page_id=<?php echo $page_id; ?>&id=<?php echo $row['id']; ?>"><img src="assets/img/pencil.jpg"/></a>
												&nbsp; 
												<a href="<?php echo  $self;?>&action=del&page_id=<?php echo $row['page_id']; ?>&id=<?php echo $row['id']; ?>"><img src="assets/img/cross.jpg"/></a>
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