<?php
$button='button_add';
$button_title = 'Submit';   
$self = 'index.php?page=Manage_vacations';
$action="Add";
$page_id    ='';
$short_code ='';
 $page_name  ='';
 $page_title  ='';
 $page_display_name  ='';
 $paratitle ='';
 $paracontent ='';
 $content_img ='';
 
$page_description  ='';
 $page_keyword  ='';
 $author  ='';
 $robots ='';
 $og_type ='';
 $og_title  ='';
 $og_description  ='';
 $og_url  ='';
 $og_image ='';

$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=Manage_vacations&day=today'; 
$current_date=date('Y-m-d');    
$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";
}

else if($day=='yesterday')
{
echo $day;
$self='index.php?page=Manage_vacations&day=yesterday';     

$current_date=date('Y-m-d',strtotime("-1 days"));   

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=Manage_vacations&day=month';     

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


    if($stat==6)
    {
        $msg_lte = "Short Code Already Exists!";
        $type = "warning";
        $font_style = 'fa-check';
    }
}

if(isset($_POST['button_add']) && ($_POST['button_add']!=''))
{
if((isset($_REQUEST['page_name']) && $_REQUEST['page_name']!=''))
{
       
$short_code=$_POST['short_code'];
$page_type_id=$_POST['page_type_id'];
$tot_comp = totalrows($conn,"tb_pages","WHERE  short_code ='".$short_code."' and delete_status='False' and page_type_id='".$page_type_id."'");






               if($tot_comp > 0)
                {
               $button='button_add';
               $stat = '6';
                    if(isset($stat))
                    {
        echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
                    }
               }
               else
               {

if($_FILES['og_image']['name']!='')
{
$og_image=rand(111,999).$_FILES['og_image']['name'];    
$og_image='seo_og_image/'.$og_image;
move_uploaded_file($_FILES['og_image']['tmp_name'],$og_image);      
}

$add_date=date("Y-m-d H:i:s");
$data=array(
           'short_code' => $_POST['short_code'],
           'page_type_id' => $_POST['page_type_id'],
           'page_name' => $_POST['page_name'],
           'page_title' => $_POST['page_title'],
           'page_display_name' => $_POST['page_display_name'],

           'page_description' => $_POST['page_description'],
           'page_keyword' => $_POST['page_keyword'],
           'author' => $_POST['author'],
           'robots' => $_POST['robots'],
           'og_type' => $_POST['og_type'],
           'og_title' => $_POST['og_title'],
           'og_description' => $_POST['og_description'],
           'og_url' => $_POST['og_url'],
           'og_image' => $og_image,

           'status' => $_POST['status'],
           'add_by' => $_SESSION['user_id'],
           'add_date' => $add_date,
           'delete_status'=>'False'

);
insert($conn,'tb_pages',$data);
$page_id=mysqli_insert_id($conn);
$paratitle=$_POST['paratitle'];
$paracontent=$_POST['paracontent'];
foreach ($paratitle as $key => $value) 
{
    $pr_name=$paratitle[$key];
    $h_code=$paracontent[$key];
if($pr_name !='' && $h_code!='')
{ 
if($_FILES['content_img']['name'][$key]!='')
{
$content_img = rand(111,999546).$_FILES['content_img']['name'][$key] ;
		 $path = 'airline_image/'.$content_img;
		 move_uploaded_file($_FILES['content_img']['tmp_name'][$key],$path);
  
$data_pcode=array(
'page_id' =>$page_id,
'paratitle' => $pr_name,
'paracontent' => $h_code,
'content_img' => $path,
           'add_date' => $add_date,
		   'delete_status'=>'False'
);
}
insert($conn,'tb_vacations_content',$data_pcode);
}
}

            $caption = 'Save';
            $stat = '1';
      
      }
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
    $page_id=$_REQUEST['page_id'];
    $update_date=date("Y-m-d H:i:s");

                $page_type_id=$_POST['page_type_id'];
                $short_code=$_POST['short_code'];

$tot_comp = totalrows($conn,"tb_pages","WHERE  page_type_id='".$page_type_id."' and short_code ='".$short_code."' and delete_status='False' and page_id!='".$page_id."'");


                if($tot_comp > 0)
                {
               $button='button_add';
               $stat = '6';
                    if(isset($stat))
                    {
        echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>'; exit;
                    }
               }

$page_og_image=mysqli_fetch_assoc(mysqli_query($conn,"select og_image from tb_pages where page_id='$page_id'"));


$old_og_image=$page_og_image['og_image'];


if($_FILES['og_image']['name']!='')
{
$og_image=rand(111,999).$_FILES['og_image']['name'];    
$og_image='seo_og_image/'.$og_image;
move_uploaded_file($_FILES['og_image']['tmp_name'],$og_image);      
}
else
{
$og_image=$old_og_image;
}


                        $data=array(
                          'short_code' => $_POST['short_code'],
                           'destinations_type' => $_POST['destinations_type'],  
                        'page_name' =>  $_POST['page_name'],
                        'page_title' =>  $_POST['page_title'],
                        'page_display_name' =>  $_POST['page_display_name'],  
                        
                        'page_description' => $_POST['page_description'],
                           'page_keyword' => $_POST['page_keyword'],
                           'author' => $_POST['author'],
                           'robots' => $_POST['robots'],
                           'og_type' => $_POST['og_type'],
                           'og_title' => $_POST['og_title'],
                           'og_description' => $_POST['og_description'],
                           'og_url' => $_POST['og_url'],
                           'og_image' =>$og_image,


                        'status' => $_POST['status'],
                        'update_date'=>$update_date,
                        'update_by'=>$_SESSION['user_id']
                        );
    update($conn,"tb_pages",$data,"where page_id='$page_id'");
    $hscode_check=mysqli_query($conn,"select * from tb_vacations_content where page_id='$page_id'");
    $row_count_hs=mysqli_num_rows($hscode_check);
    
    if($row_count_hs>0)
{
$hscode_check=mysqli_fetch_assoc(mysqli_query($conn,"select GROUP_CONCAT(id SEPARATOR ',') as all_hscode from tb_vacations_content where page_id='$page_id'"));
$product_grp=$hscode_check['all_hscode'];
$arr_pr_hs=explode(",",$product_grp);
}

$paratitle=$_POST['paratitle'];
$paracontent=$_POST['paracontent'];
    
foreach ($paratitle as $key => $value) 
{
    $hs_id=$arr_pr_hs[$key];    
    $pr_name=$paratitle[$key];
    $h_code=$paracontent[$key];

    if($pr_name !='' && $h_code!='')
    {
	if($_FILES['content_img']['name'][$key]!='')
{
$content_img = rand(111,999546).$_FILES['content_img']['name'][$key] ;
		 $path = 'airline_image/'.$content_img;
		 move_uploaded_file($_FILES['content_img']['tmp_name'][$key],$path);	
		
    $data_pcode=array(
    'page_id' =>$page_id,
    'paratitle' => $pr_name,
    'paracontent' => $h_code,
    'content_img' => $path,
	                    
						'update_date'=>$update_date,
						'delete_status'=>'False'
    );
}
else

{
$data_pcode=array(
    'page_id' =>$page_id,
    'paratitle' => $pr_name,
    'paracontent' => $h_code,
	
                         
                        'update_date'=>$update_date,
                        'delete_status'=>'False'
    );

}

if($hs_id==0)
    insert($conn,'tb_vacations_content',$data_pcode);
else
    update($conn,'tb_vacations_content',$data_pcode,"where id='$hs_id'");
    
}

}
    
    $stat = '2';
    save_action_history($conn,"2",$page_id);

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
        $page_id = $_REQUEST['page_id'];
        $button = 'button_edit';
        $button_title = 'Update';
        $form_area = '';
        $manu = selectfetch($conn,"*","tb_pages","where page_id = '$page_id'");
        $page_id        =   $manu->page_id;
        $page_name      =   $manu->page_name;
        $page_title =   $manu->page_title; 
        $page_display_name  =   $manu->page_display_name;

        $short_code =   $manu->short_code; 
        $destinations_type  =   $manu->destinations_type;

        $page_description       =   $manu->page_description;
        $page_keyword   =   $manu->page_keyword; 
        $author =   $manu->author;
        $robots =   $manu->robots;
        $og_type        =   $manu->og_type;
        $og_title   =   $manu->og_title; 
        $og_description =   $manu->og_description;
        $og_url =   $manu->og_url;
        $og_image   =   $manu->og_image;

        $status =   $manu->status;
    }
/*********        DISPLAY VALUE WHEN WE EDIT ANY RECORD END      ****** **/

/*********        DELETE SINGLE START     ****** **/
    if($action=='del')
    {
        
         $page_id = $_REQUEST['page_id'];
        $delete_date=date("Y-m-d H:i:s");
        
        $tot_dist = 0;//totalrows($conn,"tbl_district","where district_state_id=$state_id");
        if($tot_dist <=0 )
        {
            $data_delete = array(   'delete_date' =>$delete_date,
                                    'delete_by' => $_SESSION['user_id'],
                                    'delete_status' => 'True');
                                    
                            
            update($conn,"tb_pages",$data_delete,"where page_id=".$page_id);
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
        $page_id = $_REQUEST['page_id'];
        $val = $_REQUEST['val'];
        $new_val = '';
        
        if($val == 'Enabled')
        {
            $new_val = 'Disabled';
                $data = array('status'=>$new_val,
                              'update_date'=>$update_date,
                              'update_by'=>$_SESSION['user_id']);
                update($conn,"tb_pages
",$data,"WHERE page_id ='".$page_id."'");
                save_action_history($conn,"2",$page_id);
                $stat='2';
            }
        if($val == 'Disabled')
        {
            $new_val = 'Enabled';
            $data = array('status'=>$new_val,
                              'update_date'=>$update_date,
                              'update_by'=>$_SESSION['user_id']);
                update($conn,"tb_pages
",$data,"WHERE page_id ='".$page_id."'");
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






    $sqll = mysqli_query($conn,"select * From tb_pages where page_id!='' and delete_status='False' $d_query and page_type_id='5' order by page_id desc");   
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
                            <label class="control-label">Page Type Name</label>
                            <div class="controls">
                          <select name="page_type_id" style="width:105%;" value="<?php echo $page_type_name; ?>" class="m-wrap">
                            
                        <?php  

                    
                        
                   $count=mysqli_query($conn,"select * from lk_tb_page_type where  page_type_id='5' ");
                   while ($rows=mysqli_fetch_array($count)) { 
  
  
                     ?>
                   <option value="<?php echo $rows['page_type_id'];?>"><?php echo $rows['page_type_name'];?></option>
                        <?php } ?>                      
                            
                            
                                                        
                            <select/>                               
                            </div>
                        </div>
                        </div>
                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">vacations display Page Name</label>
                            <div class="controls">
                                <input type="text" name="page_display_name" placeholder=" Page display Name"     style="width:203%;" value="<?php echo $page_display_name; ?>" class="m-wrap" />
                               
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="row-fluid">
                        
                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Page Name</label>
                            <div class="controls">
                                <input type="text" name="page_name" placeholder="Page  Name" onkeydown="javascript:stripspaces(this)"   style="width:100%;" value="<?php echo $page_name; ?>" class="m-wrap" />
                               
                            </div>
                        </div>
                        </div>

                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Page Title</label>
                            <div class="controls">
                                <input type="text" name="page_title" placeholder="Page  Title" style="width:100%;" value="<?php echo $page_title; ?>" class="m-wrap" />
                               
                            </div>
                        </div>
                        </div>
                         <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Page description</label>
                               <div class="controls">
                                  
                        <input type="text" name="page_description" placeholder="Page description"    style="width:100%;" value="<?php echo $page_description; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>

                        </div>



                        <div class="row-fluid">
                        <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Page Keyword</label>
                               <div class="controls">
                                  
                        <input type="text" name="page_keyword" placeholder="page_keyword"   style="width:100%;" value="<?php echo $page_keyword; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Author</label>
                               <div class="controls">
                                  
                        <input type="text" name="author" placeholder="author"   style="width:100%;" value="<?php echo $author; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>
                         <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Robots</label>
                               <div class="controls">
                                  
                        <input type="text" name="robots" placeholder="Robots"    style="width:100%;" value="<?php echo $robots; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>


                        </div>

                        <div class="row-fluid">
                        <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Og Type</label>
                               <div class="controls">
                                  
                        <input type="text" name="og_type" placeholder="og_type"   style="width:100%;" value="<?php echo $og_type; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Og Title</label>
                               <div class="controls">
                                  
                        <input type="text" name="og_title" placeholder="og_title"   style="width:100%;" value="<?php echo $og_title; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Og Description</label>
                               <div class="controls">
                                  
                        <input type="text" name="og_description" placeholder="og_description"    style="width:100%;" value="<?php echo $og_description; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>
                        </div>

<div class="row-fluid">

                         



                        <div class="span4">
                            <div class="control-group">
                               <label class="control-label">Og Url</label>
                               <div class="controls">
                                  
                        <input type="text" name="og_url" placeholder="og_url"   style="width:100%;" value="<?php echo $og_url; ?>" class="m-wrap" />
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
                               <label class="control-label">Sort Code</label>
                               <div class="controls">
                                  
                        <input type="text" name="short_code" placeholder="Sort Code" onkeydown="javascript:stripspaces(this)"   style="width:100%;" value="<?php echo $short_code; ?>" class="m-wrap" />
                               </div>
                            </div>
                        </div>

                        </div>
<br/>
                        
                    <div class="row-fluid">

                <div class="span12">
                <?php  if($_REQUEST['action']=='edit' && $_REQUEST['page_id']!='')
                        {
$sql_hscode=mysqli_query($conn,"select * from tb_vacations_content where page_id='".$_REQUEST['page_id']."'");
//$count=mysqli_num_rows($sql_hscode);
while($row_hs=mysqli_fetch_array($sql_hscode))
{  
$id='nic_edit_'.$row_hs['id'];
    ?>
<br>
<input type="text" name="paratitle[]" value="<?php echo $row_hs['paratitle']; ?>" class="add_inp" placeholder="paragraph Title" style="margin: -20px 6px 5px 0;width:32%;">

<button onclick="del_paragraph(this.value)"  value="<?=$row_hs['id'];?>"  style="    margin-bottom: 24px;">Delete</button>

<Textarea type="text" name="paracontent[]"  class="add_inp" placeholder="Paragraph content" style="margin: -2px 0 5px 0;width: 64.4%;"><?php echo $row_hs['paracontent']; ?></Textarea>
 
 <input type="file" name="content_img[]" class="add_inp" placeholder="content Image" >
<img src="<?=$row_hs['content_img'];?>" width="42" height="42"  alt="image">
 
 <script>
				  var a= new nicEditor({fullPanel : true}).panelInstance(<?=$id;?>);
</script>
 <? }

                        }
                  ?>
                 <div id="dynamicInput">
                  <br/><input type="text" name="paratitle[]" class="add_inp" placeholder="paragraph Title" style="margin: -20px 6px 5px 0;width:32%;">
                  <Textarea type="text" name="paracontent[]" class="add_inp" placeholder="Paragraph content" style="margin: -2px 0 5px 0;width: 64.4%;"></Textarea>
                 
				 <input type="file" name="content_img[]" class="add_inp" placeholder="content Image" style="margin: 22px 0 5px 0;">

				 <script>
				  var a= new nicEditor({fullPanel : true}).panelInstance('editor_1');
                  </script>
				 
                 </div>
                 <input type="button" class="btn btn-danger reg_btn" value="Add more" onClick="addInput('dynamicInput');">
                
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
                                <h4><i class="icon-globe"></i>Total Manage vacations  Details=<?=$tot_discount?></h4>
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
                                            
                                           
                                            <th>Page Name </th>
                                            <th>Page Title </th>
                                            <th>Short Code </th>
                                            <th>Display Name</th>
                                              <th>Images </th>
                                              <th>Display image</th>
                                           
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
                                            
                                          <td><?php echo $row['page_name']; ?></td>
                                        
                                         <td><?php echo $row['page_title']; ?></td>
                                           <td><?php echo $row['short_code']; ?></td>
                                        
                                            <td><?php echo $row['page_display_name']; ?></td>
                                          
                                            
                                            
                                              
<td class="text-center"><a href="<?=$admin_path;?>/index.php?page=manage_pages_image&page_id=<?php echo $row['page_id']; ?>" class="btn btn-outline-success">Add Image</a></td>
                                            
                                              
<td class="text-center"><a href="<?=$admin_path;?>/index.php?page=destination_airlines_img&page_id=<?php echo $row['page_id']; ?>" class="btn btn-outline-success">Add Image</a></td>	
<!-- 
                                            <td><img width="100px" height="100px" src="<?php //echo $row['airline_image']; ?>" alt="no image"></img></td> -->


                                           
                                            <td class="hidden-480"><?php echo $row['add_date']; ?></td>
                                            <td class="center hidden-480">
                                            <?php 
                                            if($row['add_by']=='0'){ echo 'Admin'; }else{ echo getvalue("user_name","tbl_users","where user_id='".$row['add_by']."'"); } 
                                            ?>
                                            </td>
                                            <td>
                                            <a href="<?php echo  $self;?>&page_id=<?php echo $row['page_id']; ?>&val=<?php echo $row['status']; ?>&action=status"><img title="<?php echo  $row['status'];?>" src="assets/img/<?php  echo  $row['status'];?>.jpg" width="16" country="16" border="0" /></a>
                                            
                                            </td>
                                            <td >
                                                <a href="<?php echo  $self;?>&action=edit&page_id=<?php echo $row['page_id']; ?>"><img src="assets/img/pencil.jpg"/></a>
                                                &nbsp; 
                                                <a href="<?php echo  $self;?>&action=del&page_id=<?php echo $row['page_id']; ?>"><img src="assets/img/cross.jpg"/></a>
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
	
	function del_paragraph(val)
                {
                    var postData={para_id:val};
                jQuery.ajax({
            type: "POST",
            url: 'ajax/delete_vacations.php',
            data: postData,
            success: function (result) {
           }
                          });   

                }
	
	
 var counter = 1;
var limit = 10;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " input,textarea");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML =  "<br> <input type='text' name='paratitle[]' class='add_inp' placeholder='paragraph Title' style='margin: -20px 6px 5px 0;width: 32%;' /> <Textarea type='text' name='paracontent[]' placeholder='Paragraph Content' class='add_inp' large' style='margin: -2px 0 5px 0;width: 64.4%;' ></Textarea> <input type='file' name='content_img[]' class='add_inp' placeholder='select Image'> ";
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