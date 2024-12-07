<?php
$_SESSION['horarios_clases']=[
    'yoga' => ['lunes' => [
       'hora' => '19:00',
       'plazas_totales' => 20,
       'plazas_disponibles' => 20,
       'plazas_reservadas' => 0,
       'reservado'=>0,
   ],
   'miércoles' => [
       'hora' =>'08:00',
       'plazas_totales' => 20,
       'plazas_disponibles' => 20,
       'plazas_reservadas' => 0,
       'reservado'=>0,
   ],
   'viernes' => [
       'hora' =>'10:00',
       'plazas_totales' => 20,
       'plazas_disponibles' => 20,
       'plazas_reservadas' => 0,
       'reservado'=>0,
   ],
],   
'zumba' => [
   'martes' => [
       'hora' => '18:00',
       'plazas_totales' => 20,
       'plazas_disponibles' => 20,
       'plazas_reservadas' => 0,
       'reservado'=>0,
   ],
   'jueves' => [
       'hora' =>'19:30',
       'plazas_totales' => 20,
       'plazas_disponibles' => 20,
       'plazas_reservadas' => 0,
       'reservado'=>0,
   ],
   ],
'crossfit' => [
       'lunes' => [
           'hora' => '18:00',
           'plazas_totales' => 20,
           'plazas_disponibles' => 20,
           'plazas_reservadas' => 0,
           'reservado'=>0,
       ],
       'miércoles' => [
           'hora' =>'14:30',
           'plazas_totales' => 20,
           'plazas_disponibles' => 20,
           'plazas_reservadas' => 0,
           'reservado'=>0,
       ],
       'viernes' => [
           'hora' =>'20:30',
           'plazas_totales' => 20,
           'plazas_disponibles' => 20,
           'plazas_reservadas' => 0,
           'reservado'=>0,
       ],
       ]
   ];

function reservar_plaza(&$clase, $dia)
{
    global $clases_gimnasio;
    if ($clases_gimnasio[$clase][$dia]['plazas_disponibles'] > 0 && $clases_gimnasio[$clase][$dia]['reservado'] == 0) {
        $clases_gimnasio[$clase][$dia]['plazas_disponibles'] - 1;
        $clases_gimnasio[$clase][$dia]['plazas_reservadas'] + 1;
        return true;
    }
    return false;
}

function liberar_plaza(&$clase, $dia)
{
    global $clases_gimnasio;
    if ($clases_gimnasio[$clase][$dia]['plazas_reservadas'] > 0) {
        $clases_gimnasio[$clase][$dia]['plazas_disponibles'] + 1;
        $clases_gimnasio[$clase][$dia]['plazas_reservadas'] - 1;
        return true;
    }
    return false;
}
?>