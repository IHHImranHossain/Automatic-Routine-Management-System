<!DOCTYPE html>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$output=NULL;
$error= NULL;
if(isset ($_POST['submit']))
{
    $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
    $tname=$_POST['tname'];
    $offday1=$_POST['offday1'];
    $offday2=$_POST['offday2'];
    $r1day=$_POST['r1day'];
    $r1time=$_POST['A'];
    $r2day=$_POST['r2day'];
    $r2time=$_POST['B'];
    $i=0;
    $va="";
    $val="";

    foreach($r1time AS $value)
    {
        if($value=="m4")
        {
           
        }
        else
        {
            $i++;
         $va.=$value;
        }
    }
    
    $j=0;
    foreach($r2time AS $value)
    {
       if($value=="m6"){
        
       }
       else{
           $j++;
        $val.=$value;
       }
        
    }
    if($offday1=="m5"){
        $offday1="Nullable";
    }
    if($offday2=="m5"){
        $offday2="Nullable";
    }
    if($r1day=="m5"){
        $r1day="Nullable";
    }
    if($r2day=="m5"){
        $r2day="Nullable";
    }
    if($i==0){
        $va="Nullable";
    }
    if($j==0){
        $val="Nullable";
    }


    $queryR = "SELECT * FROM requirement_table where t_name='$tname'";
    $results = mysqli_query($mysqli,$queryR);
    if($results -> num_rows > 0)
    {
        
        $error="<h4 style='color: red;'><strong>Teacher Name Already teken</strong></h4>";
    }
    else{
        $mysqli->query("INSERT INTO requirement_table(t_name,offday1,offday2,r1day,r1time,r2day,r2time)VALUES('$tname','$offday1','$offday2',' $r1day','$va','$r2day','$val')") or die($mysqli->error);
        $error="<h4 style='color: green;'><strong>Data Successfully Inserted</strong></h4>";
    }
    $mysqli->close();
    
    
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher's Requirement Form</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js">
    </script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

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
            padding-top: 10px;
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

        .days {
            margin-left: 186px;
            margin-top: 29px;
            height: 100px;


        }

        .day1 {
            float: left;
            padding: 10px;
            margin-right: 50px;
            background: skyblue;
            border-radius: 5px;
        }

        .day2 {
            float: left;
            padding: 10px;
            background: skyblue;
            border-radius: 5px;
        }

        .secondform {
            background-color: lightskyblue;
            border-radius: 5px;
            padding: 25px;
            margin-bottom: 40px;
        }

        .bo {
            background: white;
            color: white;
        }

        .submit {
            border: solid black 1px;
            border-radius: 3px;
            padding: 5px;
            background-color: green;
            color: whitesmoke;
        }

        .submit:hover {
            background-color: lightcoral;
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
    <!--start new one form -->
    <center>
        <div class="container">
            <div class="jumbotron">
                <h1><strong>Teacher's Requirement Form</strong></h1>
                <p>You can select <strong>Tceacher's name</strong> & <strong> Day's.</strong> for teacher's</p>
            </div>
            <?php 
            echo $error;
            ?>

            <div class="viewrequirment">
                <h4 style="float:left"><strong>For see teacher's requirment click here --></strong></h4>
                <a href="view_teacher_requirment.php"><button class="btn btn-primary" style="float: right;"> View
                        Teacher's Requirment</button></a>
            </div><br><br><br>

            <form action="#" method="POST">
                <div class="techerform">
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


                <div class="days">
                    <div class="day1">
                        <label class="control-label" for="offday1">
                            <h4>Select First Offday:</h4>
                        </label>
                        <select name="offday1" class="offday1" style="border-radius: 4px;">
                            <option value="Null" selected disabled="">--Select First Offday--</option>
                            <option value="m5" selected>--Select First Offday--</option>
                            <?php
                            require_once 'process.php';
                            $querys = "SELECT * FROM day";
                            $results = mysqli_query($mysqli,$querys);
                            if ($results) 
                            {
                                while($row=mysqli_fetch_array($results))
                                {
                                    $day1=$row["day"];
                                    echo"<option>$day1<br></option>";
                                }
                            }	
                        ?>
                        </select>
                    </div>

                    <div class="day2">
                        <label class="control-label " for="offday2">
                            <h4>Select Second Offday:</h4>
                        </label>
                        <select name="offday2" class="offday2" style="border-radius: 4px;">
                            <option value="Null" selected disabled="" selected>--Select Second Offday--</option>
                            <option value="m5" selected>--Select First Offday--</option>
                            <?php
                            require_once 'process.php';
                            $querys = "SELECT * FROM day";
                            $results = mysqli_query($mysqli,$querys);
                            if ($results) 
                            {
                                while($row=mysqli_fetch_array($results))
                                {
                                    $day2=$row["day"];
                                    echo"<option>$day2<br></option>";
                                }
                            }	
                        ?>
                        </select>
                    </div>
                </div>


                <div class="secondform">
                    <label class="control-label " for="">
                        <h2><strong>Choice Your Exception Day and Time</strong></h2>
                    </label><br>
                    <label class="control-label " for="offday2">
                        <h4><strong>Choice Your Exception Day:</strong></h4>
                    </label>
                    &nbsp;<select name="r1day" id="excep" style="border-radius: 4px;">
                        <option value="Null" selected disabled="" selected><strong>--Select Exception Day--</strong>
                        </option>
                        <option value="m5" selected>--Select First Offday--</option>
                        <?php
                            require_once 'process.php';
                            $querys = "SELECT * FROM day";
                            $results = mysqli_query($mysqli,$querys);
                            if ($results) 
                            {
                                while($row=mysqli_fetch_array($results))
                                {
                                    $day2=$row["day"];
                                    echo"<option>$day2<br></option>";
                                }
                            }	
                        ?>
                    </select>

                    <div id="container">
                        <input type="checkbox" name="A[]" value="A" />8.30-10.00&nbsp;&nbsp;
                        <input type="checkbox" name="A[]" value="B" />10.00-11.30&nbsp;&nbsp;
                        <input type="checkbox" name="A[]" value="C" />11.30-1.00&nbsp;&nbsp;

                    </div>
                    <div id="container">
                        <input type="checkbox" name="A[]" value="D" />1.00-2.30&nbsp;&nbsp;
                        <input type="checkbox" name="A[]" value="E" />2.30-4.00&nbsp;&nbsp;
                        <input type="checkbox" name="A[]" value="m4" checked class="bo" />
                    </div><br>

                    <div>
                        <label class="control-label " for="">
                            <label class="control-label " for="offday2">
                                <h4><strong>Choice Your Another Exception Day:</strong></h4>
                            </label>
                            &nbsp;<select name="r2day" id="excep" style="border-radius: 4px;">
                                <option value="Null" selected disabled="" selected><strong>--Select Exception
                                        Day--</strong></option>
                                <option value="m5" selected>--Select First Offday--</option>
                                <?php
                            require_once 'process.php';
                            $querys = "SELECT * FROM day";
                            $results = mysqli_query($mysqli,$querys);
                            if ($results) 
                            {
                                while($row=mysqli_fetch_array($results))
                                {
                                    $day2=$row["day"];
                                    echo"<option>$day2<br></option>";
                                }
                            }	
                        ?>
                            </select>

                    </div>
                    <div id="container">
                        <input type="checkbox" name="B[]" value="A" />8.30-10.00&nbsp;&nbsp;
                        <input type="checkbox" name="B[]" value="B" />10.00-11.30&nbsp;&nbsp;
                        <input type="checkbox" name="B[]" value="C" />11.30-1.00&nbsp;&nbsp;

                    </div>
                    <div id="container">
                        <input type="checkbox" name="B[]" value="D" />1.00-2.30&nbsp;&nbsp;
                        <input type="checkbox" name="B[]" value="E" />2.30-4.00&nbsp;&nbsp;
                        <input type="checkbox" name="B[]" value="m6" checked class="bo" />
                    </div><br>
                    <input type="SUBMIT" name="submit" class="submit" />
                </div>
            </form>
        </div>

    </center>



</body>

</html>