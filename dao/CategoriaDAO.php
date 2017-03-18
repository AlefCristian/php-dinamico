<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DAO.php';

class CategoriaDAO extends DAO {
    
    public function save(Categoria $categoria) {
        if($categoria->getId() == 0) {
            $this->insert($categoria);
        } else {
            $this->update($categoria);
        }
    }
    
    private function insert(Categoria $categoria) {
        $this->open();
        $statment = $this->db->prepare("INSERT INTO categoria (categoria) values (?)");
        $statment->bindValue(1, $categoria->getCategoria());
        $statment->execute();
        $this->close();
    }
    
    private function update(Categoria $categoria) {
        $this->open();
        $statment = $this->db->prepare("UPDATE categoria set categoria = ? WHERE id = ?");
        $statment->bindValue(1, $categoria->getCategoria());
        $statment->bindValue(2, $categoria->getId());
        $statment->execute();
        $this->close();
    }
    
    public function select() {
        $this->open();
        $statment = $this->db->prepare("SELECT * FROM categoria");
        if($statment->execute()) {
            $categoriaArray = new ArrayObject();
            while($row = $statment->fetch()) {
               $categoriaRow = new Categoria($row['id']);
               $categoriaRow->setCategoria($row['categoria']);
               $categoriaArray->append($categoriaRow);
            }
            return $categoriaArray;
        }
        $this->close();        
    }
    
}

