<?php

    class UserModel {
        private $id;
        private $nombre;
        private $ap_paterno;
        private $ap_materno;
        private $direccion;
        private $telefono;
        private $correo;
        private $usuario;
        private $password;
        
        public function __construct($nombre, $ap_paterno, $ap_materno, $direccion, $telefono, $correo, $usuario, $password)
        {
            $this->nombre = $nombre;
            $this->ap_paterno = $ap_paterno;
            $this->ap_materno = $ap_materno;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->correo = $correo;
            $this->usuario = $usuario;
            $this->password = $password;
        }

        // Getters y Setters para cada una de las propiedades

        public function getId() {
            return $this->id;
        }
        public function setId($id) {
            $this->id = $id;
        }

        public function getNombre() {
            return $this->nombre;
        }
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getPaterno() {
            return $this->ap_paterno;
        }
        public function setPaterno($ap_paterno) {
            $this->ap_paterno = $ap_paterno;
        }

        public function getMaterno() {
            return $this->ap_paterno;
        }
        public function setMaterno($ap_materno) {
            $this->ap_materno = $ap_materno;
        }

        public function getDireccion() {
            return $this->direccion;
        }
        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function getTelefono() {
            return $this->telefono;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        public function getCorreo() {
            return $this->correo;
        }
        public function setCorreo($correo) {
            $this->correo = $correo;
        }

        public function getUsuario() {
            return $this->usuario;
        }
        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        public function getPassword() {
            return $this->password;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
    }