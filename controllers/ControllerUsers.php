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
    public function trad()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
            $upload_dir = "../assets/img/"; // Remplacez cela par le chemin réel de votre répertoire assets sur le serveur
            
            // Obtient les informations du fichier
            $file_name = $_FILES["image"]["name"];
            $file_tmp = $_FILES["image"]["tmp_name"];
            $file_type = $_FILES["image"]["type"];
            
            // Vérifie si c'est bien une image
            $allowed_types = array("image/jpeg", "image/png", "image/gif");
            if (in_array($file_type, $allowed_types)) {
                // Déplace le fichier téléchargé vers le répertoire d'assets sur le serveur
                move_uploaded_file($file_tmp, $upload_dir . "/" . $file_name);
                echo "L'image a été téléchargée avec succès.";
            } else {
                echo "Seuls les fichiers de type JPEG, PNG et GIF sont autorisés.";
            }
        } else {
            echo "Erreur : Aucune image n'a été sélectionnée ou le formulaire n'a pas été soumis correctement.";
        }
        $this->daoUsers->trad();

        header('Location: ../index.php');
    }
    public function update()
    {
        $this->daoUsers->update();
        header('Location: Controller.php?todo=myProfil');

    }

    // on déclare les methodes de traitement des données
    public function login()
    {
       //On récupère la methode de daoUsers qui recherche les clients
        //et qui les retourne sous forme de variable $contenu que l'on passe à la vue concernée.
        $this->daoUsers->login();
        
    }
    public function register()
    {
       //On récupère la methode de daoUsers qui recherche les clients
        //et qui les retourne sous forme de variable $contenu que l'on passe à la vue concernée.
        $this->daoUsers->createuser();

        header('Location: ../index.php');
    }
}