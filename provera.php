<?php
session_start();

require_once 'login.php';
$conn=mysqli_connect($hn,$un,$pw,$db);
mysqli_set_charset($conn,'utf8');
if($conn->connect_error)die(connect_error);
mb_internal_encoding('UTF-8');

$sql = "SHOW TABLES FROM $db;";
 $result = mysqli_query($conn,$sql);
if(!$result)die($conn->error);
 
$p = 0;
       
 while ($row = mysqli_fetch_row($result)) {
  $tableNames[$p] = $row[0];
  $p++; //only do this to make sure it starts at index 0
 }
$num=count($tableNames);
                    
                  
?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Web aplikacija za raspored</title>
        <meta name="description" content="">
        <link rel="stylesheet" type="text/css" href="stip.css">
        <script src="sve.js">
        </script>

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
                
                <form  action="kraj.php" method="POST" name="forma">
                    
               
  
                 <table id="imeprezime"> <tr><td>Izabrati nastavnika:</td><td><select name="imenastavnika">
                     
                     <?php 
                                  function my_mb_ucfirst($str) {
                $fc = mb_strtoupper(mb_substr($str, 0, 1));
                return $fc.mb_substr($str, 1);
                                  }
                     
                         for ($i=0;$i<$num;$i++){
                              $prikaz=explode("_",$tableNames[$i]);                    
                                                  
                             echo '<option value='.$tableNames[$i].'>'.my_mb_ucfirst(str_replace('rasp','',$prikaz[0])).' '.my_mb_ucfirst($prikaz[1]).'</option>';
                             
                         }     
                     ?>
                     
                     </select></td></tr>
                        
                </table> <br><br>
                
                    
        <?php require_once 'kalendar.html';?>
                    <br><br>
                <input type="submit" name="submit" value="Izračunaj broj časova">
                    
                </form>
                <form action="provera.php" method="post">
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