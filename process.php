<?php
include 'config.php';
//Retrieve form data.
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$name = ($_GET['name']) ? trim($_GET['name']) : "";
$organization = ($_GET['organization']) ? trim($_GET['organization']) : "";
$email = ($_GET['email']) ? trim($_GET['email']) : "";
$website = ($_GET['website']) ? trim($_GET['website']) : "";
$twitter = ($_GET['twitter']) ? trim($_GET['twitter']) : "";

//Simple server side validation for POST data, of course, you should validate the email
$errors = array();
if (!$name) $errors[count($errors)] = 'Please enter your name.';
if (!$email) $errors[count($errors)] = 'Please enter your email.';

//if the errors array is empty, send the mail
if (!$errors) {
	$result=save_log($name,$organization,$email,$website,$twitter);
	tweet($name,$organization,$twitter);
	echo $result;
//if the errors array has values
} else {
	//display the errors message
	for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
	echo '<a href="form.php">Back</a>';
	exit;
}


//Simple mail function with HTML header
function save_log($name,$organization,$email,$website,$twitter){
	$link=mysql_connect(DB_HOST, DB_UNAME, DB_PASSWD);
	mysql_select_db(DB_NAME);
	$query="INSERT INTO log (name, organization, email, website, twitter) VALUES('{$name}', '{$organization}', '{$email}', '{$website}', '{$twitter}')";
	$result=mysql_query($query);
	mysql_close($link);
	if ($result) return 1;
	else return 0;
}

function tweet($name,$organization,$twitter){
	$curlUrl="http://localhost/impulse/tweetit.php";
    $ch = curl_init($curlUrl);

    if(curl_errno($ch) == 0 || curl_errno($ch) == ""){
		$args="";
        $msg="";
        $msg .= (!empty($name)) ? ($name) : "";
        $msg .= (!empty($twitter)) ? (" (@" . $twitter . ")") : "";
        $msg .= (!empty($organization)) ? (" from " . $organization) : "";
        $msg .= " has just signed in @ #f5impulse2011 by SocialF5 (http://www.socialf5.com).";
        $args = "msg=" . urlencode($msg);
        curl_setopt($ch, CURLOPT_POSTFIELDS,  $args);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_exec($ch);
    }
    //echo curl_error($ch);
    curl_close($ch);
}
?>
