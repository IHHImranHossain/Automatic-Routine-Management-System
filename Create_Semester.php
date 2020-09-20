<!DOCTYPE html>
<html>
	<?php
	include_once("config.php");
	include_once("function.php");
    check_login_user();
    $databaseHost = 'localhost';
    $databaseName = 'arms';
    $databaseUsername = 'root';
    $databasePassword = '';

    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

    $error='';
    if(isset($_POST['Submit'])) 
    {
        $Semester =$_POST['Semester'];
        $message= $message1 = "";
        if(empty($Semester)) 
        {
            $error ="<font color='#990000'><h4><strong>Semester field is empty.</strong></h4></font><br/>";
        }
        elseif (!empty($Semester)) 
        {
            $results = mysqli_query($mysqli,"SELECT Semester FROM semester WHERE Semester='$Semester'");
            if (mysqli_num_rows($results)>0) 
            {
                $error= "<font color='#990000'><h4><strong>This Semester is Already Taken.</strong></h4></font><br/>";
            }	
            else
            {
                $result = mysqli_query($mysqli, "INSERT INTO semester(Semester) VALUES('$Semester')");
                if ($result === true) 
                {
                    $message = 'Successfully Data Updated';
                }
                else
                {
                    $message1 = 'Data Not Inserted';
                }
                header("Location: Create_Semester.php");
                mysqli_free_result($result);
			    mysqli_close($mysqli);
                        
                  
                    }
                }
                    
            }
	?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Creating Semester</title>
	<link rel="stylesheet" type="text/css" href="bootstarp.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript">
	function togglemenu(){
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
        .jumbotron{
            background-color: lightskyblue;
        }
        table,th,td{
				border:2px solid black;
				width:2500px;
				background-color: whitesmoke;
				border-radius: 5px;
				color:black;
			}
        tr:hover td{
            background-color: deepskyblue;
			}
			th{
				background-color: #2E4053;
				color: whitesmoke;
			
			}
		.btnn{
			color: whitesmoke;
			background-color: green;
			border:solid whitesmoke 1px ;
			padding: 4px;
			border-radius: 3px;
			text-decoration: none;
		}
		.btnn a:hover{
				background-color: orange;
				text-decoration: none;
		}
		.btne{
			color: whitesmoke;
			background-color: orange;
			border:solid whitesmoke 1px ;
			padding: 4px;
			border-radius: 3px;
			text-decoration: none;
		}
		.btne a:hover{
				background-color: red;
				text-decoration: none;
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
        <div class="form">
            <div class="container" >
	            <div class="jumbotron" style="margin-top:10px; margin-bottom:20px;">
                    <h1><strong>Semester Creation</strong></h1>
			        <p>You can ADD<strong> Semester </strong>Only.</p>
		        </div>
	        </div>
	        <div class="container">
	            <form name="form1" method="post" action="#">
		            <h2 style="color: #1A1A1A;"><strong>Semester Creation</strong></h2><br>
		            <table class="table">
		  	            <tr>
				            <td><h4><strong>Enter Semester =></strong></td>
                            <td><input type="text"  placeholder="Enter Semester" name="Semester" class="form-control"></td>
                            <center>
                                <?php 
                                    echo $error ;
                                ?>
                            </center>
                        </tr>
                        <tr>
                            <td><h4 style=" color:darkgreen; "><strong>For<span style=" color:darkred; "> Submit </span> Click Here -></strong></h4></td>
                            <td><input type="submit" class="btn btn-success" name="Submit" value="Submit" style="float:right; margin-right: 0px;"></td>
                        </tr>
						<tr>
							<td><h4 style=" color:darkgreen; "><strong>For Create <span style=" color:darkred; ">Semester Table</span>  Click Here -></strong></h4></td>
							<td><a href="create_semester_table.php" class="btn btn- bg-primary" role="button" style="float:right; margin-bottom:15px; margin-left:200px;">Create Semester Table</a></td>
						</tr>
                    </table>
                </form>
            </div>
        </div>
    </center>

	<div class="container"><br/>
            <div id="table-container">
                <form method="post"  action="#" id="update_form">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
									
									<center>
										<h2><label for="" style="text-align:center; color:bisque"><b> Semester Table</b></label></h2>
									</center>
									
                                    <tr>
                                        <th style="width:10%; text-align:center;"><big>Semester ID</th>
										<th style="width:10%; text-align:center;"><big>Semester</big></th>
										<th style="width:10%; text-align:center;"><big>Actions</big></th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
										$result = mysqli_query($mysqli, "SELECT * from semester order by id");
                                        while($row= mysqli_fetch_array($result)) 
                                        {
                                    ?>
                                        <center>
                                            <tr>
                                                <td style="width:10%; text-align:center;"><?php echo $row['id'] ?></td> 
												<td style="width:20%; text-align:center;"><?php echo $row['semester'] ?></td>
												<?php
													echo "<td><a class='btnn' href=\"semester_edit.php?id=$row[id]\">Edit</a> | <a class='btne' href=\"semester_delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
												?>
                                            </tr>
                                        </center>
                                    <?php
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
</body>
</body>
</html>