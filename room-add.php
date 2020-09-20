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
$Room_Number = $Room_Type = $Academic_Building = $Floor_Number = '';
if(isset($_POST['Submit'])) 
{
	$Room_Number                      =$_POST['Room_Number'];
	$Room_Type                        =$_POST['Room_Type'];
	$Academic_Building                =$_POST['Academic_Building'];
	$Floor_Number                     =$_POST['Floor_Number'];

	if(empty($Room_Number) || empty($Room_Type) || empty($Academic_Building) || empty($Floor_Number)) 
  {

		if(empty($Room_Number)) {
			$error ="<font color='#990000'><h4><strong>Room Number field is empty.</strong></h4></font><br/>";
		}

		if(empty($Room_Type)) {
			$error1 = "<font color='#990000'><h4><strong>Room Type field is empty.</strong></h4></font><br/>";
		}

		if(empty($Academic_Building)) {
			$error2 = "<font color='#990000'><h4><strong>Academic Building field is empty.</strong></h4></font><br/>";
		}

		if(empty($Floor_Number)) {
			$error3 ="<font color='#990000'><h4><strong>Floor Number field is empty.</strong></h4></font><br/>";
		}

  
	} 
  elseif (!empty($Room_Number)) 
  {
    $Result = mysqli_query($mysqli,"SELECT Room_Number FROM room_table WHERE Room_Number='$Room_Number'");
      if (mysqli_num_rows($Result)>0) 
    {
      $error= "<font color='#990000'><h4><strong>This Room Number is Already Taken.</strong></h4></font><br/>";
    }
  else 
  {
		$result = mysqli_query($mysqli, "INSERT INTO room_table(Room_Number,Room_Type,Academic_Building,Floor_Number) VALUES('$Room_Number','$Room_Type','$Academic_Building','$Floor_Number')");
		header("Location: room-information.php");
		}
	}
}
		?>
		<html>
		<head>
			<title>Add Room Data</title>
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
           <form class="form-horizontal" method="post" action="room-add.php">
  	            <h2 style="color: #1A1A1A;"><strong>Add Room Data</strong></h2><br>
                   <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Room_Number">Room Number :</label></strong></h4>
                            <div class="col-sm-10">
                               <input type="text" required="" placeholder="Enter Room Number" class="form-control" id="Room_Number" name="Room_Number" value="<?php echo $Room_Number;?>">
                               <center>
                               	  <?php
                               	     echo $error;
                               	  ?>
                               </center>
                            </div>
                    </div>
                    <div class="form-group">
                         <h4><strong> <label class="control-label col-sm-2" for="Room_Type">Room Type :</label></strong></h4>
                           <div class="col-sm-10">
                               <input type="text" required="" placeholder="Enter Room Type" class="form-control" id="Room_Type" name="Room_Type" value="<?php echo $Room_Type;?>">
                               <center>
                               	  <?php
                               	     echo $error1;
                               	  ?>
                               </center>
                           </div>
                    </div>
		            <div class="form-group">
			             <h4><strong> <label class="control-label col-sm-2" for="Academic_Building">Academic Building :</label></strong></h4>
			               <div class="col-sm-10">
				               <input type="text" required="" placeholder="Enter Academic Building" class="form-control" id="Academic_Building" name="Academic_Building" value="<?php echo $Academic_Building;?>">
				               <center>
                               	  <?php
                               	     echo $error2;
                               	  ?>
                               </center>
			               </div>
		            </div>
		            <div class="form-group">
			             <h4><strong><label class="control-label col-sm-2" for="Floor_Number">Floor Number :</label></strong></h4>
			               <div class="col-sm-10">
				               <input type="text" required="" placeholder="Enter Floor Number" class="form-control" id="Floor_Number" name="Floor_Number" value="<?php echo $Floor_Number;?>">
				               <center>
                               	  <?php
                               	     echo $error3;
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
			   <a href="room-information.php" class="btn btn-danger" role="button" style="float:right;">View Result</a>
         <a href="javascript:history.go(-1)"onMouuseOver="self.status.referrer;return true" class="btn btn-primary"><strong>Back Page</strong></a>
       </div>
      </center>
    </body>
</html>
