<?php
echo "<table class=\"pegi\">";
        echo "<tr><td></td><td>ponedeljak</td><td>utorak</td><td>sreda</td><td>četvrtak</td><td>petak</td></tr>";

// j su dani(pon - pet) a i su casovi po danu(8komada)
for ($i=1;$i<9;$i++){
            echo "<tr><td>".$i.".</td>";
            
            for ($j=1;$j<6;$j++){
                
                echo"<td>";
                echo "<select name=predmet_".$i.$j.">";
                
                foreach( $predmeti as $key=>$value){
                    echo " <option value=".$key."_".$j.">".$value."</option>";                               
            }
               
                echo "</select>";
                
                echo "<select name=odeljenje_".$i.$j.">";
                foreach( $odeljenja as $key=>$value){
                    echo " <option value=".$key."_".$j.">".$value."</option>";                               
            }
               
                echo "</select>";
                
                echo "</td>";
            }
            
            echo "</tr>";

        }
        echo "</table>";

?>