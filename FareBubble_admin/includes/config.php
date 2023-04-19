<?php
date_default_timezone_set('Asia/Kolkata');
if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='192.168.1.11')
{	
$conn=mysqli_connect('localhost','root','','farebubble_db');
$admin_path='http://localhost/farebubble_wb/FareBubble_admin/';

$website_path='http://localhost/farebubble_wb/';
if (mysqli_connect_errno())
  {
  echo "Failed connect to MySQL: " . mysqli_connect_error();
  }
}
else
{

$conn=mysqli_connect('localhost','farebubble_user','p!0dq0N6','farebubble_db');
$admin_path='https://www.farebubble.com/FareBubble_admin/';
$website_path='https://www.farebubble.com/';
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
}
?>
