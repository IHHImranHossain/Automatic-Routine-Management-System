<?php
    include("config.php");
    $message="Deleted Successfully";
    $message1="Data not Deleted";
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM fall20 WHERE fall20.`id` = $id");
    if ($result) 
    {
        echo $message;
    }
    else
    {
        echo $message1;
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>