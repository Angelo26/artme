<?php
	require_once("head.php");
?>

	<link rel="stylesheet" type="text/css" href="css/userlogreg.css">

<body>
	<div class="container">
		<header class="mt-4 mb-2">
			<div class="row">
					
				<div class="col-md-10 my-auto">
					<nav class="navbar navbar-expand-md p-0 sticky-top">
						<div class="container p-0">	
							<a class="my-auto mr-1" href="index.php" id="plogo"><img src="imgs/artmelogo.png" title="Artme" alt="Artme"></a>
							
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
								<i class="fa fa-bars" style="color: #355e9e; padding-right: 0; font-size: 32px; border: none;"></i>
							</button>
								
							<div class="collapse navbar-collapse justify-content-end p-0" id="collapsibleNavbar">
										
								<ul class="navbar-nav">
									<li class="nav-item"><a href="index.php" class="nav-link px-3 pt-1 pb-3" id="active">Discover Artists</a></li>
									<li class="nav-item"><a href="artmarket.php" class="nav-link px-3 py-1">Art Marketplace</a></li>
									<li class="nav-item"><a href="artists.php?login=" class="nav-link px-3 py-1">For Artists</a></li>
								</ul>
							</div>
						</div>  
					</nav>
				</div>
					

				<div class="col-md-2 d-flex justify-content-end">
					<div class="mx-3">
						<a class="logreg" id="log" href="userlogin.php">LogIn</a>	
					</div>
					
            </div>
	    </header>
    </div>

    <div class="container d-flex justify-content-center w-80" id="contform">
		<div class="sign mt-2 mb-4">  
			<h3 class="mb-4">Get your free account</h3>           
			<form action="usersignupprc.php" class="needs-validation" id="usform" novalidate method="POST">
														
				<div class="row text-left">
					<div class="col-md-6 mb-2">
						<div class="form-group">
							<label class="label" for="fname">FIRST NAME*<span class="error_form" id="fname_error_message"></span></label>
							<input type="text" class="form-control " id="fname" name="fname" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding-left: 3px;" required autofocus>
							
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
					</div>
						<div class="col-md-6">
						<div class="form-group">
							<label class="label" for="lname">LAST NAME*<span class="error_form" id="lname_error_message"></span></label>
							<input type="text" class="form-control" id="lname" name="lname" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding-left: 3px;" required>
							
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
					</div>
				</div>
										
				<div class="form-group text-left mb-2">
				
					<label class="label" id="uname" for="username">USERNAME*<span class="error_form" id="uname_error_message"></span><span id="availibility"></span></label>
					<input type="text" class="form-control" id="username" name="uname" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding-left: 3px;" required>
																		
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
															
				<script>
					$(document).ready(function(){
						$('#username').blur(function(){
							var username = $(this).val();
							$.ajax({
								url:"checkuname.php",
								method:"POST",
								data:{user_name:username},
								dataType:"text",
								success:function(html)
								{
									$('#availibility').html(html);
								}
							})
						})

					})
				</script>
															
				<div class="form-group text-left mb-2">
					<label class="label" for="email">EMAIL*<span class="error_form" id="email_error_message"></span><span id="eavailibility"></span></label>
					<input type="text" class="form-control" id="semail" name="email" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding-left: 3px;" required>
							
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<script>
					$(document).ready(function(){
						$('#semail').blur(function(){
							var useremail = $(this).val();
							$.ajax({
								url:"checkuname.php",
								method:"POST",
								data:{user_email:useremail},
								dataType:"text",
								success:function(html)
								{
									$('#eavailibility').html(html);
								}
							})
						})

					})
				</script>
									
										
															
				<div class="form-group text-left">
					<label class="label" for="pwd">PASSWORD*<span class="error_form" id="pwd_error_message"></span></label>
					<input type="password" class="form-control" id="spwd" name="spwd" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding-left: 3px;" required>
							
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
		
										
						
				<div class="form-group text-left">
					<label class="label" for="cpwd">CONFIRM PASSWORD*<span class="error_form" id="cpwd_error_message"></span></label>
					<input type="password" class="form-control" id="cpwd" name="cpwd" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; padding-left: 3px;" required>
							
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				
				<button type="submit" name="submit" class="btn btn-danger w-100">SIGN UP</button>
				</form>

				<script type="text/javascript">
					$(function() {
														$("#fname_error_message").hide();
														$("#lname_error_message").hide();
														$("#uname_error_message").hide();
														$("#email_error_message").hide();
														$("#pwd_error_message").hide();
														$("#cpwd_error_message").hide();
														var error_fname = false;
														var error_lname = false;
														var error_uname = false;
														var error_email = false;
														var error_pwd = false;
														var error_cpwd = false;
														$("#fname").focusout(function(){
															check_fname();
														});
														$("#lname").focusout(function() {
															check_lname();
														});
														$("#username").focusout(function() {
															check_uname();
														});
														$("#semail").focusout(function() {
															check_email();
														});
														$("#spwd").focusout(function() {
															check_pwd();
														});
														$("#cpwd").focusout(function() {
															check_cpwd();
														});
														function check_fname() {
															var pattern = /^[a-zA-Z]*$/;
															var fname = $("#fname").val();
															if (pattern.test(fname) && fname !== '') {
															$("#fname_error_message").hide();
															$("#fname").css("border-bottom","2px solid #34F458");
															} else {
															$("#fname_error_message").html("  Only Characters");
															$("#fname_error_message").show();
															$("#fname").css("border-bottom","2px solid #F90A0A");
															error_fname = true;
															}
														}
														function check_lname() {
															var pattern = /^[a-zA-Z]*$/;
															var sname = $("#lname").val()
															if (pattern.test(sname) && sname !== '') {
															$("#lname_error_message").hide();
															$("#lname").css("border-bottom","2px solid #34F458");
															} else {
															$("#lname_error_message").html("  Only Characters").css("color: #F90A0A");
															$("#lname_error_message").show();
															$("#lname").css("border-bottom","2px solid #F90A0A");
															error_lname = true;
															}
														}
														
														function check_uname() {
															var uname_length = $("#username").val().length;
															if (uname_length > 2) {
															$("#uname_error_message").hide();
															$("#username").css("border-bottom","2px solid #34F458");
															
															} else {
															$("#uname_error_message").html("  Atleast 3 characters");
															$("#uname_error_message").show();
															$("#username").css("border-bottom","2px solid #F90A0A");
															error_uname = true;
															}
														}

														
														function check_email() {
															var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
															var email = $("#semail").val();
															if (pattern.test(email) && email !== '') {
															$("#email_error_message").hide();
															$("#semail").css("border-bottom","2px solid #34F458");
															} else {
															$("#email_error_message").html("  Invalid Email");
															$("#email_error_message").show();
															$("#semail").css("border-bottom","2px solid #F90A0A");
															error_email = true;
															}
														}

														function check_pwd() {
															var password_length = $("#spwd").val().length;
															if (password_length < 8) {
															$("#pwd_error_message").html("Atleast 8 Characters");
															$("#pwd_error_message").show();
															$("#spwd").css("border-bottom","2px solid #F90A0A");
															error_pwd = true;
															} else {
															$("#pwd_error_message").hide();
															$("#spwd").css("border-bottom","2px solid #34F458");
															}
														}
														function check_cpwd() {
															var pwd = $("#spwd").val();
															var cpwd = $("#cpwd").val();
															if (pwd !== cpwd) {
															$("#cpwd_error_message").html("  Passwords do not match");
															$("#cpwd_error_message").show();
															$("#cpwd").css("border-bottom","2px solid #F90A0A");
															error_cpwd = true;
															} else {
															$("#cpwd_error_message").hide();
															$("#cpwd").css("border-bottom","2px solid #34F458");
															}
														}

														$("#usform").submit(function() {
															error_fname = false;
															error_lname = false;
															error_uname = false;
															error_email = false;
															error_pwd = false;
															error_cpwd = false;
															check_fname();
															check_lname();
															check_uname();
															check_email();
															check_pwd();
															check_cpwd();
															if (error_fname === false && error_lname === false &&  error_uname === false && error_email === false && error_pwd === false && error_cpwd === false) {
															alert("Registration Successfull");
															return true;
															} else {
															alert("Please Fill the form Correctly");
															return false;
															}
														});
					});
				</script>

		</div>

	</div>
    <?php
	require_once("footer.php");
    ?>

