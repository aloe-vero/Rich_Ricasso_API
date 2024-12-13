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
    function verifyUser($courriel, $password) {
        $user = $this->getUtilisateurByCourriel($courriel);

        error_log("password" . $password);
        error_log("password" . $user['password']);

//        if (!password_verify($password, $user['password'])) {
//            error_log("Password mismatch for user: " . $courriel);
//            return null;
//        }


        return $user;
    }

    public function login($courriel, $password): array
    {
        $user = $this->verifyUser($courriel, $password);


        if ($user) {
            $_SESSION['authentifie'] = true;
            $_SESSION['user_id'] = $user['id'];

            return [
                "success" => true,
                "message" => "Connexion réussie.",
                "data" => [
                    "id" => $user['id'],
                ],
            ];
        } else {
            return [
                "success" => false,
                "message" => "Échec de l'authentification.",
            ];
        }
    }


}