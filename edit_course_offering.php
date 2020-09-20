<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = $error1 = $error2 = $error3 = $error4 = $error5 = $error6 = $error7 =  $error8 = NULL;
$id = $Semester = $Level_Term = $Course_Code = $Teacher_Initial_Name = $Sections = $Course_Cr = $Credit_Hours = $Approx_Class_Size ='';
if(isset($_POST['update']))
{
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $Semester = mysqli_real_escape_string($mysqli, $_POST['Semester']);
	$Level_Term = mysqli_real_escape_string($mysqli, $_POST['Level_Term']);
	$Course_Code = mysqli_real_escape_string($mysqli, $_POST['Course_Code']);
	$Teacher_Initial_Name = mysqli_real_escape_string($mysqli, $_POST['Teacher_Initial_Name']);
	$Sections = mysqli_real_escape_string($mysqli, $_POST['Sections']);
    $Course_Cr = mysqli_real_escape_string($mysqli, $_POST['Course_Cr']);
    $Credit_Hours = mysqli_real_escape_string($mysqli, $_POST['Credit_Hours']);
    $Approx_Class_Size = mysqli_real_escape_string($mysqli, $_POST['Approx_Class_Size']);
	
	if(empty($Semester) || empty($Level_Term) || empty($Course_Code) || empty($Teacher_Initial_Name) || empty($Sections) || empty($Course_Cr) || empty($Credit_Hours) || empty($Approx_Class_Size)) {

        if(empty($Semester)) {
			$error="<font color='#990000'><h4><strong>Semester field is empty.</strong></font><br/>";
		}
        if(empty($Level_Term)) {
			$error="<font color='#990000'><h4><strong>Level Term field is empty.</strong></font><br/>";
		}
		if(empty($Course_Code)) {
			$error1="<font color='#990000'><h4><strong>Course Code field is empty.</strong></font><br/>";
		}

		if(empty($Teacher_Initial_Name)) {
			$error2= "<font color='#990000'><h4><strong>Teacher Initial Name field is empty.</strong></font><br/>";
		}
        if(empty($Sections)) {
			$error3= "<font color='#990000'><h4><strong>Section field is empty.</strong></font><br/>";
		}

		if(empty($Course_Cr)) {
			$error4= "<font color='#990000'><h4><strong>Course Cr field is empty.</strong></font><br/>";
        }
        if(empty($Credit_Hours)) {
			$error5= "<font color='#990000'><h4><strong>Credit Hours field is empty.</strong></font><br/>";
        }
        if(empty($Approx_Class_Size)) {
			$error6= "<font color='#990000'><h4><strong>Approx Class Size field is empty.</strong></font><br/>";
		}

	} else {
		$result = mysqli_query($mysqli, "UPDATE $Semester SET Semester='$Semester',Level_Term='$Level_Term',Course_Code='$Course_Code',Teacher_Initial_Name='$Teacher_Initial_Name',Sections='$Sections',Course_Cr='$Course_Cr',Credit_Hours='$Credit_Hours',Approx_Class_Size='$Approx_Class_Size' WHERE id=$id");
		header("Location: update_course-offering.php");
	}
}
?>

<html>
<head>
	<title>Edit Course Data</title>
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
  	}
  	body{
		background-color: whitesmoke;
		font-family: sans-serif;
  		margin-top: 60px;
  	}

  </style>
</head>
<body>
	<center>
	<div class="container">
	<form name="form1" method="post" action="#">
		<h2 style="color: #1A1A1A;"><strong>Update Course Data</strong></h2><br>
		  <table class="table">
            <tr>
				<td><h4><strong>Semester:</strong></td>
				<td>
                    <select name="Semester" id="Semester"  class="form-control" value="<?php echo $Semester;?>" >  
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
                </td>
                <center>
                    <?php 
                        echo $error8 ;
                    ?>
                </center>
			</tr>
		  	<tr>
				<td><h4><strong>Level Term:</strong></td>
				<td>
                    <select name="Level_Term" id="Level_Term" style="border-radius: 4px;" class="form-control" value="<?php echo $Level_Term;?>" required>  
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
                    </select>
                </td>
                <center>
                    <?php 
                        echo $error ;
                    ?>
                </center>
			</tr>
			<tr>
				<td><h4><strong>Course Code:</strong></td>
				<td>
					<select name="Course_Code" id="Course_Code" class="form-control" value="<?php echo $Course_Code;?>" required>  
                            <option value="Select Course_Code" selected disabled="">--Select Course Code--</option>
						    <option value="Null">Null</option>  
                                <?php
                                    include_once("config.php");
                                    $querys = "SELECT Course_Code FROM courses_information order by id ASC";
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
                    </select>
                </td>
                <center>
                    <?php 
                        echo $error1 ;
                    ?>
            	</center>
			</tr>
			<tr>
                <td><h4><strong>Teacher Initial Name:</strong></h4></td>
                    <td>
                        <select name="Teacher_Initial_Name" id="Teacher_Initial_Name" class="form-control" value="<?php echo $Teacher_Initial_Name;?>" required>  
                                <option value="Select TeacherInitial_Name" selected disabled="">--Select Teacher Initial Name--</option> 
                                    <?php
                                        include_once("config.php");
                                        $querys = "SELECT Teacher_Initial_Name FROM teachers_information order by id ASC";
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
                    </td>
                </tr>
				<center>
                    <?php 
                        echo $error2 ;
                    ?>
            	</center>
            <tr>
				<td><h4><strong>Sections:</strong></h4></td>
				<td>
                <select name="Sections" id="sections" class="form-control" value="<?php echo $Sections;?>" required>  
                    <option value="" selected disabled="">--Select Sections--</option>
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
                </select>
				</td>
			</tr>
				<center>
                    <?php 
                        echo $error3 ;
                    ?>
            	</center>
			<tr>
				<td><h4><strong>Credit Hours:</strong></td>
				<td>
					<select name="Credit_Hours" id="Credit_Hours" class="form-control" value="<?php echo $Credit_Hours;?>" required > 
                        <option value="" selected disabled="">--Select Credit Hours--</option>    
                        <option value="1">1 Hour</option>
						<option value="1.5" selected>1.5 Hour</option>
						<option value="2">2 Hour</option>
						<option value="3">3 Hour</option>
					</select>
				</td>
			</tr>
				<center>
                    <?php 
                        echo $error4 ;
                    ?>
                </center>

            <tr>
                <td><h4><strong>Course Cr:</strong></td>
				<td>
                    <select name="Course_Cr" id="Course_Cr" class="form-control" value="<?php echo $Course_Cr;?>" required>
                        <option value="" selected disabled="">--Select Course Cr--</option>        
                        <option value="1">1 Credit</option>
                        <option value="2">2 Credit</option>
                        <option value="3" selected>3 Credit</option>
                    </select>
				</td>
            </tr>
            <center>
                    <?php 
                        echo $error4 ;
                    ?>
            </center>

            <tr>
                <td><h4><strong>Approx Class Size:</strong></td>
				<td>
                    <select name="Approx_Class_Size" id="Approx_Class_Size" class="form-control" value="<?php echo $Approx_Class_Size;?>" required>
                        <option value="" selected disabled="">--Select Approx Class Size--</option>     
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
                    </select>
				</td>
            </tr>
            <center>
                    <?php 
                        echo $error4 ;
                    ?>
            </center>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" class="btn btn-success" name="update" value="Update" style="float:right; margin-top: 20px;"></td>
			</tr>
		</table>
		<div class="btn">
		<a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"  role="button" style="float:left; margin-top:-70px; margin-right:145px;">Back Page</a></div>
	</form>
	
</div>
</center>
</body>
</html>
