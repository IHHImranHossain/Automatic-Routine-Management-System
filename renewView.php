<?php 
        require_once 'process.php';
        include_once("config.php");
        include_once("function.php");
        check_login_user();
        ob_start();


        //for sections table
        if(1)
        {
            // for saturday 
            $q="SELECT *
            FROM sections
            WHERE saturday IS NOT NULL";


            if( $re= mysqli_query($mysqli,$q))
            {
                while($r=mysqli_fetch_assoc($re))
                {
                    $m=$r['id'];
                    $inse=$mysqli->query("UPDATE sections SET saturday=NULL WHERE id=$m") or die($mysqli->error);
                }
            mysqli_free_result($re);
            }
          

            $q="SELECT *
            FROM sections
            WHERE sunday IS NOT NULL";


            if( $re= mysqli_query($mysqli,$q))
            {
                while($r=mysqli_fetch_assoc($re))
                {
                    $m=$r['id'];
                    $inse=$mysqli->query("UPDATE sections SET sunday=NULL WHERE id=$m") or die($mysqli->error);
                }
            mysqli_free_result($re);
            }
            

            $q="SELECT *
            FROM sections
            WHERE monday IS NOT NULL";


            if( $re= mysqli_query($mysqli,$q))
            {
                while($r=mysqli_fetch_assoc($re))
                {
                    $m=$r['id'];
                    $inse=$mysqli->query("UPDATE sections SET monday=NULL WHERE id=$m") or die($mysqli->error);
                }
            mysqli_free_result($re);
            }
            

            $q="SELECT *
            FROM sections
            WHERE tuesday IS NOT NULL";


            if( $re= mysqli_query($mysqli,$q))
            {
                while($r=mysqli_fetch_assoc($re))
                {
                    $m=$r['id'];
                    $inse=$mysqli->query("UPDATE sections SET tuesday=NULL WHERE id=$m") or die($mysqli->error);
                }
            mysqli_free_result($re);
            }
            

            $q="SELECT *
            FROM sections
            WHERE wednesday IS NOT NULL";


            if( $re= mysqli_query($mysqli,$q))
            {
                while($r=mysqli_fetch_assoc($re))
                {
                    $m=$r['id'];
                    $inse=$mysqli->query("UPDATE sections SET wednesday=NULL WHERE id=$m") or die($mysqli->error);
                }
                mysqli_free_result($re);
            }   
            

            $q="SELECT *
            FROM sections
            WHERE thursday IS NOT NULL";


            if( $re= mysqli_query($mysqli,$q))
            {
                while($r=mysqli_fetch_assoc($re))
                {
                    $m=$r['id'];
                    $inse=$mysqli->query("UPDATE sections SET thursday=NULL WHERE id=$m") or die($mysqli->error);
                }
                mysqli_free_result($re);
                }
            

            }

            //for allteacher table
            if(1)
            {
                // for saturday 
                $q="SELECT *
                FROM allteacher
                WHERE saturday IS NOT NULL";
            
            
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE allteacher SET saturday=NULL WHERE id=$m") or die($mysqli->error);
                    }
                mysqli_free_result($re);
                }
            
            
                $q="SELECT *
                FROM allteacher
                WHERE sunday IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE allteacher SET sunday=NULL WHERE id=$m") or die($mysqli->error);
                    }
                mysqli_free_result($re);
                }
                
            
                $q="SELECT *
                FROM allteacher
                WHERE monday IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE allteacher SET monday=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
                
            
                $q="SELECT *
                FROM allteacher
                WHERE tuesday IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE allteacher SET tuesday=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
                
                
                $q="SELECT *
                FROM allteacher
                WHERE wednesday IS NOT NULL";
            
            
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE allteacher SET wednesday=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
                
                
                $q="SELECT *
                FROM allteacher
                WHERE thursday IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE allteacher SET thursday=NULL WHERE id=$m") or die($mysqli->error);
                    }
                mysqli_free_result($re);
                }
               
                
            }

                //for finaldayroutine table
            if(1)
            {
                // for A
                $q="SELECT *
                FROM finaldayroutine
                WHERE A IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE finaldayroutine SET A=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
                
                
                $q="SELECT *
                FROM finaldayroutine
                WHERE B IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE finaldayroutine SET B=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
                
            
                $q="SELECT *
                FROM finaldayroutine
                WHERE C IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE finaldayroutine SET C=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
                
                $q="SELECT *
                FROM finaldayroutine
                WHERE D IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE finaldayroutine SET D=NULL WHERE id=$m") or die($mysqli->error);
                    }
                mysqli_free_result($re);
                }
                
                $q="SELECT *
                FROM finaldayroutine
                WHERE E IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                    $inse=$mysqli->query("UPDATE finaldayroutine SET E=NULL WHERE id=$m") or die($mysqli->error);
                    }
                mysqli_free_result($re);
                }
                
                $q="SELECT *
                FROM finaldayroutine
                WHERE F IS NOT NULL";
                
                
                if( $re= mysqli_query($mysqli,$q))
                {
                    while($r=mysqli_fetch_assoc($re))
                    {
                        $m=$r['id'];
                        $inse=$mysqli->query("UPDATE finaldayroutine SET F=NULL WHERE id=$m") or die($mysqli->error);
                    }
                    mysqli_free_result($re);
                }
            }
            include_once("renew.php");
           
?>