<?php
	require_once("header.php");
?>
<body>
    
<link rel="stylesheet" type="text/css" href="../css/adminaddartsstyle.css">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="dashboard.php"><img src="../imgs/artmelogo.png" width="20%" style="cursor: pointer;"></a>
            </div>
            <div class="admin">
                    <?php
							require 'include/dbh.inc.php';

							$user = $_SESSION['u_uid'];
							$sql = "SELECT * FROM admins WHERE id='$user';";
							$result = mysqli_query($conn, $sql);
							
							$row = mysqli_fetch_assoc($result);
					?>
                    <img src="<?php echo $row["photo"];?>" class="m-2" width="100" height="100" style="border-radius: 50%; padding: 3px; border: 3px solid lime; ">
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php" style="text-decoration: none;">DashBoard</a>
                </li>
                <li>
                    <a href="#artists" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">Artists</a>
                    <ul class="collapse list-unstyled" id="artists">
                        <li>
                            <a href="verifyartists.php" style="text-decoration: none;">Verify Artists</a>
                        </li>
                        <li>
                            <a href="adminartists.php" style="text-decoration: none;">View Artists</a>
                        </li>
                    </ul>
                </li>

                <li class="active">
                    <a href="#artworks" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" style="text-decoration: none;">Art Works</a>
                    <ul class="collapse list-unstyled" id="artworks">
                        <li>
                            <a href="verifyarts.php" style="text-decoration: none;">Verify Artworks</a>
                        </li>
                        <li>
                            <a href="addartworks.php" style="text-decoration: none;">Add Artworks</a>
                        </li>
                        <li>
                            <a href="adminartworks.php" style="text-decoration: none;">View Artworks</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <a href="adminusers.php" style="text-decoration: none;">View Users</a>
                </li>

                <li>
                    <a href="chgdesc.php" style="text-decoration: none;">Update Reviews</a>
                </li>
                
                <li>
                    <a href="adminsetting.php" style="text-decoration: none;">Setting</a>
                </li>
            </ul>
            <script>
                $(document).ready(function () {
                    $('#sidebarCollapse').on('click', function () {
                        $('#sidebar').toggleClass('active');
                    });
                });
            </script>
        </nav>
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-align-left"></i>
                        
                    </button>
                   
                    <?php
                        if(isset($_SESSION['u_uid'])) {
                            echo '<form action="include/logout.inc.php" method="POST">
                             <button class="btn btn-primary" type="submit" name="submit">Log out</button>
                            </form>';
                        }
                        else
                            header("location:index.php");
                    ?>
             
                </div>
            </nav>


            <div class="content">    

                <div class="actual-form">
                    
                    <div class="text-center"><h2 style="color:rgba(0, 0, 0, 0.6);">Register New Artworks</h2></div>
                    <form class="add-details" action="include/adminaddarts.inc.php" method="POST" enctype="multipart/form-data">
                        
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
                                    
                                    <div><button type="submit" name="submit" class="btn btn-primary my-4 w-50">Save</button></div>
                           
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>