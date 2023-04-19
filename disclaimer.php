<?php include("FareBubble_admin/includes/apptop.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index , follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> - Disclaimer | Farebubble</title>
<meta name="description" content="Fare Bubble is the leading flight booking company that assists travelers to compare and find the most suitable deals on domestic and international flights. We are working as an independent travel portal that does not claim its association with a third party or any airline. We attempt to make the flight booking process easy.">
<meta property="og:title" content="Disclaimer | Farebubble ">
<meta property="og:description" content=" Fare Bubble is the leading flight booking company that assists travelers to compare and find the most suitable deals on domestic and international flights. We are working as an independent travel portal that does not claim its association with a third party or any airline. We attempt to make the flight booking process easy. ">
<meta property="og:site_name" content="Farebubble">
<meta name="author" content="www.farebubble.com">
<meta property="og:type" content="Website">
<meta property="og:url" content="https://www.farebubble.com">
<link rel="canonical" href=" https://www.farebubble.com/disclaimer.php" />
<link rel="alternate" href=" https://www.farebubble.com/disclaimer.php" hreflang="en-us">
<meta name="geo.region" content="US"/>
<meta name="google-site-verification" content="sniDQJtm3ZPH57TTLodP4WZwfEJYijfAz3jM6p8z3R8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11133530773"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11133530773');
</script>
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
			<h1 class="about-banner-h1"> Disclaimer</h1>
		</div>
	</div>

	<div class="container mt-5">
		<p> FAREBUBBLE.COM is an online self-reliant travel agency. It is not directly linked with any airlines, hotel chain, insurance companies, and car rental and leisure service. We are not managers of or owners of any kind of travel services. We declare that we are not an airline or directly associated with them. The reservations made by us are done by using consolidators (or aggregators) of hotels airlines, other travel services. The branding done entirely is authentic and it is used for expressive purposes only and does not connote a partnership with hotel chain or airlines. By accessing our services and by using our site Farebubble.com, We cannot be held liable any loss incurred directly or indirectly however it may arise, from the use of any information, products, materials, offers or links to others sites found on this website. For Further queries email us at <a href="mailto:info@Farebubble.com"> info@Farebubble.com </a> or call us directly on our Toll Free <a href="tel:1-888-669-0207"> 1-888-669-0207.</a> </p>
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