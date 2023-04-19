<?php include("FareBubble_admin/includes/apptop.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index , follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>About Us - Farebubble.com</title>
<meta name="description" content="Farebubble an online flight booking portal offers the best deals on cheap flights for top destinations of the world. For further assistance call us now at +1-888-669-0207.">
	<meta name="keywords" content="cheap flights to austin, cheap flights to colombia, cheap flights to dallas, cheap flights to san francisco, cheap flights to charlotte, cheap flights to las vegas, cheap flights to philadelphia, cheap flights to portland, cheap flights to florida, cheap flights to los angeles" />
<meta property="og:title" content="About Us - Farebubble.com">
<meta property="og:description" content="Farebubble an online flight booking portal offers the best deals on cheap flights for top destinations of the world. For further assistance call us now at +1-888-669-0207.">
<meta property="og:site_name" content="Farebubble">
<meta name="author" content="www.farebubble.com">
<meta property="og:type" content="Website">
<meta property="og:url" content="https://www.farebubble.com">
<link rel="canonical" href=" https://www.farebubble.com/about-us.php " />
<link rel="alternate" href=" https://www.farebubble.com/about-us.php" hreflang="en-us">
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
			<h1 class="about-banner-h1">/About Us</h1>
		</div>
	</div>

	<div class="container mt-5">
		<h2>Your Travel Ally That Makes Flying Across the World Easy! </h2>
		<p>Fare Bubble is a dedicated platform that strives to make traveling across the globe easy. We keep on inspiring people to explore the world and embrace the pleasure of heading to their dream destinations in a seamless manner. We provide travelers throughout the USA with genuine flight search and booking tool through which they can make their way to their dream destination with relative ease. </p>
		<p>Our services are curated to deliver you a seamless travel experience. Whether it is domestic trips or international travel, we have the most exciting deals on flights. Your domestic and international vacations are now easy to plan, as we allow you to compare flight deals and book the most affordable one that fits your travel needs. Our sole purpose is to make it easy for you to locate the cheapest airfares. </p>
		<p>At Fare Bubble, we make sure travel enthusiasts seek the pleasure of planning their dream vacations at discounted prices. You can easily locate the cheapest deals on domestic and international flights from the convenience of your home. We make sure no money worries could ruin your trip and you will indulge yourself in the best travel experience ever. </p>

		<h6>Check the Latest Flight Offers and Quench Your Wander Lust</h6>
		<p>We take pride in being your first port of call when the idea of exploring every nook of the world strikes your mind. We aim at building a chain of happy and satisfied customers. This is why we stand out from the crowd for providing our customers with a world-class booking experience. We have a vision of making your travel enjoyable. This is why we never miss a chance to bring you cheap flight offers. </p>
		<p>Your travel needs are easy to accomplish when you choose us to find personalized offers on flights. We understand what pleases your travel lust and this is why we strive to bring you the best through our services. With Fare Bubble, you will surely stand a chance to make amazing travel moments. Now, stay tuned and seek the pleasure of landing in your dream destination at affordable prices.</p>
	</div>
	<div class="container mt-5 text-center" >
		<img src="images/travel.png" alt="travel" class="img-fluid">
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