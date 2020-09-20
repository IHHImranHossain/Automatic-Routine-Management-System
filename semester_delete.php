<?php
    include("config.php");
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM semester WHERE semester.`id` = $id");
    header("Location: Create_Semester.php");
    
?>