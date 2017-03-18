<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'DAO.php';

class UsuarioDAO extends DAO {
       
    function save(Usuario $usuario) {
        if($usuario->getId() == 0) {
            $this->insert($usuario);
        } else {
            $this->update($usuario);
        }
    }
    
    private function insert(Usuario $usuario) {
        $this->open();
        $statment = $this->db->prepare("INSERT INTO usuario (nome, usuario, senha, email, nivel) VALUES (?, ?, ?, ?, ?)");
        $statment->bindValue(1, $usuario->getNome());
        $statment->bindValue(2, $usuario->getUsuario());
        $statment->bindValue(3, $usuario->getSenha());
        $statment->bindValue(4, $usuario->getEmail());
        $statment->bindValue(5, $usuario->getNivel());
        $statment->execute();
        $this->close();
        
    }
    
    private function update(Usuario $usuario) {
        $this->open();
        $statment = $this->db->prepare("UPDATE usuario SET nome = ?, usuario = ?, senha = ?, email = ?, nivel = ? where id = ?");
        $statment->bindValue(1, $usuario->getNome());
        $statment->bindValue(2, $usuario->getUsuario());
        $statment->bindValue(3, $usuario->getSenha());
        $statment->bindValue(4, $usuario->getEmail());
        $statment->bindValue(5, $usuario->getNivel());
        $statment->bindValue(6, $usuario->getId());
        $statment->execute();
        $this->close();
        
    }
    
    public function select() {
        $this->open();
        $statment = $this->db->prepare("SELECT * FROM usuario");
        if($statment->execute()) {
            $usuarioArray = new ArrayObject();
            while($row = $statment->fetch()) {
                $usuarioRow = new Usuario($row['id']);
                $usuarioRow->setNome($row['nome']);
                $usuarioRow->setUsuario($row['usuario']);
                $usuarioRow->setSenha($row['senha']);
                $usuarioRow->setEmail($row['email']);
                $usuarioRow->setNivel($row['nivel']);
                $usuarioArray->append($usuarioRow);
            }
            return $usuarioArray;
        }
        $this->close();
    }
        
    public function delete(Pagina $usuario) {
        $this->open();
        $statment = $this->db->prepare("DELETE  FROM usuario WHERE id = ?");
        $statment->execute(array($usuario->getId()));
        $this->close();
    }
}

