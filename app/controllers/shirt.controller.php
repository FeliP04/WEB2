<?php
require_once 'app/models/shirt.models.php';
require_once 'app/views/shirt.view.php';

class shirtController
{
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new shirtModel();
        $this->view = new shirtView();
    }


    //Imprime las camisetas
    function showShirts()
    {
        $shirts = $this->model->getShirts();
        $this->view->showShirts($shirts);
    }


    function showDetail($id)
    {
        $shirt = $this->model->getShirtById($id);
        $idTeam = $shirt->id_equipo;
        $team = $this->model->getTeamById($idTeam);
        $this->view->showDetail($shirt, $team);
    }

    //Sistema crud
    function showCrud()
    {
        $shirts = $this->model->getShirts();
        $teams = $this->model->getTeams();
        $this->view->showCrud($shirts, $teams);
    }

    function dataControl()
    {
        // Verificamos que los datos esten completos
        if (!isset($_FILES['image']) || empty($_FILES['image'])) {
            $this->view->showError('Falta agregar imagen');
        }
        if (!isset($_POST['id_team']) || empty($_POST['id_team'])) {
            $this->view->showError('Falta agregar equipo');
        }
        if (!isset($_POST['season']) || empty($_POST['season'])) {
            $this->view->showError('Falta agregar temporada');
        }
        if (!isset($_POST['type']) || empty($_POST['type'])) {
            $this->view->showError('Falta agregar tipo');
        }
        if (!isset($_POST['price']) || empty($_POST['price'])) {
            $this->view->showError('Falta agregar precio');
        }
    }
    function addShirt()
    {
        $this->dataControl();

        //Se reciben datos del form
        $id_team = $_POST['id_team'];
        $season = $_POST['season'];
        $type = $_POST['type'];
        $price = $_POST['price'];

        //Procesamos imagen
        $imageName = $_FILES['image']['name'];
        //obtenemos id del nuevo item ingresado
        $id = $this->model->addShirt($imageName, $id_team, $season, $type, $price);
        if ($id) {
            header("Location:" . BASE_URL);
        } else {
            $error = "Error al ingresar la materia";
            $this->view->showError($error);
        }
    }
    function showFormCrud($equip)
    {
        $teams = $equip;
        $this->view->showFormCrud($teams);
    }

    function deleteShirt($id = '')
    {
        $this->model->deleteShirt($id);
        header("Location:" . BASE_URL);
    }

    function showUpdate($id){
        $teams = $this->model->getTeams();
        $this->view->showFormUpdate($id, $teams);
    }
    function modifyShirt()
    {
        // Verificar si se ha enviado el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dataControl();
            $id = $_POST['id'];
            $id_team = $_POST['id_team'];
            $season = $_POST['season'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $imageName = $_FILES['image']['name'];
            
            //Actualizamos informacion en la base de datos
            $this->model->updateShirt($id, $imageName, $id_team, $season, $type, $price);

            //Volvemos al home
            header("Location: " . BASE_URL);
        }
    }
}
