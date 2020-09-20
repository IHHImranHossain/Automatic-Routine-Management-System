<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM teachers_information WHERE id=$id");
header("Location:teacher-information.php");
?>