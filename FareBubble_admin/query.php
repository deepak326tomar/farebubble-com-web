<?php
session_start();
include 'includes/apptop.php';
$action=$_REQUEST['action'];
switch($action)
{
	case 'login':
	{
    	$uname = $_POST['uname'];
	    $pass= $_POST['password'];
		if(!empty($uname) or !empty($pass))
		{
			if($uname=='admin')
			{
				
				if(checklogin($conn,$uname,$pass,'tbl_settings')) 
				{
					 $time_now=mktime(date('H'),date('i'));
					 $_SESSION['last_login'] =  date(' dS F Y  H:i',$time_now);
					 $_SESSION['user_id'] =  '0';
					 $_SESSION['uname'] = $uname;
					 $_SESSION['udept'] =  'Admin';
					 $_SESSION['designation'] = ''; 
					 $data=array(
								'uhist_userid'  =>0,
								'uhist_logindate' =>date('y-m-d'),
								'uhist_logintime' =>date(' dS F Y  H:i',$time_now),
								'uhist_udept'=>'Admin',
								'uhist_logouttime'=>'',
								'uhist_ip'=>''
								);
					insert($conn,'tbl_userhistory',$data);
					 $_SESSION['uhist_id']=mysqli_insert_id();
					 header("location:index.php?page=dashboard");
				}
				else
				{
					 header("location:login.php?stat=Invalid username or password");	
				}
			}
			else
			{
			$pass= $_POST['password'];
				if(checklogin_utype($conn,$uname,$pass,'tbl_users')) 
				{
					$dbadmin1  = selectfetch($conn,"*","tbl_users","where user_login  = '".$uname."' and user_password ='".$pass."' AND user_status ='Enabled' and user_deletestatus='False'");
					 $time_now=mktime(date('H'),date('i'));
					 $_SESSION['last_login'] =  date(' dS F Y  H:i',$time_now);
					 $_SESSION['user_id'] =  $dbadmin1->user_id;
					 $_SESSION['udept'] =  $dbadmin1->user_role;
					 $_SESSION['uname'] =$uname;
					 $data=array(
								'uhist_userid'  =>$dbadmin1->user_id,
								'uhist_logindate' =>date('y-m-d'),
								'uhist_logintime' =>date(' dS F Y  H:i',$time_now),
								'uhist_udept'=>$_SESSION['udept'],
								'uhist_logouttime'=>'');
					insert($conn,'tbl_userhistory',$data);
					 $_SESSION['uhist_id']=mysqli_insert_id();
					 header("location: index.php?page=dashboard");
				}
				else
				{
					header("location:login.php?stat=Invalid username or password");	
				}
			}
		}
		else
		{
		header("location:login.php?stat=Invalid username or password");	
		}
	break;
	}
	case 'logout':
	{	
	
		if($_SESSION['udept']=='Admin'){
  		$sqls = "Update tbl_settings set last_login ='".$_SESSION['last_login']."' where id = '1'";  
		$ress = mysqli_query($conn,$sqls);
		$time_now=mktime(date('H'),date('i'));
		$data=array('uhist_logouttime 	'  =>date('dS F Y  H:i',$time_now));
				update($conn,"tbl_userhistory",$data,"where uhist_id = '". $_SESSION['uhist_id']."'");
		}
		else
		{
				 $time_now=mktime(date('H'),date('i'));
				$data=array('uhist_logouttime'  =>date('dS F Y  H:i',$time_now));
				update($conn,"tbl_userhistory",$data,"where uhist_id = '". $_SESSION['uhist_id']."'");
		}
		session_destroy();
		header("location:login.php");
		break;
	}
}?>