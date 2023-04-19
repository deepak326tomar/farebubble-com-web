<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_content_details';
$action="Add";
$id	='';

$name='';
$phone ='';
$e_mail	='';
$message ='';

$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=manage_content_details&day=today';	

$current_date=date('Y-m-d');	

$d_query="and DATE_FORMAT(a.add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='yesterday')

{
echo $day;
$self='index.php?page=manage_content_details&day=yesterday';		

$current_date=date('Y-m-d',strtotime("-1 days"));	

$d_query="and DATE_FORMAT(a.add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=manage_content_details&day=month';		

$current_date=date('m');	

$d_query="and DATE_FORMAT(a.add_date,'%m')='$current_date'";

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
		
if($_FILES['airline_image']['name']!='')
{
$airline_image = rand(111,999546).$_FILES['airline_image']['name'];
$airline_image = 'airline_image/'.$airline_image;
move_uploaded_file($_FILES['airline_image']['tmp_name'],$airline_image);
}

$name='';
$phone ='';
$e_mail	='';
$message ='';

			$add_date=date("Y-m-d H:i:s");

				$f_date=explode("-", $_POST['departure_date']);
						$departure_date=$f_date[2]."-".$f_date[1]."-".$f_date[0];
						$t_date=explode("-", $_POST['arrival_date']);
						$arrival_date=$t_date[2]."-".$t_date[1]."-".$t_date[0];



			$data=array(
						'airline_id' =>  $_POST['airline_id'],
						'origin' =>  $_POST['origin'],
						'destination' =>  $_POST['destination'],
						'departure_date' =>  $departure_date,
						'arrival_date' =>  $arrival_date,
						'departure_time' =>  $_POST['departure_time'],
						'arrival_time' =>  $_POST['arrival_time'],

						'time_of_flight' =>  $_POST['time_of_flight'],
						'price_in_usd' => $_POST['price_in_usd'],
						'number_of_stops' =>  $_POST['number_of_stops'],
						'reservation_class' => $_POST['reservation_class'],

						'status' => $_POST['status'],
						'add_by' => $_SESSION['user_id'],
						'add_date' => $add_date,
						'delete_status'=>'False'
						);

			insert($conn,'tb_content_details',$data);
			$booklet_id = mysqli_insert_id($conn);
			save_action_history($conn,"1",$booklet_id);
			$caption = 'Save';
				$stat = '1';
		
		
		if(isset($stat))
			{
//		echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
			}
		
		
	}
	
	
}

/*********        INSERT DATA  END    ****** **/

/*********        UPDATE DATA  START     ****** **/
if(isset($_POST['button_edit']) && ($_POST['button_edit']!=''))
{
	$id=$_REQUEST['id'];
	$update_date=date("Y-m-d H:i:s");

				$f_date=explode("-", $_POST['departure_date']);
						$departure_date=$f_date[2]."-".$f_date[1]."-".$f_date[0];
						$t_date=explode("-", $_POST['arrival_date']);
						$arrival_date=$t_date[2]."-".$t_date[1]."-".$t_date[0];

	$data=array(
						'airline_id' =>  $_POST['airline_id'],
						'origin' =>  $_POST['origin'],
						'destination' =>  $_POST['destination'],
						'departure_date' =>  $departure_date,
						'arrival_date' =>  $arrival_date,
						'departure_time' =>  $_POST['departure_time'],
						'arrival_time' =>  $_POST['arrival_time'],
			
						'time_of_flight' =>  $_POST['time_of_flight'],
						'price_in_usd' => $_POST['price_in_usd'],
						'number_of_stops' =>  $_POST['number_of_stops'],
						'reservation_class' => $_POST['reservation_class'],
			
						'status' => $_POST['status'],
						'update_date'=>$update_date,
						'update_by'=>$_SESSION['user_id']
						);
	update($conn,"tb_content_details",$data,"where id = '$id'");
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
		$manu = selectfetch($conn,"*","tb_content_details","where id = '$id'");
	
		$id		=	$manu->id;
		$origin		=	$manu->origin;
		$destination		=	$manu->destination;
		$departure_date		=	$manu->departure_date;

$f_date=explode("-", $departure_date);
						$departure_date=$f_date[2]."-".$f_date[1]."-".$f_date[0];


		
		$arrival_date		=	$manu->arrival_date;

$t_date=explode("-", $arrival_date);
						$arrival_date=$t_date[2]."-".$t_date[1]."-".$t_date[0];



		
		
		$departure_time		=	$manu->departure_time;
		$arrival_time		=	$manu->arrival_time;
		$time_of_flight		=	$manu->time_of_flight;
		$price_in_usd		=	$manu->price_in_usd;
		$number_of_stops		=	$manu->number_of_stops;
		$reservation_class		=	$manu->reservation_class;
$airline_id=	$manu->airline_id;
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
									
				 			
			update($conn,"t_flight_deals",$data_delete,"where id=".$id);
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
				update($conn,"tb_content_details
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
				update($conn,"tb_content_details
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





    $sqll = mysqli_query($conn,"select * From tb_content_details  order by id desc");	
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
				
				<br>

				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet box light-grey">
							<div class="portlet-title">
								<h4><i class="icon-globe"></i>Total Content Enquiries=<?=$tot_discount?></h4>
								<div class="tools">
									<!--<a href="javascript:;" class="collapse"></a>
									<a href="#portlet-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
									<a href="javascript:;" class="remove"></a>-->
								</div>
							</div>
							<div class="portlet-body">
                            
                             <?php if(!empty($msg_lte)){ echo msg_lte($msg_lte,$type,$font_style);} ?> 
								
								<table class="table table-striped table-bordered table-hover" id="sample_1">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
											<th>Name </th>
                                          
											<th>Phone </th>
											<th>E-mail </th>
											<th>add_date</th>
											<th>Message</th>
	                                    	
										</tr>
									</thead>
									<tbody>
									<?php
									while($row  = mysqli_fetch_assoc($sqll))
									{
									?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="<?=$row['id']?>" /></td>
											<td><?php echo $row['name']; ?> </td>
										
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
											<td><?php echo $row['add_date'];   ?> </td>
                                             <td><?php echo $row['message']; ?></td>
											
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