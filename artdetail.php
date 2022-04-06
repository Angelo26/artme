<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/artsdetailstyle.css">

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
									<li class="nav-item"><a href="artmarket.php" class="nav-link px-3 pt-1 pb-3" id="active">Art Marketplace</a></li>
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

		<div class="container">		
            <div class="contact-detail my-4">

                <?php

						require 'includes/dbh.inc.php';
			
						$vid = $_GET['id'];
                        
						$sql = "SELECT * FROM artworks WHERE art_id ='$vid'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
							
						$row = mysqli_fetch_assoc($result);		
                    ?>
                
			    <div class="row d-flex">
						
					<div class="col-md-6">
						<div class="artdone d-flex justify-content-center"><img src="admin/include/<?php echo $row["picture"];?>" width="40%" id="artwork" alt=""></div>
					</div>
					<div class="col-md-6">
						<div>
							<h2 class="my-3"><?php echo $row["art_name"]."  ".$row["art_style"];?></h2>
							<p class="mt-3 mb-5">By <?php echo $row["artist"];?></p>
							<h3  class="my-5"style="color: salmon;">Rs. <?php echo $row["price"];?></h3>
							<h5 class="mt-5 mb-4"><span style="font-weight: bold; color: dodgerblue;"><?php echo ucfirst($row["astatus"]);?></h5>
							<button class="btn btn-primary">Buy now</button>
							<button class="btn btn-danger mx-5">Pre-Order</button>
						</div>
					</div> 
				</div>
			</div>
		</div>
		
<?php
	require_once("footer.php");
?>
