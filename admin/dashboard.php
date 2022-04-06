<?php
	require_once("header.php");
?>
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
                <li class="active">
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

            <div class="content">
                <div class="text-center my-3"><h2 style="font-family: Arial Rounded MT; color: rgba(0,0,0,0.5);">Welcome <?php echo ucfirst($row["username"]);?></h2></div>
                <div class="conts">
                    <div class="row p-0 m-0">
                        <div class="col-md-4">
                            <div class="mprm" id="tmech">
                            <?php
                                require 'include/dbh.inc.php';
                                $sql = "SELECT * FROM realartists";
                                $result = mysqli_query($conn, $sql);
                                $tmech = mysqli_num_rows($result);
                            ?>	
                                <p style="font-size: 15px;"><i class="fa fa-users"></i> Artists<p><?php echo $tmech;?></p></p>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mprm" id="tpart">
                            <?php
                                $sql = "SELECT * FROM artworks";
                                $result = mysqli_query($conn, $sql);
                                $tparts = mysqli_num_rows($result);
                            ?>
                                <p style="font-size: 15px;"><i class="fa fa-cogs"></i> ArtWorks<p><?php echo $tparts;?></p></p>
                            </div>
                        </div>

                        
                        <div class="col-md-4">
                            <div class="mprm" id="tmsg">
                            <?php
                                $sql = "SELECT * FROM users";
                                $result = mysqli_query($conn, $sql);
                                $tusers = mysqli_num_rows($result);
                                
                            ?>
                                <p style="font-size: 15px;"><i class="fa fa-user"></i> Users<p><?php echo $tusers;?></p></p>
                            </div>
                        </div>    
                    </div>
                </div>
                 
                <div class="img text-center">
                    <img src="../imgs/analyze.gif" class="w-50"alt="">
                </div>
                <!-- <div class="desc">
                    <a href="chgdesc.php" id="chgdesc">Change client description</a>
                </div> -->
            </div>
        </div>
    </div>

</body>
</html>