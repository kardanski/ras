<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dobrodosli</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="sti.css">
    </head>
    <body>
        <?php 
        $a=10;
        $b=30;
        
        if($a>$b){
            echo "A je vece od B";
            
        }
        else{
            echo "B je vece od A";
        }
        $deki=array(2,34535345,345345,5345768,867);
          echo $deki[3];
        echo "<br>";
        echo "<pre>";
        print_r($deki);
        echo "</pre>";    
          echo "<br>";
        $dulence=["bleki"=>"meki","kuki"=>"muki"];
        echo "<pre>";
        print_r($dulence);
        echo "</pre>";
        
        $hale=60;
        
        switch($hale){
                
                case 50: 
                    echo "5kurac";
                break;
                case 60: 
                    echo "6kurac";
                break;
                case 70: 
                    echo "7kurac";
                break;
                case 80: 
                    echo "8kurac";
                break;
                case 90: 
                    echo "9kurac";
                break;
                case 100: 
                    echo "1kurac";
                break;
                
                
                
                
        }
        
        $lup=0;
        
        while($lup<30){
            if($lup%2==0){
                
                echo "$lup.parnjak <br>";
                
            }
            else{
                echo "$lup.nepar <br>";
            }
            $lup++;
        }
            
        $niz=[34,45,56,67,78];
        foreach($niz as $kilo){
            if($kilo==67){
                continue;
            }
            
         echo $kilo."<br>";   
        }
        
        
        echo "<br>";
        
        $niz2=["bugara","lugara","kudara","smugara"];
        
        foreach($niz2 as $gegi){
            
            if($gegi=="lugara"){
                echo $gegi;
                continue;
                
            }
            
            echo $gegi."<br>";
            
        }
        echo "<br>";
        echo ucwords($niz2[1]);
        echo "<br>";
        $niz3=["ebugara","elugara","ekudara","esmugara"];
        echo current($niz3);
        echo "<br>";
        echo next($niz3);
        echo prev($niz3);
        echo "<br>";
        while($lek=current($niz3)){
            echo $lek."bakile ";
            next($niz3);
        }
        
        function nale($je,$dv){
            
            $zbir=$je+$dv;
            $razlika=$je-$dv;
            
            return array($zbir,$razlika);
            
            
        }
        echo nale(120,10)[0];
        var_dump($niz3);
        echo "<pre>";
       print_r(get_defined_vars());
        echo "</pre>";
        echo "www.kuracpalac.com/".rawurlencode($_GET['lula']);
        $frale="";
        echo "gugijana".$frale;
        echo "<br>";
        $ter=isset($frale) ? "mackica": "bubreg";
        echo $ter;
        
        $name="laki";
        $value=150;
        
        setcookie($name,$value,time()+3600);
        $kuli=$_COOKIE['laki'];
        echo $kuli;
        echo "<br>";
        
        
        $vala="56";
        echo trim($vala);
        echo "<br>";
        echo $vala;
        
?> 
        <div class="wrap">
        
        <div class="polja">
            <h4></h4>
            <br>
            Prijavite se:<br>
            <span></span>
            <form action="reg.php" method="post">
            <input type="text"  name="user" title="Unesi korisnicko ime"placeholder="korisničko ime" required>
            <input type="password" name="pass" placeholder="lozinka" required>
            <input type="submit" value="prijava"><br>
           </form>
            
            
            
            </div>
    
        </div>
    </body>
</html>


