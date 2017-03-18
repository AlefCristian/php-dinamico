<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'MySql.php';

abstract class DAO {
    protected $db;
    
    protected function open() {
        $mysql = new Mysql();
        $this->db = $mysql->getDb();
    }
    
    protected function close() {
        unset($this->db);
    }
}

