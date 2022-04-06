
<?php
	require_once("head.php");
	if(!isset($_SESSION['u_id'])){
		header("location: mechanics.php?login=");
	}
?>

<body>
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

	

		<div class="container">			
			
			<div class="content mt-5">
                <?php
                require 'includes/dbh.inc.php';
                $uid = $_SESSION['u_id'];
				$sql = "SELECT * FROM realartists WHERE artist_id='$uid';";
				$result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                
                $atable=$row["artist_first"].$uid;
                ?>
                <div class="table-responsive-md">
                    <table id="artmsg" class="table table-striped artmsgtable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>CONTACT</th>
								<th>MESSAGE</th>
								<th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        
                                
                            $sql2 = "SELECT * FROM $atable";
                            $result = mysqli_query($conn2, $sql2);
                            $resultCheck = mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?php echo ucfirst($row["username"]);?></td> 
                                    <td><?php echo $row["contact"];?></td>
									<td><?php echo $row["usermessage"];?></td>
									<td class="actions">
                                	<a href="includes/deletemsg.inc.php?id=<?php echo $row["id"];?> & arttbl=<?php echo $atable;?>" class="btn btn-danger btn-sm mt-1" onclick='return confirm("Are you sure you want to delete this message?");'>delete</a>
                            		</td>
                                </tr>
                            <?php 
                            } 
                            ?>
                        </tbody>
                    </table>
                    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    
                    <script>
                        $('.artmsgtable').DataTable();
                    </script>
                </div>					
			</div>
	    </div>
<?php
	require_once("footer.php");
?>
		