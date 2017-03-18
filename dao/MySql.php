<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mysql {
    private $dsn = 'mysql:host=localhost;dbname=sitedinamico';
    private $username = 'root';
    private $password = 'alefcristian';
    
    function getDb() {
        return new PDO($this->dsn, $this->username, $this->password);
    }

}
