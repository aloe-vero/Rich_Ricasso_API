<?php

namespace models;

use PDO;

class ProduitModel
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getAllProduits()
    {

        $sql = "SELECT * FROM `produits`ORDER BY `produits`.`type` DESC;";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getProduitByType($type){
        $sql = "SELECT * FROM `produits` WHERE `type` = :type;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduitsFiltrer($data)
    {
        $stmt = $this->db->prepare("SELECT * FROM produits WHERE type LIKE :type AND (prix BETWEEN :prixMin AND :prixMax) AND couleur LIKE :couleur AND taille LIKE :taille;");
        $stmt->execute([$data['type'],$data['prixMin'],$data['prixMax'],$data['taille'],$data['couleur']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getProduitById($id){
        $stmt = $this->db->prepare('SELECT * FROM produits WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createProduit($data)
    {
        $stmt = $this->db->prepare("INSERT INTO produits (type, nom, image, description, prix, couleur, taille) VALUES (?, ?, ?, ?,?,?,?)");
        return $stmt->execute([$data['type'], $data['nom'], $data['image'], $data['description'], $data['prix'], $data['couleur'], $data['taille']]);

    }

    public function updateProduit($id, $type, $nom, $image, $description, $prix, $taille, $couleur)
    {
        $sql = "UPDATE produits SET type=:type, nom=:nom, image=:image, description= :description, prix = :prix, taille = :taille, couleur = :couleur WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':type', $type, PDO::PARAM_STR);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':prix', $prix, PDO::PARAM_STR);
        $stmt->bindValue(':taille', $taille, PDO::PARAM_STR);
        $stmt->bindValue(':couleur', $couleur, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    }

    public function deleteProduit($id)
    {
        $sql = "DELETE FROM produits WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        return $stmt->execute();
    }
}