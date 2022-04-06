
<?php
	require_once("header.php");
?>

<link rel="stylesheet" type="text/css" href="../css/adminsettingstyle.css">

<body>
  
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

                <li>
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

                <li class="active">
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
        <!-- Page Content  -->
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
            <div class="content w-75 mx-auto">
                <div class="inside">
                <div class="text-center text-primary mb-5"><h3>Update client reviews</h3></div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                                    require 'include/dbh.inc.php';

                                    $aid = $_GET['id'];
                                    $sql = "SELECT * FROM changedesc WHERE id='$aid';";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                ?>
                            <form class="change-img" action="updateclientimg.inc.php?id=<?php echo $row["id"];?>" method="POST" enctype="multipart/form-data">

                                
                                <div class="chg">
                                    <img id="output_image" class="first" src="../<?php echo $row["img"];?>" alt="">
                                    
                                    <label for="image" id="lbl"><p class="mt-3" style=" font-weight: bold; color: rgba(0, 0, 0, .5);">update</p></label>

                                    <div style="visibility: hidden; position: absolute; font-size: 0;" id="hidden"><input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)"></div>
                                    
                                </div>
                                <div><button class="btn btn-primary" type="submit" name="submit" style="margin: 10px 0; width: 60%;">upload</button></div>
                                
                            </form>
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
                        <div class="col-md-8">  
                            <form class="reset-form" action="include/chgdesc.inc.php?id=<?php echo $row["id"];?>" method="POST">
                        
                                <div class="chpwd">
                                    
                                    <label for="fname">First name</label>
                                    <div><input type="text" id=fname name="fname" value="<?php echo ucfirst($row["fname"]);?>"></div>
                                    <label for="lname">Last name</label>
                                    <div><input type="text" id="lname" name="lname" value="<?php echo ucfirst($row["lname"]);?>"></div>
                                    
                                    <label for="prof">Profession</label>
                                    <div><input type="text" id="prof" name="prof" value="<?php echo ucfirst($row["profession"]);?>"></div>
                                    
                                    <label for="desc">Description</label>
                                    <div><input type="text" id="udesc" name="udesc" value="<?php echo ucfirst($row["udesc"]);?>"></div>
                                    
                                </div>
                                
                                <div><button type="submit" name="submit" class="btn btn-primary my-3" style="width: 50%;">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>