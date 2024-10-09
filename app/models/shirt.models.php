<?php

    class shirtModel{      
        
        function Conection(){
            return new PDO('mysql:host=localhost;dbname=tpeweb;charset=utf8', 'root', '');
            }

        //Devuelve las camisetas de la base de datos
        function getShirts(){
            $db = $this->Conection();
            $query = $db->prepare('SELECT * FROM camiseta');
            $query->execute();
            $shirts = $query->fetchAll(PDO::FETCH_OBJ);
            return $shirts;
        }
        function getShirtById($id){
            $db = $this->Conection();
            $query = $db->prepare('SELECT * FROM camiseta WHERE id_camiseta = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $shirt = $query->fetch(PDO::FETCH_OBJ);
            return $shirt;
        }
        function getTeamById($id){
            $db = $this->Conection();
            $query = $db->prepare('SELECT * FROM equipo WHERE id_equipo = :id');
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $team = $query->fetch(PDO::FETCH_OBJ);
            return $team;
        }
        function getTeams(){
            $db = $this->Conection();
            $query = $db->prepare('SELECT * FROM equipo');
            $query->execute();
            $teams = $query->fetchAll(PDO::FETCH_OBJ);
            return $teams;
        }
    }