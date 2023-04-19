<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_header_script';
$action="Add";
$id	='';
 $tag_manager  ='';
 $google_analytics  ='';
 $google_webmaster  ='';
 $meta_tag  ='';
 $schema_tag  ='';
 $hreflang  ='';
 $canonical  ='';
 $other1  ='';
 $other2  ='';
 $other3  ='';
 $other4  ='';
 $other5  ='';

$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=manage_header_script&day=today';	

$current_date=date('Y-m-d');	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='yesterday')

{
echo $day;
$self='index.php?page=manage_header_script&day=yesterday';		

$current_date=date('Y-m-d',strtotime("-1 days"));	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=manage_header_script&day=month';		

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
if((isset($_REQUEST['tag_manager']) && $_REQUEST['tag_manager']!=''))
{

$add_date=date("Y-m-d H:i:s");
$data=array(
           

                        'tag_manager' =>  base64_encode($_POST['tag_manager']),
						'google_analytics' =>  base64_encode($_POST['google_analytics']),
						'google_webmaster' =>  base64_encode($_POST['google_webmaster']),
						'meta_tag' =>  base64_encode($_POST['meta_tag']),
						'schema_tag' =>  base64_encode($_POST['schema_tag']),
						'hreflang' =>  base64_encode($_POST['hreflang']),
						'canonical' =>  base64_encode($_POST['canonical']),
						'other1' =>  base64_encode($_POST['other1']),
						'other2' =>  base64_encode($_POST['other2']),
						'other3' =>  base64_encode($_POST['other3']),
                        'other4' =>  base64_encode($_POST['other4']),
                        'other5' =>  base64_encode($_POST['other5']),

           'status' => $_POST['status'],
           'add_by' => $_SESSION['user_id'],
		   'add_date' => $add_date,
		   'delete_status'=>'False'

);
insert($conn,'tb_header_script',$data);
$page_id=mysqli_insert_id($conn);
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

	
		{

$manu_docc = selectfetch($conn,"tag_manager","tb_header_script","where id = '".$id."' ");



	$update_date=date("Y-m-d H:i:s");
							
	$data=array(
			
                        'tag_manager' =>  base64_encode($_POST['tag_manager']),
						'google_analytics' =>  base64_encode($_POST['google_analytics']),
						'google_webmaster' =>  base64_encode($_POST['google_webmaster']),
						'meta_tag' =>  base64_encode($_POST['meta_tag']),
						'schema_tag' =>  base64_encode($_POST['schema_tag']),
						'hreflang' =>  base64_encode($_POST['hreflang']),
						'canonical' =>  base64_encode($_POST['canonical']),
						'other1' =>  base64_encode($_POST['other1']),
						'other2' =>  base64_encode($_POST['other2']),
						'other3' =>  base64_encode($_POST['other3']),
                        'other4' =>  base64_encode($_POST['other4']),
                        'other5' =>  base64_encode($_POST['other5']),

						
					    'status' => $_POST['status'],
						'update_date'=>$update_date,
						'update_by'=>$_SESSION['user_id']
						);
	update($conn,"tb_header_script",$data,"where id = '$id'");
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
		$manu = selectfetch($conn,"*","tb_header_script","where id = '$id'");
		$id		=	$manu->id;
		$tag_manager		=	$manu->tag_manager;
		$google_analytics	=	$manu->google_analytics; 
		$google_webmaster	=	$manu->google_webmaster;

        $meta_tag		=	$manu->meta_tag;
		$schema_tag	=	$manu->schema_tag; 
		$hreflang	=	$manu->hreflang;

       $canonical		=	$manu->canonical;
		$other1	=	$manu->other1; 
		$other2	=	$manu->other2;

       $other3		=	$manu->other3;
		$other4	=	$manu->other4; 
		$other5	=	$manu->other5;

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
									
				 			
			update($conn,"tb_header_script",$data_delete,"where id=".$id);
			$stat="4";
			save_action_history($conn,"3",$page_id);
			
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
				update($conn,"tb_header_script
",$data,"WHERE id ='".$id."'");
				save_action_history($conn,"2",$page_id);
				$stat='2';
			}
		if($val == 'Disabled')
		{
			$new_val = 'Enabled';
			$data = array('status'=>$new_val,
							  'update_date'=>$update_date,
							  'update_by'=>$_SESSION['user_id']);
				update($conn,"tb_header_script
",$data,"WHERE id ='".$id."'");
				save_action_history($conn,"2",$page_id);
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






	$sqll = mysqli_query($conn,"select * From tb_header_script where delete_status='False'  order by id desc");	
	//$tot_discount = mysqli_num_rows($sqll);
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
						
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Tag Manager</label>
                            <div class="controls">
                                    
                          <textarea type="text" name="tag_manager" placeholder=" Tag Manager"     style="width:100%;"  class="m-wrap" /><?php echo base64_decode($tag_manager); ?></textarea>

                            </div>
                        </div>
						</div>
						<div class="span6">
                        <div class="control-group">
                        <label class="control-label">Google Analytics</label>
                        <div class="controls">
                        <textarea type="text" name="google_analytics" placeholder=" Google Analytics"  style="width:100%;"  class="m-wrap" /><?php echo base64_decode($google_analytics); ?></textarea>
                               
                            </div>
                        </div>
						</div>
						</div>
						
						<div class="row-fluid">
						
						<div class="span6">
                        <div class="control-group">
                        <label class="control-label">Google Webmaster</label>
                        <div class="controls">
                                    
                        <textarea type="text" name="google_webmaster" placeholder="Google Webmaster" style="width:100%;" class="m-wrap" /><?php  echo base64_decode($google_webmaster); ?></textarea>

                            </div>
                        </div>
						</div>
						<div class="span6">
                        <div class="control-group">
                         <label class="control-label">Meta Tag</label>
                         <div class="controls">
                         <textarea type="text" name="meta_tag" placeholder=" Meta Tag" style="width:100%;" class="m-wrap" /><?php echo base64_decode($meta_tag); ?></textarea>
                               
                            </div>
                        </div>
						</div>
						</div>
						
						<div class="row-fluid">
						
						<div class="span6">
                        <div class="control-group">
                        <label class="control-label">Schema</label>
                        <div class="controls">
                                    
                        <textarea type="text" name="schema_tag" placeholder=" Schema"  style="width:100%;"  class="m-wrap" /><?php echo base64_decode($schema_tag); ?></textarea>

                            </div>
                        </div>
						</div>

						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Hreflang</label>
                            <div class="controls">
                        <textarea type="text" name="hreflang" placeholder=" Hreflang"  style="width:100%;" class="m-wrap" /><?php echo base64_decode($hreflang); ?></textarea>
                               
                            </div>
                        </div>
						</div>
						</div>
						<div class="row-fluid">
						
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Canonical</label>
                            <div class="controls">
                                    
                        <textarea type="text" name="canonical" placeholder="Canonical" style="width:100%;"  class="m-wrap" /><?php echo base64_decode($canonical); ?></textarea>

                            </div>
                        </div>
						</div>
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Other 1</label>
                            <div class="controls">
                         <textarea type="text" name="other1" placeholder=" Other 1"   style="width:100%;" class="m-wrap" /><?php echo base64_decode($other1); ?></textarea>
                               
                            </div>
                        </div>
						</div>
						</div>
						
                       <div class="row-fluid">
						
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Other 2</label>
                            <div class="controls">
                                    
                        <textarea type="text" name="other2" placeholder="Other 2"  style="width:100%;"  class="m-wrap" /><?php echo base64_decode($other2);?></textarea>

                            </div>
                        </div>
						</div>
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Other 3</label>
                            <div class="controls">
                        <textarea type="text" name="other3" placeholder=" Other 3" style="width:100%;" class="m-wrap" /><?php echo base64_decode($other3); ?></textarea>
                               
                            </div>
                        </div>
						</div>
						</div>

                       <div class="row-fluid">
						
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Other 4</label>
                            <div class="controls">
                                    
                        <textarea type="text" name="other4" placeholder="Other 4" style="width:100%;" class="m-wrap" /><?php echo base64_decode($other4); ?></textarea>

                            </div>
                        </div>
						</div>
						<div class="span6">
                        <div class="control-group">
                            <label class="control-label">Other 5</label>
                            <div class="controls">
                        <textarea type="text" name="other5" placeholder="Other 5" style="width:100%;" class="m-wrap" /><?php echo base64_decode($other5); ?></textarea>
                               
                            </div>
                        </div>
						</div>
						</div>

					
						<div class="row-fluid">
						<div class="span4">
							<div class="control-group">
							   <label class="control-label">Status</label>
							   <div class="controls">
								  <select class="m-wrap" name="status" tabindex="1" style="width: 100%;">
									 <option value="Enabled" <?php echo selected($status,"Enabled");?>>Enabled</option>
									 <option value="Disabled" <?php echo selected($status,"Disabled");?>>Disabled</option>
								  </select>
							   </div>
							</div>
						</div>
						</div>
						
						<br/>
						
						
						
						
						
						
						
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
								<h4><i class="icon-globe"></i>Total Manage Header Script=<?php echo $tot_discount;?></h4>
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
											
                                           
											<th>Tag Manager </th>
	                                        <th>Google Analytics </th>
										    <th>Google Webmaster</th>
											 <th>Meta Tag </th>
	                                        <th>Schema Tag </th>
										    <th>Hreflang</th>
										    <th>Canonical</th>
										   
                                           
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
											<td><input type="checkbox" class="checkboxes" value="<?php echo $row['id'];?>" /></td>
											
										  <td><textarea readonly="readonly"><?php echo base64_decode($row['tag_manager']); ?></textarea></td>
										
										 <td><textarea readonly="readonly"><?php echo base64_decode($row['google_analytics']); ?></textarea></td>
										
										<td><textarea readonly="readonly"><?php echo base64_decode($row['google_webmaster']); ?></textarea></td>
                                          
                                        <td><?php echo $row['meta_tag']; ?></td>
										
										 <td><?php echo $row['schema_tag']; ?></td>
										
										<td><?php echo $row['hreflang']; ?></td>

                                        <td><?php echo $row['canonical']; ?></td>

                                            <!--                                     
                                            <td><img width="100px" height="100px" src="<?php //echo $row['airline_image']; ?>" alt="no image"></img></td> -->


                                           
											<td class="hidden-480"><?php echo $row['add_date']; ?></td>
											<td class="center hidden-480">
											<?php 
											if($row['add_by']=='0'){ echo 'Admin'; }else{ echo getvalue("user_name","tbl_users","where id='".$row['add_by']."'"); } 
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
	
 	<script>
 var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " input,textarea");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML =  " <input type='text' name='paratitle[]' class='add_inp' placeholder='paragraph Title' style='margin: -20px 6px 5px 0;width: 32%;' /> <Textarea type='text' name='paracontent[]' placeholder='Paragraph Content' class='add_inp' large' style='margin: -2px 0 5px 0;width: 64.4%;' ></Textarea> ";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
 </script> 
 
 <script>
 
 function stripspaces(input)
{
  input.value = input.value.replace(/\s/gi,"");
  return true;
}
 </script>
  
	
</body>
<!-- END BODY -->
</html>