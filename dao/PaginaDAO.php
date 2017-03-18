<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DAO.php';

class PaginaDAO extends DAO{
        
    function save(Pagina $pagina) {
        if($pagina->getId() == 0) {
            $this->insert($pagina);
        } else {
            $this->update($pagina);
        }
    }
    
    private function insert(Pagina $pagina) {
        $this->open();
        $statment = $this->db->prepare("INSERT INTO pagina (pagina, content) VALUES (?, ?)");
        $statment->bindValue(1, $pagina->getPagina());
        $statment->bindValue(2, $pagina->getContent());
        $statment->execute();
        $this->close();
        
    }
    
    private function update(Pagina $pagina) {
        $this->open();
        $statment = $this->db->prepare("UPDATE pagina SET pagina = ?, content = ? where id = ?");
        $statment->bindValue(1, $pagina->getPagina());
        $statment->bindValue(2, $pagina->getContent());
        $statment->execute();
        $this->close();
        
    }
    
    public function select() {
        $this->open();
        $statment = $this->db->prepare("SELECT * FROM pagina");
        if($statment->execute()) {
            $paginaArray = new ArrayObject();
            while($row = $statment->fetch()) {
                $paginaRow = new Pagina($row['id']);
                $paginaRow->setPagina($row['pagina']);
                $paginaRow->setContent($row['content']);
                $paginaArray->append($paginaRow);
            }
            return $paginaArray;
        }
        $this->close();
    }
        
    public function delete(Pagina $pagina) {
        $this->open();
        $statment = $this->db->prepare("DELETE  FROM pagina WHERE id = ?");
        $statment->bindValue(1, $pagina);
        $statment->execute();
        $this->close();
    }
}