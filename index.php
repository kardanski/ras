<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="sti.css">
    </head>
    <body>
        <?php
        session_start();
        $mysqli= new mysqli('localhost','root','','loginvezba');
       
            $_SESSION['message']='';
       
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            
          
            
            //two pass are equal
            
            if($_POST['pass']==$_POST['cpass']){
                
                
                $username= $mysqli-> real_escape_string($_POST['username']);
                
                $email= $mysqli-> real_escape_string($_POST['email']);
                $password= md5($_POST['pass']);
                        
                        $_SESSION['username']=$username;
                        $_SESSION['email']=$email;
                        
                        
                        $sql="INSERT INTO datausers (username,email,password) VALUES('$username','$email','$password')";
                        
                    //redirect to register.php
                        
                        if($mysqli -> query($sql)){
                            $_SESSION['message']='Registracija uspešna';
                            header('location:reg.php');
                            
                        }
                        else{
                            $_SESSION['message']='Došlo je do greške, pokušajte ponovo.';
                        }
                        
                        
                    }
            else {
                
                $_SESSION['message']='Unete lozinke nisu iste!';
            }
                   
                }
            
            
            
            
        
        

?>
        <div class="wrap">
        
        <div class="polja">
            <h2>Registracija naloga</h2>
           <form action="index.php" method="post">
               <div class="error"><?= $_SESSION['message']; ?>
               </div>
                 <input type="text" name="username" placeholder="korisničko ime" required><br>
            <input type="text" name="email" placeholder="email adresa" required><br>
            <input type="password" name="pass" placeholder="lozinka" required><br>
            <input type="password" name="cpass" placeholder="potvrdite lozinku" required><br>
           
            
            <input type="submit" value="Register">
               
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

