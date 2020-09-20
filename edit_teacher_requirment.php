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
$id = $t_name = $offday1 = $offday2 = $r1day = $r1time = $r2day = $r2time ='';
if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$t_name = mysqli_real_escape_string($mysqli, $_POST['t_name']);
	$offday1 = mysqli_real_escape_string($mysqli, $_POST['offday1']);
	$offday2 = mysqli_real_escape_string($mysqli, $_POST['offday2']);
	$r1day = mysqli_real_escape_string($mysqli, $_POST['r1day']);
    $r1time = mysqli_real_escape_string($mysqli, $_POST['r1time']);
    $r2day = mysqli_real_escape_string($mysqli, $_POST['r2day']);
    $r2time = mysqli_real_escape_string($mysqli, $_POST['r2time']);
	
    if(empty($t_name) || empty($offday1) || empty($offday2) || empty($r1day) || empty($r1time) || empty($r2day) || empty($r2time)) 
    {

		

    } 
    else 
    {
		$result = mysqli_query($mysqli, "UPDATE requirement_table SET t_name='$t_name',offday1='$offday1',offday2='$offday2',r1day='$r1day',r1time='$r1time',r2day='$r2day',r2time='$r2time' WHERE id=$id");
		header("Location: view_teacher_requirment.php");
	}
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM requirement_table WHERE id=$id");
while($res = mysqli_fetch_array($result))
{
	$t_name = $res['t_name'];
	$offday1 = $res['offday1'];
	$offday2 = $res['offday2'];
	$r1day = $res['r1day'];
    $r1time = $res['r1time'];
    $r2day = $res['r2day'];
    $r2time = $res['r2time'];
}
?>
<html>
<head>
	<title>Update Teacher's Requirments</title>
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
          margin-left: 75px;
  	}
  	body{
		background-color: whitesmoke;
		font-family: sans-serif;
  		margin-top: 60px;
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
            background: gray;
            border-radius: 5px;
        }

        .day2 {
            float: left;
            padding: 10px;
            background: gray;
            border-radius: 5px;
        }

        .secondform {
            background-color: gray;
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
            background-color: skyblue;
            color: black;
        }

  </style>
</head>
<body>
	<center>
	<div class="container">
    <form action="#" method="POST">
                <div class="techerform">
                    <h4><label class="control-label " for="tname">Select Teacher Name</label></h4>
                    <select name="tname" class="form-control" required>
                        <option value="" selected disabled="">--Select Teacher Name--</option>
                        <option value="Null">Null</option>
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
                            <option value="0" selected disabled="">--Select First Offday--</option>
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
                            <option value="0" selected disabled="" selected>--Select Second Offday--</option>
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
                    <input type="SUBMIT" name="submit" class="submit" /><br><br>
                </div>
            </form>
		<div class="btn">
		<a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"  role="button" style="float:left; margin-top:-70px; margin-right:145px;">Back Page</a></div>
	</form>
	
</div>
</center>
</body>
</html>
