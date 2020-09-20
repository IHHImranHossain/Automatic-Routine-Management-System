<!DOCTYPE html>
<html lang="en">
    <?php
    include_once("config.php");
    $email = '';
    $error='';
    session_start();
    if (isset($_POST['submit'])) 
    {
        $type = $_POST['roll'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email= strip_tags(mysqli_real_escape_string($mysqli,trim($email)));
        $password= strip_tags(mysqli_real_escape_string($mysqli,trim($password)));

        $result =mysqli_query($mysqli, "SELECT * FROM reg_user WHERE user_email='$email' and roll ='$type' and user_password='$password'");
        $row =  mysqli_fetch_array($result);

        $results =mysqli_query($mysqli, "SELECT * FROM reg_user WHERE user_email='$email' and roll ='$type' and user_password='$password'");
        
        $check_user= mysqli_num_rows($results);

        if ($check_user==1) 
        {
            $_SESSION["type"] = $row['roll'];
            $_SESSION["email"] = $row['user_email'];
            if ($type=="Admin") 
            {
                header("Location: home.php");
            }
            elseif ($type=="User") {
                header("Location: user_home.php");
            }
            
        }
        else 
        {
            $error="<h4><strong><font color='#990000'>Your Email or Password is wrong</strong></font></h5>";
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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.history.forward();
    </script>

    <style type="text/css">
        body{
            background-image: url(img/bc1.jpg);
            background-size: cover;
            background-attachment: fixed;
        }
        .form-box{
            background-color: gray;
            border-radius: 20px;
            padding: 20px;
            padding-bottom: 40px;
            color:black;
            opacity: 0.9;
        }
        
    </style>
</head>
<body>
     <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-1 col-12"> 
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 col-12" style="margin-top:40px"><br><br>
                    <h1 style="text-align:center; color:Black;"><strong>Login Register Form</strong></h1><br>
                        <div class="form-box">
                            <div class="form-top-center">
                                <h3><strong>Sign in</strong></h3>
                                <p><strong>Enter Your Email and Password </strong></p><br>
                            </div>
                            <div class="form-top-right"> 
                                    <center>
                                        <?php
                                        echo $error; 
                                         ?>
                                    </center>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="" method="post" class="login-form">
                                    <div class="selection">
                                        <label for="roll">Plase Select User Type: </label>
                                        <select name="roll" id="roll" class="form-control" required>
                                            <option value="" selected disabled>__Select User Type__</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <label for="form-password">Email: </label>
                                        <input type="email" name="email" placeholder="Email..." class="form-username form-control" id="form-username" required="" value="<?php echo $email ?>"> 
                                    </div>
                                    <div class="form-group">
                                        <label  for="form-password">Password: </label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password" required=""> 
                                    </div><br>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-12">
                                            <button type="submit" class="btn btn-success" name="submit"><strong>Sign in</strong></button>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <p style="float: right;"><b>Have not account?</b> </p>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-12" style="float: right;">
                                            <a href="registration.php" class="btn btn-primary" role="button" style="float:right;">Registration</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1 col-12">
            </div>
        </div>
    </div>
</body>

</html>
