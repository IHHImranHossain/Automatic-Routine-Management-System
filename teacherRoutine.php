<!Doctype html>
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
	<title>View Teacher's Routine</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>

    <style type="text/css">
        body {
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
		.jumbotron{
			padding-bottom: 20px;
			padding-top: 5px;
			margin-top: 6px;
			background-color:lightskyblue;
		}

        .r {
            margin-top: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: green;
            font-family: monospace;
            font-size: 25px;
            text-align: center;
        }

        th {
            background-color: gray;
            color: black;

        }



        tr:nth-child(odd) {
            background-color: white
        }

        .ad {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        tr:hover td{
            background-color: whitesmoke;
        }
    </style>
    <script type="text/javascript">
		function togglemenu()
		{
			document.getElementById('sidebar').classList.toggle('active');
		}
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
				<h1><strong>View Teacher's Routine</strong></h1>
				<p>There is have daywise routine for teacher</p>
            </div>
            
            <!--start new one form -->
            <form action="#" method="POST">
            <center>
                <div class="r">
                    <h4><label class="control-label " for="tname">Select Teacher Name</label></h4>
                    <select name="tname" class="form-control" required>
                        <option value="" selected disabled="">--Select Teacher Name--</option>
                        <?php
                            require_once 'process.php';
                            $querys = "SELECT * FROM teachers_information";
                            $results = mysqli_query($mysqli,$querys);
                            if ($results) 
                            {
                                while($row=mysqli_fetch_array($results))
                                {
                                    $tname=$row["Teacher_Initial_Name"];
                                    echo"<option>$tname<br></option>";
                                }
                            }	
                        ?>
                    </select>
                </div>
                <input type="SUBMIT" name="submit" class="ad" />

        </form>

        <table class="table">
            <thead class="t">
                <tr>
                    <th scope="col">Time</th>
                    <th scope="col">Saturday</th>
                    <th scope="col">Sunday</th>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                </tr>
            </thead>
            <?php
            $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
            if(isset ($_POST['submit'])){
               
                $tname=$_POST['tname'];
                //echo $tname;
            
                $sql="select * from allteacher where t_name='$tname'";
                $result= mysqli_query($mysqli,$sql);
                if($result -> num_rows > 0){
                    while($row=mysqli_fetch_assoc($result)){
                        $sat=$row["saturday"];
                        $sun=$row["sunday"];
                        $mon=$row["monday"];
                        $tu=$row["tuesday"];
                        $we=$row["wednesday"];
                        $th=$row["thursday"];
                        if($sat=="0"){
                            $sat="";
                        }
                        if($sun=="0"){
                            $sun="";
                        }
                        if($mon=="0"){
                            $mon="";
                        }
                        if($tu=="0"){
                            $tu="";
                        }
                        if($we=="0"){
                            $we="";
                        }
                        if($th=="0"){
                            $th="";
                        }
                        echo "<tr><td>". $row["time"] . "</td><td>". $sat . "</td><td>".$sun."</td><td>".$mon."</td><td>".$tu."</td><td>".$we."</td><td>".$th."</td><tr>";

                }
                echo "</table>";
            }
        }
            ?>

            </center>

</body>

</html>