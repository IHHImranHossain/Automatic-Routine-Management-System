<?php 
        require_once 'process.php';
        include_once("config.php");
        include_once("function.php");
        check_login_user();
        ob_start();


        //for section
            $section="DELETE FROM sections";
            if( $se= mysqli_query($mysqli,$section)){
                echo "All sections row are deleted";
                    
            }
            $allteacher="DELETE FROM allteacher";
            if( $te= mysqli_query($mysqli,$allteacher)){
                echo "All allteacher row are deleted";

            }
            $finaldayroutine="DELETE FROM finaldayroutine";
            if( $day= mysqli_query($mysqli,$finaldayroutine)){
                echo "All finaldayroutine row are deleted";

            }
            header("Location: renew_database.php");
              
            
?>