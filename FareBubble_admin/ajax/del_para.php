<?php
include '../includes/apptop.php';
		if(isset($_REQUEST['para_id']) && $_REQUEST['para_id']!='' && $_REQUEST['para_id']>0)
		{
			 $para_id=$_REQUEST['para_id'];
			$rowss=mysqli_query($conn,"delete from tb_page_content where id='$para_id'");	
		}
?>


 
