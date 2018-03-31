
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pad napona na deonici</title>
        <meta name="description" content="An interactive GETting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="stip.css">
    </head>
    <body>
        
        
        <div class="wrap">
            
        <div class="tabela">
            
            <div class="data"> 
                <br>
                <br>
                
               <table>
                <tr>
                   <td> Broj kabla</td>
                    <td colspan="2">Trasa kabla <br> od <----> do</td>
                    <td colspan="4"> Tip i presek kabla
                    
                    </td>
                    <td> Dužina kabla(m)</td>
                    <td> Snaga potrošača(kW)</td>
                    <td> Tip razvoda</td>
                    <td> In osigurača(A)</td>
                    <td> Pad napona na kablu (%)</td>
                   </tr>
                   <tr>
                   
                   <td> <?php echo $_GET['br']; ?></td>
                       <td> <?php echo $_GET['od']; ?></td>
                       <td> <?php echo $_GET['do']; ?></td>
                       
                       
                       <td> <?php echo "tip:<br>".$_GET['tip']; ?></td>
                       
                       <td> <?php if( $_GET['acu']=='al'){echo "materijal:<br>Aluminijum";}
                                if( $_GET['acu']=='cu'){echo "materijal:<br>Bakar";}?></td>
                       
                       <td><?php echo "broj provodnika:<br>".$_GET['brzica']; ?></td>
                       
                       <td> <?php echo "presek:<br>".$_GET['presek']; ?>mm<sup>2</sup></td>
                       
                       <td> <?php echo $_GET['duzina']; ?></td>
                       
                       <td> <?php echo $_GET['snaga']; ?></td>
                       
                       <td> <?php echo $_GET['razvod']; ?></td>
                       
                       <td> <?php echo $_GET['inosig']; ?></td>
                       
                       <td> <?php 
                                   function floatvalue($val){
                    $val = str_replace(",",".",$val);
                    $val = preg_replace('/\.(?=.*\.)/', '', $val);
                    return floatval($val);
                                   }
                           
                           $power= floatvalue($_GET['snaga']);
                           
                           if($_GET['acu']=='al'){
                               if($_GET['brzica']>3){
                                   
                                   $padnapona=100*0.0288*$_GET['duzina']*$power*1000/($_GET['presek']*400*400);
                                   
                               }
                               else{
                                   $padnapona=2*100*0.0288*$_GET['duzina']*$power*1000/($_GET['presek']*230*230);
                               }
                               

                           }
                           else{
                               if($_GET['brzica']>3){
                                   
                                   $padnapona=100*0.01793*$_GET['duzina']*$power*1000/($_GET['presek']*400*400);
                                   
                               }
                               else{
                                   $padnapona=2*100*0.01793*$_GET['duzina']*$power*1000/($_GET['presek']*230*230);
                               }
                               
                           }
                           echo round($padnapona,3);
                            ?>
                       </td>
                   </tr>                   
                   <tr>
             </tr>

                </table>

            </div>
        
        
        </div>
        
     </div>
       
    
        
        
   </body>
       </html>