<!DOCTYPE html>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Course Of Semester</title>
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
			padding-left: 15px;
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
		#ab{
			padding: 20px;
		}
		.section_for_table{
			width:100%;
			height:100%;
			float:Right;
		}
		th{
			background-color: #2E4053;
			color: whitesmoke;		
		}
        tr:hover td{
            background-color: deepskyblue;
			}
		.btnn{
			color: whitesmoke;
			background-color: orange;
			border:solid whitesmoke 1px ;
			padding: 2px;
			border-radius: 3px;
		}
		.btnn a:hover{
				background-color: blanchedalmond;
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

	<center>
		
		<div class="container">
			<div class="jumbotron">
				<h1><strong>Update Course Of Semester</strong></h1>
				<p>There is have <strong>Level Termr</strong>,<strong>Course Code</strong>,<strong>Section & All Course Information.</strong><br>You Can <strong>Edit</strong>,<strong>Delete & ADD</strong> New Courses Data in those rows.</p>
			</div>

			<form action="" method="POST">
				<div class="form-group">
					<div id="ab"><big>Select Semester:</big>  
						<select name="Semester" id="Semester">  
							<option value="" selected disabled="">--Select Semester--</option> 
								<?php
									include_once("config.php");
									$querys = "SELECT semester FROM semester order by id";
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
						<input type="SUBMIT" name="submit" class="btn btn-primary btn-xs"/>
					</div>
					
				</div>
			</form>

			<div class="section_for_table">
				<div class="table-responsive">
					<form method="post"  action="">
						<div id="table-container">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th scope="col">Level Term</th>
										<th scope="col">Corse Code</th>
										<th scope="col">Teacher Initial Name</th>
										<th scope="col">Section</th>
										<th scope="col">Course Cr</th>
										<th scope="col">Total Cr</th>
										<th scope="col">Credit Hours</th>
										<th scope="col">Approx Class Size</th>
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php
											if(isset ($_POST['submit']))
											{
												$mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
												$Semester=$_POST['Semester'];
											
									
												$sql="select * from $Semester";
												$result= mysqli_query($mysqli,$sql);
												
												while($row=mysqli_fetch_assoc($result))
												{
										?>
												<td><?php echo $row['Level_Term'] ?></td>
												<td><?php echo $row['Course_Code'] ?></td>
												<td><?php echo $row['Teacher_Initial_Name'] ?></td>
												<td><?php echo $row['Sections'] ?></td>
												<td><?php echo $row['Course_Cr'] ?></td>
												<td><?php echo $row['Total_Cr'] ?></td>
												<td><?php echo $row['Credit_Hours'] ?></td>
												<td><?php echo $row['Approx_Class_Size'] ?></td>						
												<?php	
													echo "<td><a class='btnn' style='text-decoration: none;' href=\"edit_course_offering.php?id=$row[id]\">Update</a></td>";
												?>
									</tr>
										<?php
												}
											}
										?>	
							</tbody>
						</table>
						</div>	
					</div>
					</form>
				</div>
			</div>
		</div>
  	</center>
</body>
</html>