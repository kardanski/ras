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
        $_SESSION['message']='';
        $mysqli= new mysqli('localhost','root','','loginvezba');
        
        if($_SERVER['REQUEST_METHOD']=='POST'){
            
            //two pass are equal
            
            if($_POST['pass']==$_POST['cpass']){
                
                
                $username= $mysqli-> real_escape_string($_POST['username']);
                
                $email= $mysqli-> real_escape_string($_POST['email']);
                $password= md5($_POST['pass']);
                
                $avatar_path= $mysqli-> real_escape_string('image/'.$_FILES['avatar']['name']);
                
                if(preg_match("!image!",$_FILES['avatar']['type'])){
                    
                    // copy images to images folder
                    if(copy($_FILES['avatar']['tmp_name'],$avatar_path)){
                        
                        $_SESSION['username']=$username;
                        $_SESSION['avatar']=$avatar_path;
                        
                        $sql="INSERT INTO datausers (username,email,password,avatar)"."VALUES('$username','$email','$password','$avatar_path')";
                        
                    //redirect to register.php
                        
                        if($mysqli->query($sql)===true){
                            $_SESSION['message']='Registracija uspešna';
                            header('location:reg.php');
                            
                        }
                        else{
                            $_SESSION['message']='Došlo je do greške, pokušajte ponovo.';
                        }
                        else{
                            $_SESSION['message']='Vaša profilna slika nije prihvaćena.';
                        }
                        
                    }
                    
                }
                else{
                    $_SESSION['message']='Please upload only JPS,GIF or PNG files.'
                }
            }
            else {
                
                $_SESSION['message']=='Passwords doesnt match! Please correct';
            }
            
        }

?>
       
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
