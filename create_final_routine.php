<!DOCTYPE html>
<?php require_once 'process.php';
include_once("config.php");
include_once("function.php");
check_login_user();
ob_start();
//course code search

    $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
    if(isset ($_POST['submit']))
    {
        $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
        $s=$_POST['tname'];
        $inc=0;
        $query="SELECT * from $s";
        for($i=1;$i<=2;$i++)
        {
            if( $result= mysqli_query($mysqli,$query))
            {
                while($row=mysqli_fetch_assoc($result))
                {           
                    //from course table.
                    $courseid=$row['id'];
                    $courseco=$row["Course_Code"];
                    $name=$row["Teacher_Initial_Name"];
                    $courseLevTerm =$row["Level_Term"];
                    $section=$row["Sections"];// all the data from course table.
                    $courseLevTerm .= $section;
                    $sname=$courseLevTerm; //levelterm concat name = $sname
                    $inc=$inc+1;
                    $check=1;
                    $que="SELECT * from day";  //searching day for crate routine for individual routine.
                    $r= mysqli_query($mysqli,$que);
                    if($r -> num_rows > 0)
                    {
                        while($ro=mysqli_fetch_assoc($r))
                        {          //the loop for day searching
                            $day = $ro["day"];
                            //echo $day;
                            // echo $sname." ".$day;
                            /* $tc="SELECT *
                                FROM $name
                                WHERE $day IS NOT NULL";
                                $rtc= mysqli_query($mysqli,$tc); 
                                if($rtc -> num_rows >= 3){
                                    continue;
                            }*/
                        

                            $q="SELECT * FROM allteacher WHERE t_name='$name' And $day IS NULL";          //searching teacher null time
                            $rq= mysqli_query($mysqli,$q);
                            if($rq -> num_rows > 0)
                            {
                                while($rqr=mysqli_fetch_assoc($rq))
                                {     
                                    //for teacher null time find loop
                                    $t=$rqr["time"];
                                    $tid=$rqr['id'];
                                    //echo $t."</br>";
                                    //echo $name;
                                    //echo $t."</br>";
                                    $sq="SELECT *
                                    FROM sections 
                                    WHERE sname='$sname' AND $day IS NULL";   //searching section null time
                                    $rsq= mysqli_query($mysqli,$sq);

                                    if($rsq -> num_rows > 0)
                                    {
                                        while($rsqr=mysqli_fetch_assoc($rsq))
                                        {
                                            $st=$rsqr["time"];
                                            $sid=$rsqr['id'];
                                            //echo $sname;
                                            //echo "hi section";
                                            if ($t==$st)
                                            {
                                                //echo $st." ";
                                                // echo "hi time";       //this is the same time when teacher and students are free.
                                                $cl="SELECT *
                                                FROM finaldayroutine 
                                                WHERE day= '$day' AND $st IS NULL";//searching day's available roomnumber
                                                $rcl= mysqli_query($mysqli,$cl);
                                                if($rcl -> num_rows > 0)
                                                {
                                                    while($rclr=mysqli_fetch_assoc($rcl))
                                                    {
                                                        $nid=$rclr['id'];
                                                        $roomnumber=$rclr['roomnumber'];
                                                        $all= "(";
                                                        $all.=$courseco;
                                                        $all.="+";
                                                        $all.=$name;
                                                        $all.="+";
                                                        $all.=$section;
                                                        $all .= ")";
                                                        $test=$tid+1;
                                                        $mysqli->query("UPDATE finaldayroutine SET $st='$all' WHERE id=$nid") or die($mysqli->error);
                                                        $mysqli->query("UPDATE allteacher SET $day='$courseco' WHERE id=$tid") or die($mysqli->error);
                                                        $mysqli->query("UPDATE sections SET $day='$courseco' WHERE id=$sid") or die($mysqli->error);
                                                        if($st=='E')
                                                        {

                                                        }
                                                        else
                                                        {
                                                            $mysqli->query("UPDATE allteacher SET $day=0 WHERE id=$test") or die($mysqli->error);
                                                        }
                                                        $check=2;
                                                        break;
                                                    }//end avolable roomnumber loop

                                                }//end avolable roomnumber condition
                                        
                                            }//end the same time free of student and teacher condition
                                            if($check==2) 
                                            {
                                            break;
                                            } 

                                        }//end searching section null time loop
                                    }//end searching section null time condition
                            
                                    if($check==2) 
                                    {
                                        break;
                                    } 

                                }//end seariching teacher null time loop

                            }//end seariching teacher null time condition

                            if($check==2) 
                            {
                                break;
                            } 

                        }//end searching day
        
                    }//end searching day condition
                    /* if($inc==8) 
                        {
                        break;
                        }
                    */
   
                }//end course table loop
                mysqli_free_result($result);
            }//end course table condition
        }
    }
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Final Routine</title>
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
			<li><a href="complain_box.php" style="text-decoration:none;"><i class="fas fa-question-circle"></i>Complain Box</a></li>
			<li><a href="logout.php" style="text-decoration:none;"><i class="fa fa-reply-all"></i>Log Out</a></li>
		</ul>
	</div>
    
    <center>
        <div class="container">
            <div class="jumbotron">
                <h1><strong>Create Final Routine</strong></h1>
                <p>Just Select <strong>Semester & Hit or Press </strong> the button</p>
            </div>
                
            <form action="#" method="POST">
                <center>
                    <div class="semesterform">
                        <h4><label class="control-label " for="tname">Select Semester Name</label></h4>
                        <select name="tname" class="form-control" required>
                            <option value="" selected disabled="">--Select Semester Name--</option>
                            <?php
                                    require_once 'process.php';
                                    $querys = "SELECT * FROM semester";
                                    $results = mysqli_query($mysqli,$querys);
                                    if ($results) 
                                    {
                                        while($row=mysqli_fetch_array($results))
                                        {
                                            $semester=$row["semester"];
                                            echo"<option>$semester<br></option>";
                                        }
                                    }	
                                ?>
                        </select><br>
                    </div>
                </center>
            <input type="SUBMIT" name="submit" class="btnn" /><br><br>

            </form>
            <div class="routine">
                <h4 style="float:left;"><strong>For check routine click here --></strong></h4>
                <a href="finalroutine.php"><button class="btn btn-primary" style="float: right; margin-right:0px;">Routine</button></a>
            </div><br><br><br>
            <div class="renewdatabase">
                <h4 style="float:left;"><strong>For Renew Database click here --></strong></h4>
                <a href="renew_database.php"><button class="btn btn-warning" style="float: right; margin-right:0px;">Renew Database</button></a>
            </div><br><br>
            <div class="renewdatatable">
                <h4 style="float:left;"><strong>For Renew Data Table click here --></strong></h4>
                <a href="renew_database.php"><button class="btn btn-warning" style="float: right; margin-right:0px;">Renew Data Table</button></a>
            </div>
        </div>
    </center>
</body>
</html>
