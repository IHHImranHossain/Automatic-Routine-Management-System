<!DOCTYPE html>
<?php
include_once("config.php");
include_once("function.php");
check_login_user();
ob_start();


    $mysqli = new mysqli('localhost','root','','arms')or die(mysqli_error($mysqli));
    
    $query="SELECT * from requirement_table";
    if( $result= mysqli_query($mysqli,$query))
    {
       while($row=mysqli_fetch_assoc($result))
       { 
            $tname=$row["t_name"];
            $offday1 =$row["offday1"];
            $offday2=$row["offday2"];
            $r1day=$row["r1day"];
            $r1time=$row["r1time"];
            $r2day=$row["r2day"];
            $r2time=$row["r2time"];
            $m=strlen($r1time);
            $n=strlen($r2time);
            if($m<=5)
            {

            }
            else
            {
                $m=0;
            }
            if($n<=5)
            {

            }
            else
            {
                $n=0;
            }
            $q="SELECT * from allteacher where t_name = '$tname'";
            if( $r= mysqli_query($mysqli,$q))
            {
                while($ro=mysqli_fetch_assoc($r))
                { 
                    $t=$ro['id'];
                    if($offday1=='saturday' || $offday1=='sunday'|| $offday1=='monday'|| $offday1=='tuesday'|| $offday1=='wednesday'|| $offday1=='thursday')
                    {
                        $mysqli->query("UPDATE allteacher SET $offday1=0 WHERE id=$t") or die($mysqli->error);
                    }
                    
                    if($offday2=='saturday' || $offday2=='sunday'|| $offday2=='monday'|| $offday2=='tuesday'|| $offday2=='wednesday'|| $offday2=='thursday')
                    {
                        $mysqli->query("UPDATE allteacher SET $offday2=0 WHERE id=$t") or die($mysqli->error);
                    }
                    
                    
                }
            }
            $q="SELECT * from allteacher where t_name = '$tname'";
            if( $r= mysqli_query($mysqli,$q))
            {
                while($ro=mysqli_fetch_assoc($r))
                { 
                    $t=$ro['id'];
                for($i=0;$i<$m;$i++)
                {
                        $p=$r1time[$i];
                        $mysqli->query("UPDATE allteacher SET $r1day=0 WHERE id=$t AND time='$p'") or die($mysqli->error);
                    }
                }
            }
            $q="SELECT * from allteacher where t_name = '$tname'";
            if( $r= mysqli_query($mysqli,$q))
            {
                while($ro=mysqli_fetch_assoc($r))
                { 
                    $t=$ro['id'];
                    if($r2day=='saturday' || $r2day=='sunday'|| $r2day=='monday'|| $r2day=='tuesday'|| $r2day=='wednesday'|| $r2day=='thursday')
                    {
                        for($i=0;$i<$n;$i++)
                        {
                            $q=$r2time[$i];
							$mysqli->query("UPDATE allteacher SET $r2day=0 WHERE id=$t AND time='$q'") or die($mysqli->error);
							
                            header("Location: hit_database.php");
            
                        }
                    }
                    
                    header("Location: hit_database.php");
                }
            }
        }
    }
?>
