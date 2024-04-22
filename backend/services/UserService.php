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

        public function login($usuario, $password) {
            $sql_usuario = "SELECT * FROM usuarios WHERE
            usu_usuario='$usuario'";

            $result = $this->db->query($sql_usuario);

            if($result->num_rows == 1) {
                $user = $result->fetch_assoc();

                if(password_verify($password, $user['usu_password'])) {
                    return $user;
                }
            }
            return false;
        }

        public function obtenerTodosUsuarios() {
            $sql = "SELECT * FROM usuarios";
            $result = $this->db->query($sql);
            $users = array();

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $users[] = $row;
                }
            }

            return $users;
        }

        public function actualizarUsuario($usuario) {
            $id = $usuario->getId();
            $nombre = $usuario->getNombre();
            $ap_paterno = $usuario->getPaterno();
            $ap_materno = $usuario->getMaterno();
            $direccion = $usuario->getDireccion();
            $telefono = $usuario->getTelefono();
            $correo = $usuario->getCorreo();
            $username = $usuario->getUsuario();

            $sql_update = "UPDATE usuarios
                            SET usu_nombre='$nombre', 
                                usu_ap_paterno='$ap_paterno',
                                usu_ap_materno = '$ap_materno',
                                usu_direccion = '$direccion',
                                usu_telefono = '$telefono',
                                usu_correo = '$correo',
                                usu_usuario = '$username',
                            WHERE usu_id = '$id'";
            
            if($this->$db->query($sql_update)) {
                return True;
            } else {
                return False;
            }
        }

        public function borrarUsuario($id) {
            $sql_borrar = "DELETE FROM usuarios WHERE usu_id='$id' LIMIT 1";

            if($this->$db->query($sql_borrar)) {
                return True;
            } else {
                return False;
            }
        }

        public function obtenerUsuarioPorId($id) {
            $sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
            $result = $this->db->query($sql);
            //$users = array();

            if($result->num_rows == 1) {
                return $result->fetch_assoc();
            }

            return null;
        }

        public function obtenerUsuarioPorCorreo($correo) {
            $sql = "SELECT * FROM usuarios WHERE usu_correo = '$correo'";
            $result = $this->db->query($sql);
            //$users = array();

            if($result->num_rows == 1) {
                return $result->fetch_assoc();
            }

            return null;
        }
    }