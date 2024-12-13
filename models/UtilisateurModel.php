<?php

namespace models;

use PDO;

class UtilisateurModel
{
    private $db;

    public function __construct($database) {
        $this->db = $database;

    }
    public function getAllUtilisateurs() {
        $sql = "SELECT * FROM `utilisateurs`";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }



    function getUtilisateurByCourriel($courriel) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE courriel= ?");
        $stmt->execute([$courriel]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }



    public function getUtilisateurById($id) {
        $stmt = $this->db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createUtilisateur($data) {
        $stmt = $this->db->prepare("INSERT INTO utilisateurs (nom, prenom, courriel, password) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$data['nom'], $data['prenom'], $data['courriel'], $data['password']]);

    }

    public function updateUtilisateur($id, $data) {
        $stmt = $this->db->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, courriel = ? WHERE id = ?");
        return $stmt->execute([$data['nom'], $data['prenom'], $data['courriel'],  $id]);
    }

    public function deleteUtilisateur($id) {
        $stmt = $this->db->prepare("DELETE FROM utilisateurs WHERE id = ?");
        return $stmt->execute([$id]);
    }
}