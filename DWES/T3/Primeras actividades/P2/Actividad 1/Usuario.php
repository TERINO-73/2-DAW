<?php

class Usuario {
    private $nombre;
    private $email;
    private $password;

    public function __construct($nombre, $email, $password) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function cambiarPassword($newPassword) {
        $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
    }
}
?>
