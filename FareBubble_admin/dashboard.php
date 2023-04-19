<style>
table tr:nth-child(2n+1) {
    background: #35434F !important;
}

.dashboard_leads {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ccc;
    float: left;
    margin: 30px 0;
    padding: 10px;
    width: 98%;
}

.dashboard_leads h2 {
    border-bottom: 1px solid #ccc !important;
    color: #666;
    padding-bottom: 8px;
}

.left_client_lead {
    border-right: 1px solid #ccc;
    float: left;
    margin: 0;
    text-align: center;
    width: 48%;
}

.left_client_sms {
    float: left;
    margin: 0;
    text-align: center;
    width: 48%;
}

.right_client_lead {
    float: right;
    margin: 0;
    text-align: center;
    width: 48%;
}

.right_client_lead p {
    background: #e70020 none repeat scroll 0 0;
    border-radius: 5px !important;
    color: #fff;
    font-weight: bold;
    margin-left: 25%;
    width: 75px;
}

.left_client_lead p {
    background: #e70020 none repeat scroll 0 0;
    border-radius: 5px !important;
    color: #fff;
    font-weight: bold;
    margin-left: 25%;
    width: 75px;
}

.left_client_sms p {
    background: #e70020 none repeat scroll 0 0;
    border-radius: 5px !important;
    color: #fff;
    font-weight: bold;
    margin-left: 25%;
    width: 75px;
}

.total_title {
    color: #07437c;
    font-size: 26px !important;
    font-style: italic;
    font-weight: bold;
    margin-left: 16%;
    width: 75px;
}

.unselected
{
	padding:5px;  text-decoration:none;  color:#2F7ED8;
}

.unselected:hover
{
	text-decoration:none;  color:#2F7ED8; border:1px solid #ccc;  border-radius:2px !important;
}

.selected:hover
{
	text-decoration:none;  color:#fff;
}

.selected
{
	padding:5px;  background:#2F7ED8; color:#fff; border-radius:2px !important;
}

</style>
 <link rel="stylesheet" type="text/css" media="screen" href="chart/jquery-ui-custom.css" />
    <script src="chart/jquery.js" type="text/javascript"></script>
    <script src="chart/jquery.jqChart.min.js" type="text/javascript"></script>
<?php
error_reporting("E_ALL ~& E_ERRORS");
$result = "";
$current_date = date("Y-m-d");
$yesterday_date = date('Y-m-d',strtotime("-1 days"));
$this_month = date('m');
?>
<div class="row-fluid">	
<div id="dashboard">
					 	
									<?php	
									$current_date = date("Y-m-d");
								$yesterday_date = date('Y-m-d',strtotime("-1 days"));
								$current_month = date('m');
								
									 $hot_deals=mysqli_fetch_assoc(mysqli_query($conn,"select (select count(id) from t_hot_deals where DATE_FORMAT(add_date,'%Y-%m-%d') = '$current_date' AND delete_status = 'False')as today,(select count(id) from t_hot_deals where DATE_FORMAT(add_date,'%Y-%m-%d') = '$yesterday_date' AND delete_status = 'False')as yesterday,(select count(id) from t_hot_deals where DATE_FORMAT(add_date,'%m') = '$current_month' AND delete_status = 'False')as monthe,(select count(id) from t_hot_deals where delete_status = 'False')as total"));
									 $hot_deals_total=$hot_deals['total'];
									 	
?>
								<!--End for school Student dashboard-->
									  <div class="row-fluid">
									<div class="span3">
								     
									<div class="dashboard_leads">
                                     	<h4><i class="icon-bar-chart"> </i>Total Hot Deals<span class="total_title"><a href="index.php?page=manage_hotdeals"><?php echo $hot_deals_total;?></a></span></h4>
                                     	
                                        
                                       

									</div>

								</div>
								


			               <div class="span3">
                              <?php
							 $flight_deals=mysqli_fetch_assoc(mysqli_query($conn,"select (select count(id) from t_flight_deals where DATE_FORMAT(add_date,'%Y-%m-%d') = '$current_date' AND delete_status = 'False')as today,(select count(id) from t_flight_deals where DATE_FORMAT(add_date,'%Y-%m-%d') = '$yesterday_date' AND delete_status = 'False')as yesterday,(select count(id) from t_flight_deals where DATE_FORMAT(add_date,'%m') = '$current_month' AND delete_status = 'False')as monthe,(select count(id) from t_flight_deals where delete_status = 'False')as total"));
									 $flight_deals_total=$flight_deals['total'];
									 	
								    ?>
                                     
									<div class="dashboard_leads">
                                     <h4><i class="icon-bar-chart"> </i>Total Flights Deals<span class="total_title"><a href="index.php?page=manage_flights_deal"><?php echo $flight_deals_total;?></a></span></h4>
                                     	
                                      </div>

								</div>
							
								<div class="span3">
                              <?php
							 $Destination=mysqli_fetch_assoc(mysqli_query($conn,"select (select count(page_id) from tb_pages where   delete_status = 'False' and page_type_id='3')as total"));
									 $Destination_total=$Destination['total'];
									 	
								    ?>
                                     
									<div class="dashboard_leads">
                                     <h4><i class="icon-bar-chart"> </i>Total Destinations <span class="total_title"><a href="index.php?page=manage_destination"><?php echo $Destination_total;?></a></span></h4>
                                     	
                                      </div>

								</div>
							
								
								
								
	                             <div class="span3">
                              <?php
							 $Airlines=mysqli_fetch_assoc(mysqli_query($conn,"select (select count(page_id) from tb_pages where   delete_status = 'False' and page_type_id='4')as total"));
									 $Airlines_total=$Airlines['total'];
									 	
								    ?>
                                     
									<div class="dashboard_leads">
                                     <h4><i class="icon-bar-chart"> </i>Total Airlines <span class="total_title"><a href="index.php?page=manage_airlines_pages"><?php echo $Airlines_total;?></a></span></h4>
                                     	
                                      </div>

								</div>
								
						<div class="span4">
                              <?php
							 $Content=mysqli_fetch_assoc(mysqli_query($conn,"select (select count(id) from tb_content_details )as total"));
									 $Content_total=$Content['total'];
									 	
								    ?>
                                     <div class="row">
									<div class="dashboard_leads">
                                     <h4><i class="icon-bar-chart"> </i>Total Contact Enquiries <span class="total_title"><a href="index.php?page=manage_content_enquiries"><?php echo $Content_total;?></a></span></h4>
                                     	
                                      </div>
                                    </div>
								</div>
								
								
							 <div class="span4">
                              <?php
							 $news=mysqli_fetch_assoc(mysqli_query($conn,"select (select count(id) from tb_manage_news_subscribers )as total"));
									 $news_total=$news['total'];
									 	
								    ?>
                                     
									<div class="dashboard_leads">
                                     <h4><i class="icon-bar-chart"> </i>Total News Subscribers <span class="total_title"><a href="index.php?page=manage_news_subscribers"><?php echo $news_total;?></a></span></h4>
                                     	
                                      </div>

								</div>
								
								</div>
								
	
	
	
	
	 
	
								

								</div>

            </div>


					<?php

/* Set the default timezone */

date_default_timezone_set("America/calcuta");



/* Set the date */

$date = strtotime(date("Y-m-d"));



$day = date('d', $date);

$month = date('m', $date);

$year = date('Y', $date);

$firstDay = mktime(0,0,0,$month, 1, $year);

$title = strftime('%B', $firstDay);

$dayOfWeek = date('D', $firstDay);

$daysInMonth = cal_days_in_month(0, $month, $year);

/* Get the name of the week days */

$timestamp = strtotime('next Sunday');

$weekDays = array();

for ($i = 0; $i < 7; $i++) {

 $weekDays[] = strftime('%a', $timestamp);

 $timestamp = strtotime('+1 day', $timestamp);

}

$blank = date('w', strtotime("{$year}-{$month}-01"));

?>

<div class="row-fluid">

                 <div class="span6">

                     <div class="calendar">

<table>

 <tr>

  <h4><?php echo date('d'); ?> <?php echo $title ?> <?php echo $year;  echo '    '. date('h:i A', strtotime(date('H:i:s'))); ?> </h4>

 </tr>

    

    

    

 <tr>

  <?php foreach($weekDays as $key => $weekDay) : ?>

   <th><?php echo $weekDay ?></th>

  <?php endforeach ?>

 </tr>

    

    

 <tr>

  <?php for($i = 0; $i < $blank; $i++): ?>

   <td></td>

  <?php endfor; ?>

  <?php for($i = 1; $i <= $daysInMonth; $i++): ?>

   <?php if($day == $i): ?>

    <td style="text-align:center; color:#fff; border:1px solid #fff; padding:5px 0px;"><?php echo $i ?></td>

   <?php else: ?>

    <td style="text-align:center; color:#fff; padding:5px 0px;"><?php echo $i ?></td>

   <?php endif; ?>
   
   <?php if(($i + $blank) % 7 == 0): ?>

    </tr>

                

                <tr>

   <?php endif; ?>

  <?php endfor; ?>

  <?php for($i = 0; ($i + $blank + $daysInMonth) % 7 != 0; $i++): ?>

   <td></td>

  <?php endfor; ?>

 </tr>

</table>

</div>

				</div>

				<div class="clearfix"></div>

				</div>

				<br>

				</div>

				</div>
<script>
		jQuery(document).ready(function() {			
			// initiate layout and plugins
			App.setPage("table_managed");
			App.init();
		});
	</script>

