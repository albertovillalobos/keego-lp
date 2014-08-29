<?php
	$input = json_encode($_POST);	
	$input = json_decode($input);
	$emailString = "";
	$emailString .= "Text to trasnlate: ".$input->project->text_original."\n";
	$emailString .= "From: ".$input->project->language_from."\n";
	$emailString .= "To: ".$input->project->language_to."\n";
	$emailString .= "Customer: ".$input->project->customer_email."\n";
	echo $emailString;
?>