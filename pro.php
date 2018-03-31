<?php

$mysqli= new mysqli('localhost','root','','loginvezba');
        if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

        else{
        

            
                
               
            
    $sql="INSERT INTO datausers (username,email,password,avatar) VALUES('lale','bale','dael','gule')";
            if(mysqli_query($mysqli, $sql)){
    header('Location: uneto.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}    
                
            
           /* if($mysqli->query($sql)===true){
                            $_SESSION['message']='Registracija uspešna';
                            header('location:reg.php');  */
                            
                        }
        
                        
?>
