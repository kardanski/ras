
<?php
        session_start();
        if($_SESSION['status']!="Active")
{
    header("location:reg.php");
}
        ?><!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SESSIONTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive SESSIONting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="stip.css">
    </head>
    <body>
        
        
        <div class="wrap">
            
        <div class="tabela">
            
            <div class="data"> 
                
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
                   
                   <td> <?php echo $_SESSION['br']; ?></td>
                       <td> <?php echo $_SESSION['od']; ?></td>
                       <td> <?php echo $_SESSION['do']; ?></td>
                       
                       
                       <td> <?php echo $_SESSION['tip']; ?></td>
                       
                       <td> <?php echo $_SESSION['acu']; ?></td>
                       
                       <td><?php echo $_SESSION['brzica']; ?></td>
                       
                       <td> <?php echo $_SESSION['presek']; ?> mm<sup>2</sup></td>
                       
                       <td> <?php echo $_SESSION['duzina']; ?></td>
                       
                       <td> <?php echo $_SESSION['snaga']; ?></td>
                       
                       <td> <?php echo $_SESSION['razvod']; ?></td>
                       
                       <td> <?php echo $_SESSION['inosig']; ?></td>
                       
                       <td> <?php 
                                   function floatvalue($val){
                    $val = str_replace(",",".",$val);
                    $val = preg_replace('/\.(?=.*\.)/', '', $val);
                    return floatval($val);
                                   }
                           
                           $power= floatvalue($_SESSION['snaga']);
                           
                           if($_SESSION['acu']=='al'){
                               if($_SESSION['brzica']>3){
                                   
                                   $padnapona=100*0.0288*$_SESSION['duzina']*$power*1000/($_SESSION['presek']*400*400);
                                   
                               }
                               else{
                                   $padnapona=2*100*0.0288*$_SESSION['duzina']*$power*1000/($_SESSION['presek']*230*230);
                               }
                               

                           }
                           else{
                               if($_SESSION['brzica']>3){
                                   
                                   $padnapona=100*0.01793*$_SESSION['duzina']*$power*1000/($_SESSION['presek']*400*400);
                                   
                               }
                               else{
                                   $padnapona=2*100*0.01793*$_SESSION['duzina']*$power*1000/($_SESSION['presek']*230*230);
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