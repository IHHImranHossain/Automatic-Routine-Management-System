<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = NULL;
$error1 = NULL;
$error2 = NULL;
$error3 = NULL;
$error4 = NULL;
$error5 = NULL;
$error6 = NULL;
$id = $Semester = $Level_Term = $Course_Code = $Course_Title = $Prerequisites = $Course_Cr ='';
if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$Semester = mysqli_real_escape_string($mysqli, $_POST['Semester']);
	$Level_Term = mysqli_real_escape_string($mysqli, $_POST['Level_Term']);
	$Course_Code = mysqli_real_escape_string($mysqli, $_POST['Course_Code']);
	$Course_Title = mysqli_real_escape_string($mysqli, $_POST['Course_Title']);
	$Prerequisites = mysqli_real_escape_string($mysqli, $_POST['Prerequisites']);
	$Course_Cr = mysqli_real_escape_string($mysqli, $_POST['Course_Cr']);
	
	if(empty($Semester) || empty($Level_Term) || empty($Course_Code) || empty($Course_Title) || empty($Prerequisites) || empty($Course_Cr)) {

		if(empty($Semester)) {
			$error6="<font color='#990000'><h4><strong>Semester field is empty.</strong></font><br/>";
		}
		if(empty($Level_Term)) {
			$error="<font color='#990000'><h4><strong>Level Term field is empty.</strong></font><br/>";
		}
		if(empty($Course_Code)) {
			$error1="<font color='#990000'><h4><strong>Course Code field is empty.</strong></font><br/>";
		}

		if(empty($Course_Title)) {
			$error2= "<font color='#990000'><h4><strong>Course Title field is empty.</strong></font><br/>";
		}
        if(empty($Prerequisites)) {
			$error3= "<font color='#990000'><h4><strong>Prerequisites field is empty.</strong></font><br/>";
		}

		if(empty($Course_Cr)) {
			$error4= "<font color='#990000'><h4><strong>Course Cr field is empty.</strong></font><br/>";
		}

	} else {
		$result = mysqli_query($mysqli, "UPDATE courses_information SET Semester='$Semester',Level_Term='$Level_Term',Course_Code='$Course_Code',Course_Title='$Course_Title',Prerequisites='$Prerequisites',Course_Cr='$Course_Cr' WHERE id=$id");
		header("Location: course-information.php");
	}
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM courses_information WHERE id=$id");
while($res = mysqli_fetch_array($result))
{
	$Semester = $res['Semester'];
	$Level_Term = $res['Level_Term'];
	$Course_Code = $res['Course_Code'];
	$Course_Title = $res['Course_Title'];
	$Prerequisites = $res['Prerequisites'];
	$Course_Cr = $res['Course_Cr'];
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
  		margin-top: 60px;
  	}

  </style>
</head>
<body>
	<center>
	<div class="container">
	<form name="form1" method="post" action="#">
		<h2 style="color: #1A1A1A;"><strong>Update Course Data</strong></h2><br>
		  <table class="table">
		  <tr>
				<td><h4><strong>Semester:</strong></td>
				<td>
					<select name="Semester" id="Semester" class="form-control"  value="<?php echo $Semester;?>">  
                            <option value="Select Semester" selected disabled="">Select Semester</option> 
                                <?php
                                    include_once("config.php");
                                    $querys = "SELECT semester FROM semester order by id ASC";
                                    $results = mysqli_query($mysqli,$querys);
                                    if ($results) 
                                    {
                                        while($row=mysqli_fetch_array($results))
                                        {
                                            $Semester=$row["semester"];
                                            echo"<option>$Semester<br></option>";
                                        }
                                    }	
                                ?>
                    </select>
				</td>
				<center>
                    <?php 
                        echo $error6 ;
                    ?>
                </center>
			</tr>
			<tr>
				<td><h4><strong>Level Term:</strong></td>
				<td><input type="text" name="Level_Term" class="form-control" value="<?php echo $Level_Term;?>"></td>
				<center>
                    <?php 
                        echo $error ;
                    ?>
                </center>
			</tr>
			<tr>
				<td><h4><strong>Course Code:</strong></td>
				<td><input type="text" name="Course_Code" class="form-control" value="<?php echo $Course_Code;?>"></td>
				<center>
                    <?php 
                        echo $error1 ;
                    ?>
            	</center>
			</tr>
			<tr>
				<td><h4><strong>Course Title:</strong></h4></td>
				<td><input type="text" name="Course_Title" class="form-control" value="<?php echo $Course_Title;?>"></td>
			</tr>
				<center>
                    <?php 
                        echo $error2 ;
                    ?>
            	</center>
            <tr>
				<td><h4><strong>Prerequisites:</strong></h4></td>
				<td>
					<select name="Prerequisites" id="Prerequisites" class="form-control" required>  
                            <option value="Select Prerequisites" selected disabled="">Select Prerequisites</option>
						    <option value="Null">Null</option>  
                                <?php
                                    include_once("config.php");
                                    $querys = "SELECT Course_Title FROM courses_information order by id ASC";
                                    $results = mysqli_query($mysqli,$querys);
                                    if ($results) 
                                    {
                                        while($row=mysqli_fetch_array($results))
                                        {
                                            $Prerequisites=$row["Course_Title"];
                                            echo"<option>$Prerequisites<br></option>";
                                        }
                                    }	
                                ?>
                    </select>
				</td>
			</tr>
				<center>
                    <?php 
                        echo $error3 ;
                    ?>
            	</center>
			<tr>
				<td><h4><strong>Course Cr:</strong></td>
				<td>
					<select name="Course_Cr" id="Course_Cr" class="form-control" required> 
						<option value="1">1 Hour</option>
						<option value="1.5" selected>1.5 Hour</option>
						<option value="2">2 Hour</option>
						<option value="3">3 Hour</option>
					</select>

				</td>
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
		<a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"  role="button" style="float:left; margin-top:-70px; margin-right:145px;">Back Page</a></div>
	</form>
	
</div>
</center>
</body>
</html>
