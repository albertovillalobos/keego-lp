
<?php
	$input = json_encode($_POST);	
	$input = json_decode($input);
	$emailString = "";
	$emailString .= "Text to trasnlate: ".$input->project->text_original."<br>";
	$emailString .= "From: ".$input->project->language_from."<br>";
	$emailString .= "To: ".$input->project->language_to."<br>";
	$emailString .= "Customer: ".$input->project->customer_email."<br>";

	$url = 'https://api.sendgrid.com/';
	$user = 'avillalobos';
	$pass = '12kee34go';


	// rodrigogalindez@gmail.com
	$params = array(
	    'api_user'  => $user,
	    'api_key'   => $pass,
	    'to'        => 'rodrigogalindez@gmail.com',
	    'subject'   => 'New translation request',
	    'html'      => $emailString,
	    'text'      => '',
	    'from'      => $input->project->customer_email,
	  );

	$request =  $url.'api/mail.send.json';

	// Generate curl request
	$session = curl_init($request);
	// Tell curl to use HTTP POST
	curl_setopt ($session, CURLOPT_POST, true);
	// Tell curl that this is the body of the POST
	curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
	// Tell curl not to return headers, but do return the response
	curl_setopt($session, CURLOPT_HEADER, false);
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

	// obtain response
	$response = curl_exec($session);
	curl_close($session);

	$message = "N/A";
	$messageSuccess = "<span>Thank you!</span> You will receive a confirmation email shortly";
	$maessageFailure = "<span>Oops!</span> Something went wrong :c";

	$response = json_decode($response);
	if ($response == "success") {
		$message = $messageSuccess;
		# code...
	}
	else {
		$message = $maessageFailure;
	}
	
	

?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="user-scalable=yes, width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Keego</title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" href="css/master.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>

<body class="page">

<div class="header inner">
	<div class="header-wrapper">
		<h1><a href="index.html">Keego</a></h1>

		<ul>
			<li><a href="/" class="cta">Try it for free</a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<p class="about"><span></span> You will receive a confirmation email shortly.</p>
	<img src="images/team.png" style="width: 100%; max-width: 960px; margin-bottom: 60px;"/>
</div>

<div class="mod footer">
	<div class="mod-wrapper">
		<div class="footer-blurb">
			<p>Ready to order your translation?</p>
			<a class="button">Try it for free</a>
		</div>

		<ul>
			<li><a href="about.html">About Keego</a></li>
			<li><a href="news.html">In the News</a></li>
			<li><a href="investors.html">Investors</a></li>
			<li><a href="jobs.html">Jobs</a></li>
		</ul>

		<ul>
			<li><a href="http://www.twitter.com/usekeego">Follow us on Twitter</a></li>
		</ul>

		<ul>
			<li>&copy; 2014 Keego LLC · Made with ❤ in OTR, USA</li>
		</ul>
	</div>
</div>

</body>
</html>