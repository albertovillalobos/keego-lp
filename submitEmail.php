
<?php
	$input = json_encode($_POST);	
	$input = json_decode($input);
	// var_dump($input);
	$emailString = "";
	$emailString .= "Text to trasnlate: ".$input->project->text_original."<br>";
	$emailString .= "<br>Languages: ".$input->project->languages."<br>";
	$emailString .= "<br>Customer Email: ".$input->project->customer_email."<br>";
	$emailString .= "<br>Customer Name: ".$input->project->customer_name."<br>";

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
	$messageSuccess = "Thank you! Expect to see an email with hand-picked translators to get your project started very soon.";
	$maessageFailure = "<span>Oops!</span> Something went wrong :c";

	// echo $response;

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
	<script src="//cdn.optimizely.com/js/1850440010.js"></script>
</head>

<body class="page">

<div class="header inner">
	<div class="header-wrapper">
		<h1><a href="index.html"><img src="images/logo.png" />Keego</a></h1>

		<ul>
			<li><a href="" class="cta">Try it for free</a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<p class="about">Thank you! Expect to see an email with hand-picked translators to get your project started very soon.</p>
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
			<li><a href="http://blog.keego.co">Blog</a></li>
		</ul>

		<ul>
			<li><a href="http://www.twitter.com/usekeego">Follow us on Twitter</a></li>
		</ul>

		<ul>
			<li>&copy; 2014 Keego LLC · Made with ❤ in OTR, USA</li>
		</ul>
	</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49324915-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>