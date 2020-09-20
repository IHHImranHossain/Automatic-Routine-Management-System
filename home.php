<!DOCTYPE html>
<html>
<?php
	include_once("config.php");
	include_once("function.php");
	check_login_user();

	?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="bootstarp.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
		function togglemenu() {
			document.getElementById('sidebar').classList.toggle('active');
		}
	</script>
	<style type="text/css">
		body {
			margin: 0px;
			padding: 0px;
			font-family: sans-serif;
			background-color: gray;
			background-image: url(img/bg4.jpg);
			background-size: cover;
            background-attachment: scroll;
            background-position: center center;
			opacity: 0.9;

		}

		ul {
			margin: 0px;
			padding: 0px;
			list-style: none;
		}

		ul li a {
			text-decoration: none;
			color: black;
			display: block;
		}

		#sidebar i {
			margin-right: 20px;
		}

		#sidebar ul li:hover {
			padding-left: 30px;
			background-color: black;
			text-decoration: none;
			border-radius: 20px;
			margin-top: 10px;
		}

		ul li ul li {
			display: none;
		}

		#sidebar ul li:hover ul li {
			display: block;
		}

		#sidebar {
			position: fixed;
			width: 370px;
			height: 100%;
			background: #4D4D4D;
			left: -370px;
			transition: all 500ms linear;
		}

		#sidebar.active {
			left: 0px;
		}

		#sidebar ul li {
			color: rgba(230, 230, 230, 0.9);
			list-style: none;
			padding: 15px 10px;
			border-bottom: 1px solid black;
		}

		#sidebar ul a {
			display: block;
			height: 100%;
			width: 100%;
			line-height: 35px;
			font-size: 15px;
			color: white;
			padding-left: 40px;
			box-sizing: border-box;
			border-top: 1px solid lightgray;
			border-bottom: 0px solid rgba(255, 255, 255, 0.1);
			transition: .4s;
			font-style: none;
			font-family: sans-serif;
			border-radius: 10px;
		}

		#sidebar .toggle-btn {
			position: absolute;
			left: 390px;
			top: 20px;

		}

		#sidebar .toggle-btn span {
			display: block;
			width: 30px;
			height: 5px;
			background: black;
			margin: 05px 0px;
			border-radius: 10px;
		}

		.Routine {
			
			height: 100%;
			margin-bottom: 40px;
			background-color: bisque;
			border-radius: 10px;
			margin-right: 20%;
			margin-left: 20%;
			padding: 30px;
		}

		.creating_links {
			width: 45%;
			height: 100%;
			float: right;
			margin-top: 15px;
			background-color: whitesmoke;
			border-radius: 10px;
			padding-bottom: 30px;
			margin-right: 40px ;

		}

		.information_links {
			width: 45%;
			height: 100%;
			float: right;
			margin-top: 15px;
			margin-left: 40px;
			background-color: whitesmoke;
			border-radius: 10px;
			margin-right: 40px;

		}
	</style>
</head>

<body>
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
<div class="blank">

</div><br>
	<div class="section">
		<center>
			<div class="Routine">
				<h1 style="font-family: sans-serif;">Routine</h1><br>
				<div class="buttons">
					<a href="teacherRoutine.php" class="btn btn-info" role="button" style="color: black;"><strong>Teachers Routine</strong></a>&nbsp;&nbsp;
					<a href="sectionsRoutine.php" class="btn btn-info" role="button" style="color: black;"><strong>Sections Routine</strong></a>&nbsp;&nbsp;
					<a href="dayroutine.php" class="btn btn-info" role="button" style="color: black;"><strong>Day Routine</strong></a>
				</div>

			</div>
		</center>
	</div><br><br><br>

	<div class="section">
		<center>
			<div class="information_links">
				<h1 style="font-family: sans-serif;">Do You Need Information?</h1>
				<h3 style="font-family: sans-serif;">Click Below Link</h3><br>
				<div class="buttons" style="margin-top:10px; color:black;">
					<a href="course-information.php" class="btn btn-info" role="button"
						style="color:black;"><strong>Course Information</strong></a><br><br>
					<a href="teacher-information.php" class="btn btn-info" role="button"
						style="color:black;"><strong>Teacher Information</strong></a><br> <br>
					<a href="room-information.php" class="btn btn-info" role="button" style="color:black;"><strong>Room
							Information</strong></a> <br><br>
				</div>
			</div>
		</center>
	</div>

	<div class="section">
		<center>
			<div class="creating_links">
				<h1 style="font-family: sans-serif;">Routine Requirment Forms</h1>
				<h3 style="font-family: sans-serif;">Click Below Links</h3>
				<div class="buttons" style="margin-top:40px;">
					<a href="create_semester_from.php" class="btn btn-info" role="button"
						style="color:black;"><strong>Creating Course of
							Semester</strong></a><br><br>
					<a href="teacher_requirement_form.php" class="btn btn-info" role="button"
						style="color:black;"><strong>Teacher's Requirement Form
							</strong></a><br><br>
					<a href="Lab_Room_Creation.php" class="btn btn-info" role="button"
						style="color:black;"><strong>Lab Room Creation of
							Semester</strong></a><br>
				</div>
			</div>
		</center>
	</div>

</body>

</html>