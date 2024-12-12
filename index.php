<?php

use controllers\Produit;

require_once "controllers/Utilisateur.php";
require_once "controllers/Produit.php";
require_once "controllers/Abonnement.php";
require "Database.php";

session_start();
// Autoriser les requêtes depuis n'importe quelle origine
header('Access-Control-Allow-Origin: *');
// Définir le type de contenu de la réponse comme JSON
header('Content-Type: application/json');
// Autoriser certaines méthodes HTTP
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// Autoriser certains en-têtes dans la requête
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$db = Database::getInstance();
$conn = $db->getConnection();

$uc = new Utilisateur($conn);
$pc = new Produit($conn);
$ac = new Abonnement($conn);

$explode = explode('/', $uri);


//echo "URI: " . $uri . "<br/>";
//echo "Method: " . $method . "<br/>";

switch ($method| $uri) {
    /*
     * Chemin : GET /api/utilisateurs
     * Tâche : afficher tous les utilisateurs
     */

    case ($method == 'GET' && $uri == '/api/produits'):
       $produits = $pc->getAllProduits();
       echo json_encode($produits);
       break;

    case ($method == 'GET' && preg_match('/\/api\/produits\/[1-9]/', $uri)):
        $array = $explode;
        $id = end($array);
        $user = $pc->getProduitById($id);
        echo json_encode($user);
        break;
    case ($method == 'POST' && $uri == '/api/produits'):
        $data = $_POST;
        $result = $pc->createProduit($data);
        if ($result) {
            echo json_encode(["success" => true, "message" => "Utilisateur créé avec succès"]);
        } else {
            echo json_encode(["success" => false, "message" => "Échec de la création de l'utilisateur"]);
        }
        break;

    case ($method == 'GET' && $uri == '/api/utilisateurs'):
        $users = $uc->getAllUtilisateurs();
        echo json_encode($users);
        break;
    /*
     * Chemin: GET /api/utilisateurs/{id}
     * Tâche: obtenir un utilisateur
     */
    case ($method == 'GET' && preg_match('/\/api\/utilisateurs\/[1-9]/', $uri)):
        $array = $explode;
        $id = end($array);
        $user = $uc->getUtilisateurById($id);
        echo json_encode($user);
        break;
    /*
    * Chemin: POST /api/utilisateurs
    * Tâche: stocker un utilisateur
    */
    case ($method == 'POST' && $uri == '/api/utilisateurs'):
        // Read the raw JSON body
        $data = json_decode(file_get_contents("php://input"), true);

        if ($data) {
            $result = $uc->createUtilisateur($data);
            if ($result) {
                echo json_encode(["success" => true, "message" => "Utilisateur créé avec succès"]);
            } else {
                echo json_encode(["success" => false, "message" => "Échec de la création de l'utilisateur"]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Données invalides."]);
        }
        break;

    /*
      * Chemin : PUT /api/utilisateurs/{id}
      * Tâche : mettre à jour un utilisateur
      */
    case ($method == 'PUT' && preg_match('/\/api\/utilisateurs\/[1-9]/', $uri)):
        $input = file_get_contents("php://input");
        parse_str($input, $data);


        if (empty($data)) {
            echo json_encode(["success" => false, "message" => "Données non valides ou manquantes."]);
            break;
        }


        $array = explode('/', $uri);
        $id = end($array);


        $result = $uc->updateUtilisateur($id, $data);


        if ($result) {
            echo json_encode(["success" => true, "message" => "Utilisateur mis à jour!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Échec de la mise à jour de l'utilisateur"]);
        }
        break;

    /*
    * Chemin : DELETE /api/utilisateurs/{id}
    * Tâche : supprimer un utilisateur
    */
    case ($method == 'DELETE' && preg_match('/\/api\/utilisateurs\/[1-9]/', $uri)):
        $array = $explode;
        $id = end($array);
        $result = $uc->deleteUtilisateur($id);
        if ($result) {
            echo json_encode(["success" => true, "message" => "Utilisateur éliminer avec succès"]);
        } else {
            echo json_encode(["success" => false, "message" => "Échec de l'élimination de l'utilisateur"]);
        }
        break;

    case ($method == 'POST' && $uri == '/api/abonnements'):
        header('Content-Type: application/json');
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        if (!$data) {
            $data = ['courriel' => trim($input)];
        }
        if (!isset($data['courriel']) || !filter_var($data['courriel'], FILTER_VALIDATE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                "success" => false,
                "message" => "Données invalides ou courriel manquant."
            ]);
            break;
        }
        $result = $ac->createAbonnement($data);

        if ($result) {
            echo json_encode([
                "success" => true,
                "message" => "Abonnement créé avec succès",
                "id" => $result
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Erreur lors de la création de l'abonnement."
            ]);
        }
        break;

//    case ($method == 'GET' && $uri = "/api/"):
//        require("login.php");
//        break;
//

    default:
        require("404.php");
        echo "Erreur : Chemin non reconnu ou non pris en charge.";
        break;

    /*
    * Chemin : ?
    * Tâche : ce chemin ne correspond à aucun des chemins définis
    *        lancer une erreur
    */

}


