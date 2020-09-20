<!DOCTYPE html>
<html lang="en">
<?php
	include_once("config.php");
	include_once("function.php");
    check_login_user();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automatic Routine Management Syatem</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
   <section></section>

    
</body>
</html>