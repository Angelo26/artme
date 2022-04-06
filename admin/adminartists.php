
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
                <li>
                    <a href="dashboard.php" style="text-decoration: none;">DashBoard</a>
                </li>
                <li class="active">
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


            
            <div class="table-responsive-md">
                <table id="artisttable" class="table table-striped arttable" style="overflow-x: auto;" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>PICTURE</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>CONTACT</th>
                        <th>SKILLS</th>
                        <th>PRIMARY SKILL</th>
                        <th>SECONDARY SKILL</th>
                        <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'include/dbh.inc.php';
                            
                        $sql = "SELECT * FROM realartists";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                            <td>
                                <img src="../<?php echo $row["artist_img"];?>" height="50px" width="50px">
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["artist_first"])." ".ucfirst($row["artist_last"]);?></p>
                            </td>
                            <td>
                                <p><?php echo $row["artist_email"];?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["artist_address"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ($row["artist_contact"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["artist_skills"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["artist_skill1"]);?></p>
                            </td>
                            <td>
                                <p><?php echo ucfirst($row["artist_skill2"]);?></p>
                            </td>
                            
                            <td class="actions">
                                <div><a href="artistsupdate.php?id=<?php echo $row["artist_id"];?>" class="btn btn-primary btn-sm mb-1" onclick='return confirm("Are you sure you want to edit this account?");'>edit</a></div>
                                <div><a href="include/delartist.inc.php?id=<?php echo $row["artist_id"];?>" class="btn btn-danger btn-sm mt-1" onclick='return confirm("Are you sure you want to delete this request?");'>delete</a></div>
                            </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
            </tbody>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
            <script>
                $('.arttable').DataTable();
            </script>
        </div>
    </div>
</body>
</html>