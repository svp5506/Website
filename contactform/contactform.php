<?php
// You need to install the sendgrid client library so run: composer require sendgrid/sendgrid
// 	require '../lib/sendgrid-php/vendor/autoload.php';
	require("../lib//sendgrid-php/sendgrid-php.php");
	// contains a variable called: $API_KEY that is the API Key.
	// You need this API_KEY created on the Sendgrid website.
	
	$FROM_EMAIL = 'MoustafaElhadary96@gmail.com';
	// they dont like when it comes from @gmail, prefers business emails
	$TO_EMAIL = 'THE_PERSON_YOUR_WANT_TO_CONTACT';
	// Try to be nice. Take a look at the anti spam laws. In most cases, you must
	// have an unsubscribe. You also cannot be misleading.
	$subject = "YOUR_SUBJECT";
	$from = new \SendGrid\Email(null, $FROM_EMAIL);
	$to = new \SendGrid\Email(null, $TO_EMAIL);
	$htmlContent = '';
	// Create Sendgrid content
	$content = new \SendGrid\Content("text/html",$htmlContent);
	// Create a mail object
	$mail = new \SendGrid\Mail($from, $subject, $to, $content);
	
 $apiKey = getenv('SENDGRID_API_KEY');
 $sg = new \SendGrid($apiKey);
	$response = $sg->client->mail()->send()->post($mail);
			
	if ($response->statusCode() == 202) {
		// Successfully sent
		echo 'done';
	} else {
		echo 'false';
	}
?>