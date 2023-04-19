<?php
$button='button_add';
$button_title = 'Submit';	
$self = 'index.php?page=manage_seo_content';
$action="Add"; 
$id	='';
$pages_id	='';
$page_title ='';
$page_description	='';
$page_keyword ='';
$author	='';

$robots ='';
$og_type='';
$og_title ='';
$og_description ='';
$canonical ='';
$og_url='';
$og_image ='';


$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=manage_sco_contant&day=today';	

$current_date=date('Y-m-d');	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='yesterday')

{
echo $day;
$self='index.php?page=manage_sco_contant&day=yesterday';		

$current_date=date('Y-m-d',strtotime("-1 days"));	

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=manage_sco_contant&day=month';		

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
	
if((isset($_REQUEST['pages_id']) && $_REQUEST['pages_id']!=''))
	{
		
if($_FILES['og_image']['name']!='')
{
$og_image = rand(111,999546).$_FILES['og_image']['name'];
$og_image = 'seo_og_image/'.$og_image;
move_uploaded_file($_FILES['og_image']['tmp_name'],$og_image);
}


			$add_date=date("Y-m-d H:i:s");
			$data=array(
			            
						'pages_id' =>  $_POST['pages_id'],
						'page_title' =>  $_POST['page_title'],
                        'page_description' =>  $_POST['page_description'],
						'page_keyword' =>  $_POST['page_keyword'],
                        'author' =>  $_POST['author'],
					    'robots' =>  $_POST['robots'],
						'og_type' =>  $_POST['og_type'],
						'og_title' =>  $_POST['og_title'],

						 'og_description' =>  $_POST['og_description'],
						 'canonical' =>  $_POST['canonical'],
						 'og_url' =>  $_POST['og_url'],
                         'og_image' => $og_image,
						
						'status' => $_POST['status'],
						'add_by' => $_SESSION['user_id'],
						'add_date' => $add_date,
						'delete_status'=>'False'
						);

			insert($conn,'tb_manage_sco_contant',$data);
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

	
		

$manu_docc = selectfetch($conn,"og_image","tb_manage_sco_contant","where id = '".$id."' ");
$old_airline_image = $manu_docc->og_image;
if($_FILES['og_image']['name']!='')
{

if($old_airline_image!=$_FILES['og_image']['name'])
						{
							if(file_exists($old_airline_image))
							{	
							unlink($old_airline_image);
							}
						}

$og_image = rand(111,999546).$_FILES['og_image']['name'];
$og_image = 'seo_og_image/'.$og_image;
move_uploaded_file($_FILES['og_image']['tmp_name'],$og_image);
}
else
{
$og_image=$old_airline_image;
}
	$update_date=date("Y-m-d H:i:s");
							

	                    $data=array(
			            'pages_id' =>  $_POST['pages_id'],
						'page_title' =>  $_POST['page_title'],
                        'page_description' =>  $_POST['page_description'],
						'page_keyword' =>  $_POST['page_keyword'],
                        'author' =>  $_POST['author'],
					    'robots' =>  $_POST['robots'],
						'og_type' =>  $_POST['og_type'],
						'og_title' =>  $_POST['og_title'],

						 'og_description' =>  $_POST['og_description'],
						 'canonical' =>  $_POST['canonical'],
						 'og_url' =>  $_POST['og_url'],
                         'og_image' => $og_image,
						
						'status' => $_POST['status'],
						'update_date'=>$update_date,
						'update_by'=>$_SESSION['user_id']
						);
	update($conn,"tb_manage_sco_contant",$data,"where id = '$id'");
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
		$manu = selectfetch($conn,"*","tb_manage_sco_contant","where id = '$id'");
	
		$id		=	$manu->id;
		$pages_id		=	$manu->pages_id;
		$page_title		=	$manu->page_title;
		$page_description		=	$manu->page_description;
		$page_keyword		=	$manu->page_keyword;
		$author		=	$manu->author;
        $robots		=	$manu->robots;
		$og_type		=	$manu->og_type;
		$og_title		=	$manu->og_title;
		$og_description		=	$manu->og_description;
		$canonical		=	$manu->canonical;
		$og_url		=	$manu->og_url;
	   $og_image		=	$manu->og_image;

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
									
				 			
			update($conn,"tb_manage_sco_contant",$data_delete,"where id=".$id);
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
				update($conn,"tb_manage_sco_contant
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
				update($conn,"tb_manage_sco_contant
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






	//$sqll = mysqli_query($conn,"select * From tb_manage_sco_contant where id!='' and delete_status='False' $d_query  order by id desc");	
	
	
	$sqll = mysqli_query($conn,"select a.* ,b.page_name	 from  tb_manage_sco_contant a  inner join tb_sco_pages b on a.pages_id=b.id where a.delete_status='False' $d_query  order by a.id asc");
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
                            <label class="control-label">Select Page</label>
                            <div class="controls">
                                <select class="m-wrap" name="pages_id" tabindex="1" required="required">
			                   <option value="">Select Page</option>
							  <?php $sco_pages=mysqli_query($conn,"select * from tb_sco_pages");

							  while($row_sco=mysqli_fetch_assoc($sco_pages))
							  { 
							  	?>
								 <option value="<?php echo $row_sco['id'];?>" <?php echo selected($row_sco['id'],$pages_id);?>><?php echo $row_sco['page_name'];?></option>
							<?php } ?>
				           </select>                               
                            </div>
                        </div>
						</div>
						
                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Page Title</label>
                            <div class="controls">
                                <input type="text" name="page_title" placeholder="Page Title" value="<?php echo $page_title; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
                         <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Page description</label>
                            <div class="controls">
                                <input type="text" name="page_description" placeholder="Page description" value="<?php echo $page_description; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
						
					</div>
				 <div class="row-fluid">
				 <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Page Keyword</label>
                            <div class="controls">
                                <input type="text" name="page_keyword" placeholder="page keyword" value="<?php echo $page_keyword; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
                         <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Author</label>
                            <div class="controls">
                                <input type="text" name="author" placeholder="Enter author" value="<?php echo $author; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
				 
				 
				 
				 <div class="span4">
                  <div class="control-group">
                 <label class="control-label">Robots</label>
                  <div class="controls">
                 <input type="text" name="robots" placeholder="Enter Robots"  value="<?php echo $robots; ?>" class="m-wrap width100" />
           
                     </div>
                     </div>
                     </div>
                        
					</div>
					
					<div class="row-fluid">
					 <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Og Type</label>
                            <div class="controls">
                                <input type="text" name="og_type" placeholder="Enter Og type" value="<?php echo $og_type; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
						
						<div class="span4">
                        <div class="control-group">
                            <label class="control-label">Og Title</label>
                            <div class="controls">
                                <input type="text" name="og_title" placeholder="Enter Og title" value="<?php echo $og_title; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>  
					   
					   
				 <div class="span4">
                  <div class="control-group">
                 <label class="control-label">Og Description</label>
                  <div class="controls">
                 <input type="text" name="og_description" placeholder="Enter og description"  value="<?php echo $og_description; ?>" class="m-wrap width100" />
           
                     </div>
                     </div>
                     </div>
                     
					 </div>
					
					
					 <div class="row-fluid">
                      <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Og Url</label>
                            <div class="controls">
                                <input type="text" name="og_url" placeholder="Enter Og url" value="<?php echo $og_url; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
						</div>
						<div class="span4">
                            <div class="control-group">
                               <label class="control-label">Og Image</label>
                               <div class="controls">
                                  
                        <input type="file" name="og_image" placeholder="og_image"   style="width:100%;"  class="m-wrap" />
                               </div>
                            </div>
                        </div>
						<div class="span4">
                        <div class="control-group">
                            <label class="control-label">Canonical link</label>
                            <div class="controls">
                                <input type="text" name="canonical" placeholder="Enter Canonical link" value="<?php echo $canonical; ?>" class="m-wrap width100" />
                               
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
								<h4><i class="icon-globe"></i>Total Manage Sco Content=<?php echo $tot_discount;?></h4>
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
											
											 <th>Page Name</th>
											 <th>Page Title </th>
											<th>Page description</th>
                                            <th>Page Keyword </th>
											<th>Author </th>
											<th>Robots</th>
											<!-- <th>Og Type</th>
											<th>Og Title</th>
											<th>Og Description</th> -->
											
	                                        <th>Og Image </th>
                                           
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
											<td><?php echo $row['page_name'];?></td>
											<td><?php echo $row['page_title']; ?></td>
                                            <td><?php echo $row['page_description']; ?></td>
                                            <td><?php echo $row['page_keyword']; ?></td>
                                            <td><?php echo $row['author']; ?></td>
											<td><?php echo $row['robots']; ?></td>
											
                                           <!--  <td><?php echo $row['og_type']; ?></td>
											<td><?php echo $row['og_title']; ?></td>
                                            <td><?php echo $row['og_description']; ?></td> -->
											 
											
                                            <td><img width="100px" height="100px" src="<?php echo $row['og_image'];?>" alt="no image"></img></td>
                                           
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