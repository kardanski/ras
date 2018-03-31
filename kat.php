<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>POSTTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive POSTting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="stila.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        
        </script>
    </head>
    <body>
    
        <div>
        
        <table class="fulegule">
            
            <tr>
            
            <td class="fule">PRVI DEO</td>
            <td>DRUGI DEO DEO</td>
            
            </tr>
            <tr>
            
            <td>PRVI DEO</td>
            <td>DRUGI DEO DEO</td>
            
            </tr>
            
            
            </table>
        <br>
            <table>
            
            <tr>
            
            <td>PRVI DEO</td>
            <td>DRUGI DEO DEO</td>
            
            </tr>
            <tr>
            
            <td>PRVI DEO</td>
            <td class="fule">DRUGI DEO DEO</td>
            
            </tr>
            
            </table>
        
        </div><br>
        <?php
        $pred="OET";
        $ode="E31";
        
        $pon=array($pred."_".$ode,"E31oet","E21oet","nane","nane");
        
        // brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
        $pontot=array_count_values($pon);
        
        echo 'Broj casova za ponedeljak iznosi:<br>';
        
        
        
        
        
        foreach($pontot as $key=>$value){
            
            echo $key.": ".($value)."<br>";
            
        }
        
        echo $pon[0].": ".(2*$pontot["$pon[0]"])."<br>";
        
        
        // brisanje pojedinih elemenata iz zadatog niza
        $teki=array("E31oet","E31oet","E21oet","nane","nane","weger","E31oet","weger");
        print_r($teki);
        $teki = array_diff($teki, array("nane"));
           print_r($teki);
            foreach($teki as $key=>$value){
                echo $value."<br>";}

        
         $puk=array_count_values($teki);
        
        echo 'Broj casova za ponedeljak iznosi:<br>';
        
        
        
        
        
        foreach($puk as $key=>$value){
            
            echo $key.": ".($value)."<br>";
            
        }
        
        
        ?>
        
        <br>Kurac palac
        <br>
        <br>
        <br>
        
        <table id="ki">
        
        <tr>
            
            <td>kurac patka
            
            </td>
            <td>motka kika
            
            </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <table>
        
        <tr>
            
            <td id="li">kurac patka
            
            </td>
            <td>motka kika
            
            </td>
            </tr>
        </table>
        
        
        <?php
        $startTime = microtime(true);
        $kraj=0;
        echo "Time1:  " . number_format(( microtime(true) - $startTime), 10) . " Seconds\n";
for ($i=0;$i<10;$i++){
    $kraj+=1;
      sqrt(20);
    
} // whatever you want to time
        
        echo $kraj."<br>";
echo "Time2:  " . number_format(( microtime(true) - $startTime), 10) . " Seconds\n";
        
        ?>
    </body>
</html>