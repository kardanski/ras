<?php
session_start();

require_once 'login.php';
$conn=mysqli_connect($hn,$un,$pw,$db);
mysqli_set_charset($conn,'utf8');
if($conn->connect_error)die(connect_error);

$sql = "SHOW TABLES FROM $db";
 $result = mysqli_query($conn,$sql);
if(!$result)die($conn->error);
 
$p = 0;
       
 while ($row = mysqli_fetch_row($result)) {
  $tableNames[$p] = $row[0];
  $p++; //only do this to make sure it starts at index 0
 }

                    
                    if(isset($_POST['submit'])){
                        
                        $provera=0;
                     foreach($tableNames as $check){
                         
                     if($check==(mb_strtolower($_POST['ime'],'utf-8').'_'.mb_strtolower($_POST['prezime'],'utf-8')) ){
                             $provera++;
                         }
                         
                     }

                        if(preg_match("/[^A-Za-zčćšđžŠĐČĆŽ]/",$_POST['ime']) || preg_match("/[^A-Za-zčćšđžŠĐČĆŽ]/",$_POST['prezime']) || empty($_POST['ime']) || empty($_POST['prezime']) ){
                        $_POST['message']='Popuniti polja koristeći samo slova.';
                            
                    }
                    elseif($provera>0)
                        
                     { $_POST['message']='Već postoji isto ime i prezime';}    
                        
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
                        
                        session_unset();
                        session_destroy();
                        
                    }
                    ?>
                    
                    <input type="submit" value="Poništi"></form>

            </div>
        
        
        </div>
        
     </div>
       
<br>
   
        <br>
        
        
   </body>
       </html>