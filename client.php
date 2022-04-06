<?php
    session_start();
    require 'includes/dbh.inc.php';
    $aid=$_GET['id'];
    if(!isset($_SESSION['useremail'])){
        header("Location: userlogin.php?");
        exit();
    }
    else{
        $uemail=$_SESSION['useremail'];
        $sql = "SELECT * FROM realartists WHERE artist_id='$aid';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        $atable=$row["artist_first"].$aid;

        $sql1 = "INSERT INTO $atable (client) VALUES('$uemail');";
        if(mysqli_query($conn3,$sql1)){
            header("Location: artistdetail.php?id=$aid");
            exit();
        }
    }
?>
