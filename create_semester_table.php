<?php 
include_once("config.php");
$mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));

    $query="SELECT * from semester";

    if( $result= mysqli_query($mysqli,$query))
    {
       while($row=mysqli_fetch_assoc($result))
       {
        $id=$row['id'];
        $semester =$row['semester'];
       
        $qu="CREATE TABLE $semester(id INT NOT NULL AUTO_INCREMENT, semester VARCHAR(255) NULL,Level_Term VARCHAR(255) NULL,Course_Code VARCHAR(255) NULL,Sections VARCHAR(255) NULL,Course_Cr INT(50) NULL,Total_Cr int(255) NULL,Teacher_Initial_Name VARCHAR(255) NULL,Credit_Hours FLOAT(50) NULL,Approx_Class_Size INT(50) NULL,PRIMARY KEY(id) )";
        $re= mysqli_query($mysqli,$qu);
    }
    mysqli_free_result($result);
    }

    include_once("Create_Semester.php");

    ?>