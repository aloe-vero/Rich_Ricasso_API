<?php

namespace models;

class AbonnementModel {

    private $db;

    public function __construct($database) {
        $this->db = $database;
    }



    public function createAbonnement($data) {

        $sql = "INSERT INTO abonnements (courriel) VALUES (?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$data['courriel']]);
    }



}