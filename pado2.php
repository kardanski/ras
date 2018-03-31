<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>POSTTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive POSTting started guide for Brackets.">
        <link rel="stylesheet" type="text/css" href="stip.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
        
        </script>
    </head>
    <body>
         <?php
     echo "<pre>";
    print_r($_POST);
        
        echo "</pre>";
                    
         if(isset($_POST['submit'])){
             
              //  trim($_POST['duzina']);
            // trim($_POST['snaga']);
             
                    if(preg_match("/[^0-9]/",$_POST['duzina'])){
                        $_POST['message']='Unositi samo cele brojeve za dužinu kabla.';
                    }
             else{
                 $_POST['message']="";
                 
             }
                    if(preg_match("/[^0-9.,]/",$_POST['snaga'])){
                 
                        $_POST['message2']='Unositi samo brojeve za snagu potrošača.';
                    }
             else{
                 $_POST['message2']="";
                 
             }
                 
                    if($_POST['message2']=='' && $_POST['message']==''){
                 
                        header("Location:rezult.php?duzina=".urlencode($_POST['duzina'])."&br=".$_POST['br']."&brzica=".$_POST['brzica']."&acu=".$_POST['acu']."&od=".$_POST['od']."&do=".$_POST['do']."&tip=".$_POST['tip']."&snaga=".urlencode($_POST['snaga'])."&razvod=".$_POST['razvod']."&inosig=".$_POST['inosig']."&presek=".$_POST['presek']."&vrosig=".$_POST['vrosig']); 
                    }  
             
             
             
             }
        else{
                        $_POST['message']="";
                        $_POST['message2']="";
                       $_POST['br']="";
                        $_POST['od']="";
                        $_POST['do']="";
                        $_POST['acu']="";
                        $_POST['tip']="";
                        $_POST['brzica']="";
                        $_POST['presek']="";
                        $_POST['duzina']="";
                        $_POST['snaga']="";
                        $_POST['razvod']="";
                        $_POST['inosig']="";
                        $_POST['vrosig']="";
             
        }
        

        ?>
        <br>
        
        
        <div class="wrap">
            <br>
            <div class="error">
                <?php
            echo $_POST['message'];
              echo   '<br>';
                echo $_POST['message2'];
                
                ?>
            </div>
            <br>
            
        <div class="tabela">
            
            
            
            <div class="data"> 
                <form  action="pado2.php" method="POST" name="forma">
                    
              
                <table id="my_table">
                <tr>
                   <td> Redni broj kabla</td>
                    <td colspan="2">Trasa kabla <br> od <----> do</td>
                    <td colspan="4"> Tip i presek kabla
                    </td>
                    <td class="<?php 
                               if( $_POST['message']==''){
                                   
                                   echo '';
                               }
                               else{
                                   
                                   echo 'lule';
                               }

                               ?>"> Dužina kabla(m)</td>
                    
                    <td class="<?php 
                               if( $_POST['message2']==''){
                                   
                                   echo '';
                               }
                               else{
                                   
                                   echo 'lule';
                               }

                   ?>"> Snaga potrošača(kW)</td>
                    <td> Tip razvoda</td>
                    <td> In osigurača(A)</td>
                    <td> Vrsta osigurača</td>
                   </tr>
                   
                   
                   
                   
                   <tr>
                   
                   <td>
                       
                       <select name="br" required> 
                           <option value="<?php echo $_POST['br']; ?>"><?php echo $_POST['br']; ?></option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           
                           </select>
                       
                       </td>
                       <td> <input type="text" name="od" placeholder="MRO" value="<?php echo $_POST['od']; ?>"></td>
                       <td> <input type="text" name="do" placeholder="RO" value="<?php echo $_POST['do']; ?>"></td>
                       
                       
                       <td> tip kabla<br><select name="tip" required>
                           <option value="<?php echo $_POST['tip']; ?>"><?php echo $_POST['tip']; ?></option>
                           <option value="PP00-Y">PP00-Y</option>
                           <option value="NHXHX-J">NHXHX-J</option>
                           
                           </select></td>
                       
                       <td>materijal<br> <select name="acu" required>
                           <option value="<?php echo $_POST['acu'] ?>"><?php if($_POST['acu']=='cu'){echo "bakar";}
                               if($_POST['acu']=='al'){echo "aluminijum";}
                               
                               ?></option>
                           <option value="cu">bakar</option>
                           <option value="al">aluminijum</option>
                           
                           </select></td>
                       <td> br.provodnika u kablu<br><select name="brzica"> 
                           <option value="<?php echo $_POST['brzica']; ?>"><?php echo $_POST['brzica'] ?></option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                           <option value="4">4</option>
                           <option value="5">5</option>
                           <option value="6">6</option>
                           
                           </select></td>
                       
                       <td>presek u mm<sup>2</sup><br> <select name="presek">
                          <option value="<?php echo $_POST['presek']; ?>"> <?php echo $_POST['presek']; ?></option>
                           <option value="1">1</option>
                           <option value="1.5">1.5</option>
                           <option value="2.5">2.5</option>
                           <option value="4">4</option>
                           <option value="6">6</option>
                           <option value="10">10</option>
                           <option value="16">16</option>
                           <option value="25">25</option>
                           <option value="35">35</option>
                           <option value="50">50</option>
                           <option value="75">75</option>
                           <option value="90">90</option>
                           <option value="120">120</option>
                           
                           </select></td>
                       
                       <td <?php if($_POST['message']!==''){echo "style=background-color:red;";} ?>> <input type="text" name="duzina" required value="<?php if($_POST['message']==''){echo $_POST['duzina'];} ?>">
                       
                       
                       
                       </td>
                       
                       <td <?php if($_POST['message2']!==''){echo "style=background-color:red;";} ?>> <input type="text" name="snaga"  required value="<?php if($_POST['message2']==''){echo $_POST['snaga'];} ?>"></td>
                       
                       <td> <select name="razvod" required>
                           <option value="<?php echo $_POST['razvod']; ?>"> <?php echo $_POST['razvod']; ?></option>
                           <option value="C"> C</option>
                           <option value="D"> D</option>
                           <option value="E"> E</option>  
                           </select></td>
                       
                       <td> <select name="inosig">
                           <option value="<?php echo $_POST['inosig']; ?>"> <?php echo $_POST['inosig'] ?></option>
                           <option value="4">4</option>
                           <option value="6">6</option>
                           <option value="10">10</option> 
                           <option value="16">16</option>
                           <option value="20">20</option>
                           <option value="25">25</option>
                           <option value="32">32</option>
                           <option value="40">40</option>
                           <option value="50">50</option>
                           <option value="75">75</option>
                           <option value="90">90</option>
                           <option value="120">120</option>
                           
                           </select></td>
                       
                       <td> <select name="vrosig">
                           <option value="<?php echo $_POST['vrosig']; ?>"><?php if($_POST['vrosig']=='1.45'){echo "automatski";}
                               if($_POST['vrosig']=='1.6'){echo "topljivi";}
                               
                               ?></option>
                           <option value="1.45">automatski</option>
                           <option value="1.6">topljivi</option> 
                           </select>
                       </td>
                   </tr>                   
                   <tr>
             </tr>

                </table>
            
                <input type="submit" name="submit" value="izračunaj pad napona">
                    
                </form>
                <form action="pado2.php" method="post">
                    
                    <input type="submit" value="Poništi"></form>

            </div>
           
        </div>
        
     </div>
       
<br>
        
    <p style="text-align:center"><?php
    print_r($_POST);?></p>
        
        

   </body>
       </html>