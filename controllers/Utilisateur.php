<?php

use models\UtilisateurModel;

require_once "models/UtilisateurModel.php";

class Utilisateur
{
    private $model;

    public function __construct($pdo) {
        $this->model = new UtilisateurModel($pdo);
    }

    public function getUtilisateurByCourriel($courriel){
        return $this->model->getUtilisateurByCourriel($courriel);
    }
    public function getUtilisateurById($id){
        return $this->model->getUtilisateurById($id);
    }
    public function getAllUtilisateurs(){
        return $this->model->getAllUtilisateurs();
    }

    public function createUtilisateur($data){
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->model->createUtilisateur($data);

    }
    public function updateUtilisateur($id,$data){
        return $this->model->updateUtilisateur($id, $data);
    }
    public function deleteUtilisateur($id){
        return $this->model->deleteUtilisateur($id);
    }

    public function verifyUser($email, $mot_de_passe): bool
    {
        $user = $this->model->getUtilisateurByCourriel($email);
        if($user)  {
            if(password_verify($mot_de_passe, $user['mot_de_passe'])) {
                return true;
            }
        }
        return false;
    }

    public function grantAdminAccess($email, $mot_de_passe): void
    {

        if($this ->verifyUser($email, $mot_de_passe)) {
            $user = $this->model->getUtilisateurByCourriel($email);

            if($user['role'] == 'admin') {
                $_SESSION['admin']['isAuth'] = true;
                $_SESSION['admin']['role'] = 'admin';
                echo "yes authorization";
            }else{
                $_SESSION['admin']['isAuth'] = false;
                echo "no authorization";
            }
        }
    }

    public function login($email, $password): void
    {
        if ($this->verifyUser($email, $password)) {
            $_SESSION['authentifie'] = true;
            $this->grantAdminAccess($email, $password);
            require_once "spa.php";
        }else{
            require_once "login.php";
            echo "fail";
        }
    }
}