<!DOCTYPE HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
$error = '';
$error1 = '';
$error2 = '';
$error3 = '';
$error4 = '';
$Teacher_Name = $Teacher_Initial_Name = $Email = $Phone_Number = $Max_Cr ='';
if(isset($_POST['Submit'])) 
{
	$Teacher_Name         =$_POST['Teacher_Name'];
	$Teacher_Initial_Name =$_POST['Teacher_Initial_Name'];
	$Email                =$_POST['Email'];
	$Phone_Number         =$_POST['Phone_Number'];
  $Max_Cr               =$_POST['Max_Cr'];

	if(empty($Teacher_Name) || empty($Teacher_Initial_Name) || empty($Email) || empty($Phone_Number) || empty($Max_Cr)) 
  	{

		if(empty($Teacher_Name)) {
			$error ="<font color='#990000'><h4><strong>Teacher Name field is empty.</strong></h4></font><br/>";
		}

		if(empty($Teacher_Initial_Name)) {
			$error1 = "<font color='#990000'><h4><strong>Teacher Initial Name field is empty.</strong></h4></font><br/>";
		}

		if(empty($Email)) {
			$error2 = "<font color='#990000'><h4><strong>Email field is empty.</strong></h4></font><br/>";
		}

		if(empty($Phone_Number)) {
			$error3 ="<font color='#990000'><h4><strong>Phone Number field is empty.</strong></h4></font><br/>";
		}

    if(empty($Max_Cr)) {
      $error4 ="<font color='#990000'><h4><strong>Max Cr field is empty.</strong></h4></font><br/>";
    }

	} 
  elseif (!empty($Teacher_Name) || !empty($Teacher_Initial_Name) || !empty($Teacher_Initial_Name)) 
  {
    $results = mysqli_query($mysqli,"SELECT Teacher_Name FROM teachers_information WHERE Teacher_Name='$Teacher_Name'");
      if (mysqli_num_rows($results)>0) 
    {
      $error= "<font color='#990000'><h4><strong>This Teacher Name is Already Taken.</strong></h4></font><br/>";
    }
    $Result = mysqli_query($mysqli,"SELECT Teacher_Initial_Name FROM teachers_information WHERE Teacher_Initial_Name='$Teacher_Initial_Name'");
      if (mysqli_num_rows($Result)>0) 
    {
      $error1= "<font color='#990000'><h4><strong>This Teacher Initial Name is Already Taken.</strong></h4></font><br/>";
    }
    $Results = mysqli_query($mysqli,"SELECT Email FROM teachers_information WHERE Email='$Email'");
      if (mysqli_num_rows($Results)>0) 
    {
      $error2= "<font color='#990000'><h4><strong>This Email is Already Taken.</strong></h4></font><br/>";
    }
  else 
  {
		$result = mysqli_query($mysqli, "INSERT INTO teachers_information(Teacher_Name,Teacher_Initial_Name,Email,Phone_Number,Max_Cr) VALUES('$Teacher_Name','$Teacher_Initial_Name','$Email','$Phone_Number','$Max_Cr')");
		header("Location: teacher-information.php");
		}
	}
}
		?>
		<html>
		<head>
			<title>Add Teacher Data</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<style type="text/css">
  	.container{
  		background-color: gray;
  		margin-top: 05%;
  		border-radius: 25px;
  		padding-top: 40px;
  		padding-bottom: 20px;
  	}
  	*{
  	
  		display: cover;
  		margin: 0px;
  		padding: 0px;
		font-family: sans-serif;
		
  	}
  	.btn{
  		padding-bottom: -30px;
  	}
  	body{
  		background-color: whitesmoke;
  		margin-top: 20px;
  	}

  </style>
</head>

   <body>
   	  <center>
	   <div class="container" style="margin-top:120px;">
           <form class="form-horizontal" method="post" action="teacher-add.php">
  	            <h2 style="color: #1A1A1A;"><strong>Add Teacher Data</strong></h2><br>
                   <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Teacher_Name">Teacher Name :</label></strong></h4>
                            <div class="col-sm-10">
                               <input type="text" required="" placeholder="Enter Teacher Name" class="form-control" id="Teacher_Name" name="Teacher_Name" value="<?php echo $Teacher_Name;?>">
                               <center>
                               	  <?php
                               	     echo $error;
                               	  ?>
                               </center>
                            </div>
                    </div>
                    <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Teacher_Initial_Name">Teacher Initial Name :</label></strong></h4>
                           <div class="col-sm-10">
                               <input type="text" required="" placeholder="Enter Teacher Initial Name" class="form-control" id="Teacher_Initial_Name" name="Teacher_Initial_Name" value="<?php echo $Teacher_Initial_Name;?>">
                               <center>
                               	  <?php
                               	     echo $error1;
                               	  ?>
                               </center>
                           </div>
                    </div>
		            <div class="form-group">
			             <h4><strong> <label class="control-label col-sm-2" for="Email">Email :</label></strong></h4>
			               <div class="col-sm-10">
				               <input type="text" required="" placeholder="Enter Email" class="form-control" id="Email" name="Email" value="<?php echo $Email;?>">
				               <center>
                               	  <?php
                               	     echo $error2;
                               	  ?>
                               </center>
			               </div>
		            </div>
		            <div class="form-group">
			             <h4><strong><label class="control-label col-sm-2" for="Phone_Number">Phone Number :</label></strong></h4>
			               <div class="col-sm-10">
				               <input type="text" required="" placeholder="Enter Phone Number" class="form-control" id="Phone_Number" name="Phone_Number" value="<?php echo $Phone_Number;?>">
				               <center>
                               	  <?php
                               	     echo $error3;
                               	  ?>
                               </center>
			               </div>
		            </div>
                <div class="form-group">
                   <h4><strong><label class="control-label col-sm-2" for="Max_Cr">Max Cr :</label></strong></h4>
                     <div class="col-sm-10">
                       <input type="text" required="" placeholder="Enter Max Cr" class="form-control" id="Max_Cr" name="Max_Cr" value="<?php echo $Max_Cr;?>">
                       <center>
                                  <?php
                                     echo $error4;
                                  ?>
                               </center>
                     </div>
                </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success" name="Submit" style="float:right;">Submit</button>
                       </div>
                    </div>
           </form>
			   <a href="teacher-information.php" class="btn btn-danger" role="button" style="float:right;">View Result</a>
         <a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"><strong>Back Page</strong></a>
       </div>
      </center>
    </body>
</html>
