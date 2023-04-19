<?php
include '../includes/apptop.php';
		if(isset($_REQUEST['inclusion_id']) && $_REQUEST['inclusion_id']!='' && $_REQUEST['inclusion_id']>0)
		{
			 $inclusion_id=$_REQUEST['inclusion_id'];
			$rowsss=mysqli_query($conn,"delete from tb_inclusions where id='$inclusion_id'");	
		}
?>


 
