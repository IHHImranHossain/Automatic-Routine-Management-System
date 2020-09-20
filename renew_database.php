<!DOCTYPE html>
<?php 
        require_once 'process.php';
        include_once("config.php");
        include_once("function.php");
        check_login_user();
        ob_start();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Renew Database</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>


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
		.section_for_table{
			width:100%;
			height:100%;
			float:Right;
		}
		.section_for_form{
			width:100%;
			height:50%;
			float:left;
		}
		.form_for_course_creation
        {
            margin-left:0%;
        	margin-right:0%;
            padding:0%;
            width:75%;
            height:100%;
            margin-left:0%;
            background:darkgray;
            border-radius:5px;
			padding-bottom: 20px;
			padding-top: 10px;
			margin-top: 20px;
			margin-bottom: 20px;
        }
        #container{
            font-size-adjust: 20px;
            background-color: skyblue;
            border-radius: 5%;
            margin: 10px;
            padding: 20px;
			margin-bottom: 30px;
			padding-bottom: 40px;
			padding-top: 30px;
        }
        .btnn{
			color: whitesmoke;
			background-color: green;
			border:solid black 1px ;
			padding: 5px;
			border-radius: 3px;
		}
		.btnn:hover{
				background-color: skyblue;
                color: black;
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
			<<li><a href="complain_box.php" style="text-decoration:none;"><i class="fas fa-question-circle"></i>Complain Box</a></li>
			<li><a href="logout.php" style="text-decoration:none;"><i class="fa fa-reply-all"></i>Log Out</a></li>
		</ul>
	</div>
    
    <center>
        <div class="container">
            <div class="jumbotron">
                <h1><strong>Renew Database</strong></h1>
                <p>Just Select <strong>Semester & Hit or Press </strong> the button</p>
            </div>

			  <form action="renewrows.php" method="POST">  
                <a href="renewrows.php"><button class="btn btn-warning">Renew Database</button></a>
            </form><br>  
            <form action="renew.php" method="POST">  
                <a href="renew.php"><button class="btn btn-warning">Renew Table Data</button></a>
            </form><br><br><br>
			

            
            <div class="teacherrequirment">
                <h4 style="float:left;"><strong>For Teacher's Requirment click here --></strong></h4>
                <a href="teacher_requirement_form.php"><button class="btn btn-primary" style="float: right; margin-right:0px;">Teacher's Requirment</button></a>
            </div><br><br><br>
            <div class="createtables">
                <h4 style="float:left;"><strong>For Create Tables routine click here --></strong></h4>
                <a href="sectiondata.php"><button class="btn btn-primary" style="float: right; margin-right:0px;">Create Tables</button></a>
            </div><br><br><br>
            <div class="hitrequirment">
                <h4 style="float:left;"><strong>For Hit Requirment< routine click here --></strong></h4>
                <a href="requirment.php"><button class="btn btn-primary" style="float: right; margin-right:0px;">Hit Requirment</button></a>
            </div><br><br><br>
            <div class="createroutine">
                <h4 style="float:left;"><strong>For create routine click here --></strong></h4>
                <a href="create_final_routine.php"><button class="btn btn-primary" style="float: right; margin-right:0px;">Create Routine</button></a>
            </div>
        </div>
    </center>
</body>
</html>