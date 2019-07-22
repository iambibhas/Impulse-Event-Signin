<?php

include 'twitteroauth/twitteroauth.php';

$ckey = "";
$csecret = "";

$oauthtoken = "";
$oauthtokensecret = "";

$message = urldecode($_REQUEST['msg']); //Command to be executed

$connection = new TwitterOAuth($ckey,$csecret,$oauthtoken,$oauthtokensecret);

$connection->post('statuses/update', array('status' => $message));


?>
