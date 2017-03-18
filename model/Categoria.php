<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Categoria {
    private $id;
    private $categoria;
    
    function Categoria($id) {
        $this->id = $id;
    }
    
    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getCategoria() {
        return $this->categoria;
    }
}

