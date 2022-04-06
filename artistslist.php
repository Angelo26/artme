<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/artistsliststyle.css">
	

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

		<div class="container my-3">
			<section class="list text-center">
				<div class="profiles">
					<div class="row">
						<?php
						if (isset($_POST['submit'])) {

							require 'includes/dbh.inc.php';
			
							$skill = mysqli_real_escape_string($conn, $_POST['skill']);
                        
							$sql = "SELECT * FROM realartists WHERE artist_skill1 like '%$skill%' OR artist_skill2 like '%$skill%' OR artist_skills like '%$skill%'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if($resultCheck<1) {
							?>
								<img class="w-50 h-100 mx-auto" src="imgs/no_result.gif">

							<?php
							}

							$c=0;
							for($r=0;$r<($resultCheck/3);$r++) {
								$i=0;
								
								while($i<4){
									$row = mysqli_fetch_assoc($result);
									$c++;
								?>
									
								<div class="col-md-4 my-3">
								<div class="card hover">
										<div class="card-img" style="background-image: linear-gradient(rgba(0, 0, 0, .2), rgba(255, 255, 255, 0.1), rgba(0, 0, 0, .2)), url(imgs/artback.jpg);">
											<img class="mt-5" src="<?php echo $row["artist_img"];?>" width="130" height="130" style="border: 3px solid #fff; padding:3px; border-radius: 50%; box-shadow: 4px 5px 5px rgba(0, 0, 0, 0.5)">
											<div class="overlay">
												<div class="overlay-content">
													<a class="hover" href="artistdetail.php?id=<?php echo $row["artist_id"];?>" class="send">View More</a>
												</div>
											</div>
										</div>
										
										<div class="card-content text-left">
											<a>
											<h5 class="card-title">
												<?php 
												if ($row["artist_status"]==="active") {
												?>
												<div><p style="font-weight: bold;"><i class="fa fa-user" style="color: limegreen;"></i><?php echo "      ".ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"])." ";?><span style="color: limegreen; font-size: 14px;" >(ACTIVE)</span></p></div>
												<?php
												}
												if($row["artist_status"]==="not active") {
												?>
												<div><p style="font-weight: bold;"><i class="fa fa-user" style="color: darkgray;"></i><?php echo "      ".ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"])." ";?><span style="color: darkgray; font-size: 14px;">(NOT ACTIVE)</span></p></div>
												<?php
												}
												?>
												</h5>
												<div class="row d-flex">
													<p class="card-text py-1 px-4 m-0 my-1 ml-3" style="background: dodgerblue; color: #fff; border-radius: 5px; cursor: pointer;"><?php echo ucfirst($row["artist_skill1"]);?></p>
													<p class="card-text py-1 px-4 m-0 my-1 ml-3" style="background: salmon; color: #fff; border-radius: 5px; cursor: pointer;"><?php echo ucfirst($row["artist_skill2"]);?></p>
												</div>
												<p class="card-text mt-2"><i class="fa fa-map-marker"></i><?php echo "      ".$row["artist_address"];?></p>
												

												<script>
												$(document).ready(function() {
	
													$('.card').delay(1800).queue(function(next) {
														$(this).removeClass('hover');
														$('a.hover').removeClass('hover');
														next();
													});
												});
												</script>
											</a>
										</div>
									</div>

								</div>
							<?php 
									$i++;
								
								if($c==$resultCheck) {
									goto end;
								}
								}
							}	
							end:
						}
						?>
						
						
						</div>
					</div>
					
				</div>
			</section>
		</div>
<?php
	require_once("footer.php");
?>
