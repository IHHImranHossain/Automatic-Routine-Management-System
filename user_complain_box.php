<!DOCTYPE html>
<html lang="en">
<?php
	include_once("config.php");
	include_once("function.php");
    check_login_user();
    $error2 = '';
    $error3 = '';
    $error4 = '';
    $name = $email = $comment ='';
    if(isset($_POST['Submit'])) 
    {
        $name         =$_POST['name'];
	    $email        =$_POST['email'];
        $comment      =$_POST['comment'];

        if(empty($name) || empty($email) || empty($comment)) 
  	    {

        }
        else
        {
            $result = mysqli_query($mysqli, "INSERT INTO complain_box(Name,Email,Comment) VALUES('$name','$email','$comment')");
		    header("Location: user_complain_box.php");
        }
    }
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Complain Box</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            text-decoration: none;
            list-style: none;
            
        }
        body{
            font-family: montserrat;
            background-image: url(img/bc.jpg);
            background-size: cover;
            background-attachment: scroll;
            background-position: center center;
            
            
        }
        
        nav{
            background: #0082e6;
            height: 80px;
            width: 100%;
        }
        .logo{
            color: white;
            font-size: 20px;
            line-height: 80px;
            padding: 0 15px;
            margin-left: 30px;
            font-weight: bold;
            border: white 2px solid;
            border-radius: 5px;

        }
        nav ul{
            float: right;
            margin-right: 20px;
        }
        nav ul li{
            display: inline-block;
            line-height: 80px;
            margin: 0 5px;
        }
        nav ul li a{
            color: white;
            font-size: 17px;
            text-decoration: uppercase;
            padding: 7px 13px;
            border-radius: 3px;
        }
        a.active,a:hover{
            background: #1b9bff;
            transition: .5s;
        }
        .checkbtn{
        font-size: 30px;
        color: white;
        float: right;
        line-height: 80px;
        margin-right: 40px;
        cursor: pointer;
        display: none;
        }
        #check{
        display: none;
        }
        @media (max-width: 952px){
            label.logo{
                font-size: 30px;
                padding-left: 50px;
            }
            nav ul li a{
                font-size: 16px;
            }
        }
        @media (max-width: 858px){
            .checkbtn{
                display: block;
            }
            ul{
                position: fixed;
                width: 100%;
                height: 100vh;
                background: #2c3e50;
                top: 80px;
                left: -100%;
                text-align: center;
                transition: all .5s;
            }
            nav ul li{
                display: block;
                margin: 50px 0;
                line-height: 30px;
            }
            nav ul li a{
                font-size: 20px;
            }
            a:hover,a.active{
                background: none;
                color: #0082e6;
            }
            #check:checked ~ ul{
                left: 0;
            }
        }
        section{
        background: url(bg1.jpg) no-repeat;
        background-size: cover;
        height: calc(100vh - 80px);
        }
        .container{
            background-color: #1b9bff;
            margin-top: 2%;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="img">

    </div>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label for="amrs"><a href="user_home.php" class="logo">ARMS</label></a>
        <ul>
            <li><a href="user_home.php" class="active">Home</a></li>
            <li><a href="user_course_information.php">Course Information</a></li>
            <li><a href="user_teacher_information.php">Teachers Information</a></li>
            <li><a href="user_room_information.php">Room Information</a></li>
            <li><a href="user_day_routine.php">Daywise Final Routine</a></li>
            <li><a href="user_section_routine.php">Section Wise Routine</a></li>
            <li><a href="user_teacher_routine.php">Teacher Routine</a></li>
            <li><a href="user_complain_box.php">Complain Box</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
   </nav>

   <center>
       <div class="container">
            <div class="jumbotron">
				<h1><strong>Complain Box</strong></h1>
            </div>
    <form method="POST">
        <div class="name">
            <label for="name" style="font-size: 15px;">Enter Your Name</label>
            <input type="text" name="name" placeholder="Your Name" class="form-control" style="width: 70%;" required>
        </div><br><br>
        <div class="email">
            <label for="email" style="font-size: 15px;">Enter Your Email</label>
            <input type="email" name="email" placeholder="Enter Your Email" class="form-control" style="width: 70%;" required>
        </div><br><br>
        <div class="comment" style="width: 80%;">
            <label for="comment" style="font-size: 15px;">Enter Your Complain</label>
            <textarea name="comment" id="comment" cols="50" rows="2" class="form-control" placeholder="Enter Your Complain" required></textarea><br>
            <input type="submit" value="Submit" name="Submit" style="width: 40%;float:right">
        </div>
    </form>
    </div>
</center>
</body>
</html>