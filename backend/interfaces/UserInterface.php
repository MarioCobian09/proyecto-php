<?php

interface UserInterface {
    public function registrarUsuario($usuario);
    public function login($usuario, $password);
    public function actualizarUsuario($usuario);
    public function borrarUsuario($id);
    public function obtenerUsuarioPorId($id);
    public function obtenerUsuarioPorCorreo($correo);
    public function obtenerTodosUsuarios();
}