<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = NULL;
$error1 = NULL;
$id = $Semester = '';
if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$Semester = mysqli_real_escape_string($mysqli, $_POST['Semester']);
	
    if(empty($Semester)) 
    {

		if(empty($Semester)) {
			$error="<font color='#990000'><h4><strong>Semester field is empty.</strong></font><br/>";
		}

	} else {
		$result = mysqli_query($mysqli, "UPDATE semester SET semester='$Semester' WHERE id=$id");
		header("Location: Create_Semester.php");
	}
}
?>

<html>
<head>
	<title>Edit Course Data</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.container{
        background-color: gray;
        border-radius: 25px;
        padding-top: 10px;
        padding-bottom: 0px;
      }
  	.btn{
  		padding-bottom: -30px;
  	}
  	body{
		background-color: whitesmoke;
		font-family: sans-serif;
  		margin-top: 10%;
  	}

  </style>
</head>
<body>
	<center>
	<div class="container">
	<form name="form1" method="post" action="#">
		<h2 style="color: #1A1A1A;"><strong>Update Semester</strong></h2><br>
		  <table class="table">
			<tr>
				<td><h4><strong>Semester:</strong></td>
				<td><input type="text" name="Semester" class="form-control" placeholder="Enter Semester" value="<?php echo $Semester;?>"></td>
				<center>
                    <?php 
                        echo $error ;
                    ?>
                </center>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" class="btn btn-success" name="update" value="Update" style="float:right; margin-top: 20px;"></td>
			</tr>
		</table>
		<div class="btn">
		<a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"  role="button" style="float:left; margin-top:-70px; margin-right:145px;">Back Page</a></div>
	</form>
	
</div>
</center>
</body>
</html>
