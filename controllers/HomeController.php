<?php
include_once '../config/database.php';
include_once '../models/News.php';

class HomeController
{
    private $newsModel;

    public function __construct()
    {
        $database = new Database();
        $this->newsModel = new News($database->pdo);
    }

    public function index()
    {
        //For Dũng béo
    }

    public function detail($id) {
        //For Dũng béo
    }

    public function logout()
    {
        //For Nam gay
        session_start();
        session_unset();
        session_destroy();
        header("Location: /views/admin/login.php");
        exit();

    }
}

?>