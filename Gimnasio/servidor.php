<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

$conn = conectarBD("GimnasioBD", "root", "");

$datos = file_get_contents('php://input');
$objeto = json_decode($datos);

if ($objeto != null) {
    switch ($objeto->servicio) {
        case "listarClases":
            print json_encode(listarClases());
            break;
        case "anadirClase":
            anadirClase($objeto);
            print json_encode(listarClases());
            break;
        case "borrarClase":
            borrarClase($objeto->id);
            print json_encode(listarClases());
            break;
        case "infoClase":
            print json_encode(infoClase($objeto->id));
            break;
        case "infoUsuario":
            print json_encode(infoUsuario($objeto->id));
            break;
        case "modificarUsuario":
            modificarUsuario($objeto);
            print json_encode(infoUsuario($objeto->id));
            break;
        case "modificarClase":
            modificarClase($objeto);
            print json_encode(infoUsuario($objeto->id));
            break;
        case "crearUsuario":
            crearUsuario($objeto);
            print json_encode(infoUsuario($objeto->id));
            break;
        case "borrarUsuario":
            borrarUsuario($objeto->id);
            print json_encode(listarUsuarios());
            break;
    }
}

function conectarBD($dbname, $usuario, $clave) {
    try {
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $bd = new PDO('mysql:host=localhost;dbname=' . $dbname, $usuario, $clave, $opciones);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bd;
    } catch (PDOException $e) {
        echo("No se ha podido conectar a la base de datos. Código de error: " . $e->getMessage());
    }
}

function listarClases() {
    global $conn;
    try {
        $sql = "SELECT id, nombre, informacion, diahora, numerogente FROM clases ORDER BY id";
        $stm = $conn->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        die(json_encode(["error" => $e->getMessage()])); // ❌ Muestra errores si algo falla
    }
}

function anadirClase($objeto) {
    global $conn;
    $sql = "INSERT INTO Clases (Nombre, Informacion, DiaHora) VALUES (?, ?, ?)";
    $conn->prepare($sql)->execute([$objeto->nombre, $objeto->informacion, $objeto->diaHora]);
}

function borrarClase($id) {
    global $conn;
    $sql = "DELETE FROM Clases WHERE ID = ?";
    $conn->prepare($sql)->execute([$id]);
}

function infoClase($id) {
    global $conn;
    $sql = "SELECT * FROM Clases WHERE ID = ?";
    $stm = $conn->prepare($sql);
    $stm->execute([$id]);
    return $stm->fetch(PDO::FETCH_ASSOC);
}

function infoUsuario($id) {
    global $conn;
    $sql = "SELECT * FROM Usuarios WHERE ID = ?";
    $stm = $conn->prepare($sql);
    $stm->execute([$id]);
    return $stm->fetch(PDO::FETCH_ASSOC);
}

function modificarUsuario($objeto) {
    global $conn;
    $sql = "UPDATE Usuarios SET NombreApellidos = ?, DNI = ?, Tarifa = ?, Privilegios = ?, ClaseID = ? WHERE ID = ?";
    $conn->prepare($sql)->execute([$objeto->nombre, $objeto->dni, $objeto->tarifa, $objeto->privilegios, $objeto->claseID, $objeto->id]);
}

function modificarClase($objeto) {
    global $conn;
    $sql = "UPDATE Clase SET nombre = ?, informacion = ?, diahora = ?, numerogente = ?;";
    $conn->prepare($sql)->execute([$objeto->nombre, $objeto->informacion, $objeto->diahora, $objeto->numerogente]);
}




function crearUsuario($objeto) {
    global $conn;
    $sql = "INSERT INTO Usuarios (NombreApellidos, DNI, Tarifa, Privilegios, ClaseID) VALUES (?, ?, ?, ?, ?)";
    $conn->prepare($sql)->execute([$objeto->nombre, $objeto->dni, $objeto->tarifa, $objeto->privilegios, $objeto->claseID]);
}

function borrarUsuario($id) {
    global $conn;
    $sql = "DELETE FROM Usuarios WHERE ID = ?";
    $conn->prepare($sql)->execute([$id]);
}

function listarUsuarios() {
    global $conn;
    $sql = "SELECT * FROM Usuarios";
    $result = $conn->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

?>
