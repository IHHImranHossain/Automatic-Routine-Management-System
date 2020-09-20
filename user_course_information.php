<!DOCTYPE html>
<html lang="en">
<?php
	include_once("config.php");
	include_once("function.php");
    check_login_user();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Course Information</title>
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
            background-attachment: fixed;
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
            text-decoration: none;
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
        
        .section_for_table{
			width:100%;
			height:100%;
			float:Right;
		}
        table,th,td{
			border:2px solid black;
			width:2500px;
			background-color: dimgrey ;
			border-radius: 5px;
			color:black;
            border-radius: 5px;
		}
        #tbl tr:nth-child(even){
            background-color: bisque;
        }
        tr:hover td{
            background-color: whitesmoke;
        }
        th{
            background-color: #2E4053;
            color: whitesmoke;
           
        }
    </style>
</head>
<body>
    <div class="nav">
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
   </div><br><br>
    <center>
        <div class="container">
            <form action="" method="POST">
                <div class="form-group">
                    <div id="ab"><big style="font-size: large;"><strong>Select Level Term: </strong> </big>  &nbsp;
                        <select name="Level_Term" id="Level_Term" style="border-radius: 4px; font-size:medium" required>  
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
                        </select><br><br>
                        <input type="SUBMIT" name="submit" class="btn btn-success"/>
                    </div>
                </div>
            </form><br><br>
                        
                            
            <div class="section_for_table">
                <div class="table-responsive">
                    <form method="post"  action="">
                        <div id="table-container">
                                <table class="table table-bordered table-striped" id="tbl">
                                    <thead class="tbl">
                                        <tr>
                                            <th scope="col"><h4><strong>Level Term</strong> </h4></th>
                                            <th scope="col"><h4><strong>Corse Code</strong> </h4></th>
                                            <th scope="col"><h4><strong>Corse Title</strong> </h4></th>
                                            <th scope="col"><h4><strong>Course Cr</strong> </h4></th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbl">
                                        <tr>
                                            <?php
                                                if(isset ($_POST['submit']))
                                                {
                                                    $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
                                                    $Level_Term=$_POST['Level_Term'];                        
                                                
                                                    $sql="select * from courses_information where Level_Term like '$Level_Term'";
                                                    $result= mysqli_query($mysqli,$sql);
                                                            
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                            ?>
                                                        <td><h5><?php echo $row['Level_Term'] ?></h5></td>
                                                        <td><h5><?php echo $row['Course_Code'] ?></h5></td>
                                                        <td><h5><?php echo $row['Course_Title'] ?></h5></td>
                                                        <td><h5><?php echo $row['Course_Cr'] ?></h5></td>
                                                            
                                        </tr>
                                            <?php
                                                    }
                                                }
                                            ?>	
                                    </tbody>
                                </table>
                            </div>
                        </form>	
                    </div>
                </div>
        </center>
</body>
</html>