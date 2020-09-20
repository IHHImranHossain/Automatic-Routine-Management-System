<!Doctype html>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Section's wise Routine</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery.tabledit.min.js" type="text/javascript"></script>


    <style type="text/css">
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
            margin-left: 13px;
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
        .r {
            margin-top: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            color: green;
            font-family: monospace;
            font-size: 25px;
            text-align: center;
        }

        th {
            background-color: #2E4053;
            color: gray;

        }



        tr:nth-child(odd) {
            background-color: white
        }

        .ad {
            margin-top: 10px;
            margin-bottom: 10px;
        }
		tr:hover td{
            background-color: whitesmoke;
        }
        .jumbotron{
            background-color: #0082e6;
        }
        .ad{
            background-color: #2c3e50;
            color: whitesmoke;
            border-radius: 3px;
            padding: 5px;
        }
        .ad:hover{
            background-color: tomato;
        }
    </style>
</head>

<body>

	<center>
		
		
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
        </div>

            <!--start new one form -->
            <div class="container">
                <div class="jumbotron">
                    <h1><strong>Section wise Routine</strong></h1>
                    <p>There is have section wise routine for all</p>
                </div>

                <form action="#" method="POST" style="background-color: whitesmoke; padding:8px; border-radius: 5px;">
					<div class="r">
						<label for="Level_Term" class="control-label"  style="font-size: large; color:darkred;">Select Level Term :</label>&nbsp;
						<select name="Level_Term" id="Level_Term" required style="font-size:medium">
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
						</select> <br><br>
						
						<label for="Sections"  style="font-size: large; color:darkred;">Select Sections :</label>&nbsp;
								<select name="Sections" id="sections" required style="font-size:medium">
									<option value="" selected disabled="">--Select Sections--</option>
									<option value="Null">Null</option>
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
								</select><br>
					</div>
					<input type="SUBMIT" name="submit" class="ad" />

			</form><br>

			<table class="table">
				<thead class="t">
					<tr>
						<th scope="col">Time</th>
						<th scope="col">Saturday</th>
						<th scope="col">Sunday</th>
						<th scope="col">Monday</th>
						<th scope="col">Tuesday</th>
						<th scope="col">Wednesday</th>
						<th scope="col">Thursday</th>
					</tr>
				</thead>
				<?php
            $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
            if(isset ($_POST['submit'])){
               
				$level=$_POST['Level_Term'];
				$secsion=$_POST['Sections'];
				$tname=$level;
				$tname.=$secsion;
                //echo $tname;
            
                $sql="select * from sections where sname='$tname'";
                $result= mysqli_query($mysqli,$sql);
                if($result -> num_rows > 0){
                    while($row=mysqli_fetch_assoc($result)){
                        $sat=$row["saturday"];
                        $sun=$row["sunday"];
                        $mon=$row["monday"];
                        $tu=$row["tuesday"];
                        $we=$row["wednesday"];
                        $th=$row["thursday"];
                        
                        if($sat=="0"){
                            $sat="";
                        }
                        if($sun=="0"){
                            $sun="";
                        }
                        if($mon=="0"){
                            $mon="";
                        }
                        if($tu=="0"){
                            $tu="";
                        }
                        if($we=="0"){
                            $we="";
                        }
                        if($th=="0"){
                            $th="";
                        }
                        echo "<tr><td>". $row["time"] . "</td><td>". $sat . "</td><td>".$sun."</td><td>".$mon."</td><td>".$tu."</td><td>".$we."</td><td>".$th."</td><tr>";

                }
                echo "</table>";
            }
        }
            ?>

	</center>










</body>

</html>