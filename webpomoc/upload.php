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
               <?php
                //provera grešaka
if($_FILES['toupload']['error']==0 && $_FILES['toupload']['type']=='text/plain'){
  
    //posle storinga u temp folder moramo pomeriti fajl na zeljenu lokaciju u zeljeni folder 
    move_uploaded_file($_FILES['toupload']['tmp_name'],'C:\\xampp\\htdocs\\'.$_FILES['toupload']['name']);
    $niza=file('C:\\xampp\\htdocs\\'.$_FILES['toupload']['name']);
    
    echo 'Комбинације питања за предмет: '.$niza[0];
    echo'<br><br><br>';
array_shift($niza);  
$grupa1=array_slice($niza,0,(count($niza))/3);
$grupa2=array_slice($niza,(count($niza))/3,(count($niza))/3);
$grupa3=array_slice($niza,2*(count($niza))/3,(count($niza))/3);

for($i=1;$i<(count($niza))/3;$i++){
    
    echo 'Питање бр. '.$i.'<br>';
        shuffle($grupa1);
        shuffle($grupa2);
        shuffle($grupa3);
        echo '1. '.trim($grupa1[0]).'<br>';
        echo '2. '.trim($grupa2[0]).'<br>';
        echo '3. '.trim($grupa3[0]).'<br>';
    echo '<br>';
}
    
}
else{
    echo 'Došlo je do greške prilikom uploada, dozvoljeni format je .txt';
}
              ?>
                


            </div>
       
        
        </div>
        
     </div>
       
<br>
   
        <br>
        
        
   </body>
       </html>


