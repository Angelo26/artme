
<?php
	require_once("head.php");

	require 'includes/dbh.inc.php';
    $mid=$_GET['id'];
    if(!isset($_SESSION['useremail'])){
    
		header("location: userlogin.php?Please_Login_first");
	
	}
?>
	<link rel="stylesheet" type="text/css" href="css/artistdetailstyle.css">
	
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

		
		<div class="container emp-profile">
			<?php

			require 'includes/dbh.inc.php';

			$aid = $_GET['id'];

			$sql = "SELECT * FROM realartists WHERE artist_id ='$aid'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
				
			$row = mysqli_fetch_assoc($result);		
			?>

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="<?php echo $row["artist_img"];?>" class="img-fluid" style="width: 45%; height: 100%; border-radius: 5%; box-shadow: 4px 5px 4px rgba(0,0,0,0.4); padding: 3px; border: 4px solid rgba(1,25,44,0.8);" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head my-3">
							<?php 
							if ($row["artist_status"]==="active") {
							?>
								<h5><?php echo ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"])." ";?><span style="color: limegreen; font-weight: 700; font-size: 18px;" >(active)</span></h5>
							
							<?php	
							}

							if($row["artist_status"]==="not active") {
							?>
								<h5><?php echo ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"])." ";?><span style="color: darkgray; font-weight: 700; font-size: 18px;">(not active)</span></h5>
							<?php
							}
							
							
							$tblname=$row["artist_first"].$aid;
						
							$sql4="SELECT * FROM $tblname;";
							$result4 = mysqli_query($conn3, $sql4);
							$total = mysqli_num_rows($result4);
							?>		
									
							<i><p><?php echo ucfirst($row["artist_desc"])?></p></i>


							<p class="followers my-3"><i class="fa fa-users"> <span><?php echo $total;?></span></i></p>
							
							<div class="row d-flex flex-row justify-content-start">
								<div class="col-md-6 my-2" style=""><button data-toggle="modal" data-target="#contact" class="btn btn-success">Contact</button></div>
									<div class="modal" id="contact" data-keyboard="false" data-backdrop="static">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">

											
												<div class="modal-header">
													<div class=" text-center"><h4 class="modal-title text-success" style="font-size: 18px;">Contact <?php echo ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"]);?></h4></div>
													<button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
												</div>

												
												<div class="modal-body">
													<form action="includes/artmessage.inc.php?id=<?php echo $row["artist_id"];?>" method="post">
														
														<div>
															<input type="text" class="contact-form p-2 mb-2 w-100" id="name" name="name" placeholder="What's your name...">
														</div>
														<div>
															<input type="text" class="contact-form p-2 mb-2 w-100" id="contact" name="contact" placeholder="Give something to contact you">
														</div>
														<div>
															<textarea class="contact-form p-2 mb-2" id="request" name="message" placeholder="Write your request..." style="height:180px; width: 100%; resize: none; overflow-y: auto;"></textarea>
														</div>
														<div class="text-right">
															<button type="submit" class="btn btn-primary" name="submit">Send <i class="fa fa-paper-plane ml-1" aria-hidden="true"></i></button>
														</div>
													</form>
												</div>

											</div>
										</div>
									</div>
									<?php
										$uemail=$_SESSION['useremail'];
										$tbname=$row["artist_first"].$aid;
									
										$sql3="SELECT * FROM $tbname WHERE client='$uemail';";
										$result3 = mysqli_query($conn3, $sql3);
										$client = mysqli_num_rows($result3);
										
										if ($client < 1) {?>
											<div class="col-md-6 my-2"><a class="btn btn-primary" href="client.php?id=<?php echo $mid?>">Follow</a></div>
										<?php } 
										else {?>

										<div class="col-md-6 my-2"><a class="btn btn-danger" href="delclient.php?id=<?php echo $mid?>">Unfollow</a></div>
										<?php } ?>		
							</div>
                    	</div>
					</div>
                </div>
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="profile-work my-2">
                            <h5 style=" font-weight: bold; color: rgba(0,0,0,0.5); text-decoration: underline;">SKILLS</h5>
                            <p class="p-0 m-0 py-1 px-3 my-2" style="border-radius: 5px; background: salmon; color: #fff;"><?php echo "   ".$row["artist_skill1"];?></p>
                            <p class="p-0 m-0 py-1 px-3 my-2" style="border-radius: 5px; background: dodgerblue; color: #fff;"><?php echo "   ".$row["artist_skill2"];?></p>
                            <p class="p-0 m-0 py-1 px-3 my-2" style="border-radius: 5px; background: gold; color: #fff;"><?php echo "   ".$row["artist_skills"];?></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div id="myTabContent">
                            <div id="home">

									<h5 style=" font-weight: bold; color: rgba(0,0,0,0.7);">About</h5>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"])." ";?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo "   ".$row["artist_email"];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo "   ".$row["artist_contact"];?></p>
                                            </div>
										</div>
										<div class="row">
                                            <div class="col-md-4">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-8">
                                                <p><?php echo "   ".$row["artist_address"];?></p>
                                            </div>
                                        </div>
                            	</div>
                            </div>
                        </div>
                    </div>
					</div>  
        		</div>
			</div>
		</div>

<?php
	require_once("footer.php");
?>