<?php
include '../includes/apptop.php';
		if(isset($_REQUEST['img_f_name']) && $_REQUEST['img_f_name']!='' && $_REQUEST['id']>0)
		{
			 $product_id=$_REQUEST['id'];
			 $image_f_name=$_REQUEST['img_f_name'];
			
			//echo "select $image_f_name from tb_product where product_id=$product_id";
			
			$rowss=mysql_fetch_assoc(mysql_query("select $image_f_name from tb_product where product_id=$product_id"));	
			$image_name=$rowss[$image_f_name];
				if($image_name!='')
				{
					mysql_query("update tb_product set $image_f_name='' where product_id='$product_id'");
					$image_name='../'.$image_name;
					if(file_exists($image_name))
					{	
					unlink($image_name);
					}
				echo '1';	
				}
				else
				{
				echo '2';
				}
		}
?>


 
