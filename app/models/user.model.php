<?php
class userModel{
    function Conection(){
        return new PDO('mysql:host=localhost;dbname=tpeweb;charset=utf8', 'root', '');
    }
    function getUserByUsername($username){
        $db = $this->Conection();
        $query = $db->prepare('SELECT * FROM usuario WHERE user = ?');
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}