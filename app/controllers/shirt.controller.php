<?php
require_once 'app/models/shirt.models.php';
require_once 'app/views/shirt.view.php';

class shirtController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new shirtModel();
        $this->view = new shirtView();
    }


    //Imprime las camisetas
    function showShirts(){
        $shirts = $this->model->getShirts();
        $this->view->showShirts($shirts);
    }


    function showDetail($id){
        $shirt = $this->model->getShirtById($id);
        $idTeam = $shirt->id_equipo;
        $team = $this->model->getTeamById($idTeam);
        $this->view->showDetail($shirt, $team);
    }
}