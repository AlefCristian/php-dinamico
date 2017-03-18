<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Post {
    private $id;
    private $thumb;
    private $titulo;
    private $text;
    private $categoria;
    private $data;
    private $autor;
    private $valor_real;
    private $valor_pagseguro;
    private $visitas;
       
    
    function Post($id) {
        $this->id = $id;
    }
    function getId() {
        return $this->id;
    }

    function getThumb() {
        return $this->thumb;
    }
    
    function getTitulo() {
        return $this->titulo;
    }

    function getText() {
        return $this->text;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getData() {
        return $this->data;
    }

    function getAutor() {
        return $this->autor;
    }

    function getValor_real() {
        return $this->valor_real;
    }

    function getValor_pagseguro() {
        return $this->valor_pagseguro;
    }

    function getVisitas() {
        return $this->visitas;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setThumb($thumb) {
        $this->thumb = $thumb;
    }
    
    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setValor_real($valor_real) {
        $this->valor_real = $valor_real;
    }

    function setValor_pagseguro($valor_pagseguro) {
        $this->valor_pagseguro = $valor_pagseguro;
    }

    function setVisitas($visitas) {
        $this->visitas = $visitas;
    }
    
}

