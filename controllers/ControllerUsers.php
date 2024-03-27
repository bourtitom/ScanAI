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

    /** Affichage du formulaire de création d'un client **/
    public function showCreate()
    {
        //On appelle la méthode qui permet d'afficher la barre de recherche
        $recherche = $this->daoUsers->rechercheClient();
        //On appelle le formulaire de création de client
        require('../views/CreerClient.php');
    }



    /** Affichage des clients **/
    public function showAll()
    {
        //On appelle la méthode qui permet d'afficher la barre de recherche
            if($_SESSION["client"]['id'] == 0){
                $recherche = $this->daoUsers->rechercheClient();
                $contenu = $this->daoUsers->afficherClients();

            }
            if($_SESSION["client"]['id'] !== 0){
//                $where = $_GET['client'];
                $contenu = $this->daoUsers->afficherClients();

            }
             //On récupère la methode de daoUsers qui recherche les clients
        //et qui les retourne sous forme de variable $contenu que l'on passe à la vue concernée.
        require('../views/Layout.php');
    }
    /** Affichage du formulaire de modification **/
    public function showModify()
    {
        //On appelle la méthode qui permet d'afficher la barre de recherche
            $recherche = $this->daoUsers->rechercheClient();

        //On appelle la méthode de la classe daoUsers qui retourne le client concerné
        $client = $this->daoUsers->afficherFormModif();
        //On récupère $client et on le passe à la vue concernée
        require('../views/ModifierClient.php');
    }

    /** enregistrement des modifications dans la bdd **/
    public function update()
    {
        //On appelle la méthode qui permet d'afficher la barre de recherche
            $recherche = $this->daoUsers->rechercheClient();

             //On appelle la méthode qui permet de mettre à jour le client dansdaoUsers
        $where = $this->daoUsers->updateClient();
        //On récupère $contenu et on le passe à la vue concernée
        $contenu = $this->daoUsers->afficherClients();
        require('../views/Layout.php');
    }


    /** Suppression d'un client **/
    public function delete()
    {
        //On appelle la méthode qui permet de supprimer le client
        $this->daoUsers->deleteClient();
        //On appelle la méthode qui permet d'afficher la barre de recherche
            $recherche = $this->daoUsers->rechercheClient();


        //On récupère $contenu et on le passe à la vue concernée
        $contenu = $this->daoUsers->afficherClients();
        require('../views/Layout.php');
    }

    public function showLogin()
    {
        require('../views/Login.php');
    }
    
    public function showRegister()
    {
        require('../views/Register.php');
    }
      
    public function showProfil()
    {
        require('../views/profil.php');
    }
  
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