<?php
	require_once("head.php");
?>
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
								
							<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
										
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
				<?php
					if(isset($_SESSION['useremail'])) {
                    echo '<form action="includes/userlogout.inc.php" method="POST">
                            <button class="logreg mx-2" type="submit" name="submit" id="logout">Log out</button>
                        </form>';	
					}
					else {
					?>
					<div>
						<a class="logreg mx-4" id="log" href="userlogin.php">LogIn</a>	
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

	<div class="container">
		
		<main class="cover">
			<section class="first p-0 mt-5">
				
				<div class="row d-flex">
				
					<div class="col-md-6 search-bar">
						<h1 class="p-0 m-0">Explore the best freelance service for your <span style="font-family: Jokerman; color: salmon; font-weigh: 800">ART</span></h1>
							
						<h5 id="ser">Discover and Hire your needed Artist</h5>
						
						<form id="input" action="artistslist.php" method="POST">
							<div class="srch d-flex flex-row">
								<input type="text" class="txt w-80 mt-3" name="skill" required placeholder="Eg: Sketch, Painting, Digial Art">
				
								<button type="submit" class="bton mt-3 px-3" name="submit" id="btn">Search</button>
							</div>
						</form>
					</div>

				</div>
			
			</section> 
			
		</main>
	</div>
	<div style="width: 100%; background: #f1f0fe;">
		<div class="container">
			<main>
				<section class="second pt-4 pb-5">
					<h2>What do we offer</h2>
					<div class="row d-flex" id="services">
						<div class="col-md-4">

							<div class="box my-1 mx-0 p-0" id="cont1">
								<div class="icon">
									<img src="imgs/searchart.png" alt="">
								</div>
								<div class="content">
									<h3>Search Artists</h3>
									<p>
										Art service at competitive rates! Find the work related artist and schedule meetings at your convenience.
									</p>
								</div>
							</div>
						</div>

						<div class="col-md-4" id="cont2">

							<div class="box my-1 mx-0 p-0">
								<div class="icon">
									<img src="imgs/artplace.png" alt="">
								</div>
								<div class="content">
									<h3>Art Marketplace</h3>
									<p>
										Explore into the Art world and get to know the artist, price and information of the Artworks.
									</p>
								</div>
							</div>
						</div>


						<div class="col-md-4" id="cont4">

							<div class="box my-1 mx-0 p-0">
								<div class="icon">
								<img src="imgs/artist.png" alt="">
								</div>
								<div class="content">
									<h3>For Artists</h3>
									<p>
										Join us if you are an Artist and we will do all the heavy lifting so you can focus on giving your customers
										great service!
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</main>
		</div>
	</div>

	<div class="container">
		
		<main>
			<section class="third pt-4 pb-5">
				<h2>How can you work</h2>

				<div class="row d-flex">
					<div class="col-md-3 my-3">
						<div class="boxw my-1 mx-0 p-0">
							<div class="icon">
								<img src="imgs/step1.png" height="90" alt="">
							</div>
							<div class="content my-3">
								<h4>Step 1.</h4>
								<p>
									Goto For Artist menu and register yourself.
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 my-3">
						<div class="boxw my-1 mx-0 p-0">
							<div class="icon">
								<img src="imgs/step2.png" height="90" alt="">
							</div>
							<div class="content my-3">
								<h4>Step 2.</h4>
								<p>
									Put your most effctive skill and wait for the client.
								</p>
							</div>
						</div>

					</div>

					<div class="col-md-3 my-3">
						<div class="boxw my-1 mx-0 p-0">
							<div class="icon">
								<img src="imgs/step3.png" height="90" alt="">
							</div>
							<div class="content my-3">
								<h4>Step 3.</h4>
								<p>
									Get a appointment and meet with the client.
								</p>
							</div>
						</div>
					</div>

					<div class="col-md-3 my-3">
						<div class="boxw my-1 mx-0 p-0">
							<div class="icon">
								<img src="imgs/step4.png" height="90" alt="">
							</div>
							<div class="content my-3">
								<h4>Step 4.</h4>
								<p>
									Work greatly and get paid.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>


			<section class="fourth">
				<h2>What our clients say</h2>
				
				<div class="row">
					<div class="col-md-8 col-center m-auto">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<?php
								
								require 'includes/dbh.inc.php';
			
								$sql1 = "SELECT * FROM changedesc where id ='1';";
								$result1 = mysqli_query($conn, $sql1);
								$row1 = mysqli_fetch_assoc($result1);
								
								$sql2 = "SELECT * FROM changedesc where id ='2';";
								$result2 = mysqli_query($conn, $sql2);
								$row2 = mysqli_fetch_assoc($result2);

								$sql3 = "SELECT * FROM changedesc where id ='3';";
								$result3 = mysqli_query($conn, $sql3);
								$row3 = mysqli_fetch_assoc($result3);
								
							?>
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"><i class="fa fa-circle"></i></li>
								<li data-target="#myCarousel" data-slide-to="1"><i class="fa fa-circle"></i></li>
								<li data-target="#myCarousel" data-slide-to="2"><i class="fa fa-circle"></i></li>
							</ol>   
							<div class="carousel-inner">
								<div class="item carousel-item active">
									<div class="img-box"><img src="<?php echo $row1["img"];?>" alt=""></div>
									<p class="testimonial"><i class="fa fa-quote-left"></i> <?php echo $row1["udesc"];?><i class="fa fa-quote-right"></i></p>
									<p class="overview"><b><?php echo $row1["fname"]." ".$row1["lname"];;?></b> , <?php echo $row1["profession"];?></p>
								</div>
								<div class="item carousel-item">
									<div class="img-box"><img src="<?php echo $row2["img"];?>" alt=""></div>
									<p class="testimonial"><i class="fa fa-quote-left"></i> <?php echo $row2["udesc"];?><i class="fa fa-quote-right"></i></p>
									<p class="overview"><b><?php echo $row2["fname"]." ".$row2["lname"];;?></b> , <?php echo $row2["profession"];?></p>
								</div>
								<div class="item carousel-item">
									<div class="img-box"><img src="<?php echo $row3["img"];?>" alt=""></div>
									<p class="testimonial"><i class="fa fa-quote-left"></i> <?php echo $row3["udesc"];?><i class="fa fa-quote-right"></i></p>
									<p class="overview"><b><?php echo $row3["fname"]." ".$row3["lname"];;?></b> , <?php echo $row3["profession"];?></p>
								</div>
								
							</div>
							
							<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div>
				</div>
			</section>		
		</main>
	</div>
<?php
	require_once("footer.php");
?>
