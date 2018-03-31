<?php
//koriscenje imena i prezimena nastavnika radi ispisivanja obavestenja
if(isset($_POST['imenastavnika'])){
                    $nam=explode('_',$_POST['imenastavnika']);
                }
                    else{
                        $nam='';
                    }
echo 'Nastavnik <span style="color:white";>'.my_mb_ucfirst($nam[0]).' '.my_mb_ucfirst($nam[1]).'</span><br>';



// brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
       $danitotjan=array_count_values(array_diff($_POST['danjan'],array('nan')));
                    
                  
// f-ja za pretvaranje prvog slova u uppercase za naša slova ščćžđ
                                  function my_mb_ucfirst($str) {
                $fc = mb_strtoupper(mb_substr($str, 0, 1));
                return $fc.mb_substr($str, 1);
                                  }

                // j su dani(pon - pet) a i su casovi po danu(8komada)
                //formiranje niza day1, day2...koji predstavljaju dnevni raspored casova za nastavnika i izvlace se iz niza redovi koji je rezlutat dobijen posle sql query-ja
                
for ($i=0;$i<8;$i++){
            
            
            for ($j=1;$j<6;$j++){
                
                
                $nazivpre=preg_replace('/_[0-9]/','',$redovi[$i][$j*2-1]);
                $nazivode=preg_replace('/_[0-9]/','',$redovi[$i][$j*2]);
               
                $day1[$i]=preg_replace('/_[0-9]/','',$redovi[$i][1]).'_'.preg_replace('/_[0-9]/','',$redovi[$i][2]);
                
                $day2[$i]=preg_replace('/_[0-9]/','',$redovi[$i][3]).'_'.preg_replace('/_[0-9]/','',$redovi[$i][4]);
                
                $day3[$i]=preg_replace('/_[0-9]/','',$redovi[$i][5]).'_'.preg_replace('/_[0-9]/','',$redovi[$i][6]);
                
                $day4[$i]=preg_replace('/_[0-9]/','',$redovi[$i][7]).'_'.preg_replace('/_[0-9]/','',$redovi[$i][8]);
            
                $day5[$i]=preg_replace('/_[0-9]/','',$redovi[$i][9]).'_'.preg_replace('/_[0-9]/','',$redovi[$i][10]);
                
            
            }

        }
                //formiranje promenljive ogday koja ima samo unete casove a prazna polja u rasporedu su eliminisana
                for($j=1;$j<6;$j++){
                    
                    ${'ogday'.$j}=array_count_values(array_diff(${'day'.$j},array('nane_nane')));
                    if(empty(${'ogday'.$j})){
                        ${'ogday'.$j}[]=0;
                    }
                    
                   
                }
                //formiranje mnday promenljive koja ima broj časova predmeta izmnožen sa brojem checkiranih dana u mesecu 
                if(isset($danitotjan['pon'])){
                    
                    foreach($ogday1 as $key=>$value){
                    

                          $mnday1[$key]=$value*($danitotjan['pon']);
                }
                    
                }
                else{
                    $mnday1=[];
                    
                }
                
                
                if(isset($danitotjan['uto'])){
                    
                    foreach($ogday2 as $key=>$value){
                    

                          $mnday2[$key]=$value*($danitotjan['uto']);
                }
                    
                }
                else{
                    $mnday2=[];
                    
                }
                
                if(isset($danitotjan['sre'])){
                    
                    foreach($ogday3 as $key=>$value){
                    

                          $mnday3[$key]=$value*($danitotjan['sre']);
                }
                    
                }
                else{
                    $mnday3=[];
                    
                }
                
                if(isset($danitotjan['cet'])){
                    
                    foreach($ogday4 as $key=>$value){
                    

                          $mnday4[$key]=$value*($danitotjan['cet']);
                }
                    
                }
                else{
                    $mnday4=[];
                    
                }
                
                if(isset($danitotjan['pet'])){
                    
                    
                    foreach($ogday5 as $key=>$value){
                    

                          $mnday5[$key]=$value*($danitotjan['pet']);
                }
                    
                }
                else{
                    $mnday5=[];
                    
                }
                
                
                $lif=$mnday1+$mnday2+$mnday3+$mnday4+$mnday5;
                $pred=array_keys($lif);
                
                
                $casovi=[];
                    foreach ($pred as $key=>$value) {
                        if(!isset($mnday1[$value])){
                            $mnpon=0;
                        } else{
                          $mnpon=$mnday1[$value];  
                            
                        }
                        if(!isset($mnday2[$value])){
                            $mnuto=0;
                        } else{
                          $mnuto=$mnday2[$value];  
                            
                        }
                        if(!isset($mnday3[$value])){
                            $mnsre=0;
                        } else{
                          $mnsre=$mnday3[$value];  
                            
                        }
                        if(!isset($mnday4[$value])){
                            $mncet=0;
                        } else{
                          $mncet=$mnday4[$value];  
                            
                        }
                        if(!isset($mnday5[$value])){
                            $mnpet=0;
                        } else{
                          $mnpet=$mnday5[$value];  
                            
                        }
                       
                        $casovi[$value]=$mnpon+$mnuto+$mnsre+$mncet+$mnpet;
                        
                    }

                

 //provera da li su uopste izabrani dani u mesecu
                    if(empty($casovi)){
                        
                        echo 'Nema izabranih dana u JANUARU.<br>';
                    }
                    
  //provera da li je izabran dan u kojem nastavnik nema casove
                    elseif(count($casovi)==1 && array_key_exists(0,$casovi)){
                        
                        echo 'Nastavnik nema časove izabranim danima u JANUARU.<br>';
                    }
                else{
//prikaz rezultata po predmetima i odeljenjima
                echo 'Za mesec JANUAR nastavnik ima sledeće časove: <br><ol>';
                    
// Listanje svih keyova i value iz niza casovi i eliminacija clana sa key=O
                foreach($casovi as $keyd=>$valued){
                    if($keyd!==0){
                        
                        $nazpre=preg_replace('/_[a-zA-Z][0-9][0-9]/','',$keyd);
                        $nazode=preg_replace('/[a-z][a-z][a-z][0-9]_/','',$keyd);

                        
                        // prolazak kroz spisak predmeta iz predmetiode.php fajla da bi prikazao puno ime predmeta
                        foreach($predmeti as $key=>$value){
                    if($nazpre==$key){
                        $nazpre=$value;   
                    }
                }
                    echo 'Predmet: <span style="color:white";>'.$nazpre.'</span> odeljenje <span style="color:white";>'.$nazode.'</span> broj časova mesečno iznosi: '.$valued.'<br>';
                    }                
                }
                    echo '</ol>'; 
                }





/////////////////////////mesec februar


// brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
       $danitotfeb=array_count_values(array_diff($_POST['danfeb'],array('nan')));
                    
                  


                //formiranje mnday promenljive koja ima broj časova predmeta izmnožen sa brojem checkiranih dana u mesecu 
                if(isset($danitotfeb['pon'])){
                    
                    foreach($ogday1 as $key=>$value){
                    

                          $mnday1f[$key]=$value*($danitotfeb['pon']);
                }
                    
                }
                else{
                    $mnday1f=[];
                    
                }
                
                
                if(isset($danitotfeb['uto'])){
                    
                    foreach($ogday2 as $key=>$value){
                    

                          $mnday2f[$key]=$value*($danitotfeb['uto']);
                }
                    
                }
                else{
                    $mnday2f=[];
                    
                }
                
                if(isset($danitotfeb['sre'])){
                    
                    foreach($ogday3 as $key=>$value){
                    

                          $mnday3f[$key]=$value*($danitotfeb['sre']);
                }
                    
                }
                else{
                    $mnday3f=[];
                    
                }
                
                if(isset($danitotfeb['cet'])){
                    
                    foreach($ogday4 as $key=>$value){
                    

                          $mnday4f[$key]=$value*($danitotfeb['cet']);
                }
                    
                }
                else{
                    $mnday4f=[];
                    
                }
                
                if(isset($danitotfeb['pet'])){
                    
                    
                    foreach($ogday5 as $key=>$value){
                    

                          $mnday5f[$key]=$value*($danitotfeb['pet']);
                }
                    
                }
                else{
                    $mnday5f=[];
                    
                }
                
                
                $liff=$mnday1f+$mnday2f+$mnday3f+$mnday4f+$mnday5f;
                $predf=array_keys($liff);
                
                
                $casovif=[];
                    foreach ($predf as $key=>$value) {
                        if(!isset($mnday1f[$value])){
                            $mnponf=0;
                        } else{
                          $mnponf=$mnday1f[$value];  
                            
                        }
                        if(!isset($mnday2f[$value])){
                            $mnutof=0;
                        } else{
                          $mnutof=$mnday2f[$value];  
                            
                        }
                        if(!isset($mnday3f[$value])){
                            $mnsref=0;
                        } else{
                          $mnsref=$mnday3f[$value];  
                            
                        }
                        if(!isset($mnday4f[$value])){
                            $mncetf=0;
                        } else{
                          $mncetf=$mnday4f[$value];  
                            
                        }
                        if(!isset($mnday5f[$value])){
                            $mnpetf=0;
                        } else{
                          $mnpetf=$mnday5f[$value];  
                            
                        }
                       
                        $casovif[$value]=$mnponf+$mnutof+$mnsref+$mncetf+$mnpetf;
                        
                    }


 //provera da li su uopste izabrani dani u mesecu
                    if(empty($casovif)){
                        
                        echo 'Nema izabranih dana u FEBRUARU.<br>';
                    }
                    
  //provera da li je izabran dan u kojem nastavnik nema casove
                    elseif(count($casovif)==1 && array_key_exists(0,$casovif)){
                        
                        echo 'Nastavnik nema časove izabranim danima u FEBRUARU.<br>';
                    }
                else{
//prikaz rezultata po predmetima i odeljenjima
                echo 'Za mesec FEBRUAR nastavnik ima sledeće časove: <br><ol>';
                    
// Listanje svih keyova i value iz niza casovi i eliminacija clana sa key=O
                foreach($casovif as $keyd=>$valued){
                    if($keyd!==0){
                        
                        $nazpre=preg_replace('/_[a-zA-Z][0-9][0-9]/','',$keyd);
                        $nazode=preg_replace('/[a-z][a-z][a-z][0-9]_/','',$keyd);

                        
                        // prolazak kroz spisak predmeta iz predmetiode.php fajla da bi prikazao puno ime predmeta
                        foreach($predmeti as $key=>$value){
                    if($nazpre==$key){
                        $nazpre=$value;   
                    }
                }
                    echo 'Predmet: <span style="color:white";>'.$nazpre.'</span> odeljenje <span style="color:white";>'.$nazode.'</span> broj časova mesečno iznosi: '.$valued.'<br>';
                    }                
                }
      echo '</ol>'; 
                }


/////////////////////////mesec mart


// brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
       $danitotmar=array_count_values(array_diff($_POST['danmar'],array('nan')));
                    
                  


                //formiranje mnday promenljive koja ima broj časova predmeta izmnožen sa brojem checkiranih dana u mesecu 
                if(isset($danitotmar['pon'])){
                    
                    foreach($ogday1 as $key=>$value){
                    

                          $mnday1m[$key]=$value*($danitotmar['pon']);
                }
                    
                }
                else{
                    $mnday1m=[];
                    
                }
                
                
                if(isset($danitotmar['uto'])){
                    
                    foreach($ogday2 as $key=>$value){
                    

                          $mnday2m[$key]=$value*($danitotmar['uto']);
                }
                    
                }
                else{
                    $mnday2m=[];
                    
                }
                
                if(isset($danitotmar['sre'])){
                    
                    foreach($ogday3 as $key=>$value){
                    

                          $mnday3m[$key]=$value*($danitotmar['sre']);
                }
                    
                }
                else{
                    $mnday3m=[];
                    
                }
                
                if(isset($danitotmar['cet'])){
                    
                    foreach($ogday4 as $key=>$value){
                    

                          $mnday4m[$key]=$value*($danitotmar['cet']);
                }
                    
                }
                else{
                    $mnday4m=[];
                    
                }
                
                if(isset($danitotmar['pet'])){
                    
                    
                    foreach($ogday5 as $key=>$value){
                    

                          $mnday5m[$key]=$value*($danitotmar['pet']);
                }
                    
                }
                else{
                    $mnday5m=[];
                    
                }
                
                
                $lifm=$mnday1m+$mnday2m+$mnday3m+$mnday4m+$mnday5m;
                $predm=array_keys($lifm);
                
                
                $casizabranim=[];
                    foreach ($predm as $key=>$value) {
                        if(!isset($mnday1m[$value])){
                            $mnponm=0;
                        } else{
                          $mnponm=$mnday1m[$value];  
                            
                        }
                        if(!isset($mnday2m[$value])){
                            $mnutom=0;
                        } else{
                          $mnutom=$mnday2m[$value];  
                            
                        }
                        if(!isset($mnday3m[$value])){
                            $mnsrem=0;
                        } else{
                          $mnsrem=$mnday3m[$value];  
                            
                        }
                        if(!isset($mnday4m[$value])){
                            $mncetm=0;
                        } else{
                          $mncetm=$mnday4m[$value];  
                            
                        }
                        if(!isset($mnday5m[$value])){
                            $mnpetm=0;
                        } else{
                          $mnpetm=$mnday5m[$value];  
                            
                        }
                       
                        $casizabranim[$value]=$mnponm+$mnutom+$mnsrem+$mncetm+$mnpetm;
                        
                    }


 //provera da li su uopste izabrani dani u mesecu
                    if(empty($casizabranim)){
                        
                        echo 'Nema izabranih dana u MARTU.<br>';
                    }
                    
  //provera da li je izabran dan u kojem nastavnik nema casove
                    elseif(count($casizabranim)==1 && array_key_exists(0,$casizabranim)){
                        
                        echo 'Nastavnik nema časove izabranim danima u MARTU.<br>';
                    }
                else{
//prikaz rezultata po predmetima i odeljenjima
                echo 'Za mesec MART nastavnik ima sledeće časove: <br><ol>';
                    
// Listanje svih keyova i value iz niza casovi i eliminacija clana sa key=O
                foreach($casizabranim as $keyd=>$valued){
                    if($keyd!==0){
                        
                        $nazpre=preg_replace('/_[a-zA-Z][0-9][0-9]/','',$keyd);
                        $nazode=preg_replace('/[a-z][a-z][a-z][0-9]_/','',$keyd);

                        
                        // prolazak kroz spisak predmeta iz predmetiode.php fajla da bi prikazao puno ime predmeta
                        foreach($predmeti as $key=>$value){
                    if($nazpre==$key){
                        $nazpre=$value;   
                    }
                }
                    echo 'Predmet: <span style="color:white";>'.$nazpre.'</span> odeljenje <span style="color:white";>'.$nazode.'</span> broj časova mesečno iznosi: '.$valued.'<br>';
                    }                
                }
      echo '</ol>'; 
                }


/////////////////////////mesec april


// brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
       $danitotapr=array_count_values(array_diff($_POST['danapr'],array('nan')));
                    
                  


                //formiranje mnday promenljive koja ima broj časova predmeta izmnožen sa brojem checkiranih dana u mesecu 
                if(isset($danitotapr['pon'])){
                    
                    foreach($ogday1 as $key=>$value){
                    

                          $mnday1a[$key]=$value*($danitotapr['pon']);
                }
                    
                }
                else{
                    $mnday1a=[];
                    
                }
                
                
                if(isset($danitotapr['uto'])){
                    
                    foreach($ogday2 as $key=>$value){
                    

                          $mnday2a[$key]=$value*($danitotapr['uto']);
                }
                    
                }
                else{
                    $mnday2a=[];
                    
                }
                
                if(isset($danitotapr['sre'])){
                    
                    foreach($ogday3 as $key=>$value){
                    

                          $mnday3a[$key]=$value*($danitotapr['sre']);
                }
                    
                }
                else{
                    $mnday3a=[];
                    
                }
                
                if(isset($danitotapr['cet'])){
                    
                    foreach($ogday4 as $key=>$value){
                    

                          $mnday4a[$key]=$value*($danitotapr['cet']);
                }
                    
                }
                else{
                    $mnday4a=[];
                    
                }
                
                if(isset($danitotapr['pet'])){
                    
                    
                    foreach($ogday5 as $key=>$value){
                    

                          $mnday5a[$key]=$value*($danitotapr['pet']);
                }
                    
                }
                else{
                    $mnday5a=[];
                    
                }
                
                
                $lifa=$mnday1a+$mnday2a+$mnday3a+$mnday4a+$mnday5a;
                $preda=array_keys($lifa);
                
                
                $casovia=[];
                    foreach ($preda as $key=>$value) {
                        if(!isset($mnday1a[$value])){
                            $mnpona=0;
                        } else{
                          $mnpona=$mnday1a[$value];  
                            
                        }
                        if(!isset($mnday2a[$value])){
                            $mnutoa=0;
                        } else{
                          $mnutoa=$mnday2a[$value];  
                            
                        }
                        if(!isset($mnday3a[$value])){
                            $mnsrea=0;
                        } else{
                          $mnsrea=$mnday3a[$value];  
                            
                        }
                        if(!isset($mnday4a[$value])){
                            $mnceta=0;
                        } else{
                          $mnceta=$mnday4a[$value];  
                            
                        }
                        if(!isset($mnday5a[$value])){
                            $mnpeta=0;
                        } else{
                          $mnpeta=$mnday5a[$value];  
                            
                        }
                       
                        $casovia[$value]=$mnpona+$mnutoa+$mnsrea+$mnceta+$mnpeta;
                        
                    }


 //provera da li su uopste izabrani dani u mesecu
                    if(empty($casovia)){
                        
                        echo 'Nema izabranih dana u APRILU.<br>';
                    }
                    
  //provera da li je izabran dan u kojem nastavnik nema casove
                    elseif(count($casovia)==1 && array_key_exists(0,$casovia)){
                        
                        echo 'Nastavnik nema časove izabranim danima u APRILU.<br>';
                    }
                else{
//prikaz rezultata po predmetima i odeljenjima
                echo 'Za mesec APRIL nastavnik ima sledeće časove: <br><ol>';
                    
// Listanje svih keyova i value iz niza casovi i eliminacija clana sa key=O
                foreach($casovia as $keyd=>$valued){
                    if($keyd!==0){
                        
                        $nazpre=preg_replace('/_[a-zA-Z][0-9][0-9]/','',$keyd);
                        $nazode=preg_replace('/[a-z][a-z][a-z][0-9]_/','',$keyd);

                        
                        // prolazak kroz spisak predmeta iz predmetiode.php fajla da bi prikazao puno ime predmeta
                        foreach($predmeti as $key=>$value){
                    if($nazpre==$key){
                        $nazpre=$value;   
                    }
                }
                    echo 'Predmet: <span style="color:white";>'.$nazpre.'</span> odeljenje <span style="color:white";>'.$nazode.'</span> broj časova mesečno iznosi: '.$valued.'<br>';
                    }                
                }
      echo '</ol>'; 
                }


/////////////////////////mesec maj


// brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
       $danitotmaj=array_count_values(array_diff($_POST['danmaj'],array('nan')));
                    
                  


                //formiranje mnday promenljive koja ima broj časova predmeta izmnožen sa brojem checkiranih dana u mesecu 
                if(isset($danitotmaj['pon'])){
                    
                    foreach($ogday1 as $key=>$value){
                    

                          $mnday1mj[$key]=$value*($danitotmaj['pon']);
                }
                    
                }
                else{
                    $mnday1mj=[];
                    
                }
                
                
                if(isset($danitotmaj['uto'])){
                    
                    foreach($ogday2 as $key=>$value){
                    

                          $mnday2mj[$key]=$value*($danitotmaj['uto']);
                }
                    
                }
                else{
                    $mnday2mj=[];
                    
                }
                
                if(isset($danitotmaj['sre'])){
                    
                    foreach($ogday3 as $key=>$value){
                    

                          $mnday3mj[$key]=$value*($danitotmaj['sre']);
                }
                    
                }
                else{
                    $mnday3mj=[];
                    
                }
                
                if(isset($danitotmaj['cet'])){
                    
                    foreach($ogday4 as $key=>$value){
                    

                          $mnday4mj[$key]=$value*($danitotmaj['cet']);
                }
                    
                }
                else{
                    $mnday4mj=[];
                    
                }
                
                if(isset($danitotmaj['pet'])){
                    
                    
                    foreach($ogday5 as $key=>$value){
                    

                          $mnday5mj[$key]=$value*($danitotmaj['pet']);
                }
                    
                }
                else{
                    $mnday5mj=[];
                    
                }
                
                
                $lifmj=$mnday1mj+$mnday2mj+$mnday3mj+$mnday4mj+$mnday5mj;
                $predmj=array_keys($lifmj);
                
                
                $casizabranimj=[];
                    foreach ($predmj as $key=>$value) {
                        if(!isset($mnday1mj[$value])){
                            $mnponmj=0;
                        } else{
                          $mnponmj=$mnday1mj[$value];  
                            
                        }
                        if(!isset($mnday2mj[$value])){
                            $mnutomj=0;
                        } else{
                          $mnutomj=$mnday2mj[$value];  
                            
                        }
                        if(!isset($mnday3mj[$value])){
                            $mnsremj=0;
                        } else{
                          $mnsremj=$mnday3mj[$value];  
                            
                        }
                        if(!isset($mnday4mj[$value])){
                            $mncetmj=0;
                        } else{
                          $mncetmj=$mnday4mj[$value];  
                            
                        }
                        if(!isset($mnday5mj[$value])){
                            $mnpetmj=0;
                        } else{
                          $mnpetmj=$mnday5mj[$value];  
                            
                        }
                       
                        $casizabranimj[$value]=$mnponmj+$mnutomj+$mnsremj+$mncetmj+$mnpetmj;
                        
                    }


 //provera da li su uopste izabrani dani u mesecu
                    if(empty($casizabranimj)){
                        
                        echo 'Nema izabranih dana u MAJU.<br>';
                    }
                    
  //provera da li je izabran dan u kojem nastavnik nema casove
                    elseif(count($casizabranimj)==1 && array_key_exists(0,$casizabranimj)){
                        
                        echo 'Nastavnik nema časove izabranim danima u MAJU.<br>';
                    }
                else{
//prikaz rezultata po predmetima i odeljenjima
                echo 'Za mesec MAJ nastavnik ima sledeće časove: <br><ol>';
                    
// Listanje svih keyova i value iz niza casovi i eliminacija clana sa key=O
                foreach($casizabranimj as $keyd=>$valued){
                    if($keyd!==0){
                        
                        $nazpre=preg_replace('/_[a-zA-Z][0-9][0-9]/','',$keyd);
                        $nazode=preg_replace('/[a-z][a-z][a-z][0-9]_/','',$keyd);

                        
                        // prolazak kroz spisak predmeta iz predmetiode.php fajla da bi prikazao puno ime predmeta
                        foreach($predmeti as $key=>$value){
                    if($nazpre==$key){
                        $nazpre=$value;   
                    }
                }
                    echo 'Predmet: <span style="color:white";>'.$nazpre.'</span> odeljenje <span style="color:white";>'.$nazode.'</span> broj časova mesečno iznosi: '.$valued.'<br>';
                    }                
                }
      echo '</ol>'; 
                }


/////////////////////////mesec jun


// brojanje koliko cega ima u nizu key je upisan u niz a value je broj koliko ih ima u nizu
       $danitotjun=array_count_values(array_diff($_POST['danjun'],array('nan')));
                    
                  


                //formiranje mnday promenljive koja ima broj časova predmeta izmnožen sa brojem checkiranih dana u mesecu 
                if(isset($danitotjun['pon'])){
                    
                    foreach($ogday1 as $key=>$value){
                    

                          $mnday1j[$key]=$value*($danitotjun['pon']);
                }
                    
                }
                else{
                    $mnday1j=[];
                    
                }
                
                
                if(isset($danitotjun['uto'])){
                    
                    foreach($ogday2 as $key=>$value){
                    

                          $mnday2j[$key]=$value*($danitotjun['uto']);
                }
                    
                }
                else{
                    $mnday2j=[];
                    
                }
                
                if(isset($danitotjun['sre'])){
                    
                    foreach($ogday3 as $key=>$value){
                    

                          $mnday3j[$key]=$value*($danitotjun['sre']);
                }
                    
                }
                else{
                    $mnday3j=[];
                    
                }
                
                if(isset($danitotjun['cet'])){
                    
                    foreach($ogday4 as $key=>$value){
                    

                          $mnday4j[$key]=$value*($danitotjun['cet']);
                }
                    
                }
                else{
                    $mnday4j=[];
                    
                }
                
                if(isset($danitotjun['pet'])){
                    
                    
                    foreach($ogday5 as $key=>$value){
                    

                          $mnday5j[$key]=$value*($danitotjun['pet']);
                }
                    
                }
                else{
                    $mnday5j=[];
                    
                }
                
                
                $lifj=$mnday1j+$mnday2j+$mnday3j+$mnday4j+$mnday5j;
                $predj=array_keys($lifj);
                
                
                $casovij=[];
                    foreach ($predj as $key=>$value) {
                        if(!isset($mnday1j[$value])){
                            $mnponj=0;
                        } else{
                          $mnponj=$mnday1j[$value];  
                            
                        }
                        if(!isset($mnday2j[$value])){
                            $mnutoj=0;
                        } else{
                          $mnutoj=$mnday2j[$value];  
                            
                        }
                        if(!isset($mnday3j[$value])){
                            $mnsrej=0;
                        } else{
                          $mnsrej=$mnday3j[$value];  
                            
                        }
                        if(!isset($mnday4j[$value])){
                            $mncetj=0;
                        } else{
                          $mncetj=$mnday4j[$value];  
                            
                        }
                        if(!isset($mnday5j[$value])){
                            $mnpetj=0;
                        } else{
                          $mnpetj=$mnday5j[$value];  
                            
                        }
                       
                        $casovij[$value]=$mnponj+$mnutoj+$mnsrej+$mncetj+$mnpetj;
                        
                    }


 //provera da li su uopste izabrani dani u mesecu
                    if(empty($casovij)){
                        
                        echo 'Nema izabranih dana u JUNU.<br>';
                    }
                    
  //provera da li je izabran dan u kojem nastavnik nema casove
                    elseif(count($casovij)==1 && array_key_exists(0,$casovij)){
                        
                        echo 'Nastavnik nema časove izabranim danima u JUNU.<br>';
                    }
                else{
//prikaz rezultata po predmetima i odeljenjima
                echo 'Za mesec JUN nastavnik ima sledeće časove: <br><ol>';
                    
// Listanje svih keyova i value iz niza casovi i eliminacija clana sa key=O
                foreach($casovij as $keyd=>$valued){
                    if($keyd!==0){
                        
                        $nazpre=preg_replace('/_[a-zA-Z][0-9][0-9]/','',$keyd);
                        $nazode=preg_replace('/[a-z][a-z][a-z][0-9]_/','',$keyd);

                        
                        // prolazak kroz spisak predmeta iz predmetiode.php fajla da bi prikazao puno ime predmeta
                        foreach($predmeti as $key=>$value){
                    if($nazpre==$key){
                        $nazpre=$value;   
                    }
                }
                    echo 'Predmet: <span style="color:white";>'.$nazpre.'</span> odeljenje <span style="color:white";>'.$nazode.'</span> broj časova mesečno iznosi: '.$valued.'<br>';
                    }                
                }
      echo '</ol>'; 
                }


?>