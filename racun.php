<?php
session_start();

                    
                    if(isset($_POST['submit'])){
                    
                        
                        if(preg_match("/[^A-Za-zčćšđž]/",$_POST['ime']) || preg_match("/[^A-Za-zčćšđž]/",$_POST['prezime']) || empty($_POST['ime']) || empty($_POST['prezime']) ){
                        $_POST['message']='Popuniti polja koristeći samo slova.';
                            
                    }
             else{
                 $_POST['message']="";
                 
                 }
                 
                    if($_POST['message']==''){
                        require_once 'sesija.php';
                 
                        header('Location:sql.php');
                        exit();
                    }  
                        
                    }
                    else{
                        session_unset();
                        session_destroy();
                        $_POST['message']="";
                        $_POST['ime']="";
                        $_POST['prezime']=""; 
                    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Web aplikacija za raspored</title>
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="stip.css">
        
    </head>
    <body>
         
        <br>
        
        
        <div class="wrap">
            <br>
            <div class="navbar">
                <?php
                require_once 'header.html';
                ?>     
            </div>
            <br><br><br>
            
        <div class="tabela">
            
            <div class="data"> 
                <span class="<?php 
                    if(!$_POST['message']==''){
                        echo "error";
                    }?> "><?php echo $_POST['message'];?></span>
                <form  action="raspored.php" method="POST" name="forma">
                    
               
  
                 <table id="imeprezime"> <tr><td>Ime nastavnika:</td><td><input type="text" name="ime" title="Unesi ime"></td></tr>
                            <tr><td>Prezime nastavnika:</td><td><input type="text" name="prezime"></td></tr>
                </table> <br>
                    <?php
                    require_once 'predmetiode.php';
        
                    require_once 'tabelaunos.php';
        ?>
        
                <input type="submit" name="submit" value="Potvrdi unos">
                    
                </form>
                <form action="raspored.php" method="post">
                    <?php
                    if(isset ($_POST['submit']) && $_POST['submit']=='Poništi'){
                        session_destroy();
                        
                    }
                    ?>
                    
                    <input type="submit" value="Poništi"></form>

            </div>
        
        
        </div>
        
     </div>
       
<br>
        
    <p style="text-align:center"><?php
        echo "<pre>";
    print_r($_SESSION);
        print_r($_POST);
        
        
        echo "</pre>";
        ?>
        </p>
        
        
        <br>
        
        
   </body>
       </html>