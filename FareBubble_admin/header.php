<?php

if(isset($_SESSION['udept']) && $_SESSION['udept']=='Admin')

{

	$name = 'Admin';

}

else if($_SESSION['udept']!='Admin' && $_SESSION['user_id']!='0')

{

	$name = getvalue("SUBSTRING_INDEX(user_name,' ',1)","tbl_users","where user_role='$_SESSION[udept]' and user_id='$_SESSION[user_id]'");

}

?>

<style>

.font-style {

    color: #fff;

    font-size: 16px;

    font-weight: bold;

    padding-top: 10px;

}

</style>

<script src="assets/js/jquery-1.8.3.min.js"></script>

<script type="text/javascript">

tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");



function GetClock(){

var d=new Date();

var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear();

if(nyear<1000) nyear+=1900;

var d=new Date();

var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;



if(nhour==0){ap=" AM";nhour=12;}

else if(nhour<12){ap=" AM";}

else if(nhour==12){ap=" PM";}

else if(nhour>12){ap=" PM";nhour-=12;}



if(nmin<=9) nmin="0"+nmin;

if(nsec<=9) nsec="0"+nsec;



document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";

}



window.onload=function(){

GetClock();

setInterval(GetClock,1000);

}

</script>
<?php 
		$sqll = mysqli_query($conn,"select * From tb_global_details where delete_status='False'");	
	  
		$row  = mysqli_fetch_assoc($sqll);
		?>
<div class="header navbar navbar-inverse navbar-fixed-top">

		<!-- BEGIN TOP NAVIGATION BAR -->

		<div class="navbar-inner">

			<div class="container-fluid">

				<!-- BEGIN LOGO -->

				<a class="brand" href="?page=dashboard"> 

				<img src="<?php echo $row['airline_image'];?>" style="height: 30px;" alt="" />

				</a>

				<div class="span6">

               	<div id="clockbox" class="pull-right font-style"></div>   

               </div>

				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

				<img src="assets/img/menu-toggler.png" alt="" />

				</a>          

				<!-- END RESPONSIVE MENU TOGGLER -->				

				<!-- BEGIN TOP NAVIGATION MENU -->					

				<ul class="nav pull-right">

					<!-- BEGIN NOTIFICATION DROPDOWN -->	

					

					<!-- END NOTIFICATION DROPDOWN -->

					<!-- BEGIN INBOX DROPDOWN -->

					

					<!-- END INBOX DROPDOWN -->

					<!-- BEGIN TODO DROPDOWN -->

					<!-- END TODO DROPDOWN -->

					<!-- BEGIN USER LOGIN DROPDOWN -->

					<li class="dropdown user">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<img alt="" src="assets/img/avatar1_small.jpg" />

						<span class="username"><?php echo $name; ?></span>

						<i class="icon-angle-down"></i>

						</a>

						<ul class="dropdown-menu">

							<li><a href="?page=change_password"><i class="icon-user"></i> Change Password</a></li>

							<!--<li><a href="calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

							<li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>-->

							<li class="divider"></li>

							<li><a href="query.php?action=logout"><i class="icon-key"></i> Log Out</a></li>

						</ul>

					</li>

					<!-- END USER LOGIN DROPDOWN -->

				</ul>

				<!-- END TOP NAVIGATION MENU -->	

			</div>

		</div>

</div>
