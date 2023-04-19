<?php include("FareBubble_admin/includes/apptop.php"); ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index , follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> - Credit card Authorization | Farebubble</title>
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
			<h1 class="about-banner-h1">Credit card Authorization</h1>
		</div>
	</div>

	<div class="container mt-5">
		<p> In order to avoid any fraudulent transaction against the company and the actual card holder we may request you to provide  a photo id for billing address verification and an authorization form in which the card holder duly fills in the payment information and signs the document to authorize a payment transaction.
In some extreme cases where we doubt the fraudulent transaction we may ask you to share front copy of  card (with last 4 digits hidden/masked) & back copy of card (with CVV hidden/masked). </p>
		
		<p> Documents need to be sent to Bookings@Farebubble.com </p>
		
		<p> The reason to ask for above information could be one out of ( but not limited to ) – 3rd party transaction, High volume transactions, Urgent travel or travel within certain number of days ( varies from booking to booking ) , Cards not issued in United states or High risk transactions ( a destination with a historic trend of fraud transactions ). Another reason could be that sometimes our automatic payments authenticator is not able to verify all information provided and hence we need more information to verify the authenticity of the credit card.  </p>
		
		<p> This is done in order to safeguard the credit card holder and to avoid any fraudulent transaction against the company.  </p>
		
		<p> Please note that you always have the right to cancel the reservation in case you do not wish to send the documents. There will be no service charges or fee deducted for cancellation in such a scenario. </p>
		
		<p> Please note that you always have the right to cancel the reservation in case you do not wish to send the documents. There will be no service charges or fee deducted for cancellation in such a scenario. </p>
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