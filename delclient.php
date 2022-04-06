<?php

    require 'includes/dbh.inc.php';
    session_start();
    if(!isset($_SESSION['useremail'])) {
        header("location:index.php");
    }
    $uemail=$_SESSION['useremail'];
    $aid = $_GET['id'];
    $sql = "SELECT * FROM realartists where artist_id = '$aid';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $ctable=$row["artist_first"].$aid;

    $sql2 = "DELETE from $ctable where client = '$uemail';";
    if(mysqli_query($conn3,$sql2)){
        header("Location: artistdetail.php?id=$aid");
        exit();
    }

?>