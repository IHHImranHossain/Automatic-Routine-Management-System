<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = '';
$error1 = '';
$error2 = '';
$error3 = '';
$error4 = ''; 
$Teacher_Name = $Teacher_Initial_Name = $Email = $Phone_Number = $Max_Cr ='';
if(isset($_POST['update'])) {
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$Teacher_Name = mysqli_real_escape_string($mysqli, $_POST['Teacher_Name']);
	$Teacher_Initial_Name = mysqli_real_escape_string($mysqli, $_POST['Teacher_Initial_Name']);
	$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
	$Phone_Number = mysqli_real_escape_string($mysqli, $_POST['Phone_Number']);
	$Max_Cr = mysqli_real_escape_string($mysqli, $_POST['Max_Cr']);

	if(empty($Teacher_Name) || empty($Teacher_Initial_Name) || empty($Email) || empty($Phone_Number) || empty($Max_Cr)) 
	{

		if(empty($Teacher_Name)) {
			$error ="<font color='#990000'><h4><strong>Teacher Name field is empty.</strong></h4></font><br/>";
		}

		if(empty($Teacher_Initial_Name)) {
			$error1 = "<font color='#990000'><h4><strong>Teacher Initial Name field is empty.</strong></h4></font><br/>";
		}

		if(empty($Email)) {
			$error2 = "<font color='#990000'><h4><strong>Email field is empty.</strong></h4></font><br/>";
		}

		if(empty($Phone_Number)) {
			$error3 ="<font color='#990000'><h4><strong>Phone Number field is empty.</strong></h4></font><br/>";
		}

    	if(empty($Max_Cr)) {
      		$error4 ="<font color='#990000'><h4><strong>Max Cr field is empty.</strong></h4></font><br/>";
    	}

	} else {
		$result = mysqli_query($mysqli, "UPDATE teachers_information SET Teacher_Name='$Teacher_Name',Teacher_Initial_Name='$Teacher_Initial_Name',Email='$Email',Phone_Number='$Phone_Number',Max_Cr='$Max_Cr' WHERE id=$id");
		header("Location: teacher-information.php");
		}
	}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM teachers_information WHERE id=$id");
while($res = mysqli_fetch_array($result))
{
	$Teacher_Name         = $res['Teacher_Name'];
	$Teacher_Initial_Name = $res['Teacher_Initial_Name'];
	$Email                = $res['Email'];
	$Phone_Number         = $res['Phone_Number'];
	$Max_Cr               = $res['Max_Cr'];
}
?>
<html>
<head>
	<title>Edit Teachers Data</title>
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
		<h2 style="color: #1A1A1A;"><strong>Update Teachers Data</strong></h2><br>
		  <table class="table">
			<tr>
				<td><h4><strong>Teacher Name</strong></td>
				<td><input type="text" name="Teacher_Name" class="form-control" value="<?php echo $Teacher_Name;?>"></td>
			<center>
                    <?php 
                        echo $error ;
                    ?>
            </center>
			</tr>
			<tr>
				<td><h4><strong>Teacher Initial Name</strong></h4></td>
				<td><input type="text" name="Teacher_Initial_Name" class="form-control" value="<?php echo $Teacher_Initial_Name;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error1 ;
                    ?>
            </center>
			<tr>
				<td><h4><strong>Email</strong></td>
				<td><input type="text" name="Email" class="form-control" value="<?php echo $Email;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error2 ;
                    ?>
            </center>
			<tr>
				<td><h4><strong>Phone Number</strong></td>
				<td><input type="text" name="Phone_Number" class="form-control" value="<?php echo $Phone_Number;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error3 ;
                    ?>
            </center>
            <tr>
				<td><h4><strong>Max Cr</strong></td>
				<td><input type="text" name="Max_Cr" class="form-control" value="<?php echo $Max_Cr;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error4 ;
                    ?>
            </center>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" class="btn btn-success" name="update" value="Update" style="float:right; margin-top: 20px;"></td>
			</tr>
		</table>
		<div class="btn">
		<a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"  role="button" style="float:left; margin-top:-70px; margin-left:40px;">Back Page</a></div>
	</form>
	
</div>
</center>
</body>
</html>
