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
            <br>
            
        <div class="tabela">
            
            <div class="data"> 
	
<?php
                
session_start();
require_once 'login.php';
$conn=new mysqli($hn,$un,$pw,$db);
mysqli_set_charset($conn, 'utf8');
if ($conn->connect_error)die($conn->connect_error);

echo "<div class=\"naslov\">Spisak unetih nastavnika</div>";
echo '<br>';
                if(isset ($_SESSION['namedelete'])){
                    $imeexplode=explode("_",$_SESSION['namedelete']);
                    $prvo=my_mb_ucfirst($imeexplode[0]);
                    $drugo=my_mb_ucfirst($imeexplode[1]);
                    echo "<div class=\"naslov2\">Raspored za nastavnika ".$prvo." ".$drugo." je obrisan</div><br>";
                }

echo '<div class="spisak"><table id="pregled">';
                     
$sql = "SHOW TABLES FROM $db";
               
 $result = mysqli_query($conn,$sql);
 $arrayCount = 0;
                
 
 while ($row = mysqli_fetch_row($result)) {
  $tableNames[$arrayCount] = $row[0];
  $arrayCount++; //only do this to make sure it starts at index 0
 }
                
                //f-ja za konvertovanje prvog slova stringa u  uppercase iako je non english character.
                function my_mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}
   $redni=0; 
                if(!empty($tableNames)){ 
 foreach ($tableNames as &$name) {
     $prikaz=explode("_",$name);
     $redni++;
     echo '<tr><td>'.$redni.'</td>
<td><a title="Pregledaj raspored" href=view.php?name='.urlencode($name).'>'.my_mb_ucfirst($prikaz[0]).' '.my_mb_ucfirst($prikaz[1]).'</a></td><td><a href=delete.php?name='.urlencode($name).'>obriši</a></td></tr>';
  
 }
                }
                else{
                    echo '<tr><td> Nema unetih podataka</td></tr>';
                    
                }

echo'</table></div>';

mysqli_close($conn);
session_unset();
session_destroy();

?>
            </div>
        </div>
        
     </div>
        
        <br>
   </body>
       </html>