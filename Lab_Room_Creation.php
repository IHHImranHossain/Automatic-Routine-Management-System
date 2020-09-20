<!DOCTYPE html>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = $error1 = $error2 = $error3 = $error4 = $error5 = $error6='';
$Room_Number = $Academic_Building = $Floor_Number = $Room_Capacity = '';

if(isset($_POST['Submit'])) 
{
	$Room_Number =$_POST['Room_Number'];
	$Academic_Building =$_POST['Academic_Building'];
  	$Floor_Number =$_POST['Floor_Number'];
	$Room_Capacity =$_POST['Room_Capacity'];
	$message = '';
  

	if(empty($Room_Number) || empty($Academic_Building) || empty($Floor_Number) || empty($Room_Capacity)) 
  {

		if(empty($Room_Number)) {
      $error ="<font color='#990000'><h4><strong>Room Number field is empty.</strong></h4></font><br/>";
    }
    if(empty($Academic_Building)) {
      $error1 ="<font color='#990000'><h4><strong>Academic Building field is empty.</strong></h4></font><br/>";
    }
    if(empty($Floor_Number)) {
			$error2 ="<font color='#990000'><h4><strong>Floor Number field is empty.</strong></h4></font><br/>";
		}

		if(empty($Room_Capacity)) {
			$error3 = "<font color='#990000'><h4><strong>Room Capacity field is empty.</strong></h4></font><br/>";
		}

	} 
  
  
  elseif (!empty($Room_Number)) 
  {
    $results = mysqli_query($mysqli,"SELECT Room_Number FROM lab_room WHERE Room_Number='$Room_Number'");
      if (mysqli_num_rows($results)>0) 
    {
      $error= "<font color='#990000'><h4><strong>This Room Number is Already Taken.</strong></h4></font><br/>";
    }	
    else
     {
      $result = mysqli_query($mysqli, "INSERT INTO lab_room(Room_Number,Academic_Building,Floor_Number,Room_Capacity) VALUES('$Room_Number','$Academic_Building','$Floor_Number','$Room_Capacity')");
	  $message = 'Successfully Data Updated';
	  header("Location: view_coursewise_labrrom.php");
      

    }
  }
  
}
?>
<html>
<head>
	<meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  	 <title>Lab Room Creation</title>
  	 <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bootstrap-grid.min.css">
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     <script src="js/bootstrap.js" type="text/javascript"></script>               
     <script src="js/jquery.js" type="text/javascript"></script> 
     <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


	<script type="text/javascript">
		function togglemenu()
		{
			document.getElementById('sidebar').classList.toggle('active');
		}
	</script>

	<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			font-family: sans-serif;
			background-color: whitesmoke;

		}
		ul{
			margin: 0px;
			padding:0px;
			list-style: none;
		}
		ul li a {
			text-decoration: none;
			color: black;
			display: block;
		}
		#sidebar i{
			margin-right: 20px;
		}
		#sidebar ul li:hover {
			padding-left: 30px;
			background-color: black;
			text-decoration:none;
			border-radius:20px;
			margin-top:10px;
		}
		ul li ul li {
			display: none;
		}
		#sidebar ul li:hover ul li{
			display: block;
		}
		#sidebar{
			position: fixed;
			width:370px;
			height: 100%;
			background:#4D4D4D;
			left: -370px;
			transition: all 500ms linear;
		}
		#sidebar.active{
			left: 0px;
		}
		#sidebar ul li {
			color: rgba(230,230,230,0.9);
			list-style: none;
			padding: 15px 10px;
			border-bottom: 1px solid black;
		}
		#sidebar ul a{
			display: block;
			height: 100%;
			width: 100%;
			line-height: 35px;
			font-size: 15px;
			color: white;
			padding-left: 40px;
			box-sizing: border-box;
			border-top: 1px solid lightgray;
			border-bottom: 0px solid  rgba(255,255,255,0.1);
			transition: .4s;
			font-style: none;
			font-family: sans-serif;
			border-radius:10px;
		}
		
		#sidebar .toggle-btn{
			position: absolute;
			left: 390px;
			top: 20px;

		}
		#sidebar .toggle-btn span{
			display: block;
			width: 30px;
			height: 5px;
			background: black;
			margin: 05px 0px;
			border-radius:10px;
		}
		table,th,td{
			border:2px solid black;
			width:2500px;
			background-color: whitesmoke;
			border-radius: 5px;
			color:black;
		}
		.jumbotron{
			padding-bottom: 20px;
			padding-top: 5px;
			margin-top: 6px;
			background-color:lightskyblue;
		}
		.srs{
			padding-right: 200px;
			border-color: 5px solid black;
			border-radius: 5px;
			padding: 10px;
		}
		#ab{
			padding: 20px;
		}
		.container{
        background-color: skyblue;
        border-radius: 25px;
        padding-top: 15px;
        padding-bottom: 5px;
      	}
		.btn{
			padding-bottom: -30px;
		}
		body{
			background-color: whitesmoke;
			font-family: sans-serif;
			margin-top: 0px;
		}
		
	</style>

</head>
<body onload="viewData()">
<div id="sidebar" onclick="togglemenu()">
		<div class="toggle-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<ul>
			<li><a href="home.php" style="text-decoration:none;"><i class="fas fa-qrcode"></i>Home</a></li>
			<li><a href="#" style="text-decoration:none;"><i class="fas fa-blog"></i>Information</a>
				<ul><li><a href="course-information.php">Courses Information</a></li></ul>
				<ul><li><a href="teacher-information.php">Teachers Information</a></li></ul>
				<ul><li><a href="room-information.php">Rooms Information</a></li></ul>
			</li>
			<li><a href="#" style="text-decoration:none;"><i class="fas fa-stream"></i>Create Routine Reqirements</a>
				<ul><li><a href="Create_Semester.php">Create Semester</a></li></ul>
				<ul><li><a href="create_semester_from.php">Creating Course Of Semester</a></li></ul>
				<ul><li><a href="update_course-offering.php">Update Course Of Semester</a></li></ul>
				<ul><li><a href="teacher_requirement_form.php">Teacher's Requirement Form</a></li></ul>
				<ul><li><a href="Lab_Room_Creation.php">Lab Room Creation</a></li></ul>
			</li>
			<li><a href="#" style="text-decoration:none;"><i class="fas fa-file"></i>View Routine Reqirements</a>
				<ul><li><a href="view_teacher_requirment.php">View Teacher's Requirement</a></li></ul>
				<ul><li><a href="view_courseload_distribution_for_teacher.php">View The Course Load Distribution Of Teacher Wise</a></li></ul>
				<ul><li><a href="view_coursewise_labrrom.php">View Course Wise Lab Room</a></li></ul>
			</li>
			<li><a href="#" style="text-decoration:none;"><i class="fas fa-calendar-week"></i>Create Final Routine</a>
				<ul><li><a href="sectiondata.php">Create Sections, Day and Teacher Data Table</a></li></ul>	
				<ul><li><a href="hit_database.php">Set or Hit The Reqirements</a></li></ul>
				<ul><li><a href="create_final_routine.php">Create Routine</a></li></ul>
				<ul><li><a href="renew_database.php">Renew Dastabase</a></li></ul>
			</li>
			<li><a href="#" style="text-decoration:none;"><i class="fas fa-file"></i>View of Final Routine</a>
				<ul><li><a href="finalroutine.php">Final Day wise Routine</a></li></ul>	
				<ul><li><a href="teacherRoutine.php">Show The Teacher Routine</a></li></ul>
				<ul><li><a href="sectionsRoutine.php">Show The Sections Routine</a></li></ul>
			</li>
			<li><a href="complain_box.php" style="text-decoration:none;"><i class="fas fa-question-circle"></i>Complain Box</a></li>
			<li><a href="logout.php" style="text-decoration:none;"><i class="fa fa-reply-all"></i>Log Out</a></li>
		</ul>
	</div>

	<center>
	<div class="container" style="margin-bottom:40px;">
	
	<div class="jumbotron" >
            <h1><strong>Lab Room Creation</strong></h1>
			<p>You can ADD<strong> Room No.</strong>,<strong> Academic Building</strong>,<strong> Floor No. & Room Capacity.</strong></p>
		</div>
	</div>
	<div class="container">
	<form name="form1" method="post" action="#">
		<h2 style="color: #1A1A1A;"><strong>Lab Room Creation</strong></h2><br>
		  <table class="table">
		  	<tr>
				<td><h4><strong>Room Number :</strong></td>
				<td><input type="text"  placeholder="Enter Room Number" name="Room_Number" class="form-control" value="<?php echo $Room_Number;?>"></td>
				<center>
                    <?php 
                        echo $error ;
                    ?>
                </center>
			</tr>
		  	<tr>
				<td><h4><strong>Academic Building :</strong></td>
				<td><input type="text"  placeholder="Academic Building" name="Academic_Building" class="form-control" value="<?php echo $Academic_Building;?>"></td>
				<center>
                    <?php 
                        echo $error1 ;
                    ?>
                </center>
			</tr>
			<tr>
				<td><h4><strong>Floor Number :</strong></td>
				<td><input type="text"  placeholder="Enter Floor Number" name="Floor_Number" class="form-control" value="<?php echo $Floor_Number;?>"></td>
				<center>
                    <?php 
                        echo $error2 ;
                    ?>
                </center>
			</tr>
			<tr>
				<td><h4><strong>Room Capacity :</strong></h4></td>
				<td><input type="text"  placeholder="Enter Room Capacity" name="Room_Capacity" class="form-control" value="<?php echo $Room_Capacity;?>"></td>
			</tr>
			<center>
                    <?php 
                        echo $error3 ;
                    ?>
                </center>
			<tr>
				<td><h4 style=" color:darkgreen; "><strong>For<span style=" color:darkred; "> Submit </span> Click Here -></strong></h4></td>
				<td><input type="submit" class="btn btn-success" name="Submit" value="Submit" style="float:right; margin-right: 10px;"></td>
			</tr>
			<tr>
				<td><h4 style=" color:darkgreen; "><strong>For <span style=" color:darkred; ">View Results</span>  Click Here -></strong></h4></td>
				<td><a href="view_coursewise_labrrom.php" class="btn btn-info" role="button" style="float:right; margin-bottom:15px; margin-left:195px;">View Result</a></td>
			</tr>
			</table>
		<div class="btn">
		</form>
	
	</div>
	</center>
</body>
</html>
