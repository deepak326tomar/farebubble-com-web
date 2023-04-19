<?php
include("includes/config.php");

$user_role = $_SESSION['udept'];
$user_id = $_SESSION['user_id'];
if($user_role=='Admin')
{
$sql = mysqli_query($conn,"select * from tbl_module where status='Enabled'");
}
else
{
$sql_per=mysqli_query($conn,"SELECT * FROM tbl_role_per WHERE roleper_roleid='$user_role' and roleper_status='Enabled' and roleper_deletestatus='False'");
$row_per = mysqli_fetch_array($sql_per);
$per_menu = $row_per['roleper_mainmenu'];
$sub_menu = $row_per['roleper_submenu'];
$sql= mysqli_query($conn,"select * from tbl_module where status='Enabled' and id IN ($per_menu)");
//echo "select * from tbl_module where status='Enabled' and id IN ($per_menu)";
}

?>
<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        	
			<ul>
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!--<form class="sidebar-search">
						<div class="input-box">
							<a href="javascript:;" class="remove"></a>
							<input type="text" placeholder="Search..." />				
							<input type="button" class="submit" value=" " />
						</div>
					</form>-->
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li class="start ">
					<a href="index.php?page=dashboard">
					<i class="icon-home"></i> 
					<span class="title">Dashboard</span>
					</a>
				</li>
				<?php
				while($row_mod=mysqli_fetch_array($sql))
				{
				?>
				<li class="has-sub ">
					<a href="javascript:;">
					<i class="<?php echo $row_mod['icon']; ?>"></i> 
					<span class="title"><?php echo $row_mod['name']; ?></span>
					<span class="arrow "></span>
					</a>
					<ul class="sub">
					<?php
					$module_id=$row_mod['id'];
				   if($user_role=='Admin')
				   {
					$sql_sub = mysqli_query($conn,"select * from tbl_submodule where sub_mainid='$module_id' and sub_status='Enabled'");
				   }
				   else
				   {
					 $sql_sub= mysqli_query($conn,"select * from tbl_submodule where sub_mainid='".$module_id."' AND sub_status='Enabled' AND sub_id IN ($sub_menu)");
				   }
				while($row_sub=mysqli_fetch_array($sql_sub))
				{
					?>
						<li ><a href="index.php?page=<?php echo $row_sub['sub_page']; ?>"><?php echo $row_sub['sub_name']; ?></a></li>
					<?php
				}
                    ?>					
					</ul>
				</li>
				<?php
				}
				?>

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>