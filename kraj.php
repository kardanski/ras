<?php

require_once 'login.php';
$conn=mysqli_connect($hn,$un,$pw,$db);
mysqli_set_charset($conn,'utf8');
if($conn->connect_error)die(connect_error);
$nam=$_POST['imenastavnika'];


$sql2 = "SELECT * FROM ".$_POST['imenastavnika'].";";
 $result = mysqli_query($conn,$sql2);
if(!$result)die($conn->error);
 
$p = 0;
       
 while ($row = mysqli_fetch_row($result)) {
  $redovi[$p] = $row;
  $p++; //da bi pocelo od indexa 0 pa onda ++
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
            
            <div class="data2"> 

               <?php 
                require_once 'predmetiode.php';
                   
                    require_once 'mesecobrada.php'; 
                   
     ?>
    
                 <br>

            </div>
               
        </div>
        
     </div>

    <?php
// zatvaranje konekcije sa bazom i rasterecivanje memorije otpustanjem koriscenih podataka
        mysqli_free_result($result);
        mysqli_close($conn);
    ?>

   </body>
       </html>