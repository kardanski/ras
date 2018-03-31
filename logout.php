<?php 
session_start();
if($_SESSION['status']!="Active")
{
    header("location:reg.php");
}
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dobrodosli</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="sti.css">
    </head>
    <body>
        <?php /*
        
        $mysqli= new mysqli('localhost','root','','test');
       
        $_SESSION['ermessage']='';
        $_SESSION['message']='';
            
            if( $_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['user'];
                $pass=$_POST['pass'];
                
                $sql="INSERT INTO kale (nadimak,nadimce)"."VALUES('$name','$pass')";
                
                $mysqli->query($sql);
                    
                    header('location:welcome.php');
                
            } */
            
          

?> 
        <?php session_unset();
session_destroy();
        ?>
        <div class="wrap">
        
        <div class="polja">
            Uspesno ste se odjavili
            
            
            
            
            
            
            </div>
    
        </div>
    </body>
</html>
<!--

    [[[[[[[[[[[[[[[      ]]]]]]]]]]]]]]]
    [::::::::::::::      ::::::::::::::]
    [::::::::::::::      ::::::::::::::]
    [::::::[[[[[[[:      :]]]]]]]::::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[     CODE THE WEB     ]:::::]
    [:::::[  http://brackets.io  ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [:::::[                      ]:::::]
    [::::::[[[[[[[:      :]]]]]]]::::::]
    [::::::::::::::      ::::::::::::::]
    [::::::::::::::      ::::::::::::::]
    [[[[[[[[[[[[[[[      ]]]]]]]]]]]]]]]

-->

