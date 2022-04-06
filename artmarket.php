<?php
	require_once("head.php");
?>
	<link rel="stylesheet" type="text/css" href="css/artsliststyle.css">

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

  <div class="container container-fluid">
    <div class="row">
		<?php
		require 'includes/dbh.inc.php';
		$sql = "SELECT * FROM artworks";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		$c=0;
							
		for($r=0;$r<5;$r++){
			$i=0;
		?>
			<div class="column">
				<?php
				while($i<($resultCheck/5)){
					$row = mysqli_fetch_assoc($result);
					$c++;
				?>		
			
					<a href="artdetail.php?id=<?php echo $row["art_id"];?>" class="send">
						<img src="admin/include/<?php echo $row["picture"];?>" class="img-fluid" alt="">
					</a>
					
				<?php 
					$i++;	
					if($c==$resultCheck) {
						goto end;
					}
				}

				?>
			</div>
		<?php	
		}	
		end:
		?>
      
    </div>
  </div>
</div>
<?php
	require_once("footer.php");
?>