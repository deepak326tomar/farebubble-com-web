<?php

    function check_mobile($mobile)
	{
		if(!empty($mobile) && preg_match('/^[0-9]{10}+$/', $mobile))
		{
		return true;
		}
		else
		{
		return false; 
		}
	}

	function check_email($email)
	{
		$pattern= "/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
		if(!empty($email) && preg_match($pattern, $email))
		{
		return true;
		} 
		else
		{
		return false; 
		}
	}
	function check_full_name($name)
	{
		$pattern="/^[a-zA-Z ]+$/";
		if(!empty($name) && preg_match($pattern, $name))
			return true;
			return false;
	}
	function validate_date($date)
	{
	$arr_da=explode("-",$date);
	$c_date=count($arr_da);
	$c_day=strlen($arr_da[0]);
	$c_month=strlen($arr_da[1]);
	$c_year=strlen($arr_da[2]);
	if($c_date=='3' && $c_day=='2' && $c_month=='2' && $c_year=='4')
	return true;
	else
	return false;
	}

 function get_multiple_value_dropdown($tbl_name,$id,$name,$status,$match)
	{
	$sql = "SELECT $id,$name FROM $tbl_name WHERE $status='Enabled' ORDER BY $id desc";
		$query = mysql_query($sql);
		while ($row=mysql_fetch_array($query))
		{
		$matched=explode(",",$match);
		$select =(in_array($row[$id],$matched))?'selected':'';
		echo '<option value="'.$row[$id].'" '.$select.'>'.$row[$name].'</option>';
		}
	}


function msg_lte($msg_lte,$type='success',$font_style)
{
	if(isset($msg_lte))
	{
	 		echo ' <div class="box-body"><div class="alert alert-'.$type.' alert-dismissable">
                                        <i class="fa '.$font_style.'"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                        <b>Alert ! </b>&nbsp;&nbsp;&nbsp;'.$msg_lte.'
                                    </div></div>';		
	}
}
function settings($field)
{
	return getvalue("$field","tbl_settings");
}



function totalrows($conn,$table,$condition)
{
$query=mysqli_query($conn,"select * from $table $condition") or die(mysqli_error($conn));
return mysqli_num_rows($query);
}



function create_token($nm="token")
{
	$_SESSION[$nm] = time();
	echo '<input type="hidden" name="'.$nm.'"  value="'.$_SESSION[$nm].'"/>';
	
}

function token($nm="token")
{
 if($_SESSION[$nm]==$_POST[$nm])
	return true;
 else
 	return false;
}

function loc($page)
{
	header("location:$page");
}

function checked($val1,$val2)
{
	if($val1 == $val2)
	{
		return 'checked';
	}	
}




function getuname($uid)
{
	return getvalue("uname","uaccount","where uid = '$uid'");
	
}

function post($f)
{
	return $_POST[$f];
}
function get($f)
{
	return $_GET[$f];
}

function request($f)
{
	return $_REQUEST[$f];
}
function session($f)
{
	return $_SESSION[$f];
}

function msg($msg,$type='success')
{
	if(isset($msg))
	{
	 		echo '<div class="notification '.$type.' png_bg">
							<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>'.$msg.'</div>
						</div>';		
	}
}


function user_status($s)
{
	if($s=="0")
	{
		echo 'Not Verified';
	}
	elseif($s=="1")
	{
		echo 'Verified';
	}
	elseif($s=="2")
	{
		echo 'Banned';
	}
	else
	{
		echo '---';
	}
}


function selected($val1,$val2)
{
	if($val1 == $val2)
	{
		return 'selected';
	}	
}


function selected_multi($var,$arr)
{
	if(in_array($var,$arr))
	{
		return 'selected';
	}
}

function checked_multi($var,$arr)
{
	if(in_array($var,$arr))
	{
		return 'checked';
	}
}

function checksession($uname,$loc)
{
	if(!isset($_SESSION[$uname]))
	{
	header("location:$loc");
	}
}

function checklogin($conn,$uname,$pass,$table)
{
	$dbadmin  = selectfetch($conn,"*","$table","where username = '$uname' and pass_real='".$pass."' AND id = 1");
	
	if(($uname == $dbadmin->username) and ($pass == $dbadmin->pass_real))
	{
	    
		return true;
	}
	else
	{
		return false;
	}

}
function checklogin_utype($conn,$uname,$pass,$table)
{
  
	$dbadmin  = selectfetch($conn,"*","$table","where user_login = '$uname' AND user_password ='$pass' AND user_status ='Enabled' AND user_deletestatus='False'");
	if(($uname == $dbadmin->user_login) && ($pass ==$dbadmin->user_password))
	{ 
	  
		return true;
	}
	else 
	{
		return false;
	}

}
function selectfetch($conn,$fields="*",$table,$condition="")
{
	
 	$q = mysqli_query($conn,"select $fields from $table $condition") or die("Select Error.".mysqli_error($conn));
	$r = mysqli_fetch_object($q);
	return $r;
}

function mailto($to,$subject,$body)
{

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: '.settings('sitename').'<'.settings('email').'> ' . "\r\n";
	@mail($to,$subject,$body,$headers);	
	
}


//upload files//




//get value from table //
function getvalue($conn,$field, $table, $condition="")
{

	$q = mysqli_query($conn,"select $field from $table $condition") or die(mysqli_error($conn));
	$row = mysqli_fetch_array($q);
	return $row[$field];
}

function insert($conn,$table,$data)
{
  $fields="";
  $values = "";
  foreach($data as $key => $val)
  {
    $fields.=$key.',';
    $values.="'".addslashes($val)."',";
  }
  $fields = substr($fields,0,strlen($fields)-1);
  $values = substr($values,0,strlen($values)-1);
  $q = mysqli_query($conn,"insert into $table ($fields) values($values)") or die("Insert Error.".mysqli_error($conn));
  if($q)
  {
  return $q;
  }
}

function update($conn,$table,$data,$condition="")
{
	$fields="";
	$values = "";
	foreach($data as $key => $val)
	{
		$fields.=$key."='".addslashes($val)."',";
	}
	$fields = substr($fields,0,strlen($fields)-1);
/*	
echo "update $table set $fields $condition";
echo '<br>';*/

	$q = mysqli_query($conn,"update $table set $fields $condition")or die("Update Error.".mysqli_error($conn));
	
	if($q)
	{
	return $q;
	}

}

function delete($conn,$table,$condition)
{
	$q = mysqli_query($conn,"delete from $table $condition")or die("Delete Error.".mysqli_error($conn));
	if($q)
	{
	return $q;
	}
}





function select($conn,$fields="*",$table,$condition="")
{

	$q = mysqli_query($conn,"select $fields from $table $condition") or die("Select Query Error.".mysqli_error($conn));
	return $q;
}
//get child
 

 /* backup the db OR just a table */  

 
//traverse function for sitemap	 
function system_message($msg_type,$msg)
{
	if($msg_type=="err")
	{
	$class="system-error";
	}
	else if($msg_type=="succ")
	{
	$class="system-message";
	}
	$_SESSION['system_messgae']="<div class='".$class."'><ul>".$msg."</ul></div>";
}

function save_action_history($conn,$action,$item_id)
{
$page = $_REQUEST['page'];
$page_id = getvalue($conn,'sub_id','tbl_submodule','where sub_page="'.$page.'"');
$user_id=$_SESSION['user_id'];
$udept=$_SESSION['udept'];
$data=array("page_id"=>$page_id,"user_id"=>$user_id,"action"=>$action,"item_id"=>$item_id,"udept_id"=>$udept,"action_on"=>date("Y-m-d H:i:s"));
insert($conn,"tbl_action_history",$data);
}

?>
