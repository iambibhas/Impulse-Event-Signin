<?php
/*
 *      index.php
 *
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Impulse 2011 Registration</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.20" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		//if submit button is clicked
		$('#submit').click(function () {

			//Get the data from all the fields
			var name = $('input[name=name]');
			var org = $('input[name=organization]');
			var email = $('input[name=email]');
			var website = $('input[name=website]');
			var twitter = $('input[name=twitter]');

			//Simple validation to make sure user entered something
			//If error found, add hightlight class to the text field
			if (name.val()=='') {
				name.addClass('hightlight');
				return false;
			} else name.removeClass('hightlight');

			if (email.val()=='') {
				email.addClass('hightlight');
				return false;
			} else email.removeClass('hightlight');

			//organize the data properly
			var data = 'name=' + name.val() + '&organization=' + org.val() + '&email=' + email.val() + '&website=' +
			website.val() + '&twitter='  + twitter.val();

			//disabled all the text fields
			$('.text').attr('disabled','true');

			//show the loading sign
			$('.loading').show();

			//start the ajax
			$.ajax({
				//this is the php file that processes the data and send mail
				url: "process.php",

				//GET method is used
				type: "GET",

				//pass the data
				data: data,

				//Do not cache the page
				cache: false,

				//success
				success: function (html) {
//alert(html);
					if (html==1) {
						//hide the form
						$('.form').hide('slow').fadeOut('slow');

						//show the success message
						$('.done').delay(500).fadeIn('slow');

					//if process.php returned 0/false (send mail failed)
					} else alert('Sorry, unexpected error. Please try again later..');
				}
			});

			//cancel the submit button default behaviours
			return false;
		});
	});
	</script>
	<style>
	body{
		text-align:center;
		background-color: #000;
		color: #fff;
	}
	a{
		color: #a63a30;
		text-decoration: none;
	}
	.clear {
		clear:both
	}
	.block {
		width:400px;
		margin:0 auto;
		text-align:left;
	}
	.element * {
		padding:5px;
		margin:4px;
		font-family:arial;
		font-size:14px;
	}
	.element label {
		float:left;
		width:75px;
		font-weight:700
	}
	.element input.text {
		float:left;
		width:250px;
		padding-left:20px;
		margin-left: 20px;
		border-radius: 5px;
	}
	.element .textarea {
		height:120px;
		width:270px;
		padding-left:20px;
	}
	.element .hightlight {
		border:2px solid #9F1319;
		background:#fff url(iconCaution.gif) no-repeat 2px;
	}
	.element #submit {
		float:right;
		width: 200px;
		border-radius: 5px;
		margin-right:50px;
		border: none;
	}
	.loading {
		float:right;
		background:url(ajax-loader.gif) no-repeat 1px;
		height:28px;
		width:28px;
		display:none;
	}
	.done {
		background:url(iconIdea.gif) no-repeat 2px;
		padding-left:20px;
		font-family:arial;
		font-size:20px;
		width:70%;
		margin:20px auto;
		display:none;
		text-align: center;
	}

	</style>
</head>

<body>
<div class="block">
<div id="logo" align="center">
	<img src="impulse_logo.jpg" />
</div>
<div class="done">
<b>Thank you !</b><br />You have been successfully registered.<br />
<a href="javascript:window.location.reload()">Refresh!</a>
</div>
    <div class="form">
    <form method="post" action="process.php">
    <div class="element">
        <label>Name</label>
        <input type="text" name="name" class="text" />
    </div>
    <div class="element">
        <label>Organization</label>
        <input type="text" name="organization" class="text" />
    </div>
    <div class="element">
        <label>Email</label>
        <input type="text" name="email" class="text" />
    </div>
    <div class="element">
        <label>Website</label>
        <input type="text" name="website" class="text" />
    </div>
    <div class="element">
        <label>Twitter ID</label>
        <input type="text" name="twitter" class="text" />
    </div>
    <div class="element">
        <input type="submit" id="submit"/>
        <div class="loading"></div>
    </div>
    </form>
    </div>
</div>
<div class="clear"></div>
</body>

</html>
