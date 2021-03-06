<!DOCTYPE html>
<html>
	<head>
	  <title>Invitation The Savv</title>
	  <link rel="stylesheet" type="text/css" href="<?php echo site_url('css/invite.css'); ?>"/>
	  <link rel="stylesheet" type="text/css" href="<?php echo site_url('css/logoButton.css'); ?>"/>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  	  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
  	</head>
<body class='social-invites'>
	<div class='topbar'>
		<img src="<?php echo site_url('img/headerlogo.png'); ?>"/>
	</div>
	<div class="signupEmailBox">
		<span class="tag">Thanks for signing up to The<span style='color:#5ebde7;'> Savv</span>!</span>
		<span class="tag2">We will be launching soon!</span>
		
		<div class="smallTextEmail">
	            <p>Does fashion, art, design influence your</p>
				<p>friends? Invite them to sign up to be notified</p>
				<p>for early access to The Savv.</p>
		</div>
		<div class="socialInvites">

			<a id='fbInvite' href="<?php echo site_url('main/facebook_invite'); ?>" class="facebook-button" id="facebookbutton">
				<span class="fb-button-left"></span>
				<span class="fb-button-center">Invite with Facebook</span>
				<span class="fb-button-right"></span>
			</a><br/>
			
			<a id='gmailInvite' class="button icon chat" href="<?php echo site_url('main/gmail_invite'); ?>"><span>Invite GMail Friends</span></a>
		
		</div>
	</div>
</body>
</html>