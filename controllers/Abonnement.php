<?php


use models\AbonnementModel;
require "models/AbonnementModel.php";

class Abonnement
{

    private $model;

    public function __construct($database)
    {

        $this->model = new AbonnementModel($database);


    }
    public function getAllAbonnements()
    {
        return $this->model->getAllAbonnements();
    }

    public function createAbonnement($data)
    {
        return $this->model->createAbonnement($data);

    }



}
