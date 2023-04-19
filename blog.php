<?php include("FareBubble_admin/includes/apptop.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index , follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
</head>
<body>
<div class="mt-2">
<!-- header starts here -->
<?php include 'inner-header.php' ?>

<!-- header ends here -->



</div>
<section>
	<div class="about-banner">
		<div class="container">
			<h1 class="about-banner-h1">/Blog</h1>
		</div>
	</div>

	<div class="container mt-5 mb-5">
		<div class="row">
			<div class="col-lg-4 mt-4">
				<div class="blog-box">
					<span class="category">Flight</span>
					<h4>The standard Lorem Ipsum passage</h4>
					<span class="date-post"><img src="images/calendar.png" alt="calendar"> 30 Sep, 2020</span>
					<img src="images/airline.jpg" alt="" class="img-fluid">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<a href="#" class="read-more">Read More</a>
				</div>
			</div>


			<div class="col-lg-4 mt-4">
				<div class="blog-box">
					<span class="category">Flight</span>
					<h4>The standard Lorem Ipsum passage</h4>
					<span class="date-post"><img src="images/calendar.png" alt="calendar"> 30 Sep, 2020</span>
					<img src="images/airline.jpg" alt="" class="img-fluid">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<a href="#" class="read-more">Read More</a>
				</div>
			</div>


			<div class="col-lg-4 mt-4">
				<div class="blog-box">
					<span class="category">Flight</span>
					<h4>The standard Lorem Ipsum passage</h4>
					<span class="date-post"><img src="images/calendar.png" alt="calendar"> 30 Sep, 2020</span>
					<img src="images/airline.jpg" alt="" class="img-fluid">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<a href="#" class="read-more">Read More</a>
				</div>
			</div>


			<div class="col-lg-4 mt-4">
				<div class="blog-box">
					<span class="category">Flight</span>
					<h4>The standard Lorem Ipsum passage</h4>
					<span class="date-post"><img src="images/calendar.png" alt="calendar"> 30 Sep, 2020</span>
					<img src="images/airline.jpg" alt="" class="img-fluid">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<a href="#" class="read-more">Read More</a>
				</div>
			</div>


			<div class="col-lg-4 mt-4">
				<div class="blog-box">
					<span class="category">Flight</span>
					<h4>The standard Lorem Ipsum passage</h4>
					<span class="date-post"><img src="images/calendar.png" alt="calendar"> 30 Sep, 2020</span>
					<img src="images/airline.jpg" alt="" class="img-fluid">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<a href="#" class="read-more">Read More</a>
				</div>
			</div>

			<div class="col-lg-4 mt-4">
				<div class="blog-box">
					<span class="category">Flight</span>
					<h4>The standard Lorem Ipsum passage</h4>
					<span class="date-post"><img src="images/calendar.png" alt="calendar"> 30 Sep, 2020</span>
					<img src="images/airline.jpg" alt="" class="img-fluid">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
					<a href="#" class="read-more">Read More</a>
				</div>
			</div>
		</div>
	</div>
	
</section>

<!-- footer starts here -->
<?php include 'footer.php' ?>
<!-- footer ends here -->




<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
		jQuery(document).ready(function(){
// This button will increment the value
$(".plus").click( function(e) {

    e.preventDefault();
    
    // Define field variable
    field = "input[name=" + $(this).attr("field") + "]";
    
    // Get its current value
    var currentVal = parseInt($(field).val());
    
    // If is not undefined
    if ( !isNaN(currentVal) && currentVal < 20 ) {

        // Increment
        $(field).val(currentVal + 1);

    }
    
});

// This button will decrement the value till 0
$(".minus").click( function(e) {

    e.preventDefault();
    
    // Define field variable
    field = "input[name=" + $(this).attr("field") + "]";
    
    // Get its current value
    var currentVal = parseInt($(field).val());
    
    // If it isn't undefined or its greater than 0
    if ( !isNaN(currentVal) && currentVal > 1 ) {
        // Decrement one
        $(field).val(currentVal - 1);
    }
    
});
});
</script>
</body>
</html>