<?php


require_once 'login.php';
$conn=mysqli_connect($hn,$un,$pw,$db);
mysqli_set_charset($conn,'utf8');
if($conn->connect_error)die(connect_error);
$tabelaime=$_GET['name'];

$sql = "SELECT * FROM $tabelaime";
 $result = mysqli_query($conn,$sql);
if(!$result)die($conn->error);
                     
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

                 <table id="imeprezime"> <tr><td><?php 
                     
                      function my_mb_ucfirst($str) {
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}

     $prikaz=explode("_",$_GET['name']);

                     echo 'Raspored za nastavnika '.my_mb_ucfirst($prikaz[0]).' '.my_mb_ucfirst($prikaz[1]) ?></td></tr>
                </table> <br>
                    <?php
                    require_once 'predmetiode.php';
                     
                     $i=0;
        while($row = mysqli_fetch_row($result)){
           // foreach( $row as $key=>$value){
                
               // echo 'Kljuc je '.$key.' a vrednost je '.$value.'<br>';
             
            $laki[$i]=$row;
            $i++;
            
            }                 
                
echo "<table class=\"pegi\">";
        echo "<tr><td></td><td>ponedeljak</td><td>utorak</td><td>sreda</td><td>četvrtak</td><td>petak</td></tr>";
       

// j su dani(pon - pet) a i su casovi po danu(8komada)
for ($i=0;$i<8;$i++){
            echo "<tr><td>".($i+1).".</td>";
            
            for ($j=1;$j<6;$j++){
                
                echo "<td>";
                
                
                $nazivpre=preg_replace('/_[0-9]/','',$laki[$i][$j*2-1]);
                $nazivode=preg_replace('/_[0-9]/','',$laki[$i][$j*2]);
               
                foreach($predmeti as $key=>$value){
                    if($nazivpre==$key){
                        $nazivpre=$value.' --- ';
                        
                    }
                     if($nazivode=='nane'){
                         $nazivode='';
                         
                     }   
   
                }
                          
                echo   $nazivpre.$nazivode;
                
                
                echo "</td>";
            }
            
            echo "</tr>";

        }
        echo "</table>";

        ?>
            </div>
                
        </div>
        
     </div>        
        
        <br>
   </body>
       </html>