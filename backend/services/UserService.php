<?php
    require_once '../models/UserModel.php';
    require_once '../db/Database.php';
    require_once '../interfaces/UserInterface.php';

    class UserService implements UserInterface {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function registrarUsuario($usuario) {
            $nombre = $usuario->getNombre();
            $ap_paterno = $usuario->getPaterno();
            $ap_materno = $usuario->getMaterno();
            $direccion = $usuario->getDireccion();
            $telefono = $usuario->getTelefono();
            $correo = $usuario->getCorreo();
            $username = $usuario->getUsuario();
            $password = password_hash($usuario->getPassword(), PASSWORD_BCRYPT);
        
            $sql_insert = "INSERT INTO usuario (usu_nombre, usu_ap_paterno, usu_ap_materno, usu_direccion, usu_telefono, usu_correo, usu_usuario, usu_password) 
            VALUES ($nombre, $ap_paterno, $ap_materno, $direccion, $telefono, $correo, $usuario, $password);";

            if($this->db->query($sql_insert)) 
                return true;
            else 
                return false;
        }
    }