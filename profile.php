
<?php
	require_once("head.php");
	if(!isset($_SESSION['u_id'])){
		header("location: artists.php?login=");
	}
?>
<link rel="stylesheet" type="text/css" href="css/profilestyle.css">


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
			<section class="profile">
					<div class="phead my-1 d-flex flex-row">
						
						<?php
							require 'includes/dbh.inc.php';

							$uid = $_SESSION['u_id'];
							$sql = "SELECT * FROM realartists WHERE artist_id='$uid';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result);
						?>
							<h2 class="yp my-auto mx-5 p-3 w-100" style="font-family: Arial Rounded MT;">Welcome <?php echo ucfirst($row["artist_first"]);?> </h2>
							
							<div id="chpwd" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
								<div class="modal-dialog">

									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title mx-auto" style="color: rgba(0, 0, 0, 0.6)">Set a New Password</h4>
										</div>
										<div class="modal-body text-center">
											<form class="form-container" action="includes/changepwd.inc.php" method="POST">
												<div class="change">
													
													<label for="oldpwd" style="color: rgba(0, 0, 0, 0.6)">CURRENT PASSWORD</label>
													<div class="mb-3"><input type="password" id="oldpwd" name="oldpwd" style="padding: 0 5px; border: none; border-bottom: 1px solid rgba(1, 25, 44, .4)" required></div>
													<label for="pwd">NEW PASSWORD</label>
													<div class="mb-3"><input type="password" id="mpwd" name="pwd" style="padding: 0 5px; border: none; border-bottom: 1px solid rgba(1, 25, 44, .4)" required></div>
													<label for="cpwd">CONFIRM NEW PASSWORD</label>
													<div class="mb-3"><input type="password" id="mcpwd" name="cpwd" style="padding: 0 5px; border: none; border-bottom: 1px solid rgba(1, 25, 44, .4)" required></div>
													<div><button type="submit" name="submit" class="btn btn-primary w-25">Save</button></div>
					
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										</div>
									</div>
									
								</div>
							</div>
				
							<div class="row d-flex flex-row">
								<div><button type="button" id="open-button" class="btn mt-3" style=" color: #fff; background: transparent; border: 2px solid #fff;" data-toggle="modal" data-target="#chpwd">Change Password</button></div>
								<div>
								<form class="m-status my-auto" action="includes/status.inc.php" method="POST">
									<?php
									if(strtolower($row["artist_status"])==="active") {
									?>
										<div style="visibility: hidden; font-size: 0;"><input type="text" id="status" name="status" value="not active"></div>
										<div class="my-auto"><button type="submit" name="submit" class="btn" id="de" style="background: darkgray;">Deactivate</button></div>
									<?php
									}
									if(strtolower($row["artist_status"])==="not active") {
									?>
										<div style="visibility: hidden; font-size: 0;"><input type="text" id="status" name="status" value="active"></div>
										<div class="my-auto"><button type="submit" name="submit" class="btn" id="ac" style="background: rgb(87, 136, 67);">Activate</button></div>
									<?php
									}
									?>
								</form>
								</div>
							
								<div class="my-auto mx-3">
									<form action="includes/logout.inc.php" method="POST">
										<button type="submit" name="submit" id="logout" class="btn">Log out</button>
									</form>
								</div>	 
							</div>

					</div>
				<div class="content">
					<form class="update-details" action="updateprc.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4">
								<div class="img text-center mt-1">
									<img id="output_image" src="<?php echo $row["artist_img"];?>" alt="">
									<div class="mt-2">
										<label class="btn btn-primary m-0" for="image">Change Picture</label>
										<input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)">
										
										
									</div>
								</div>
								
								<script>
									function preview_image(event) {
										var reader = new FileReader();
										reader.onload = function () {
											var output = document.getElementById('output_image');
											output.src = reader.result;
										}
										reader.readAsDataURL(event.target.files[0]);
									}
								</script>

							<?php
								$mesg=$row["artist_first"].$uid;
								$sql5 = "SELECT * FROM $mesg";
                                $result5 = mysqli_query($conn2, $sql5);
                                $artmsg = mysqli_num_rows($result5);
							?>
							<div class="row d-flex justify-content-center msg mt-4"><a class="mt-1 mx-1" href="artistmsgs.php" style="color: #fff;"><i id="micon" class="fa fa-envelope" aria-hidden="true" style="font-size: 20px; color: dodgerblue;"></i></a><p class="m-0" style="color: dodgerblue; font-size: 20px;"><?php echo $artmsg?></p></div>
							
							<?php
							$tblname=$row["artist_first"].$uid;
						
							$sql4="SELECT * FROM $tblname;";
							$result4 = mysqli_query($conn3, $sql4);
							$total = mysqli_num_rows($result4);
							?>		
							
							<div class="row d-flex justify-content-center msg mb-4"><p class="followers" style="color: crimson; font-size: 19px"><i class="fa fa-users"> <?php echo $total;?></i></p></div>
							
								<div class="my-3">
									<label for="desc">About</label>
									<textarea class="contact-form p-2 mb-2" id="bio" name="bio" placeholder="<?php echo ucfirst($row["artist_desc"]);?>" style="height:120px; width: 100%; resize: none; overflow-y: auto;"></textarea>
								</div>
										
								
							<div class="mb-3"><a href="sendart.php" class="btn btn-success btn-md my-3" style="color: #fff; text-decoration: none; width: 100%;">Send Art</a></div>

							</div>

							<div class="col-md-8">
								<div class="actual-form w-75 mt-4 mx-auto">
									<div class="row m-0 w-100">
										<div class="col-md-6 p-0">
											<label for="fname">First Name</label>
											<input type="text" id="fname" name="fname" value="<?php echo ucfirst($row["artist_first"]);?>" style="width: 80%;">
										</div>
										<div class="col-md-6 p-0">
											<label for="lname">Last Name</label>
											<input type="text" id="lname" name="lname" value="<?php echo ucfirst($row["artist_last"]);?>" style="width: 80%;">
										</div>
									</div>

									<label for="email">Email</label><span id="artavailibility"></span>
									<div><input type="email" style="width: 90%;" id="memail" name="email" value="<?php echo $row["artist_email"];?>"></div>
									
													<script>
														$(document).ready(function(){
															$('#aemail').blur(function(){
																var aemail = $(this).val();
																$.ajax({
																	url:"checkuname.php",
																	method:"POST",
																	data:{a_email:aemail},
																	dataType:"text",
																	success:function(html)
																	{
																		$('#artavailibility').html(html);
																	}
																})
															})

														})
													</script>

									<label for="address">Address Line</label>
									<div><input type="text" style="width: 90%;" id="address" name="address" value="<?php echo ucfirst($row["artist_address"]);?>"></div>
									<label for="garage">Other Art Skills</label>
									<div><input type="text" style="width: 90%;" id="skills" name="skills" value="<?php echo ucfirst($row["artist_skills"]);?>"></div>
									<label for="state">Primary Skill</label>
									<div class="slct">
										<select class="form-control skills" name="skill1" id="skill1" style="width: 90%; border-radius: 0;">
											<option value="<?php $row["artist_skill1"];?>"><?php echo ucfirst($row["artist_skill1"]);?></option>
											<option value="sketch">Sketch</option>
											<option value="sculpture">Sculpture</option>
											<option value="digital art">Digital Art</option>
											<option value="painting">Painting</option>
											<option value="3D modeling">3D Modeling</option>
											<option value="photoshop art">Photoshop art</option>
											<option value="logo design">Logo Design</option>
											<option value="graphic design">Graphic Design</option>
										</select>	
									</div>
									<label for="state">Secondary Skill</label>
									<div class="slct">
										<select class="form-control skills" name="skill2" id="skill2" style=" width: 90%; border-radius: 0;">
											<option value="<?php $row["artist_skill2"];?>"><?php echo ucfirst($row["artist_skill2"]);?></option>
											<option value="sketch">Sketch</option>
											<option value="sculpture">Sculpture</option>
											<option value="digital art">Digital Art</option>
											<option value="painting">Painting</option>
											<option value="3D modeling">3D Modeling</option>
											<option value="photoshop art">Photoshop art</option>
											<option value="logo design">Logo Design</option>
											<option value="graphic design">Graphic Design</option>
										</select>
										
									</div>
									<label for="contact">CONTACT NO.</label>
									<div><input type="text" style="width: 90%;" id="contact" name="contact" value="<?php echo $row["artist_contact"];?>"></div>
									
									<div class="mb-3"><button type="submit" style="width: 90%;" name="submit" class="btn btn-primary btn-md mt-4 mb-2">Update Profile</button></div>
									
								</div>
							</div>

						</div>
					</form>
				</div>
			</section>
															
		</div>
<?php
	require_once("footer.php");
?>
		