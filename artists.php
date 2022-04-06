<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/artistsstyle.css">
<body>
	<div class="container">
		<header class="my-4">
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
									<li class="nav-item"><a href="index.php" class="nav-link px-3 py-1">Discover Artists</a></li>
									<li class="nav-item"><a href="artmarket.php" class="nav-link px-3 py-1">Art Marketplace</a></li>
									<li class="nav-item"><a href="artists.php?login=" class="nav-link px-3 pt-1 pb-3" id="active">For Artists</a></li>
								</ul>
							</div>
						</div>  
					</nav>
				</div>
					

				<div class="col-md-2 d-flex justify-content-end">
				<?php
					if(isset($_SESSION['useremail'])) {
                    echo '<form action="includes/userlogout.inc.php" method="POST">
                            <button class="logreg mx-2" type="submit" name="submit" id="logout">Log out</button>
                        </form>';	
					}
					else {
					?>
					<div class="mx-3">
						<a class="logreg" id="log" href="userlogin.php">LogIn</a>	
					</div>
					
					<div>
						<a class="logreg" id="reg" href="usersignup.php">SignUp</a>	
					</div>	
					
					<?php
					}
					?>
				</div>
			</div>
		</header>
	</div>

	<?php session_destroy(); ?>
	<div class="container">
		<div class="row my-5">
			<div class="col-md-6 text-center">
				<section class="login-content mt-3">
					<h2>Login to Your Account</h2>
					 
					<?php
						if($_GET['login']) {
							$message = $_GET['login'];
					?>
						<p style="color: red; text-align: center;">**<?php echo $message;?>**</p> 
					<?php	
						}
					?> 
					<form  class="needs-validation mt-3" id="login" action="includes/login.inc.php" method="POST">
						<label for="email">EMAIL</label>
						<div>
							<input type="email" id="email" name="email" required autofocus>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						
						<label for="password" class="mt-4">PASSWORD</label>
						<div>
							<input type="password" id="password" name="password" required>
							<div class="invalid-feedback">Please fill out this field.</div>
						</div>
						<a href="#" class="forgot">Forgot password?</a>
						<div class="mt-5"><button type="submit" class="btn" name="submit">SIGN IN</button></div>
					</form>  
					
				</section>
			</div>
			<script>
					(function() {
					  'use strict';
					  window.addEventListener('load', function() {
						var forms = document.getElementsByClassName('needs-validation');
						var validation = Array.prototype.filter.call(forms, function(form) {
						  form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
							  event.preventDefault();
							  event.stopPropagation();
							}
							form.classList.add('was-validated');
						  }, false);
						});
					  }, false);
					})();
			</script>

			<div class="col-md-6 text-center">
				<section class="signup-content">
					<div class="up">
						<h2 class="my-2">New here?</h2> 
						<p>Sign up and discover great amount of new opportunities!</p>
					</div>
					<div class="sgup"><a href="signup.php?signup=">SIGN UP</a></div>
				</section>
			</div>
		</div>
	</div>
<?php
	require_once("footer.php");
?>