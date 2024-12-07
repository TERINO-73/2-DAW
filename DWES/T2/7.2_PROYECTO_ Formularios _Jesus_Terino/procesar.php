<?php
// Función para procesar el formulario básico (GET y POST)





            $nElementos =$_POST['nElementos'];
        
            if ($nElementos >= 1 && $nElementos <= 10) {
                echo "Número de elemento: $nElementos ";
                echo "</br>";

                echo"Introduzca los numeros a tratar";
                echo "<form action='procesar2.php' method='post'>";
                for ($i= 0; $i<$nElementos; $i++) {
                
                    echo "<input type='number' name='$i'>";
;
                }
                echo "</br>";
                echo "<input type='submit' value='Enviar'>";
                echo "<input type='reset' value='Borrar'>";
                echo "</form>";
                echo "<a href='PROYECTO_ Formularios _Jesus_Terino.php'>Volver Inicio</a>"  ;              

            }else{
                echo'El valor  es incorrecto.Debe ser un número entre 1 y 10';
                echo "<a href='PROYECTO_ Formularios _Jesus_Terino.php'>Volver Inicio</a>"  ;              
                
            }
        



?>
