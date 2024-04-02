<?php
require('../models/dao/DaoUsers.php');

class ControllerUsers
{
    //on déclare un attribut de type daoUsers
    private $daoUsers;

    public function __construct()
    {
        //on instancie un objet de type daoUsers
        //en utilisant la variable $daoUsers
        $this->daoUsers = new DaoUsers();
    }

    //on déclare les methodes d'affichage de formulaire 
    public function showLogin()
    {
        require('../views/Login.php');
    }
    public function showTrad()
    {
        require('../views/trad.php');
    }
    public function showRegister()
    {
        require('../views/Register.php');
    }
      
    public function showProfil()
    {
        require('../views/profil.php');
    }
  

    // on déclare les methodes de traitement des données
    public function login()
    {
       //On récupère la methode de daoUsers qui recherche les clients
        //et qui les retourne sous forme de variable $contenu que l'on passe à la vue concernée.
        $contenu = $this->daoUsers->login();

        header('Location: ../index.php');
    }
    public function register()
    {
       //On récupère la methode de daoUsers qui recherche les clients
        //et qui les retourne sous forme de variable $contenu que l'on passe à la vue concernée.
        $contenu = $this->daoUsers->createuser();

        header('Location: ../index.php');
    }
}