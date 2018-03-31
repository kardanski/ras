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
            
            <div class="dataupload"> 
               
                
<form enctype="multipart/form-data" method="post" action="upload.php">
            Izaberi fajl:
            <br>
            <input type="file" name="toupload" value="Izaberi fajl">
            <br>
            <input type="submit" value="UPLOAD fajla">
            
            </form>

            </div>
       
        
        </div>
        
     </div>
       
<br>
   
        <br>
        
        
   </body>
       </html>
