<?php

class Address{
    
    public $street_address;
    public $street_address_2;
    
    public $city_name;
    
    public $postal_code;
    
    public $country_name;
    
    
    protected $_address_id;
    
    protected $_time_created;
    protected $_time_updated;
    
    function display(){
        
        $output='';
        $output.=$this->street_address;
        if($this->street_address_2){
            
            $output.='<br>'.$this->street_address_2;
            
        }
        $output.='<br>';
        $output.=$this->city_name.','.$this->postal_code;
        $output.= '<br>'.$this->country_name;
        
        return $output;
    }
}
$baki=new Address;
$baki->postal_code="kukanidja";
$baki->display();

class Forma{
    public $ispredime; 
    public $ispredprezime;
    public $nameime;
    public $nameprezime;
    public $placeholderi;
    public $placeholderp;
    
    
    function pravimoobjekat(){
        
        $output='<form method=post action=unesi.php>';
        
        $output.= $this->ispredime.": <input type='text' name=".$this->nameime." placeholder=".$this->placeholderi."><br><br>";
        $output.= $this->ispredprezime.": <input type='text' name=".$this->nameprezime." placeholder=".$this->placeholderp."><br><br>";
        $output.= "<input type='submit' value='Pošalji'<br></form>";
        
        return $output;
    }   
    
    
    
}

$nif= new Forma;
$nif->ispredime="Vaše ime";
$nif->ispredprezime="Vaše prezime";
$nif->nameime="ime";
$nif->nameprezime="prezime";
$nif->placeholderi='Unesi&nbsp;ime';
$nif->placeholderp="Unesi&nbsp;prezime";

$nif2= new Forma;
$nif2->ispredime="Vaše&nbsp;ime";
$nif2->ispredprezime="Vaše prezime";
$nif2->nameime="ime2";
$nif2->nameprezime="prezime2";
$nif2->placeholderi="Unesi_ime";
$nif2->placeholderp="Unesi_prezime";


echo $nif->pravimoobjekat();
echo $nif2->pravimoobjekat();


print_r($niz[]="nulica");
print_r($niz);
echo "drugi na ";
print_r($niz2=[]);








?>

