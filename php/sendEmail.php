<?php
	$input = json_encode($_POST);	
	$input = json_decode($input);
	$emailString = "";
	$emailString .= "Text to trasnlate: ".$input->project->text_original."<br>";
	$emailString .= "From: ".$input->project->language_from."<br>";
	$emailString .= "To: ".$input->project->language_to."<br>";
	$emailString .= "Customer: ".$input->project->customer_email."<br>";
	// echo json_encode($_POST);

	$url = 'https://api.sendgrid.com/';
	$user = 'avillalobos';
	$pass = '12kee34go';


	// rodrigogalindez@gmail.com
	$params = array(
	    'api_user'  => $user,
	    'api_key'   => $pass,
	    'to'        => 'rodrigogalindez@gmail.com',
	    'subject'   => 'New trasnlation request',
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

	// print everything out
	print_r($response);


	// 12kee34go
?>