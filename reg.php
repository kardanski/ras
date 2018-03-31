<?php 
session_start();

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
        <?php 
        
        $mysqli= new mysqli('localhost','root','','test');
       
        $_SESSION['ermessage']='';
        $_SESSION['message']='';
            
            if( $_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['user'];
                $pass=$_POST['pass'];
                $_SESSION['message']='Uspesno registrovan';
                $_SESSION['user']=$_POST['user'];
                $_SESSION['status']="Active";
                
                $sql="INSERT INTO kale (nadimak,nadimce)"."VALUES('$name','$pass')";
                
                $mysqli->query($sql);
                    
                    header('location:welcome.php');
                
            }
            
          

?> 
        <div class="wrap">
        
        <div class="polja">
            <h4><?= $_SESSION['message']; ?></h4>
            <br>
            Prijavite se:<br>
            <span><?= $_SESSION['ermessage']; ?></span>
            <form action="reg.php" method="post">
            <input type="text"  name="user" placeholder="korisničko ime" required>
            <input type="password" name="pass" placeholder="lozinka" required>
            <input type="submit" value="prijava"><br>
           </form>
            
            
            
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

