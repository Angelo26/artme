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
						<a class="logreg" id="reg" href="usersignup.php">SignUp</a>	
					</div>
					
            </div>
	    </header>
    </div>

    <div class="container d-flex justify-content-center w-80" id="contform">
		<div class="sign mt-2 mb-4">  
			<h3 class="mb-4">Login and Explore more</h3>           
			 <form action="includes/userlogin.inc.php" class="needs-validation" method="POST">
								
				<div class="form-group mb-5">
					<label class="label" for="userl">EMAIL/USERNAME</label>
					<span id="uavail"></span>
					<input type="text" class="form-control mx-auto text-center p-1" id="userl" name="userid" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; background: transparent;" required>
					<div class="valid-feedback">Valid.</div>
					<div class="invalid-feedback">Please fill out this field.</div>
				</div>
				<script>
					$(document).ready(function(){
						$('#userl').blur(function(){
							var userlog = $(this).val();
							$.ajax({
								url:"checkuname.php",
								method:"POST",
								data:{user_log:userlog},
								dataType:"text",
								success:function(html)
								{
									$('#uavail').html(html);
								}
							})
						})

					})
				</script>
													
		    <div class="form-group mt-4 mb-5">
		    	<label class="label" for="pwd">PASSWORD</label>
		    	<input type="password" class="form-control mx-auto text-center p-1" id="pwd" name="password" style="border: none; border-bottom: 1px solid rgba(0, 0, 0, 0.3); border-radius: 0; background: transparent;" required>
		    	<div class="valid-feedback">Valid.</div>
		    	<div class="invalid-feedback">Please fill out this field.</div>
		    </div>		
		    <button type="submit" name="login" class="btn btn-primary w-100">LOG IN</button>
		    </form>
        </div>

	</div>
    <?php
	require_once("footer.php");
    ?>

