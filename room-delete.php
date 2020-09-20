<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM room_table WHERE id=$id");
header("Location:room-information.php");
?>