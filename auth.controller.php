<?php
require_once 'app/models/user.model.php';
require_once 'app/views/auth.view.php';
class authController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new userModel();
        $this->view = new authView();
    }

    public function showLogin()
    {
        // Si el usuario ya está logueado, redirije al home
        if (isset($_SESSION['USER'])) {
            header('Location: ' . BASE_URL);
            die();
        } else {
            //Formulario login
            $this->view->showLogin();
        }
    }
    public function login()
    {
        if (!isset($_POST['user']) || (empty($_POST['user']))) {
            return $this->view->showLogin('Falta completar usuario');
        }
        if (!isset($_POST['password']) || (empty($_POST['password']))) {
            return $this->view->showLogin('Falta completar contraseña');
        }
        //Recibo datos del form
        $user = $_POST['user'];
        $password = $_POST['password'];

        //Se verifica que el usuario este en la base de datos

        $userFromDb = $this->model->getUserByUsername($user);

        if ($userFromDb && password_verify($password, $userFromDb->password)) {
            session_start();
            $_SESSION['ID_USER'] = $userFromDb->id;
            $_SESSION['USER'] = $userFromDb->user;

            //Redirijo al home
            header('Location: ' . BASE_URL);
        } else {
            return $this->view->showLogin('El usuario o la contraseña son incorrectas');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
