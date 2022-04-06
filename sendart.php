
<?php
	require_once("head.php");
	if(!isset($_SESSION['u_id'])){
		header("location: artists.php?login=");
	}
?>
<link rel="stylesheet" type="text/css" href="css/adminaddartsstyle.css">

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


    <div class="content">    

        <div class="actual-form">
                    
            <div class="text-center"><h2 style="color:rgba(0, 0, 0, 0.6);">Register Your Artworks</h2></div>
            <form class="add-details" action="includes/addarts.inc.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-4 my-5">

                                <div class="img">
                                        <img id="output_image" alt="" height="150px" width="200">
                                        
                                        <label for="image" class="btn btn-primary w-100 my-4">Upload</label>

                                        <div style="visibility: hidden;" id="hidden"><input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)" required></div>
                                </div>
                                <script type='text/javascript'>
                                    function preview_image(event) {
                                        var reader = new FileReader();
                                        reader.onload = function () {
                                            var output = document.getElementById('output_image');
                                            output.src = reader.result;
                                        }
                                        reader.readAsDataURL(event.target.files[0]);
                                    }
                                </script>
                            </div>
                                    
                            <div class="col-md-8 my-4">
                                <div class="vform">
                                    
                                    <label for="name">Art Name</label>
                                    <div><input type="text" id="name" name="name" required></div>
                                        
                                    <label for="style">Art Style</label>
                                    <div><input type="text" id="style" name="style" required></div>

                                    <label for="artist">Artist</label>
                                    <div><input type="text" id="artist" name="artist" required></div>
                                        
                                    <label for="price">Price</label>
                                    <div><input type="text" id="price" name="price" required></div>
                                    
                                    <div><button type="submit" name="submit" class="btn btn-primary my-4 w-50">Send</button></div>
                           
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?php
	require_once("footer.php");
?>