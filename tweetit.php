<?php

include 'twitteroauth/twitteroauth.php';

$ckey = "UrZmndog89e0H3vaY7cg";
$csecret = "q0D8fozwh60K1I1o1lx6QcvIjdljLq8sjhYVRfg";

$oauthtoken = "279948462-7VCkJyFnRpIy0kOGbkqj3x2YHm6v9uaDaQwnQ4";
$oauthtokensecret = "JCfhRdK3DG9PDbu78xtxSgJSjWLK8eoTfbzUn4";

$message = urldecode($_REQUEST['msg']); //Command to be executed

$connection = new TwitterOAuth($ckey,$csecret,$oauthtoken,$oauthtokensecret);

$connection->post('statuses/update', array('status' => $message));


?>
