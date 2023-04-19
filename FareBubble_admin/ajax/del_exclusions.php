<?php
include '../includes/apptop.php';
		if(isset($_REQUEST['exclusions_id']) && $_REQUEST['exclusions_id']!='' && $_REQUEST['exclusions_id']>0)
		{
			 $exclusions_id=$_REQUEST['exclusions_id'];
			$rowsss=mysqli_query($conn,"delete from tb_exclusions where id='$exclusions_id'");	
		}
?>


 
