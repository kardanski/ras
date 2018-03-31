<?php

require 'oop.inc.php';

echo 'Gruvamo nov objekat';
$address=new Address;
echo '<br><pre>'.var_export($address,true).'</pre>';

$address->street_address='kurac palac';
$address->street_address_2='adresa 2 kurac palac';
$address->postal_code=11090;
$address->country_name='Srbija';
$address->city_name='Beograd';
echo '<br><pre>'.var_export($address,true).'</pre>';

echo $address->display();



echo '<h2>Testing protected access</h2>';

echo "Address ID: {$address->_address_id}";
?> 