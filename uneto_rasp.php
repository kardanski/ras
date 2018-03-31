<?php
session_start();
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>POSTTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive POSTting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="stip.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        
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
            
            <p>
            Raspored za nastavnika <span id=ime><?php 
                
                //f-ja za konvertovanje prvog slova stringa u  uppercase iako je non english character.
                function my_mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);}
                
                $im=$_GET['ime'];
                $pre=$_GET['prezime'];
                
                
               echo  my_mb_ucfirst($im)." ".my_mb_ucfirst($pre) ; ?></span> je uspešno unet u bazu podataka.
            </p><?php 
            
            session_unset();
            session_destroy();
            
            ?>
            <div class="data"> 
                
                    
                

            </div>
        
        
        </div>
        
     </div>
        
        <br>
        
        
   </body>
       </html>