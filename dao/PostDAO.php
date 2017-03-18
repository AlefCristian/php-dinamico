<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DAO.php';

class PostDAO extends DAO {
    
    function save(Post $post) {
        if($post->getId() == 0) {
            $this->insert($post);
        } else {
            $this->update($post);
        }
    }
    
    private function insert(Post $post) {
        $this->open();
        $statment = $this->db->prepare("INSERT INTO post (thumb = ?, titulo, texto, categoria, autor, valor_real, valor_pagseguro) VALUES (?, ?, ?, ?, ?, ?)");
        $statment->bindValue(1, $post->getThumb());
        $statment->bindValue(2, $post->getTitulo());
        $statment->bindValue(3, $post->getText());
        $statment->bindValue(4, $post->getCategoria());
        $statment->bindValue(5, $post->getAutor());
        $statment->bindValue(6, $post->getValor_real());
        $statment->bindValue(7, $post->getValor_pagseguro());
        $statment->execute();
        $this->close();
        
    }
    
    private function update(Post $post) {
        $this->open();
        $statment = $this->db->prepare("UPDATE post SET thumb = ?, titulo = ?, texto = ?, categoria = ?, autor = ?, valor_real = ?, valor_pagseguro = ? where id = ?");
        $statment->bindValue(1, $post->getThumb());
        $statment->bindValue(2, $post->getTitulo());
        $statment->bindValue(3, $post->getText());
        $statment->bindValue(4, $post->getCategoria());
        $statment->bindValue(5, $post->getAutor());
        $statment->bindValue(6, $post->getValor_real());
        $statment->bindValue(7, $post->getValor_pagseguro());
        $statment->bindValue(8, $post->getId());
        $statment->execute();
        $this->close();
        
    }
    
    public function select() {
        $this->open();
        $statment = $this->db->prepare("SELECT * FROM post");
        if($statment->execute()) {
            $postArray = new ArrayObject();
            while($row = $statment->fetch()) {
                $postRow = new Post($row['id']);
                $postRow->setThumb($row['thumb']);
                $postRow->setTitulo($row['titulo']);
                $postRow->setText($row['texto']);
                $postRow->setCategoria($row['categoria']);
                $postRow->setData($row['data']);
                $postRow->setAutor($row['autor']);
                $postRow->setValor_real($row['valor_real']);
                $postRow->setValor_pagseguro($row['valor_pagseguro']);
                $postRow->setVisitas($row['visitas']);
                
                $postArray->append($postRow);
            }
            return $postArray;
        }
        $this->close();
    }
    
    public function selectWhereCategoria(String $categoria, Int $inicio, Int $maximo) {
        $this->open();
        $statment = $this->db->prepare("SELECT * FROM post where categoria = ? ORDER BY ID DESC"
                . "LIMIT ?, ?");
        $statment->bindValue(1, $categoria);
        $statment->bindValue(2, $inicio);
        $statment->bindValue(3, $maximo);
        if($statment->execute()) {
            $postArray = new ArrayObject();
            while($row = $statment->fetch()) {
                $postRow = new Post($row['id']);
                $postRow->setThumb($row['thumb']);
                $postRow->setTitulo($row['titulo']);
                $postRow->setText($row['texto']);
                $postRow->setCategoria($row['categoria']);
                $postRow->setData($row['data']);
                $postRow->setAutor($row['autor']);
                $postRow->setValor_real($row['valor_real']);
                $postRow->setValor_pagseguro($row['valor_pagseguro']);
                $postRow->setVisitas($row['visitas']);
                
                $postArray->append($postRow);
            }
            return $postArray;
        }
        
    }
        
    public function delete(Pagina $pagina) {
        $this->open();
        $statment = $this->db->prepare("DELETE  FROM pagina WHERE id = ?");
        $statment->bindValue(1, $pagina->getId());
        $statment->execute();
        $this->close();
    }
}

