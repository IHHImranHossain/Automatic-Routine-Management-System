<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = '';
$error1 = '';
$error2 = '';
$error3 = '';
$error4 = '';
$Room_Number = $Room_Type = $Academic_Building = $Floor_Number ='';
if(isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$Room_Number = mysqli_real_escape_string($mysqli, $_POST['Room_Number']);
	$Room_Type = mysqli_real_escape_string($mysqli, $_POST['Room_Type']);
	$Academic_Building = mysqli_real_escape_string($mysqli, $_POST['Academic_Building']);
	$Floor_Number = mysqli_real_escape_string($mysqli, $_POST['Floor_Number']);

	if(empty($Room_Number) || empty($Room_Type) || empty($Academic_Building) || empty($Floor_Number)) {

		if(empty($Room_Number)) {
			$error ="<font color='#990000'><h4><strong>Room Number field is empty.</strong></h4></font><br/>";
		}

		if(empty($Room_Type)) {
			$error1 = "<font color='#990000'><h4><strong>Room Type field is empty.</strong></h4></font><br/>";
		}

		if(empty($Academic_Building)) {
			$error2 = "<font color='#990000'><h4><strong>Academic Building field is empty.</strong></h4></font><br/>";
		}

		if(empty($Floor_Number)) {
			$error3 ="<font color='#990000'><h4><strong>Floor Number field is empty.</strong></h4></font><br/>";
		}

	} else {
		$result = mysqli_query($mysqli, "UPDATE room_table SET Room_Number='$Room_Number',Room_Type='$Room_Type',Academic_Building='$Academic_Building',Floor_Number='$Floor_Number' WHERE id=$id");
		header("Location: room-information.php");
		}
	}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM room_table WHERE id=$id");
while($res = mysqli_fetch_array($result))
{
	$Room_Number          = $res['Room_Number'];
	$Room_Type            = $res['Room_Type'];
	$Academic_Building    = $res['Academic_Building'];
	$Floor_Number         = $res['Floor_Number'];
	
}
?>
<html>
<head>
	<title>Edit Room Data</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	.container{
  		background-color: gray;
  		margin-top: 05%;
  		border-radius: 25px;
  		padding-top: 40px;
  		padding-bottom: 20px;
  	}
  	*{
  	
  		display: cover;
  		margin: 0px;
  		padding: 0px;
		font-family: sans-serif;
		
  	}
  	.btn{
  		padding-bottom: -30px;
  	}
  	body{
  		background-color: whitesmoke;
  		margin-top: 120px;
  	}

  </style>
</head>
<body>
	<center>
	<div class="container">
	<form name="form1" method="post" action="#">
		<h2 style="color: #1A1A1A;"><strong>Update Room Data</strong></h2><br>
		  <table class="table">
			<tr>
				<td><h4><strong>Room Number</strong></td>
				<td><input type="text" name="Room_Number" class="form-control" value="<?php echo $Room_Number;?>"></td>
			<center>
                    <?php 
                        echo $error ;
                    ?>
            </center>
			</tr>
			<tr>
				<td><h4><strong>Room Type</strong></h4></td>
				<td><input type="text" name="Room_Type" class="form-control" value="<?php echo $Room_Type;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error1 ;
                    ?>
            </center>
			<tr>
				<td><h4><strong>Academic Building</strong></td>
				<td><input type="text" name="Academic_Building" class="form-control" value="<?php echo $Academic_Building;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error2 ;
                    ?>
            </center>
			<tr>
				<td><h4><strong>Floor Number</strong></td>
				<td><input type="text" name="Floor_Number" class="form-control" value="<?php echo $Floor_Number;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error3 ;
                    ?>
            </center>
            <tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" class="btn btn-success" name="update" value="Update" style="float:right; margin-top: 20px;"></td>
			</tr>
		</table>
		<div class="btn">
		<a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"  role="button" style="float:left; margin-top:-70px; margin-left:0px;">Back Page</a></div>
	</form>
	
</div>
</center>
</body>
</html>
