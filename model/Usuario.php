<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Usuario {
    private $id;
    private $nome;
    private $usuario;
    private $senha;
    private $nivel;
    private $email;
    
    function Usuario($id) {
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivel() {
        return $this->nivel;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setEmail($email) {
        $this->email = $email;
    }


    
}