<?php 
/**
 * Login Page for Admins / Staff (login.admin.php)
 *
 * This page serves as the entry point for Staff and Admin to login to the CRM
 *
 * @package 	Just Another CRM Project
 * @author 		uziiuzair [https://www.uziiuzair.com/]
 * @since 		v1.0
 */

use uziiuzair\crm; 

?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
		
		<title><?php echo crm\Config::SystemApplicationName; ?> - Login</title>
		
		<!-- Apple Icons -->
		<link rel="apple-touch-icon" href="/app/includes/images/">
		<link rel="apple-touch-icon" sizes="76x76" href="/app/includes/images/">
		<link rel="apple-touch-icon" sizes="120x120" href="/app/includes/images/">
		<link rel="apple-touch-icon" sizes="152x152" href="/app/includes/images/">
		<link rel="icon" type="image/x-icon" href="/app/includes/images/">

		<!-- SEO? -->
		<meta property="og:url" content="<?php echo crm\Config::SystemPublicURL; ?>">
		<meta property="og:type" content="website">
		<meta property="og:title" content="">
		<meta property="og:description" content="">
		<meta property="og:image" content="/app/includes/images/">

		<link rel="shortcut icon" type="image/png" href="/app/includes/images/favicon.png"/>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="/app/includes/css/layout.css?v=<?php echo rand(); ?>">
		<link rel="stylesheet" href="/app/includes/css/responsive.css?v=<?php echo rand(); ?>">

	</head>

	<body>
		
		<div class="container loginPage">

			<div class="loginWrapper">
				
				<img src="/app/includes/images/logo.png" alt="">

				<p class="title">Sign in to access your account</p>

				<div class="loginStatus"></div>

				<form action="" id="form-login">
					
					<div class="input-container">
						<input type="text" name="username" placeholder="Username / Email" data-msg-required="username is required" required>
					</div>
					
					<div class="input-container">
						<input type="password" name="password" placeholder="Password" data-msg-required="password is required" required>
					</div>

					<div class="input-container">
						<p class="forgotPassword" align="right"><a href="#!" id="didYouActuallySeriouslyForgetYourPassword">Forgot Password?</a></p>
					</div>

					<div class="input-container">
						<button id="submitting" name="dologin" type="submit">
							<span class="initial">Sign in</span>
							<span class="showProgress" style="display: none;"><i class="fa fa-spinner fa-spin">one sec..</i></span>
						</button>
					</div>

				</form>

			</div>
		
		</div>

		<script src="/app/includes/js/jquery.min.js"></script>
		<script src="/app/includes/js/jquery.validate.js"></script>
		<script src="/app/includes/js/app.js"></script>

		<script>
			$(function() {
				$('#form-login').validate();
			})

			$(document).ready(function($) {
				$('#submitting').click(function(){
					$('#submitting > .initial').fadeOut();
					$('#submitting > .showProgress').fadeIn();
				});
			});
		</script>

	</body>

</html>