<?php
session_start();
require('ControllerProduit.php');
require('ControllerUsers.php');


//ON INSTANCIE UN OBJET DE TYPE ControllerProduit
$cp = new ControllerProduit();
$cc = new ControllerUsers();


// ************************************************************************
// *****************   REQUETES EN GET VIA URL  ***************************
//RECUPERATION DE L ACTION A ACCOMPLIR VIA L'URL
if (isset($_GET['todo'])) {
    switch ($_GET['todo']) {

        case
        "abonnement":
        {
            //On appelle la méthode concernée dans la classe ControllerProduit
            $cp->showAbo();
            break;
        }
        case
        "myProfil":
        {
            //On appelle la méthode concernée dans la classe ControllerProduit
            $cc->showProfil();
            break;
        }

        // L'UTILISATEUR A CLIQUE SUR LE LIEN "voir le catalogue des produits" dans le menu
        case "AfficherLogin":
            {
                //On appelle la méthode concernée dans la classe ControllerProduit
                $cc->showLogin();
                break;
            }
          // L'UTILISATEUR A CLIQUE SUR LE LIEN "voir le catalogue des produits" dans le menu
          case "AfficherRegister":
            {
                //On appelle la méthode concernée dans la classe ControllerProduit
                $cc->showRegister();
                break;
            }
    
        // L'UTILISATEUR A CLIQUE "se déconnecter"
        case "deconnexion":
        {
            //On appelle la méthode concernée dans la classe ControllerPanier
            session_destroy();
            //On redirige vers le layout
            header('Location: ../index.php');
            break;
        }

        //GESTION DES CAS D'ERREURS
        default :
        {
            echo "erreur de redirection!!!";
            break;
        }

    }//**********************  FIN  DU  SWITCH
}// FIN DES REQUETES EN GET VIA URL
//*************************************************
//*************************************************
//*************************************************


//*************************************************
//*************************************************
//*************************************************
//*************************************************
// REQUETES EN POST VIA FORMULAIRES
if (isset($_POST['todo'])) {

    switch ($_POST['todo']) {

        case  "CreerCompte":
        {
            //On appelle la méthode concernée dans la classe ControllerClient
            $cc->register();
            break;
        }

        // L UTILISATEUR A CLIQUE SUR L'ICONE "SE CONNECTER"
        case "seConnecter":
        {
            //On appelle  la méthode concernée dans la classe ControllerClient
            $cc->login();
            break;
        }
        //GESTION DES CAS D'ERREURS
        default :
        {
            echo "erreur de redirection!!!";
            break;
        }

    }//**********************  FIN  DU  SWITCH
}// FIN DES REQUETES EN POST VIA LES FORMULAIRES
//*************************************************
//*************************************************
//*************************************************
