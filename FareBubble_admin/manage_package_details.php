<?php
$button='button_add';
$button_title = 'Submit';   
$self = 'index.php?page=manage_package_details';
$action="Add";
 $page_id    ='';
 $short_code ='';
 $package_type ='';
 $page_name  ='';
 $page_title  ='';
 $page_display_name  ='';
 $paratitle ='';
 $package_day ='';
 $Places_name1 ='';
 $Places_name2 ='';
 $Places_name3 ='';
 $Places_name4 ='';
 $Places_name5 ='';
 $paracontent ='';
 $page_description  ='';
 $page_keyword  ='';
 $author  ='';
 $robots ='';
 $og_type ='';
 $og_title  ='';
 $og_description  ='';
 $og_url  ='';
 $alt  ='';
 $og_image ='';
 $origin ='';
 $destination ='';
 $no_of_days ='';
 $no_of_night ='';
 $price_per_adult ='';
 $package_image ='';
 $coffee ='';
 $hotels ='';
 $meals ='';
 $Sightseeing ='';
 $transfers='';
 $flight='';
 $star1 ='';

$status ='';
$sqll = '';
$form_area = 'style="display:none;"';
$day=$_REQUEST['day'];

if($day=='today')
{
$self='index.php?page=manage_package_details&day=today'; 
$current_date=date('Y-m-d');    
$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";
}

else if($day=='yesterday')
{
echo $day;
$self='index.php?page=manage_package_details&day=yesterday';     

$current_date=date('Y-m-d',strtotime("-1 days"));   

$d_query="and DATE_FORMAT(add_date,'%Y-%m-%d')='$current_date'";

}

else if($day=='month')

{

$self='index.php?page=manage_package_details&day=month';     

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
$tot_comp =totalrows($conn,"tb_package_details","WHERE  short_code ='".$short_code."' and delete_status='False' and short_code!='' and page_type_id='".$page_type_id."'");

        //        if($tot_comp > 0)
        //         {
        //        $button='button_add';
        //        $stat = '6';
        //             if(isset($stat))
        //             {
        // echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>';
        //             }
        //        }
        //        else
               {

if($_FILES['og_image']['name']!='')
{
$og_image=rand(111,999).$_FILES['og_image']['name'];    
$og_image='../website-img/'.$og_image;
move_uploaded_file($_FILES['og_image']['tmp_name'],$og_image);      
}

if($_FILES['package_image']['name']!='')
{
$package_image = rand(111,999546).$_FILES['package_image']['name'];
$package_image = '../website-img/'.$package_image;
move_uploaded_file($_FILES['package_image']['tmp_name'],$package_image);
}
$add_date=date("Y-m-d H:i:s");
$data=array(
           'short_code' => $_POST['short_code'],
           'page_type_id' => $_POST['page_type_id'],
           'package_type' => $_POST['package_type'],
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
		   'alt'=>$_POST['alt'],
       'og_image' => $og_image,
           'origin' => $_POST['origin'],
       'destination' => $_POST['destination'],
       'no_of_days' => $_POST['no_of_days'],
       'no_of_night' => $_POST['no_of_night'],
       'price_per_adult' => $_POST['price_per_adult'],
       'package_image' => $package_image,
       
       'coffee' => $_POST['coffee'],
       'hotels  ' => $_POST['hotels'],
       'meals ' => $_POST['meals'],
       'Sightseeing ' => $_POST['Sightseeing'],
       'transfers ' => $_POST['transfers'],
           'flight  ' => $_POST['flight'],
       'star1' =>  $_POST['star1'],
      
       'status' => $_POST['status'],

           'add_by' => $_SESSION['user_id'],
           'add_date' => $add_date,
           'delete_status'=>'False'

);
 $page_id = insert($conn,'tb_package_details',$data);
 //echo $id;exit;
$page_id=mysqli_insert_id($conn);
$paratitle=$_POST['paratitle'];
$package_day=$_POST['package_day'];
$Places_name1=$_POST['Places_name1'];
$Places_name2=$_POST['Places_name2'];
$Places_name3=$_POST['Places_name3'];
$Places_name4=$_POST['Places_name4'];
$Places_name5=$_POST['Places_name5'];
$paracontent=$_POST['paracontent'];
//print_r($paracontent);exit;
foreach ($paratitle as $key => $value) 
{
    $pr_name=$paratitle[$key];
  $p_code=$package_day[$key];
  $pa_code=$Places_name1[$key];
  $pb_code=$Places_name2[$key];
  $pc_code=$Places_name3[$key];
  $pd_code=$Places_name4[$key];
  $pe_code=$Places_name5[$key];
  $h_code=$paracontent[$key];
if($pr_name !='' && $h_code!='' )
{   
$data_pcode=array(
'page_id' =>$page_id,
'paratitle' => $pr_name,
'package_day' => $p_code,
'Places_name1' => $pa_code,
'Places_name2' => $pb_code,
'Places_name3' => $pc_code,
'Places_name4' => $pd_code,
'Places_name5' => $pe_code,
'paracontent' => $h_code,
            'status' => $_POST['status'],
           'add_by' => $_SESSION['user_id'],
           'add_date' => $add_date,
           'delete_status'=>'False'
);
insert($conn,'tb_package_content',$data_pcode);
}
}


//

$inclusions=$_POST['inclusions'];

foreach ($inclusions as $key => $value) 
{
  $b_name=$inclusions[$key];
  
if($b_name !='')
{ 
$data_pcodes=array(
'page_id' =>$page_id,
'inclusions' => $b_name,

            'status' => $_POST['status'],
           'add_by' => $_SESSION['user_id'],
       'add_date' => $add_date,
       'delete_status'=>'False'
);
insert($conn,'tb_inclusions',$data_pcodes);
}
}


//

//

$exclusions =$_POST['exclusions'];

foreach ($exclusions as $key => $value) 
{
  $b_names=$exclusions[$key];
  
if($b_names !='')
{ 
$data_pcoder=array(
'page_id' =>$page_id,
'exclusions ' => $b_names,

            'status' => $_POST['status'],
           'add_by' => $_SESSION['user_id'],
       'add_date' => $add_date,
       'delete_status'=>'False'
);
insert($conn,'tb_exclusions',$data_pcoder);
}
}


//
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

$tot_comp = totalrows($conn,"tb_package_details","WHERE  page_type_id='".$page_type_id."' and short_code ='".$short_code."' and short_code!='' and delete_status='False' and page_id!='".$page_id."'");


        //         if($tot_comp > 0)
        //         {
        //        $button='button_add';
        //        $stat = '6';
        //             if(isset($stat))
        //             {
        // echo '<script type="text/javascript">window.location="'.$self.'&stat='.$stat.'";</script>'; exit;
        //             }
        //        }
               
// update og image section start here
$page_og_image=mysqli_fetch_assoc(mysqli_query($conn,"select og_image from tb_package_details where page_id='$page_id'"));
$old_og_image=$page_og_image['og_image'];
// echo $old_og_image ;
// exit();

            if($_FILES['og_image']['name']!='')
            {
                unlink('../website-img/'.$old_og_image);
                $og_image=rand(111,999).$_FILES['og_image']['name']; 
                move_uploaded_file($_FILES['og_image']['tmp_name'],'../website-img/'.$og_image);     
            }
            else
            {
            $og_image=$old_og_image;
            }

// update og image section End here

// update package image section start here

$page_package_image=mysqli_fetch_assoc(mysqli_query($conn,"select package_image from tb_package_details where page_id='$page_id'"));
$old_package_image=$page_package_image['package_image'];



      if($_FILES['package_image']['name']!='')
      {
        unlink('../website-img/'.$old_package_image);             
        $package_image=rand(111,999546).$_FILES['package_image']['name'];        
        move_uploaded_file($_FILES['package_image']['tmp_name'],'../website-img/'.$package_image);
      }           
      else
      {
        $package_image=$old_package_image;
      }
// update package image section End here

                        $data=array(
                          'short_code' => $_POST['short_code'],
                          'package_type' => $_POST['package_type'],  
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
						   'alt ' =>  $_POST['alt'],
               'og_image' =>$og_image,
                            
              'origin' => $_POST['origin'],
                      'destination' => $_POST['destination'],
                      'no_of_days' => $_POST['no_of_days'],
                      'no_of_night' => $_POST['no_of_night'],
                      'price_per_adult' => $_POST['price_per_adult'],
              'package_image' => $package_image,
                        'coffee' => $_POST['coffee'],
                      'hotels' => $_POST['hotels'],
                      'meals' => $_POST['meals'],
                      'Sightseeing' => $_POST['Sightseeing'],
                      'transfers' => $_POST['transfers'],
                        'flight' => $_POST['flight'],
              'star1' =>  $_POST['star1'],
              
                        'status' => $_POST['status'],
                        'update_date'=>$update_date,
                        'update_by'=>$_SESSION['user_id']
                        );
    update($conn,"tb_package_details",$data,"where page_id='$page_id'");
    $hscode_check=mysqli_query($conn,"select * from tb_package_content where page_id='$page_id'");
    $row_count_hs=mysqli_num_rows($hscode_check);
    
if($row_count_hs>0)
{
$hscode_check=mysqli_fetch_assoc(mysqli_query($conn,"select GROUP_CONCAT(id SEPARATOR ',') as all_hscode from tb_package_content where page_id='$page_id'"));
$product_grp=$hscode_check['all_hscode'];
$arr_pr_hs=explode(",",$product_grp);
}

$paratitle=$_POST['paratitle']; 
$package_day=$_POST['package_day']; 
$Places_name1=$_POST['Places_name1'];
$Places_name2=$_POST['Places_name2'];
$Places_name3=$_POST['Places_name3'];
$Places_name4=$_POST['Places_name4'];
$Places_name5=$_POST['Places_name5'];
$paracontent=$_POST['paracontent'];
    
foreach ($paratitle as $key => $value) 
{
    $hss_id=$arr_pr_hs[$key];
    $pr_name=$paratitle[$key];
  $p_code=$package_day[$key];
  $pa_code=$Places_name1[$key];
  $pb_code=$Places_name2[$key];
  $pc_code=$Places_name3[$key];
  $pd_code=$Places_name4[$key];
  $pe_code=$Places_name5[$key];
    $h_code=$paracontent[$key];
    if($pr_name !='' && $h_code!='' )
    {
        if($hss_id>0)
        {   
        $data_pcode=array(
            'page_id' =>$page_id,
            'paratitle' => $pr_name,
      'package_day' => $p_code,
            'Places_name1' => $pa_code,
      'Places_name2' => $pb_code,
      'Places_name3' => $pc_code,
      'Places_name4' => $pd_code,
      'Places_name5' => $pe_code,
            'paracontent' => $h_code,
            'delete_status'=>'False',
                                 'status' => $_POST['status'],
                                'update_date'=>$update_date,
                                'update_by'=>$_SESSION['user_id']
            );
        update($conn,'tb_package_content',$data_pcode,"where id='$hss_id'");
        }
        else
        {
        $data_pcode=array(
            'page_id' =>$page_id,
            'paratitle' => $pr_name,
      'package_day' => $p_code,
      'Places_name1' => $pa_code,
      'Places_name2' => $pb_code,
      'Places_name3' => $pc_code,
      'Places_name4' => $pd_code,
      'Places_name5' => $pe_code,
            'paracontent' => $h_code,
            'delete_status'=>'False',
                                 'status' => $_POST['status'],
                                'add_date'=>$update_date,
                                'update_by'=>$_SESSION['user_id']
            );
        insert($conn,'tb_package_content',$data_pcode);    
        }
    }

    

}

//inclusions
$hscode_checks=mysqli_query($conn,"select * from tb_inclusions where page_id='$page_id'");
    $row_count_hss=mysqli_num_rows($hscode_checks);

if($row_count_hss>0)
{

$hscode=mysqli_fetch_assoc(mysqli_query($conn,"select GROUP_CONCAT(id SEPARATOR ',') as inclusions from tb_inclusions where page_id='$page_id'"));
$product=$hscode['inclusions'];
$bests=explode(",",$product);
}
 $inclusions=$_POST['inclusions'];

foreach ($inclusions as $key => $value) 
{
$hs_ids=$bests[$key];
  $b_name=$inclusions[$key];
  

  if($b_name !='')
  {
    if($hs_ids>0)
    { 
    $data_pcodes=array(
      'page_id' =>$page_id,
      'inclusions' => $b_name,
      'delete_status'=>'False',
                           'status' => $_POST['status'],
                'update_date'=>$update_date,
                'update_by'=>$_SESSION['user_id']
      );
    update($conn,'tb_inclusions',$data_pcodes,"where id='$hs_ids'");
    }
    else
    {
    $data_pcodes=array(
      'page_id' =>$page_id,
      'inclusions' => $b_name,
      
      'delete_status'=>'False',
                           'status' => $_POST['status'],
                'add_date'=>$update_date,
                'update_by'=>$_SESSION['user_id']
      );
    insert($conn,'tb_inclusions',$data_pcodes); 
    }
  }

}



//
//exclusions
$hscode_checkss=mysqli_query($conn,"select * from tb_exclusions where page_id='$page_id'");
    $row_count_hsss=mysqli_num_rows($hscode_checkss);

if($row_count_hsss>0)
{

$hscodes=mysqli_fetch_assoc(mysqli_query($conn,"select GROUP_CONCAT(id SEPARATOR ',') as exclusions from tb_exclusions where page_id='$page_id'"));
$products=$hscodes['exclusions'];
$bestss=explode(",",$products);
}
 $exclusions=$_POST['exclusions'];

foreach ($exclusions as $key => $value) 
{
$hs_idss=$bestss[$key];
  $b_names=$exclusions[$key];
  

  if($b_names !='')
  {
    if($hs_idss>0)
    { 
    $data_pcodess=array(
      'page_id' =>$page_id,
      'exclusions' => $b_names,
      'delete_status'=>'False',
                           'status' => $_POST['status'],
                'update_date'=>$update_date,
                'update_by'=>$_SESSION['user_id']
      );
    update($conn,'tb_exclusions',$data_pcodess,"where id='$hs_idss'");
    }
    else
    {
    $data_pcodess=array(
      'page_id' =>$page_id,
      'exclusions' => $b_names,
      
      'delete_status'=>'False',
                           'status' => $_POST['status'],
                'add_date'=>$update_date,
                'update_by'=>$_SESSION['user_id']
      );
    insert($conn,'tb_exclusions',$data_pcodess);  
    }
  }

}



//


    $stat = '2';
    // save_action_history($conn,"2",$page_id);

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
        $manu = selectfetch($conn,"*","tb_package_details","where page_id = '$page_id'");
        $page_id        =   $manu->page_id;
        $page_name      =   $manu->page_name;
        $page_title =   $manu->page_title; 
        $page_display_name  =   $manu->page_display_name;

        $short_code =   $manu->short_code; 
        $package_type  =   $manu->package_type;

        $page_description       =   $manu->page_description;
        $page_keyword   =   $manu->page_keyword; 
        $author =   $manu->author;
        $robots =   $manu->robots;
        $og_type        =   $manu->og_type;
        $og_title   =   $manu->og_title; 
        $og_description =   $manu->og_description;
        $og_url =   $manu->og_url;
		$alt        = $manu->alt;
    $og_image   =   $manu->og_image;

    $origin        =   $manu->origin;
    $destination        =   $manu->destination;
    $no_of_days        =   $manu->no_of_days;
    $no_of_night        =   $manu->no_of_night;
    $price_per_adult        =   $manu->price_per_adult;  
        $package_image    = $manu->package_image;   
        $coffee        =   $manu->coffee;
        $hotels   =   $manu->hotels; 
        $meals =   $manu->meals;
        $Sightseeing =   $manu->Sightseeing;
        $transfers   =   $manu->transfers;
        $flight   =   $manu->flight;
         $star1   = $manu->star1;
    

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
                                    
                            
            update($conn,"tb_package_details",$data_delete,"where page_id=".$page_id);
            $stat="4";
            // save_action_history($conn,"3",$page_id);
            
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
                update($conn,"tb_package_details
",$data,"WHERE page_id ='".$page_id."'");
                // save_action_history($conn,"2",$page_id);
                $stat='2';
            }
        if($val == 'Disabled')
        {
            $new_val = 'Enabled';
            $data = array('status'=>$new_val,
                              'update_date'=>$update_date,
                              'update_by'=>$_SESSION['user_id']);
                update($conn,"tb_package_details
",$data,"WHERE page_id ='".$page_id."'");
                // save_action_history($conn,"2",$page_id);
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






    $sqll = mysqli_query($conn,"select * From tb_package_details where page_id!='' and delete_status='False' $d_query and page_type_id='5' order by page_id desc");   
    $tot_discount = mysqli_num_rows($sqll);
   //$row = mysqli_num_rows($sqll);
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
                            <label class="control-label">Package Type</label>
                            <div class="controls">
                                <input type="text" name="package_type" placeholder="package  type" onkeydown="javascript:stripspaces(this)"   style="width:100%;" value="<?php echo $package_type;?>" class="m-wrap" />
                               
                            </div>
                        </div>
                        </div>
            
            
            
                        <div class="span4">
                        <div class="control-group">
                            <label class="control-label">Explore Destination display Page Name</label>
                            <div class="controls">
                                <input type="text" name="page_display_name" placeholder=" Page display Name" style="width:105%;" value="<?php echo $page_display_name; ?>" class="m-wrap" />
                               
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
                            <label class="control-label">Select Og Image</label>
                                                    
                              <div class="controls">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                       <img src="<?php if($og_image!=''){ echo '../website-img/'.$og_image; } else { echo 'no_image.png'; }?>" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select Og Image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="og_image" class="default" /></span>
                                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                           
                                    </div>
                                 </div>                            
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
						<div class="row-fluid">
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
           
                
            <div class="span3">
                        <div class="control-group">
                            <label class="control-label">From</label>
                            <div class="controls">
                                <input type="text" name="origin" placeholder="Enter From" value="<?php echo $origin; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
            </div>
              <div class="span3">
                  <div class="control-group">
                 <label class="control-label">To</label>
                  <div class="controls">
                 <input type="text" name="destination" placeholder="Enter TO"  value="<?php echo $destination; ?>" class="m-wrap width100" />
           
                     </div>
                     </div>
                     </div>
              
            
                        <div class="span2">
                        <div class="control-group">
                            <label class="control-label">Number of Days</label>
                            <div class="controls">
                                <input type="text" name="no_of_days" placeholder="Enter number of days" value="<?php echo $no_of_days; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
                            <label class="control-label">Number of Night</label>
                            <div class="controls">
                                <input type="text" name="no_of_night" placeholder="Enter Number of Night" value="<?php echo $no_of_night; ?>" class="m-wrap width100" />
                               
                            </div>
                        </div>
            </div>

             <div class="span2">
                  <div class="control-group">
                 <label class="control-label">Price per adult</label>
                  <div class="controls">
                 <input type="text" name="price_per_adult" placeholder="Price per adult"  value="<?php echo $price_per_adult; ?>" class="m-wrap width100" />
                     </div>
                     </div>
                     </div>

                   </div>
          <div class="row-fluid">
            
            <div class="span2">
                        <div class="control-group">
          <i class="fa fa-coffee"></i>

                            <label class="control-label"> Coffee </label>
                            <div class="controls">
          
                                <input type="checkbox" name="coffee" value="coffee" <?php if($coffee=="coffee"){echo "checked";}?> class="m-wrap width100" />
                               
               
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            <i class="fa fa-bed"></i>
                            <label class="control-label">  Hotels </label>
                            <div class="controls">
          
              
                                <input type="checkbox" name="hotels" value="hotels" <?php if($hotels=="hotels"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            <i class="fa fa-cutlery"></i>
                            <label class="control-label">   Meals  </label>
                            <div class="controls">
          
              
                                <input type="checkbox" name="meals" value="meals" <?php if($meals=="meals"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            <i class="fa fa-shower"></i>
                            <label class="control-label"> Sightseeing  </label>
                            <div class="controls">
          
              
                                <input type="checkbox" name="Sightseeing" value="Sightseeing" <?php if($Sightseeing=="Sightseeing"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            <i class="fa fa-cab"></i>
            
                            <label class="control-label"> Transfers </label>
                            <div class="controls">
          
              
                                <input type="checkbox" name="transfers" value="transfers" <?php if($transfers=="transfers"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            <i class="fa fa-plane"></i>
            
                            <label class="control-label"> Flight  </label>
                            <div class="controls">
          
              
                                <input type="checkbox" name="flight" value="flight" <?php if($flight=="flight"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            
            </div>
            <div class="row-fluid">
            
            <div class="span2">
                        <div class="control-group">
             <label class="control-label">1 star </label>
                            <div class="controls">
          
                                <input type="radio" name="star1" value="1 star" <?php if($star1=="1 star"){echo "checked";}?> class="m-wrap width100" />
                                
               
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            
                            <label class="control-label">2 star </label>
                            <div class="controls">
          
              
                                 <input type="radio" name="star1" value="2 star" <?php if($star1=="2 star"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            
                            <label class="control-label">3 star</label>
                            <div class="controls">
          
              
                                <input type="radio" name="star1" value="3 star" <?php if($star1=="3 star"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            
                            <label class="control-label"> 4 star  </label>
                            <div class="controls">
          
              
                                 <input type="radio" name="star1" value="4 star" <?php if($star1=="4 star"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            <div class="span2">
                        <div class="control-group">
            
            
                            <label class="control-label"> 5 star</label>
                            <div class="controls">
          
              
                                 <input type="radio" name="star1" value="5 star" <?php if($star1=="5 star"){echo "checked";}?> class="m-wrap width100" />
                               
         
                 
                 
                            </div>
                        </div>
            </div>
            
            
            </div>
            
            <div class="row-fluid">
            <div class="span4">                  
                        <div class="control-group">
                            <label class="control-label">Select Package Image</label>
                                                    
                              <div class="controls">
                                 <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                       <img src="<?php if($package_image!=''){ echo '../website-img/'.$package_image; } else { echo 'no_image.png'; }?>" alt="" />
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                       <span class="btn btn-file"><span class="fileupload-new">Select Package Image</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input type="file" name="package_image" class="default" /></span>
                                       <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                           
                                    </div>
                                 </div>                            
                              </div>                              
                        </div>
            </div> 
                          <div class="span4">
                        <div class="control-group">
                            <label class="control-label">alt tag</label>
                            <div class="controls">
                                <input type="text" name="alt" placeholder="alt tag" width="245px" value="<?php echo $alt; ?>" class="m-wrap" />
                               
                            </div>
                        </div>
						</div>			
            </div>
            
            
            
                    <div class="row-fluid">

                <div class="span12">
                <?php  if($_REQUEST['action']=='edit' && $_REQUEST['page_id']!='')
                        {
$sql_hsco=mysqli_query($conn,"select * from tb_package_content where page_id='".$_REQUEST['page_id']."'");
//$count=mysqli_num_rows($sql_hscode);
while($row_hs=mysqli_fetch_array($sql_hsco))
{  
$id='nic_edit_'.$row_hs['id'];
    ?>
<br><input type="text" name="paratitle[]" value="<?php echo $row_hs['paratitle']; ?>" class="add_inp" placeholder="paragraph Title" style="margin: -20px 6px 5px 0;width:32%;">

<input type="text" name="package_day[]" value="<?php echo $row_hs['package_day']; ?>" class="add_inp" placeholder="package Day" style="margin: -20px 6px 5px 0;width:32%;">

<button onclick="delete_par(this.value)"  value="<?php echo $row_hs['id'];?>"  style="    margin-bottom: 24px;color: white;background: red;">Delete</button>
 
<input type="text" name="Places_name1[]" value="<?php echo $row_hs['Places_name1']; ?>" class="add_inp" placeholder=" Places Name 1" style="margin-right: 10px;width:30%;">
            
<input type="text" name="Places_name2[]" value="<?php echo $row_hs['Places_name2']; ?>" class="add_inp" placeholder=" Places Name 2" style="margin-right: 10px;width:30%;">
            
<input type="text" name="Places_name3[]" value="<?php echo $row_hs['Places_name3']; ?>" class="add_inp" placeholder=" Places Name 3" style="margin-right: 10px;width:30%;">
            
<input type="text" name="Places_name4[]" value="<?php echo $row_hs['Places_name4']; ?>" class="add_inp" placeholder=" Places Name 4" style="margin-right: 10px;width:30%;">
            
<input type="text" name="Places_name5[]" value="<?php echo $row_hs['Places_name5']; ?>" class="add_inp" placeholder=" Places Name 5" style="margin-right: 10px;width:30%;">

<textarea type="text" name="paracontent[]"  class="jqte-test" placeholder="Paragraph content" style="margin: -2px 0 5px 0;width: 64.4%;"><?php echo $row_hs['paracontent']; ?></textarea>
<script>
          var a= new nicEditor({fullPanel : true}).panelInstance(<?php echo $id;?>);
</script>
 <?php }

                        }
                  ?>
                 <div id="dynamicInput">
                  <br><input type="text" name="paratitle[]" class="add_inp" placeholder="paragraph Title" style="margin: -20px 6px 5px 0;width:32%;">
          
          <input type="text" name="package_day[]" class="add_inp" placeholder="No oF package Day" style="margin: -20px 6px 5px 0;width:32%;">
                  <br><br>
          <input type="text" name="Places_name1[]" class="add_inp" placeholder="Places Name 1" style="margin-right: 10px;width:30%;">
          
          <input type="text" name="Places_name2[]" class="add_inp" placeholder="Places Name 2" style="margin-right: 10px;width:30%;">
          
          <input type="text" name="Places_name3[]" class="add_inp" placeholder="Places Name 3" style="margin-right: 10px;width:30%;">
          
          <input type="text" name="Places_name4[]" class="add_inp" placeholder="Places Name 4" style="margin-right: 10px;width:30%;">
          
          <input type="text" name="Places_name5[]" class="add_inp" placeholder="Places Name 5" style="margin-right: 10px;width:30%;">
          
          <textarea type="text" id="editor_1" name="paracontent[]" class="jqte-test" placeholder="Paragraph content"  style="margin: -2px 0 5px 0;width:50px;"></textarea>
          <script>
          var a= new nicEditor({fullPanel : true}).panelInstance('editor_1');
                  </script>
          
          
                 </div>
                 <input type="button" class="btn btn-danger reg_btn" value="Add more" onClick="addInput('dynamicInput');">
                
                </div>
               </div>
         <br/>
         
         
         <div class="row-fluid">
    <div class="span6">
<h4>Add  Inclusions  </h4>
</div>
<div class="span6">
<h4>Add  Exclusions  </h4>
</div>
</div>
<br>
         
         
         <div class="row-fluid">

                <div class="span6">
                <?php  if($_REQUEST['action']=='edit' && $_REQUEST['page_id']!='')
                        {
                          
$sql_hscode=mysqli_query($conn,"select * from tb_inclusions where page_id='".$_REQUEST['page_id']."'");
//$count=mysqli_num_rows($sql_hscode);
while($row_hs=mysqli_fetch_array($sql_hscode))
{  
  $incl_id=$row_hs['id'];
    ?>
<input type="text" name="inclusions[]" value="<?php echo $row_hs['inclusions']; ?>" class="add_inp" placeholder="Inclusions" style="margin: -4px 6px 5px 0;width:80%;">    <button onclick="del_inclusion(this.value)" style="background:#db5c5c; color: white;" value="<?php echo $incl_id;?>" >Delete</button>


 <?php } 

                        }
                  ?>
                 <div id="dynamicInput2">
                  <input type="text" name="inclusions[]" class="add_inp" placeholder="Inclusions" style="margin: -4px 6px 5px 0;width:80%;">
                 </div>
                 <input type="button" class="btn btn-danger reg_btn" value="Add Inclusions" onClick="addInput_fleet('dynamicInput2');" style="background: #65a3c9;color: white;
">
                
                </div>

                <script>


                function del_inclusion(val)
                {
                  var postData={inclusion_id:val};
                jQuery.ajax({
            type: "POST",
            url: 'ajax/del_inclusion.php',
            data: postData,
          success: function (result) {
         }
                      }); 

                }
 var counter = 1;
var limit = 10;
function addInput_fleet(divName)
{
   
          var newdiv = document.createElement('div');
          newdiv.innerHTML =  " <input type='text' name='inclusions[]' class='add_inp' placeholder='Inclusions' style='margin: -4px 6px 5px 0;width: 80%;'/>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
   
}
 </script> 


<div class="span6">
                <?php  if($_REQUEST['action']=='edit' && $_REQUEST['page_id']!='')
                        {
                          
$sql_hscodes=mysqli_query($conn,"select * from tb_exclusions where page_id='".$_REQUEST['page_id']."'");
//$count=mysqli_num_rows($sql_hscodes);
while($row_hss=mysqli_fetch_array($sql_hscodes))
{  
  $incls_id=$row_hss['id'];
    ?>
<input type="text" name="exclusions[]" value="<?php echo $row_hss['exclusions']; ?>" class="add_inp" placeholder="Exclusions" style="margin: -4px 6px 5px 0;width:80%;">    <button onclick="del_exclusions(this.value)" style="background:#db5c5c; color: white;" value="<?php echo $incls_id;?>" >Delete</button>


 <?php } 

                        }
                  ?>
                 <div id="dynamicInputt">
                  <input type="text" name="exclusions[]" class="add_inp" placeholder="Exclusions" style="margin: -4px 6px 5px 0;width:80%;">
                 </div>
                 <input type="button" class="btn btn-danger reg_btn" value="Add Exclusions" onClick="addInput_fleets('dynamicInputt');" style="background: #65a3c9;color: white;
">
                
                </div>
        <script>


                function del_exclusions(val)
                {
                  var postData={exclusions_id:val};
                jQuery.ajax({
            type: "POST",
            url: 'ajax/del_exclusions.php',
            data: postData,
          success: function (result) {
         }
                      }); 

                }
 var counter = 1;
var limit = 10;
function addInput_fleets(divName)
{
   
          var newdiv = document.createElement('div');
          newdiv.innerHTML =  " <input type='text' name='exclusions[]' class='add_inp' placeholder='Exclusions' style='margin: -4px 6px 5px 0;width: 80%;'/>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
   
}
 </script> 

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
                                <h4><i class="icon-globe"></i>Total Manage Package Details=<?php echo $tot_discount?></h4>
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
                                            <!--<th class="hidden-480">Airline info</th>-->
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
                                            <td><input type="checkbox" class="checkboxes" value="<?php echo $row['id']?>" /></td>
                                            
                                          <td><?php echo $row['page_name']; ?></td>
                                        
                                         <td><?php echo $row['page_title']; ?></td>
                                           <td><?php echo $row['short_code']; ?></td>
                                        
                                            <td><?php echo $row['page_display_name']; ?></td>
                                          
                                            
                                            
                                              
<td class="text-center"><a href="<?php echo $admin_path?>index.php?page=manage_pages_image&page_id=<?php echo $row['page_id']; ?>" class="btn btn-outline-success">Add Image</a></td>
                                            
                                              
<td class="text-center"><a href="<?php echo $admin_path?>index.php?page=destination_airlines_img&page_id=<?php echo $row['page_id']; ?>" class="btn btn-outline-success">Add Image</a></td> 


                                            <!-- 
                                            <td><img width="100px" height="100px" src="<?php //echo $row['airline_image']; ?>" alt="no image"></img></td> -->


                                           
                                            <td class="hidden-480"><?php echo $row['add_date']; ?></td>
                                           <!-- <td class="center hidden-480">
                                            
                                            <a href="index.php?page=baggage&page_id=<?php echo $row['page_id']; ?>" class="btn btn-outline-success">Add</a>
                                            </td>-->
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
        <link type="text/css" rel="stylesheet" href="assets/css/jquery-te-1.4.0.css">


<script type="text/javascript" src="assets/js/jquery-te-1.4.0.min.js"></script> 
    
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
  function delete_par(val)
                {
                    var postData={para_id:val};
                jQuery.ajax({
            type: "POST",
            url: 'ajax/delete_package_content.php',
            data: postData,
            success: function (result) {
           }
                          });   

                }
  
  
  
 var counterrs = 1;
var limit = 10;
function addInput(divName){
     if (counterrs == limit)  {
          alert("You have reached the limit of adding " + counterrs + " input,Textarea");
     }
     else {
     counterrs++;
          var newdiv = document.createElement('div');
          newdiv.innerHTML =  "<br><br><input type='text' name='paratitle[]' class='add_inp' placeholder='paragraph Title' style='margin:-20px 6px 5px 0;width: 32%;'/><input type='text' name='package_day[]' class='add_inp' placeholder='No oF package Day' style='margin:-20px 6px 5px 0;width: 32%;'/><br><br><input type='text' name='Places_name1[]' class='add_inp' placeholder='Places Name 1' style='margin-right: 10px; width:30%;'/><input type='text' name='Places_name2[]' class='add_inp' placeholder='Places Name 2' style='margin-right: 10px;width: 30%;'/><input type='text' name='Places_name3[]' class='add_inp' placeholder='Places Name 3' style='margin-right:10px;width: 30%;'/><input type='text' name='Places_name4[]' class='add_inp' placeholder='Places Name 4' style='margin-right: 10px;width:30%;'/><input type='text' name='Places_name5[]' class='add_inp' placeholder='Places Name 5' style='margin-right: 10px;width: 30%;'/><Textarea type='text' name='paracontent[]' class='jqte-test ' id=cid"+counterrs+" placeholder='Paragraph content' style='margin: -2px 0 5px 0;width: 64.4%;'></Textarea>";
          document.getElementById(divName).appendChild(newdiv);
          //alert(counterrs);
   $('#cid'+counterrs).jqte();
  
  // settings of status
  //var jqteStatus = true;
  
    //jqteStatus = jqteStatus ? false : true;
    //$('.jqte-test').jqte({"status" : jqteStatus})
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
  <script>
  $('.jqte-test').jqte();
  
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('.jqte-test').jqte({"status" : jqteStatus})
  });
</script>
    
</body>
<!-- END BODY -->
</html>