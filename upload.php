<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Web aplikacija za raspored</title>
        <meta name="viewport" content="width=device-width">
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
              <?php 
                //provera grešaka
if($_FILES['toupload']['error']==0 && $_FILES['toupload']['type']=='text/plain'){
  
    //posle storinga u temp folder moramo pomeriti fajl na zeljenu lokaciju u zeljeni folder 
    move_uploaded_file($_FILES['toupload']['tmp_name'],'\\'.$_FILES['toupload']['name']);
    $niza=file('C:\xampp\htdocs\log\\'.$_FILES['toupload']['name']);
    
    echo 'Комбинације питања за предмет: '.$niza[0];
    echo'<br><br><br>';
array_shift($niza);  
$grupa1=array_slice($niza,0,(count($niza))/3);
$grupa2=array_slice($niza,(count($niza))/3,(count($niza))/3);
$grupa3=array_slice($niza,2*(count($niza))/3,(count($niza))/3);
$niz="";
    
    
for($i=1;$i<(count($niza))/3;$i++){
    
    echo 'Питање бр. '.$i.'<br>';
        shuffle($grupa1);
        shuffle($grupa2);
        shuffle($grupa3);
    $niz.="1. ".ucfirst(trim($grupa1[0]))."\n";
    $niz.="2. ".ucfirst(trim($grupa2[0]))."\n";
    $niz.="3. ".ucfirst(trim($grupa3[0]))."\n\n";
    
        echo '1. '.trim($grupa1[0]).'<br>';
        echo '2. '.trim($grupa2[0]).'<br>';
        echo '3. '.trim($grupa3[0]).'<br>';
    echo '<br>';
}
    
}
else{
    echo 'Došlo je do greške prilikom uploada, dozvoljeni format je .txt';
    //header('Location: pdf.php');
}
                
                
              ?>
                <?php echo  $niz; ?>
                <form  method="post" action="pdf.php">
            Izaberi fajl:
            <br>
                    
            <input type="text"  name="imence">
            <input type="hidden"  name="niz" value="<?php echo $niz; ?>">
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


