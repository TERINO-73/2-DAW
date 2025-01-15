<?php
    require_once("../utiles/config.php");
    require_once("../utiles/funciones.php");

function obtenerConexion($config) {
    return conectarPDO($config);
}

$conexion = obtenerConexion($database);
$query =  "
SELECT t.id,
t.nombre,
t.apellidos,
t.altura
,t.anno_nacimiento,
t.mano,
 COUNT(ti.tenista_id) AS torneos_ganados
from tenistas t
left join titulos ti  ON t.id = ti.tenista_id 
group by t.id ;
";
$resultado = resultadoConsulta($conexion, $query);






echo "<table border='1'>";
echo "<thead><tr><th>Nombre</th><th>Apellidos</th><th>Altura</th><th>Año de nacimiento</th><th>Mano</th><th>Numero de titulos</th></tr></thead>";
echo "<tbody>";

while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$fila['nombre']}</td>";
    echo "<td>{$fila['apellidos']}</td>";
    echo "<td>{$fila['altura']}</td>";
    echo "<td>{$fila['anno_nacimiento']}</td>";
    echo "<td>{$fila['mano']}</td>";
    echo "<td><a href='listado_torneos_ganados.php?tenista_id={$fila['id']}&nombre={$fila['nombre']}&apellidos={$fila['apellidos']}'>{$fila['torneos_ganados']}</a></td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
