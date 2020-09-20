<!DOCTYPE html>
<html lang="en">
    <?php
    include_once("config.php");

    $first_name = $last_name = $user_email = $user_pass = $user_conpass = $type ='';

    $error1 = $error2 = $error3 = $error4 = $error5 = $error6 = $error7 = $error8 = $error9 = $error10 = NULL ;

    if(isset($_POST['Submit'])) 
    {
        $first_name      =  $_POST['user_first_name'];
        $last_name       =  $_POST['user_last_name']; 
        $user_email      =  $_POST['user_email'];
        $user_pass       =  $_POST['user_pass'];
        $user_conpass    =  $_POST['user_conpass'];
        $type    =  $_POST['roll'];


        if(empty($first_name) || empty($last_name) || empty($user_email) || empty($user_pass) || empty($user_conpass) || empty($type)) 
        {

            if(empty($first_name)) {
                $error1 = "<h4><strong><font color='#990000'>First Name Field Is Empty.</strong></font></h4><br/>";
            }

            if(empty($last_name)) {
                $error2 = "<h4><strong><font color='#990000'>Last Name Field Is Empty.</strong></font></h4><br/>";
            }

            if(empty($user_email)) {
                $error3 = "<h4><strong><font color='#990000'>Email Field Is Empty.</strong></font></h4><br/>";
            }

            if(empty($user_pass)) {
                $error4 = "<h4><strong><font color='#990000'>Password Field Is Empty.</strong></font></h4><br/>";
            }
            if(empty($user_conpass)) {
                $error5 = "<h4><strong><font color='#990000'>Confirm Password Field Is Empty.</strong></font></h4><br/>";
            }
            if(empty($type)) {
                $error6 = "<h4><strong><font color='#990000'>Plsect Select Type Field Is Empty.</strong></font></h4><br/>";
            }

        } 

        elseif (strlen($user_pass) < 8) 
        {
            $error7 = "<h4><strong><font color='#990000'>Your Password length at least 8.</strong></font></h4><br/>";
        }
        elseif (strlen($user_conpass) < 8) 
        {
            $error10 = "<h4><strong><font color='#990000'>Your Password length at least 8.</strong></font></h4><br/>";
        }
        elseif ($user_conpass != $user_pass) 
        {
            $error8 = "<h4><strong><font color='#990000'> Do not match your Password.</strong></font></h4><br/>";
        }
        elseif (!empty($user_email))
        {
            $results = mysqli_query($mysqli,"SELECT user_email FROM reg_user WHERE user_email='$user_email'");
            if (mysqli_num_rows($results)>0) 
            {
                $error9 = "<font color='#990000'><h4><strong>This Email is Already Taken.</strong></h4></font><br/>";
            }
            else 
            {
                $result = mysqli_query($mysqli, "INSERT INTO reg_user(first_name,last_name,user_email,user_password,user_conpassword,roll) VALUES('$first_name','$last_name','$user_email','$user_pass','$user_conpass','$type')");
                if ($result== true) 
                {
                header("Location: index.php");
                }
                else 
                {
                echo "You have a error";
            }
            }
        }
    }
    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Register</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
    body
    {
        background-image: url(img/bc1.jpg);
        background-size: cover;
        background-attachment: fixed;
    }
         
    .form-box
    {
        background-color: gray;
        border-radius: 20px;
        padding:20px;
        opacity: 0.9;
        
    }
        
    
     </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1  col-1"> 
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 col-10" style="margin-top:10px">
                <h1 style="text-align:center; color:black;"><strong>Login Register Form</strong></h1><br>
                    <div class="form-box">
                        <div class="form-top-left">
                            <h3><strong>Sign Up</strong></h3><br>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="registration.php" method="post">
                                <div class="form-group">
                                    <label  for="form-first-name">First Name</label>
                                    <input type="text" name="user_first_name" placeholder="First name..." class="form-username form-control"  value="<?php echo $first_name ?>">
                                    <center>
                                            <?php 
                                                echo $error1 ;
                                            ?>
                                    </center>
                                </div>
                                <div class="form-group">
                                    <label  for="form-last-name">Last Name</label>
                                    <input type="text" name="user_last_name" placeholder="Last name..." class="form-username form-control" value="<?php echo $last_name ?>">
                                    <center>
                                            <?php 
                                                echo $error2 ;
                                            ?>
                                    </center>
                                </div>
                                <div class="form-group">
                                   <label  for="form-email">Email</label>
                                    <input type="email" name="user_email" placeholder="Email..." class="form-username form-control" value="<?php echo $user_email ?>">
                                    <center>
                                            <?php 
                                                echo $error3 ;
                                                echo $error9;
                                            ?>
                                    </center>
                                </div>
                                <div class="form-group">
                                    <label  for="form-about-yourself">Password</label>
									<input type="password" name="user_pass" placeholder="Password..." class="form-username form-control" value="<?php echo $user_pass ?>">                                
                                        <center>
                                            <?php 
                                                echo $error4 ;
                                                echo $error7;
                                            ?>
                                        </center>
                                </div>
                                <div class="form-group">
                                    <label  for="form-about-yourself">Confirm Password</label>
                                    <input type="password" name="user_conpass" placeholder="Confirm Password..." class="form-username form-control" value="<?php echo $user_conpass ?>">
                                        <center>
                                        <?php 
                                            echo $error8;
                                            echo $error5;
                                            echo $error10;
                                        ?>
                                        </center>
                                </div>
                                <div class="selection">
                                    <label for="roll">Plase Select User Type </label>
                                    <select name="roll" id="roll" class="form-control" required>
                                        <option value="" selected disabled>__Select User Type__</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select><br>
                                </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-12 col-md-4" >
                                            <button type="submit" class="btn btn-success" name="Submit"><strong>Sign up</strong></button>
                                        </div>
                                        <div class="col-lg-6 col-12 col-md-4" >
                                            <p style="color: black; float:right;"><b> Alraedy have account?</b></p>
                                        </div>
                                        <div class="col-lg-3 col-12 col-md-4" >
                                            <a href="index.php" class="btn btn-primary" name="" style="float: right;"><strong>Sign In</strong></a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                </div>
            </div>
                <div class="col-lg-3 col-md-2 col-sm-1 col-1">
                </div>
        </div>
    </div>
    
</body>

</html>
