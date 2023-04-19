<?php
include '../includes/apptop.php';

	
	
	
		if(isset($_REQUEST['country_id']) && $_REQUEST['country_id']!='')
		{
				
				$country_id=$_REQUEST['country_id'];
				
				
				$option_state = '<option value="">Select State</option>';
				$sql = select("*","lk_tb_state","WHERE state_status='Enabled' and state_delete_status='False' and country_id = ".$country_id);
				while($row=mysql_fetch_array($sql))
				{
					$option_state .= '<option value="'.$row['state_id'].'" >'.$row['state_name'].'</option>';
				}
			?>
									<select name="state_id" id="state_id" class="form-control">
										<?php echo $option_state ;?>
									</select>
		<?php
        }


// 
 if(isset($_REQUEST['state_id']) && $_REQUEST['state_id']!='')
		{
				
				
				$state_id=$_REQUEST['state_id'];
				
				
				$option_city = '<option value="">Select City</option>';
				$sql = select("*","lk_tb_city","WHERE city_status='Enabled' and city_delete_status='False' and state_id = ".$state_id);
				while($row=mysql_fetch_array($sql))
				{
					$option_city .= '<option value="'.$row['city_id'].'" >'.$row['city_name'].'</option>';
				}
			?>
									<select name="state_id" id="state_id" class="form-control">
										<?php echo $option_city ;?>
									</select>
		<?php
        }


//



if(isset($_REQUEST['check_email']) && $_REQUEST['check_email']!='')
		{
		$enquriy_id=$_REQUEST['enquriy_id'];
		
			$tot_comp=totalrows("tb_enquiry","WHERE  email ='".$_REQUEST['check_email']."' and enquiry_id!='$enquriy_id'");
	 		
			if($tot_comp>0)
			{
			echo $_REQUEST['check_email'];
			echo $message='<font color="red">'."  email id is already exists !!".'</font>';
			
			}
			
        }

if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!='')
		{
			$enquriy_id=$_REQUEST['enquriy_id'];
			$tot_comp=totalrows("tb_enquiry","WHERE  mobile_no ='".$_REQUEST['mobile']."' and enquiry_id!='$enquriy_id'");
	 		
			if($tot_comp>0)
			{
			echo $_REQUEST['mobile'];
			echo $message='<font color="red">'."  Mobile is already exists !!".'</font>';
			
			}
			
        }






 