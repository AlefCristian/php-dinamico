<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Pagina {
    private $id;
    private $pagina;
    private $content;
        
    function Pagina($id) {
        $this->id = $id;
    }
            
    function getId() {
        return $this->id;
    }

    function getPagina() {
        return $this->pagina;
    }

    function getContent() {
        return $this->content;
    }

    function setPagina($pagina) {
        $this->pagina = $pagina;
    }

    function setContent($content) {
        $this->content = $content;
    }


}
