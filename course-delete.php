<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM courses_information WHERE id=$id");
header("Location:course-information.php");
?>