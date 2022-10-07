<?php
require_once './app/views/authView.php';
require_once './app/models/userModel.php';

class AuthController{
    private $userModel;
    private $authView;

    public function __construct() {
        $this->userModel = new userModel();
        $this->authView = new AuthView();
    }
    
    public function showFormLogin() {
        $this->authView->showFormLogin();
    }

    public function validateUser() {
        $email = $_POST['email'];
        $pss = $_POST['password'];
        $user = $this->userModel->getUserByEmail($email);
        if ($user && password_verify($pss, $user->pss)) {
            session_start();
            $_SESSION['USER_ID'] = $user->user_id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_LOGGED'] = true;

           header("Location: " . BASE_URL);
        } else {
           $this->authView->showFormLogin("Invalid user or password");
        } 
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }


    
}