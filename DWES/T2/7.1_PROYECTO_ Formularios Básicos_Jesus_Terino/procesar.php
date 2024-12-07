<?php
// Función para procesar el formulario básico (GET y POST)
function procesarFormularioBasico() {
    echo "<h2>Datos recibidos (Formulario Básico):</h2>";
    echo "<pre>";
    print_r($_REQUEST);  // Mostrar toda la información recibida
    echo "</pre>";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        echo "<h3>Datos enviados por GET:</h3>";
        print_r($_GET);
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<h3>Datos enviados por POST:</h3>";
        print_r($_POST);
    }
}

// Función para procesar el formulario con distintos controles
function procesarControlesFormulario() {
    echo "<h2>Datos recibidos (Controles de Formulario):</h2>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Verificar si las casillas de verificación o botones radio fueron seleccionados
    if (empty($_POST['gusta_php'])) {
        echo "¿No te gusta el PHP? Normal.<br>";
    }
    if (empty($_POST['genero'])) {
        echo "No seleccionaste tu género.<br>";
    }
}

// Función para manejar la subida de archivos
function manejarSubidaArchivo() {
    if (isset($_FILES['archivo'])) {
        $directorioSubida = 'uploads/';
        $archivoSubido = $directorioSubida . basename($_FILES['archivo']['name']);
        
        if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivoSubido)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES['archivo']['name'])) . " se ha subido correctamente.";
        } else {
            echo "Error al subir el archivo.";
        }
    }
}

// Función para identificar qué botón de envío fue presionado
function procesarBotonesEnvio() {
    if (isset($_POST['accion'])) {
        echo "Has seleccionado la opción: " . htmlspecialchars($_POST['accion']);
    }
} 

// Función para validar campos obligatorios
function validarCampos() {
    $errores = [];

    if (empty($_POST['nombre'])) {
        $errores[] = "El nombre es obligatorio.";
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email es obligatorio y debe ser válido.";
    }

    if (empty($errores)) {
        echo "Nombre: " . htmlspecialchars($_POST['nombre']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']);
    } else {
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    }
}

// Función para comprobar si el valor es numérico
function comprobarNumeros() {
    $numero = $_POST['numero'];

    if (is_numeric($numero)) {
        echo "$numero es un número válido (is_numeric).<br>";
    } else {
        echo "$numero no es un número válido (is_numeric).<br>";
    }

    if (ctype_digit($numero)) {
        echo "$numero contiene solo dígitos (ctype_digit).<br>";
    } else {
        echo "$numero no contiene solo dígitos (ctype_digit).<br>";
    }
}

// Función para validar diferentes tipos de datos
function comprobarTiposDatos() {
    $valor = $_POST['valor'];

    if (is_int($valor)) {
        echo "$valor es un entero.<br>";
    } elseif (is_float($valor)) {
        echo "$valor es un número decimal.<br>";
    } elseif (is_bool($valor)) {
        echo "$valor es un valor booleano.<br>";
    } elseif (is_string($valor)) {
        echo "$valor es una cadena.<br>";
    } else {
        echo "$valor es de otro tipo de dato.<br>";
    }
}

// Función para validar con ctype_
function validarConCtype() {
    $valor = $_POST['valor'];

    if (ctype_alpha($valor)) {
        echo "$valor contiene solo letras (ctype_alpha).<br>";
    } elseif (ctype_digit($valor)) {
        echo "$valor contiene solo dígitos (ctype_alnum).<br>";
    } elseif (ctype_alnum($valor)) {
        echo "$valor contiene solo letras y números (ctype_digit).<br>";
    } else {
        echo "$valor no cumple con ninguna validación ctype.";
    }
}

// Función para validar email y URL con filter_var
function validarConFilterVar() {
    $email = $_POST['email'];
    $url = $_POST['url'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El email $email es válido.<br>";
    } else {
        echo "El email $email no es válido.<br>";
    }

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        echo "La URL $url es válida.<br>";
    } else {
        echo "La URL $url no es válida.<br>";
    }
}

// Lógica principal para determinar qué función ejecutar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['numero'])) {
        comprobarNumeros();
    } elseif (isset($_POST['valor'])) {
        if (isset($_POST['tipo_dato'])) {
            comprobarTiposDatos();
        } else {
            validarConCtype();
        }
    } elseif (isset($_POST['email']) && isset($_POST['url'])) {
        validarConFilterVar();
    } elseif (isset($_POST['nombre']) || isset($_POST['email'])) {
        validarCampos();
    } elseif (isset($_POST['accion'])) {
        procesarBotonesEnvio();
    } elseif (isset($_FILES['archivo'])) {
        manejarSubidaArchivo();
    } else {
        procesarControlesFormulario();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    procesarFormularioBasico();
}

?>
