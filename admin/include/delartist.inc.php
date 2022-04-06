<?php

    require 'dbh.inc.php';
    session_start();
    if(!isset($_SESSION['u_uid'])) {
        header("location:index.php");
    }

    $aid = $_GET['id'];
    $sql = "DELETE from realartists where artist_id = '$aid'";
    mysqli_query($conn, $sql);
    header("Location: ../adminartists.php?deleted successfully");
    exit();
    
    mysqli_close($conn);
?>