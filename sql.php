<?php
session_start();

require_once 'login.php';

$conn=new mysqli($hn,$un,$pw,$db);
        mysqli_set_charset($conn, 'utf8');
        if ($conn->connect_error)die($conn->connect_error);
        $ime=$_SESSION['ime'];
        $prezime="_".$_SESSION['prezime'];
        $sql=
        "CREATE TABLE ".$ime.$prezime."( 
        id INT(30) NOT NULL AUTO_INCREMENT ,
        ppre VARCHAR(30) NOT NULL , 
        pode VARCHAR(30) NOT NULL ,
        upre VARCHAR(30) NOT NULL ,
        uode VARCHAR(30) NOT NULL , 
        spre VARCHAR(30) NOT NULL ,
        sode VARCHAR(30) NOT NULL ,
        cpre VARCHAR(30) NOT NULL , 
        code VARCHAR(30) NOT NULL ,
        petpre VARCHAR(30) NOT NULL ,
        petode VARCHAR(30) NOT NULL ,
        PRIMARY KEY (id)
        ) ENGINE = InnoDB;";
        
        
$result=$conn->query($sql); 
        if(!$result)die($conn->error);

             
$predmet_11=$_SESSION['predmet_11'];
$predmet_12=$_SESSION['predmet_12'];
$predmet_13=$_SESSION['predmet_13'];
$predmet_14=$_SESSION['predmet_14'];
$predmet_15=$_SESSION['predmet_15'];
$predmet_21=$_SESSION['predmet_21'];
$predmet_22=$_SESSION['predmet_22'];
$predmet_23=$_SESSION['predmet_23'];
$predmet_24=$_SESSION['predmet_24'];
$predmet_25=$_SESSION['predmet_25'];
$predmet_31=$_SESSION['predmet_31'];
$predmet_32=$_SESSION['predmet_32'];
$predmet_33=$_SESSION['predmet_33'];
$predmet_34=$_SESSION['predmet_34'];
$predmet_35=$_SESSION['predmet_35'];
$predmet_41=$_SESSION['predmet_41'];
$predmet_42=$_SESSION['predmet_42'];
$predmet_43=$_SESSION['predmet_43'];
$predmet_44=$_SESSION['predmet_44'];
$predmet_45=$_SESSION['predmet_45'];
$predmet_51=$_SESSION['predmet_51'];
$predmet_52=$_SESSION['predmet_52'];
$predmet_53=$_SESSION['predmet_53'];
$predmet_54=$_SESSION['predmet_54'];
$predmet_55=$_SESSION['predmet_55'];
$predmet_61=$_SESSION['predmet_61'];
$predmet_62=$_SESSION['predmet_62'];
$predmet_63=$_SESSION['predmet_63'];
$predmet_64=$_SESSION['predmet_64'];
$predmet_65=$_SESSION['predmet_65'];
$predmet_71=$_SESSION['predmet_71'];
$predmet_72=$_SESSION['predmet_72'];
$predmet_73=$_SESSION['predmet_73'];
$predmet_74=$_SESSION['predmet_74'];
$predmet_75=$_SESSION['predmet_75'];
$predmet_81=$_SESSION['predmet_81'];
$predmet_82=$_SESSION['predmet_82'];
$predmet_83=$_SESSION['predmet_83'];
$predmet_84=$_SESSION['predmet_84'];
$predmet_85=$_SESSION['predmet_85'];

$odeljenje_11=$_SESSION['odeljenje_11'];
$odeljenje_12=$_SESSION['odeljenje_12'];
$odeljenje_13=$_SESSION['odeljenje_13'];
$odeljenje_14=$_SESSION['odeljenje_14'];
$odeljenje_15=$_SESSION['odeljenje_15'];
$odeljenje_21=$_SESSION['odeljenje_21'];
$odeljenje_22=$_SESSION['odeljenje_22'];
$odeljenje_23=$_SESSION['odeljenje_23'];
$odeljenje_24=$_SESSION['odeljenje_24'];
$odeljenje_25=$_SESSION['odeljenje_25'];
$odeljenje_31=$_SESSION['odeljenje_31'];
$odeljenje_32=$_SESSION['odeljenje_32'];
$odeljenje_33=$_SESSION['odeljenje_33'];
$odeljenje_34=$_SESSION['odeljenje_34'];
$odeljenje_35=$_SESSION['odeljenje_35'];
$odeljenje_41=$_SESSION['odeljenje_41'];
$odeljenje_42=$_SESSION['odeljenje_42'];
$odeljenje_43=$_SESSION['odeljenje_43'];
$odeljenje_44=$_SESSION['odeljenje_44'];
$odeljenje_45=$_SESSION['odeljenje_45'];
$odeljenje_51=$_SESSION['odeljenje_51'];
$odeljenje_52=$_SESSION['odeljenje_52'];
$odeljenje_53=$_SESSION['odeljenje_53'];
$odeljenje_54=$_SESSION['odeljenje_54'];
$odeljenje_55=$_SESSION['odeljenje_55'];
$odeljenje_61=$_SESSION['odeljenje_61'];
$odeljenje_62=$_SESSION['odeljenje_62'];
$odeljenje_63=$_SESSION['odeljenje_63'];
$odeljenje_64=$_SESSION['odeljenje_64'];
$odeljenje_65=$_SESSION['odeljenje_65'];
$odeljenje_71=$_SESSION['odeljenje_71'];
$odeljenje_72=$_SESSION['odeljenje_72'];
$odeljenje_73=$_SESSION['odeljenje_73'];
$odeljenje_74=$_SESSION['odeljenje_74'];
$odeljenje_75=$_SESSION['odeljenje_75'];
$odeljenje_81=$_SESSION['odeljenje_81'];
$odeljenje_82=$_SESSION['odeljenje_82'];
$odeljenje_83=$_SESSION['odeljenje_83'];
$odeljenje_84=$_SESSION['odeljenje_84'];
$odeljenje_85=$_SESSION['odeljenje_85'];
        

  $sql2="INSERT INTO ".$ime.$prezime." (ppre,pode,upre,uode,spre,sode,cpre,code,petpre,petode)
VALUES( '$predmet_11','$odeljenje_11',
        '$predmet_12','$odeljenje_12',
        '$predmet_13','$odeljenje_13',
        '$predmet_14','$odeljenje_14',
        '$predmet_15','$odeljenje_15'
        ),
        ('$predmet_21','$odeljenje_21',
        '$predmet_22','$odeljenje_22',
        '$predmet_23','$odeljenje_23',
        '$predmet_24','$odeljenje_24',
        '$predmet_25','$odeljenje_25'
        ),
        ('$predmet_31','$odeljenje_31',
        '$predmet_32','$odeljenje_32',
        '$predmet_33','$odeljenje_33',
        '$predmet_34','$odeljenje_34',
        '$predmet_35','$odeljenje_35'
        ),
        ('$predmet_41','$odeljenje_41',
        '$predmet_42','$odeljenje_42',
        '$predmet_43','$odeljenje_43',
        '$predmet_44','$odeljenje_44',
        '$predmet_45','$odeljenje_45'
        ),
        ('$predmet_51','$odeljenje_51',
        '$predmet_52','$odeljenje_52',
        '$predmet_53','$odeljenje_53',
        '$predmet_54','$odeljenje_54',
        '$predmet_55','$odeljenje_55'
        ),
        ('$predmet_61','$odeljenje_61',
        '$predmet_62','$odeljenje_62',
        '$predmet_63','$odeljenje_63',
        '$predmet_64','$odeljenje_64',
        '$predmet_65','$odeljenje_65'
        ),
        ('$predmet_71','$odeljenje_71',
        '$predmet_72','$odeljenje_72',
        '$predmet_73','$odeljenje_73',
        '$predmet_74','$odeljenje_74',
        '$predmet_75','$odeljenje_75'
        ),
        ('$predmet_81','$odeljenje_81',
        '$predmet_82','$odeljenje_82',
        '$predmet_83','$odeljenje_83',
        '$predmet_84','$odeljenje_84',
        '$predmet_85','$odeljenje_85'
        );";
        
        
$result2=$conn->query($sql2); 
        if(!$result2)die($conn->error);

if($result && $result2){
    
    header ("Location:uneto_rasp.php?ime=".urlencode($ime)."&prezime=".urlencode(str_replace('_','',$prezime)));
    
}
mysqli_free_result();
mysqli_close($conn);
?>