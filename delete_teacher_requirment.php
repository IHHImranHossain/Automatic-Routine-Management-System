<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM requirement_table WHERE id=$id");
header("Location:view_teacher_requirment.php");
?>