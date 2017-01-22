<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>B-Lab Test Hassan Farooq</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<link rel="shortcut icon" href="img/favicon.ico">
<!-- =======================================================
    Theme Name: Maxim
    Theme URL: https://bootstrapmade.com/maxim-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
======================================================= -->
</head>

<body>
<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</a>
				<h1 class="brand"><a href="index.html">B-Lab</a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Header area -->
<!-- section: contact -->
<section id="contact" class="section green">
<div class="container">
	<h4>Weather Query</h4>
	<p>
		 Please enter zipcode of city you want to know weather conditions.
	</p>
	<div class="blankdivider30">
	</div>
	<div class="row">
		<div class="span12">
			<div class="cform" id="contact-form">
				<div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
				<form action="" method="post">
					<div class="row">
						<div class="span6">
							<div class="field your-name form-group">
								<input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="Enter Zipcode" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
							</div>
						</div>
						<div class="span6">
							<div class="field message form-group">
                                <div class="validation"></div>
							</div>
							<input type="submit" name="search" value="Search">
						</div>
					</div>
                    <p>
                    <?php
					$api_key = 'hoArfRosT1215';
					if(isset($_POST['search'])) {
						$zipcode = $_POST["zipcode"];
						$url = 'http://apidev.accuweather.com/locations/v1/search?q='.$zipcode.'&apikey='.$api_key;
						$response = file_get_contents($url);
						$response = json_decode($response);
						if(count($response) == 0) {
							echo "Wrong zipcode entered, try again.";
						}
						else {
							echo "City Name: ".$response[0]->LocalizedName.'<br>';
							echo "Region: ".$response[0]->Region->LocalizedName.'<br>';
							echo "Country: ".$response[0]->Country->LocalizedName.'<br>';
							$area_key = $response[0]->Key;
							$url = 'http://apidev.accuweather.com/currentconditions/v1/'.$area_key.'.json?language=en&apikey='.$api_key;
							$response = file_get_contents($url);
							$response = json_decode($response);
							echo "Weather Condition: ".$response[0]->WeatherText.'<br>';
							echo "Temperature: ".$response[0]->Temperature->Imperial->Value.' &#8457<br>';
						}
					}
					?>
                    </p>
				</form>
			</div>
		</div>
		<!-- ./span12 -->
	</div>
</div>
</section>
<footer>
<div class="container">
	<div class="row">
		<div class="span6 offset3">
			<p class="copyright">
				B-Lab test taken by Hassan Farooq.
			</p>
		</div>
	</div>
</div>
<!-- ./container -->
</footer>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localscroll-1.2.7-min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/validate.js"></script>
<script src="js/custom.js"></script>
<script src="contactform/contactform.js"></script>

</body>
</html>