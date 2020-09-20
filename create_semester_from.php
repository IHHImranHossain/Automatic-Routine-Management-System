<!DOCTYPE html>
<?php
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
	<title>Creating Course Of Semester</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.tabledit.min.js" type="text/javascript"></script>


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
			background-color: whitesmoke;

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

		table,
		th,
		td {
			border: 2px solid black;
			width: 2500px;
			background-color: whitesmoke;
			border-radius: 5px;
			color: black;
		}

		.jumbotron {
			padding-bottom: 20px;
			padding-top: 5px;
			margin-top: 6px;
			background-color: lightskyblue;
		}

		.srs {
			padding-right: 200px;
			border-color: 5px solid black;
			border-radius: 5px;
			padding: 10px;
		}

		#ab {
			padding: 20px;
		}

		.section_for_table {
			width: 100%;
			height: 100%;
			float: Right;
		}

		.section_for_form {
			width: 100%;
			height: 50%;
			float: left;
		}

		.form_for_course_creation {
			margin-left: 0%;
			margin-right: 0%;
			padding: 0%;
			width: 75%;
			height: 100%;
			margin-left: 0%;
			background: skyblue;
			border-radius: 5px;
			padding-bottom: 20px;
			padding-top: 10px;
			margin-top: 20px;
			margin-bottom: 20px;
		}

		#container {
			font-size-adjust: 20px;
			background-color: antiquewhite;
			border-radius: 5%;
			margin: 10px;
			padding: 20px;
			margin-bottom: 30px;
			padding-bottom: 40px;
			padding-top: 30px;
		}
	</style>

	<script>
		$(document).ready(function (e) {

			//variables
			var html =
				'</p><div> <div class="form" style="border-bottom: solid black 1px;"> <center>  <br><br><br><label for="Level_Term" class="control-label">Select Level Term :</label>&nbsp;<select name="Level_Term[]" id="childLevel_Term" required><option value="" selected disabled="">--Select Level Term--</option><option value="Level1Term1">Level-1 Term-1</option><option value="Level1Term2">Level-1 Term-2</option><option value="Level1Term3">Level-1 Term-3</option><option value="Level2Term1">Level-2 Term-1</option><option value="Level2Term2">Level-2 Term-2</option><option value="Level2Term3">Level-2 Term-3</option><option value="Level3Term1">Level-3 Term-1</option><option value="Level3Term2">Level-3 Term-2</option><option value="Level3Term3">Level-3 Term-3</option><option value="Level4Term1">Level-4 Term-1</option><option value="Level4Term2">Level-4 Term-2</option><option value="Level4Term3">Level-4 Term-3</option></select>&nbsp;&nbsp;&nbsp;&nbsp;   <label for="Course_Code">Course Code :</label>&nbsp; <select name="Course_Code[]" id="childCourse_Code" required> <option value="" selected disabled="">--Select Course Code--</option> <?php include_once("config.php");$querys = "SELECT Course_Code FROM courses_information order by Level_Term ASC";$results = mysqli_query($mysqli,$querys);if ($results) { while($row=mysqli_fetch_array($results)){ $Course_Code=$row["Course_Code"];echo"<option>$Course_Code<br></option>";}} ?></select><br><br>&nbsp;        <label for="Sections">Select Sections :</label>&nbsp;<select name="Sections[]" id="childSections" required><option value="" selected disabled="">--Select Sections--</option><option value="Null">Null</option><option value="PCA">PC-A</option><option value="PCB">PC-B</option><option value="PCC">PC-C</option><option value="PCD">PC-D</option><option value="PCE">PC-E</option><option value="PCF">PC-F</option><option value="PCG">PC-G</option><option value="PCH">PC-H</option><option value="PCI">PC-I</option><option value="PCJ">PC-J</option><option value="PCK">PC-K</option><option value="PCL">PC-L</option><option value="PCM">PC-M</option><option value="PCN">PC-N</option><option value="PCO">PC-O</option><option value="PCP">PC-P</option><option value="PCQ">PC-Q</option><option value="PCR">PC-R</option><option value="PCS">PC-S</option><option value="PCT">PC-T</option><option value="PCU">PC-U</option><option value="PCV">PC-V</option><option value="PCW">PC-W</option><option value="PCX">PC-X</option><option value="PCY">PC-Y</option><option value="PCZ">PC-Z</option></select><br><br>     <label  for="Approx_Class_Size">Select Approx. Class Size : </label><select name="Approx_Class_Size[]" id="childApprox_Class_Size" required><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40" selected>40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option></select>&nbsp;&nbsp;&nbsp;&nbsp;     <label for="Course_Cr">Course Cr :</label>&nbsp; <select name="Course_Cr[]" id="childCourse_Cr" required><option value="1">1 Credit</option><option value="2">2 Credit</option><option value="3" selected>3 Credit</option></select>&nbsp;&nbsp;&nbsp;&nbsp;    <label for="Credit_Hours">Credit Hours :</label>&nbsp;<select name="Credit_Hours[]" id="childCredit_Hours" required><option value="1">1 Hour</option><option value="1.5" selected>1.5 Hour</option><option value="2">2 Hour</option><option value="3">3 Hour</option></select><br> </center><br>   </div><br>    <a href="#" id="remove" style="color:red; float:right;">X</a><br></div>';

			//Add rows to the form
			$("#add").click(function (e) {
				$("#container").append(html);
			});

			//Remove rows from the form
			$("#container").on('click', '#remove', function (e) {
				$(this).parent('div').remove();
			});
		});
	</script>
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
				<h1><strong>Creating Course Of Semester</strong></h1>
				<p>There is have <strong>Semester</strong>,<strong>Course Code </strong>,<strong>Section & All Course
						Information.</strong></p>
			</div>
		</div>
	</center>
	<center>
		<?php
		$Semester= $Level_Term = $Course_Code  = $Sections = $Course_Cr = $Teacher_Initial_Name = $Credit_Hours = $Approx_Class_Size = ' ';
		$output=NULL;
		if(isset ($_POST['submit']))
		{
			$mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
			$i=0;
			$Semester =$_POST['Semester'];
			$Level_Term =$_POST['Level_Term'];
			$Course_Code =$_POST['Course_Code'];
			$Sections =$_POST['Sections'];
            $Course_Cr =$_POST['Course_Cr'];
            $Total_Cr =$_POST['Total_Cr'];
            $Teacher_Initial_Name =$_POST['Teacher_Initial_Name'];
			$Credit_Hours =$_POST['Credit_Hours'];
			$Approx_Class_Size =$_POST['Approx_Class_Size'];
			$message="<font color='Green'><h4><strong>Data Successfully Inserted</strong></h4></font><br/>";
			$message1="<font color='Green'><h4><strong>Data Not Inserted</strong></h4></font><br/>";
			$credit[0]=0;
			
			foreach($Level_Term AS $value)
			{
				 $i++;
			 }	
			 for($j=0; $j<$i; $j++){
				$credit[0]+=$Course_Cr[$j];
				$mysqli->query("INSERT INTO $Semester(Semester,Level_Term,Course_Code,Sections,Course_Cr,Total_Cr,Teacher_Initial_Name,Credit_Hours,Approx_Class_Size)VALUES('$Semester','$Level_Term[$j]','$Course_Code[$j]','$Sections[$j]','$Course_Cr[$j]','$credit[0]','$Teacher_Initial_Name','$Credit_Hours[$j]','$Approx_Class_Size[$j]')") or die($mysqli->error);
				
				if($mysqli)
				{
					echo $message;
					header("Location: create_semester_from.php");
				}
				else{
					echo $message1;
				}
				
			}
			$mysqli->close();
			
			//$mysqli->query("UPDATE $Semester SET total_cr='$credit[0]' WHERE Teacher_Initial_Name=$Teacher_Initial_Name") or die($mysqli->error);
			
		}
		?>
		<div class="container">
			<div class="viewoffer">
            		<h4 style="float:left"><strong>For View Course Offer click here --></strong></h4>
            		<a href="update_course-offering.php"><button class="btn btn-success" style="float: right;">View Corse Offer</button></a>
			</div><br>
		</div>
	
		<div class="form_for_course_creation">
			<form method="POST" action=" create_semester_from.php">
				<h2 style="color: #1A1A1A;"><strong>Course Creation For Semester</strong></h2><br>
				<div class="form-group" style="margin-left:10%; margin-right:10%">
					<h4><label class="control-label " for="Semester">Select Semester</label></h4>
					<select name="Semester" id="Semester" class="form-control" required>
						<option value="" selected disabled="">--Select Semester--</option>
						<?php
							include_once("config.php");
								$querys = "SELECT Semester FROM semester order by id";
								$results = mysqli_query($mysqli,$querys);
								if ($results) 
								{
									while($row=mysqli_fetch_array($results))
									{
										$Semester=$row["Semester"];
										echo"<option>$Semester<br></option>";
									}
								}	
						?>
					</select>
				</div>
				<div class="form-group" style="margin-left:10%; margin-right:10%">
					<h4><label class="control-label " for="Teacher_Initial_Name">Select Teacher Initial Name</label>
					</h4>
					<select name="Teacher_Initial_Name" id="Teacher_Initial_Name" class="form-control" required>
						<option value="" selected disabled="">--Select Teacher Initial Name--</option>
						<option value="Null">Null</option>
						<?php
                            include_once("config.php");
                            $querys = "SELECT Teacher_Initial_Name FROM teachers_information";
                            $results = mysqli_query($mysqli,$querys);
                            if ($results) 
                            {
                                while($row=mysqli_fetch_array($results))
                                {
                                    $Teacher_Initial_Name=$row["Teacher_Initial_Name"];
                                    echo"<option>$Teacher_Initial_Name<br></option>";
                                }
                            }	
                        ?>
					</select>
				</div>



				<div id="container" style="margin-right: 20%; margin-left:20%;">
					<div class="form" style="border-bottom: solid black 1px;">
						<label for="Level_Term" class="control-label">Select Level Term :</label>&nbsp;
						<select name="Level_Term[]" id="Level_Term" required>
							<option value="" selected disabled="">--Select Level Term--</option>
							<option value="Level1Term1">Level-1 Term-1</option>
							<option value="Level1Term2">Level-1 Term-2</option>
							<option value="Level1Term3">Level-1 Term-3</option>
							<option value="Level2Term1">Level-2 Term-1</option>
							<option value="Level2Term2">Level-2 Term-2</option>
							<option value="Level2Term3">Level-2 Term-3</option>
							<option value="Level3Term1">Level-3 Term-1</option>
							<option value="Level3Term2">Level-3 Term-2</option>
							<option value="Level3Term3">Level-3 Term-3</option>
							<option value="Level4Term1">Level-4 Term-1</option>
							<option value="Level4Term2">Level-4 Term-2</option>
							<option value="Level4Term3">Level-4 Term-3</option>
						</select>&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="code">Course Code :</label>&nbsp;
						<select name="Course_Code[]" id="Course_Code" required>
							<option value="" selected disabled="">--Select Course Code--</option>
							<?php
						include_once("config.php");
						$querys = "SELECT Course_Code FROM courses_information order by Level_Term ASC";
						$results = mysqli_query($mysqli,$querys);
						if ($results) 
						{
							while($row=mysqli_fetch_array($results))
							{
								$Course_Code=$row["Course_Code"];
								echo"<option>$Course_Code<br></option>";
							}
						}	
					?>
						</select><br><br>
						<label for="Sections">Select Sections :</label>&nbsp;
						<select name="Sections[]" id="sections" required>
							<option value="" selected disabled="">--Select Sections--</option>
							<option value="Null">Null</option>
							<option value="PCA">PC-A</option>
							<option value="PCB">PC-B</option>
							<option value="PCC">PC-C</option>
							<option value="PCD">PC-D</option>
							<option value="PCE">PC-E</option>
							<option value="PCF">PC-F</option>
							<option value="PCG">PC-G</option>
							<option value="PCH">PC-H</option>
							<option value="PCI">PC-I</option>
							<option value="PCJ">PC-J</option>
							<option value="PCK">PC-K</option>
							<option value="PCL">PC-L</option>
							<option value="PCM">PC-M</option>
							<option value="PCN">PC-N</option>
							<option value="PCO">PC-O</option>
							<option value="PCP">PC-P</option>
							<option value="PCQ">PC-Q</option>
							<option value="PCR">PC-R</option>
							<option value="PCS">PC-S</option>
							<option value="PCT">PC-T</option>
							<option value="PCU">PC-U</option>
							<option value="PCV">PC-V</option>
							<option value="PCW">PC-W</option>
							<option value="PCX">PC-X</option>
							<option value="PCY">PC-Y</option>
							<option value="PCZ">PC-Z</option>
						</select><br><br>
						<label class="control-label" for="Approx_Class_Size">Select Approx. Class Size : </label></h4>
						<select name="Approx_Class_Size[]" id="Approx_Class_Size" required>
							<option value="35">35</option>
							<option value="36">36</option>
							<option value="37">37</option>
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40" selected>40</option>
							<option value="41">41</option>
							<option value="42">42</option>
							<option value="43">43</option>
							<option value="44">44</option>
							<option value="45">45</option>
							<option value="46">46</option>
							<option value="47">47</option>
							<option value="48">48</option>
							<option value="49">49</option>
							<option value="50">50</option>
						</select>&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="Course_Cr">Course Cr :</label>&nbsp;
						<select name="Course_Cr[]" id="cr" required>
							<option value="1">1 Credit</option>
							<option value="2">2 Credit</option>
							<option value="3" selected>3 Credit</option>
						</select>&nbsp;&nbsp;&nbsp;&nbsp;
						<label for="Credit_Hours">Credit Hours :</label>&nbsp;
						<select name="Credit_Hours[]" id="Credit_Hours" required>
							<option value="1">1 Hour</option>
							<option value="1.5" selected>1.5 Hour</option>
							<option value="2">2 Hour</option>
							<option value="3">3 Hour</option>
						</select><br><br>
						<a href="#" id="add"><button type="button" class="btn btn-primary"
								style="float: left;">+</button></a><br><br><br></div>
				</div>
				<input type="SUBMIT" name="submit" class="btn btn-success" />
			</form>
		</div>
	</center>
</body>