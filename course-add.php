<!DOCTYPE HTML>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = $error1 = $error2 = $error3 = $error4 = $error5 = $error6 = $error7 ='';
$Semester = $Level_Term = $Course_Code = $Course_Title = $Prerequisites = $Course_Cr ='';
if(isset($_POST['Submit'])) 
{
  $Semester =$_POST['Semester'];
	$Level_Term =$_POST['Level_Term'];
  $Course_Code =$_POST['Course_Code'];
	$Course_Title =$_POST['Course_Title'];
  $Prerequisites =$_POST['Prerequisites'];
	$Course_Cr =$_POST['Course_Cr'];

  

	if(empty($Semester) || empty($Level_Term) || empty($Course_Code) || empty($Course_Title) || empty($Prerequisites) || empty($Course_Cr)) 
  {
    if(empty($Semester)) {
      $error7 ="<font color='#990000'><h4><strong>Semester field is empty.</strong></h4></font><br/>";
    }
    if(empty($Level_Term)) {
      $error4 ="<font color='#990000'><h4><strong>Level Term field is empty.</strong></h4></font><br/>";
    }
    if(empty($Course_Code)) {
			$error ="<font color='#990000'><h4><strong>Course Code field is empty.</strong></h4></font><br/>";
		}

		if(empty($Course_Title)) {
			$error1 = "<font color='#990000'><h4><strong>Course Title field is empty.</strong></h4></font><br/>";
		}
    if(empty($Prerequisites)) {
      $error5 = "<font color='#990000'><h4><strong>Prerequisites field is empty.</strong></h4></font><br/>";
    }

		if(empty($Course_Cr)) {
			$error2 = "<font color='#990000'><h4><strong>Student Cr field is empty.</strong></h4></font><br/>";
		}
	} 
  
  
  elseif (!empty($Semester) || !empty($Course_Code) || !empty($Course_Title)) 
  {
    $results = mysqli_query($mysqli,"SELECT Course_Code FROM courses_information WHERE Course_Code='$Course_Code'");
      if (mysqli_num_rows($results)>0) 
    {
      $error= "<font color='#990000'><h4><strong>This Course Code is Already Taken.</strong></h4></font><br/>";
    }
    $Result = mysqli_query($mysqli,"SELECT Course_Title FROM courses_information WHERE Course_Title='$Course_Title'");
      if (mysqli_num_rows($Result)>0) 
    {
      $error1= "<font color='#990000'><h4><strong>This Course Title is Already Taken.</strong></h4></font><br/>";
    }	
    else
     {
      $result = mysqli_query($mysqli, "INSERT INTO courses_information(Semester,Level_Term,Course_Code,Course_Title,Prerequisites,Course_Cr) VALUES('$Semester','$Level_Term','$Course_Code','$Course_Title','$Prerequisites','$Course_Cr')");
      header("Location: course-information.php");

    }
  }
  
}
		?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Course Information</title>
	  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="jquery.js" type="text/javascript"></script>
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
        margin-top:45px;

      }
      .container{
        background-color: gray;
        border-radius: 25px;
        padding-top: 10px;
        padding-bottom: 0px;
      }
      .btn{
        padding-bottom: -30px;
      }
		
	</style>
</head>
<body>
  <center>
	   <div class="container">
           <form class="form-horizontal" method="post" action="course-add.php" style="margin-top:70px;">
  	            <h2 style="color: #1A1A1A;"><strong>Add Course Data</strong></h2><br>
                  <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Semester">Semester :</label></strong></h4>
                            <div class="col-sm-9">
                              <select name="Semester" id="Semester" class="form-control">  
                                <option value="Select Semester" selected disabled="">Select Semester</option> 
                                    <?php
                                        include_once("config.php");
                                        $querys = "SELECT semester FROM semester order by id ASC";
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
                                <center>
                                  <?php
                                     echo $error7;
                                  ?>
                                </center>
                            </div>
                  </div>   
                  <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Level_Term">Level Term :</label></strong></h4>
                            <div class="col-sm-9">
                               <input type="text" required="" placeholder="Enter Level Term" class="form-control" id="Level_Term" name="Level_Term" value="<?php echo $Level_Term;?>">
                               <center>
                                  <?php
                                     echo $error4;
                                  ?>
                               </center>
                            </div>
                  </div>
                   <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Course_Code">Course_Code :</label></strong></h4>
                            <div class="col-sm-8">
                               <input type="text" required="" placeholder="Enter Course Code" class="form-control" id="Course_Code" name="Course_Code" value="<?php echo $Course_Code;?>">
                               <center>
                               	  <?php
                               	     echo $error;
                                     echo $error4;
                               	  ?>
                               </center>
                            </div>
                    </div>
                    <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Course_Title">Course_Title :</label></strong></h4>
                           <div class="col-sm-7">
                               <input type="text" required="" placeholder="Enter Course Title" class="form-control" id="Course_Title" name="Course_Title" value="<?php echo $Course_Title;?>">
                               <center>
                               	  <?php
                               	     echo $error1;
                               	  ?>
                               </center>
                           </div>
                    </div>
                    <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Course_Title">Prerequisites :</label></strong></h4>
                           <div class="col-sm-6">
                               <input type="text" required="" placeholder="Enter Prerequisites" class="form-control" id="Prerequisites" name="Prerequisites" value="<?php echo $Prerequisites;?>">
                               <center>
                                  <?php
                                     echo $error5;
                                  ?>
                               </center>
                           </div>
                    </div>
		            <div class="form-group">
			             <h4><strong> <label class="control-label col-sm-2" for="Course_Cr">Course_Cr :</label></strong></h4>
			               <div class="col-sm-5">
				               <input type="text" required="" placeholder="Enter Course Cr" class="form-control" id="Course_Cr" name="Course_Cr" value="<?php echo $Course_Cr;?>">
				               <center>
                               	  <?php
                               	     echo $error2;
                               	  ?>
                               </center>
			               </div>
		            </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success"name="Submit" style="float:right;">Submit</button>
                       </div>
                    </div>
           </form>
			   <a href="course-information.php" class="btn btn-info" role="button" style="float:right; margin-bottom:15px; margin-left:195px;">View Result</a>
         <a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-danger"  style=" margin-left:200px;"><strong>Back Page</strong></a>
       </div>
      </center>
    </body>
</html>
