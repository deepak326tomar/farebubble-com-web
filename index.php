<?php include("FareBubble_admin/includes/apptop.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="robots" content="index , follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Find Cheap Flights - Lowest Air fare - Flight bookings | Farebubble</title>
	<meta name="description" content="Finding for cheap airfares? Farebubble is your one-stop place for Domestic and International flight ticket bookings. Book flexible flight tickets & Lowest Air fare on call and online.">
	<meta name="keywords" content="cheap flights to boston, cheap flights to chicago, cheap flights to miami, cheap flights to phoenix, cheap flights to houston, cheap flights to washington DC, cheap flights to honolulu">
	<meta property="og:title" content="Find Cheap Flights - Lowest Air fare - Flight bookings | Farebubble">
	<meta property="og:description" content="Finding for cheap airfares? Farebubble is your one-stop place for Domestic and International flight ticket bookings. Book flexible flight tickets & Lowest Air fare on call and online.">
	<meta property="og:keywords" content="">
	<meta property="og:site_name" content="farebubble">
	<meta name="author" content="farebubble.com">
	<meta property="og:type" content="Website">
	<meta property="og:url" content="https://www.farebubble.com/">
	<link rel="canonical" href="https://www.farebubble.com/" />
	<link rel="alternate" href="https://www.farebubble.com/" hreflang="en-us">
	<meta name="geo.region" content="US" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<meta name="msvalidate.01" content="5EA4DCBB4F65BA9329EFFF4375D59145" />
	<meta name="google-site-verification" content="sniDQJtm3ZPH57TTLodP4WZwfEJYijfAz3jM6p8z3R8" />
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
<div class="bg-gradient">
   
	<!-- header starts here -->
<?php include 'header.php' ?>

<!-- header ends here -->
	<div class="container mt-3">
		
			<div class="search-box mt-5">
				 <!-- SCARCH FORM -->
				 <?php include 'form.php' ?>
	   <!-- SCARCH FORM -->
			</div>
		
	</div>


</div>

<section>
	<div class="container minus-mt">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="services">
					<img src="images/person.png" alt="">
					<h4>PROMPT ASSISTANCE</h4>
					<p>Get round-the-clock support from our travel expert immediately.</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="services">
					<img src="images/certificate.png" alt="">
					<h4>IATA CERTIFIED</h4>
					<p>IATA certified agents serve your travel needs.</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="services">
					<img src="images/booking.png" alt="">
					<h4>EASE OF BOOKING</h4>
					<p>Fare Bubble ensures convenient bookings for you.</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-12">
				<div class="services">
					<img src="images/percent.png" alt="">
					<h4>EXCLUSIVE OFFERS EVERY DAY</h4>
					<p>Get the ultimate deals every day you scroll through Fare Bubble.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container text-center mt-5">
		<img src="images/offer-banner.png" alt="" class="img-fluid">
	</div>

	<div class="container mt-5 mb-5">
		<h2 class="heading mb-2">Top Flight Deals</h2>

		<div class="row">
		<?php 
        $sqll = mysqli_query($conn,"select * From t_flight_deal where delete_status='False' order by id desc");  
              while($row  = mysqli_fetch_assoc($sqll))
        {
              
             
        ?>
		   
			<div class="col-lg-6 col-md-12 col-sm-12 mt-4">
				 <a href="<?php echo $row['result_url'];?>">
				<div class="deals-box">
					<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-9 pt-4 pb-3">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center" >
								<img src="images/delta-icon.png" alt="" class="icon">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-4">
								<p class="dest-names"><?php echo $row['origin']; ?></p>
								<span class="deals-date"><?php echo date('d-M',strtotime($row['from_date'])); ?></span>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2 col-2 text-center">
								<img src="images/arrow-l-r.png" alt="" class="lr">
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 col-4">
								<p class="dest-names"><?php echo $row['destination']; ?></p>
								<span class="deals-date"><?php echo date('d-M',strtotime($row['to_date'])); ?></span>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-3 text-center border-left pt-2 pb-2">
						<span class="str-frm">Starting from</span>
						<span class="deals-price">$ <?php echo $row['price_in_usd'];?></span>
						

					</div>
				</div>
				</div>
					 </a>
			</div>
				
		<?php }?>

			

		</div>
	</div>

	<div class="container mb-5">
		<h1 class="heading mb-2">Let Your Travel Planning Bring Comfort and Pleasure in Life </h1>
		<p>Isn’t great to grab wallet-friendly deals on air tickets at your convenience? Let the woes of trimming your travel cost set apart and browse through the best flight deals at Fare Bubble right from the convenience of being at home. We are the leading hub where the most affordable and exciting flight deals await you. Whatever you have in your mind, we make sure to present it to the table and make your upcoming vacations blissful. </p>
		<p>When you take the first step, we take the next and bring you peace of mind with the flight booking option. Fare Bubble is a dependable platform where you can compare and locate cheap flight tickets to anywhere. Whether you want to explore international destinations or American cities, we have the best deals to help you explore every nook of the world on a budget. </p>
		<h6>Hit the Skies with Pocket-Friendly and Land Anywhere in the USA </h6>
		<p>Fare Bubble is your one-stop source where you can get a chance to fly anywhere in the USA at reasonable prices. We let the travelers find the best and discounted airfare to destinations across the United States. Your travel lust will surely get nourished with us, as we are dedicatedly providing you competitive offers to make your excursions affordable. Delivering your concerns and accomplishing your travel desires is our main objective. </p>
		<p>No matter what’s next in your travel wishlist, we are here to help you accomplish all. At Fare Bubble, we have a team comprises of travel enthusiasts that understands your desire for exploring the world and thus, provide you with everything that takes you closer to your travel goals. Travelers, looking to fly into their dream destination can compare the airfares conveniently from the comfort of their home. We strive to be the best and trusted platform where you can search, compare and book flight tickets in a secure and hassle-free manner. </p>
		<h6>Your International Escapes Are Made Easier </h6>
		<p>If you have a strong desire of exploring every nook of the world, then you have come to the right platform. Fare Bubble stands tall for providing its customers with a smooth flight booking experience to make traveling abroad easy. We have come up as a legitimate hub where you get a chance to visit international destinations that often allure to you. Serving wanderers across the globe is our main objective and this is why we have made it a point to display oodles of flight deals to make international tours possible for all. </p>
		<p>What else you can avail of by using our website is the opportunity to save bucks and enhance your travel experience. We keep updating our list to make sure customers get quick access to the modified and the latest airfares to seize the best offers on international travel. </p>
		<h6>Why You Should Think Ahead to Plan Vacations with Fare Bubble? </h6>
		<p>Want reasons to count on us as your true travel companion? Let’s have a look: </p>
		<ul>
			<li><b>Innovative Booking Option </b></li>
			<p>Fare Bubble strives to meet the innovative fight booking standards to enhance the experience of its customers. </p>
			<li><b>Cheap Flights </b></li>
			<p>We promise to display genuine offers on our website aiming at delivering them quick access to cheap airfares. </p>
			<li><b>Travel with Your Favorite Carrier </b></li>
			<p>We provide flight booking options for major and reliable carriers. Now, get the pleasure of flying with your desired airline. </p>
			<li><b>No Hidden Charges </b></li>
			<p>No hidden charges could bother you when you plan to book your international or domestic flights with Fare Bubble. </p>
			
		</ul>

		<h6>Why Come to Fare Bubble? </h6>
		<p>Curious to know what benefits you can avail at Fare Bubble? Check below: </p>
		<ul>
			<li><b>Affordable Prices </b></li>
			<p>Fare Bubble is your go-to hub where the most affordable and reasonably priced deals await you. </p>
			<li><b>Updated Fares </b></li>
			<p>We strive to keep our customers ahead of the recent airfares. This is why we keep updating our deals. </p>
			<li><b>100% Secure Booking Platform </b></li>
			<p>Stay pleased to grab genuine flight deals on internal & domestic flights and that is too with enhanced security. </p>
			<li><b>24/7 Support for Savvy Travelers </b></li>
			<p>Our customer support team is available round-the-clock to back you and make excursions easy.</p>
		</ul>
		<p>Nothing could beat us when it comes to providing you genuine flight offers. Fare Bubble keeps your travel lust fueled up and let you make your way to anywhere easy and affordable. Now, sit relaxed, compare, and plan your trip to seek pleasure in hitting the skies. </p>

	</div>

	<div class="gradient-2">
		<div class="container pb-3">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 mt-3">
					<h5>Connect With Us</h5>
					<ul class="social">
						<li><a href="https://www.facebook.com/farebubbles" target="_blank"><img src="images/facebook.png" alt=""></a></li>
						<!--<li><a href="#" target="_blank"><img src="images/whatsapp.png" alt=""></a></li>-->
						<li><a href="https://twitter.com/farebubble" target="_blank"><img src="images/twitter.png" alt=""></a></li>
						<li><a href="https://www.instagram.com/farebubble" target="_blank"><img src="images/instagram.png" alt=""></a></li>
					</ul>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-12 mt-3">
					<div class="sub-box ml-auto">
						<h5>Sign up for Exclusive Email-Only deals!</h5>
					<input type="email" class="em-sub">
					<input type="submit" value="SUBSCRIBE" class="subs">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-5">
		<h6>Flight Destionations</h6>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="destinations/austin.php">Flights to Austin</a></li>
					<li><a href="destinations/colombia.php">Flights to Colombia</a></li>
					<li><a href="destinations/dallas.php">Flights to Dallas</a></li>
					<li><a href="destinations/san-francisco.php">Flights to San Francisco</a></li>
					<li><a href="destinations/charlotte.php">Flights to Charlotte</a></li>
					<li><a href="destinations/las-vegas.php">Flights to Las Vegas</a></li>
					<li><a href="destinations/philadelphia.php">Flights to Philadelphia</a></li>
					<li><a href="destinations/portland.php">Flights to Portland</a></li>
					
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="destinations/florida.php">Flights to Florida</a></li>
					<li><a href="destinations/los-angeles.php">Flights to Los Angeles</a></li>
					<li><a href="destinations/mexico-city.php">Flights to Mexico City</a></li>
					<li><a href="destinations/seattle.php">Flights to Seattle</a></li>
					<li><a href="destinations/minneapolis.php">Flights to Minneapolis</a></li>
					<li><a href="destinations/baltimore.php">Flights to Baltimore </a></li>
					<li><a href="destinations/fort-lauderdale.php">Flights to Fort Lauderdale</a></li>
					<li><a href="destinations/san-diego.php">Flights to San Diego</a></li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="destinations/new-jersey.php">Flights to New Jersey</a></li>
					<li><a href="destinations/new-york.php">Flights to New York</a></li>
					<li><a href="destinations/atlanta.php">Flights to Atlanta</a></li>
					<li><a href="destinations/denver.php">Flights to Denver</a></li>
					<li><a href="destinations/orlando.php">Flights to Orlando</a></li>
					<li><a href="destinations/salt-lake-city.php">Flights to Salt Lake City</a></li>
					<li><a href="destinations/detroit.php">Flights to Detroit</a></li>
					<li><a href="destinations/tampa.php">Flights to Tampa</a></li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="destinations/boston.php">Flights to Boston</a></li>
					<li><a href="destinations/chicago.php">Flights to Chicago</a></li>
					<li><a href="destinations/miami.php">Flights to Miami</a></li>
					<li><a href="destinations/phoenix.php">Flights to Phoenix</a></li>
					<li><a href="destinations/houston.php">Flights to Houston</a></li>
					<li><a href="destinations/washington-dc.php">Flights to Washington DC</a></li>
					<li><a href="destinations/honolulu.php">Flights to Honolulu</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container mt-5">
		<h6>Top Flight Routes</h6>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="/flight-routes/atlanta-to-ft-lauderdale.php">Atlanta to Ft Lauderdale</a>
					<div class="mini-search-pop d-none">
						<div class="pop-search">
							<div class="arrow-top-cst"><i class="fa fa-caret-up" aria-hidden="true"></i></div>
							<div class="pop-search-inner"><span class="offer-pop-head">Atlanta to Ft Lauderdale</span><p class="pop-price"><small>Starting from</small> <span>$100</span></p><span class="fa fa-close close-btn-pop"></span></div>
							<div class="pop-search-box border-top">
								<div class="col-12 mb-3 pl-0 pr-0">
					<div class="way-box">
						<label class="checkbox">Round Trip
						  <input type="radio" checked="checked" name="radio">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="way-box">
						<label class="checkbox">One Way
						  <input type="radio" name="radio">
						  <span class="checkmark"></span>
						</label>
					</div>
				</div>
									<div class="cst-row">
										<div class="pop-date">
											<input type="text" class="pop-cal">
										</div>
										<div class="pop-date">
											<input type="text" class="pop-cal">
										</div>

										<div class="adults">
											<label for="">Adults
												<select name="" id="">
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
												</select>
											</label>
										</div>
										<div class="adults">
											<label for="">Children
												<select name="" id="">
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
												</select>
											</label>
										</div>
										<div class="adults">
											<label for="">Infants
												<select name="" id="">
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
												</select>
											</label>
										</div>



									</div>
									<div class="pop-search-btn"><button type="submit" name="submitForm">SEARCH</button></div>
							</div>

						</div>
					</div></li>
					<li><a href="/flight-routes/chicago-to-las-vegas.php">Chicago to Las Vegas</a></li>
					<li><a href="/flight-routes/ft-lauderdale-to-new-york.php">Ft Lauderdale to New York</a></li>
					<li><a href="/flight-routes/las-vegas-to-atlanta.php">Las Vegas to Atlanta</a></li>
					<li><a href="/flight-routes/los-angeles-to-chicago.php">Los Angeles to Chicago</a></li>
					<li><a href="/flight-routes/boston-to-chicago.php">Boston to Chicago</a></li>
					<li><a href="/flight-routes/denver-to-san-francisco.php">Denver to San Francisco</a></li>
					<li><a href="/flight-routes/miami-to-chicago.php">Miami to Chicago</a></li>
					<li><a href="/flight-routes/austin-to-denver.php">Austin to Denver</a></li>
					<li><a href="/flight-routes/seattle-to-new-york.php">Seattle to New York</a></li>
					<li><a href="/flight-routes/seattle-to-las-vegas.php">Seattle to Las Vegas</a></li>
					
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="/flight-routes/los-angeles-to-las-vegas.php">Los Angeles to Las Vegas</a></li>
					<li><a href="/flight-routes/new-york-to-ft-lauderdale.php">New York to Ft Lauderdale</a></li>
					<li><a href="/flight-routes/new-york-to-london.php">New York to London</a></li>
					<li><a href="/flight-routes/los-angeles-to-miami.php">Los Angeles to Miami</a></li>
					<li><a href="/flight-routes/chicago-to-orlando.php">chicago to Orlando</a></li>
					<li><a href="/flight-routes/chicago-to-new-jersey.php">Chicago to New Jersey</a></li>
					<li><a href="/flight-routes/denver-to-new-york.php">Denver to New York</a></li>
					<li><a href="/flight-routes/denver-to-orlando.php">Denver to Orlando</a></li>
					<li><a href="/flight-routes/mexico-city-to-san-francisco.php">Mexico City to San Francisco</a></li>
					<li><a href="/flight-routes/san-francisco-to-seattle.php">San Francisco to Seattle</a></li>
					<li><a href="/flight-routes/seattle-to-austin.php">Seattle to Austin</a></li>
					
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="/flight-routes/new-york-to-los-angeles.php">New York to Los Angeles</a></li>
					<li><a href="/flight-routes/new-york-to-miami.php">New York to Miami</a></li>
					<li><a href="flight-routes/philadelphia-to-orlando.php">Philadelphia to Orlando</a></li>
					<li><a href="/flight-routes/miami-to-los-angeles.php">Miami to Los Angeles</a></li>
					<li><a href="/flight-routes/dallas-to-chicago.php">Dallas to Chicago</a></li>
					<li><a href="/flight-routes/phoenix-to-denver.php">Phoenix to Denver</a></li>
					<li><a href="/flight-routes/denver-to-las-vegas.php">Denver to Las Vegas</a></li>
					<li><a href="/flight-routes/dallas-to-san-francisco.php">Dallas to San Francisco</a></li>
					<li><a href="/flight-routes/florida-to-denver.php">Florida to Denver</a></li>
					<li><a href="/flight-routes/miami-to-seattle.php">Miami to Seattle</a></li>
					<li><a href="/flight-routes/seattle-to-atlanta.php">Seattle to Atlanta</a></li>
				
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12">
				<ul class="list">
					<li><a href="/flight-routes/san-francisco-to-los-angeles.php">San Francisco to Los Angeles</a></li>
					<li><a href="/flight-routes/atlanta-to-san-francisco.php">Atlanta to San Francisco</a></li>
					<li><a href="/flight-routes/atlanta-to-chicago.php">Atlanta to Chicago</a></li>
					<li><a href="/flight-routes/los-angeles-to-new-york.php">Los Angeles to New York</a></li>
					<li><a href="/flight-routes/austin-to-chicago.php">Austin to Chicago</a></li>
					<li><a href="/flight-routes/seattle-to-denver.php">Seattle to Denver</a></li>
					<li><a href="/flight-routes/las-vegas-to-chicago.php">Las Vegas to Chicago</a></li>
					<li><a href="/flight-routes/chicago-to-san-francisco.php">Chicago to San Francisco</a></li>
					<li><a href="/flight-routes/boston-to-seattle.php">Boston to Seattle</a></li>
					<li><a href="/flight-routes/atlanta-to-seattle.php">Atlanta to Seattle</a></li>
					
				
				</ul>
			</div>
		</div>
	</div>

</section>

<!-- footer starts here -->
<?php include 'footer.php' ?>
<!-- footer ends here -->




<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/609fcd4259.js" crossorigin="anonymous"></script>
<script>
		jQuery(document).ready(function(){
		$('.count').prop('disabled', true);
   			$(document).on('click','#plusA',function(){
				$('#countA').val(parseInt($('#countA').val()) + 1 );
    		});
        	$(document).on('click','#minusA',function(){
    			$('#countA').val(parseInt($('#countA').val()) - 1 );
    				if ($('#countA').val() == 0) {
						$('#countA').val(1);
					}
    	    	});

        	$(document).on('click','#plusC',function(){
				$('#countC').val(parseInt($('#countC').val()) + 1 );
    		});
        	$(document).on('click','#minusC',function(){
    			$('#countC').val(parseInt($('#countC').val()) - 1 );
    				
    	    	});

        	$(document).on('click','#plusI',function(){
				$('#countI').val(parseInt($('#countI').val()) + 1 );
    		});
        	$(document).on('click','#minusI',function(){
    			$('#countI').val(parseInt($('#countI').val()) - 1 );
    				
    	    	});
$("#travellers").click(function(){
  $(".travellers-box").toggle();
});
});
</script>
<script>
  $( function() {
    $( "#depdate" ).datepicker();
    $( "#retdate" ).datepicker();
  } );
  </script>
	

</body>
</html>