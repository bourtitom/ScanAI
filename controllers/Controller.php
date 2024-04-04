<?php
session_start();
require('ControllerProduit.php');
require('ControllerUsers.php');


//ON INSTANCIE UN OBJET DE TYPE CONTROLLERCLIENT & CONTROLLERPRODUIT
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
            //on accede a la page d'abonnement
            $cp->showAbo();
            break;
        }
        case
        "myProfil":
        {
            //on affiche le profil de l'utilisateur en session
            $cc->showProfil();
            break;
        }

        case "AfficherLogin":
            {
                //On affiche le formulaire de connexion
                $cc->showLogin();
                break;
            }

          case "AfficherRegister":
            {
                //on affiche le formulaire d'inscription
                $cc->showRegister();
                break;
            }
            case "AfficherTrad":
                {
                    //on affiche le formulaire d'inscription
                    $cc->showTrad();
                    break;
                }
        
        // L'UTILISATEUR A CLIQUE "se déconnecter"
        case "deconnexion":
        {
            //on détruit la session
            session_destroy();
            //On redirige vers la page d'accueil
            header('Location: ../index.php');
            break;
        }

        //GESTION DES CAS D'ERREURS
        default :
        {
            require('../views/404.php');
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
         case  "Trad":
        {
            //On appelle la méthode concernée dans la classe ControllerClient pour traduire
            $cc->trad();
            break;
        }

        // L UTILISATEUR A CLIQUE SUR L'ICONE "SE CONNECTER"
        case "seConnecter":
        {
            //On appelle  la méthode concernée dans la classe ControllerClient
            $cc->login();
            break;
        }

        // L UTILISATEUR A CLIQUE SUR L'ICONE "Update profil"
        case "updateProfil":
            {
                //On appelle  la méthode concernée dans la classe ControllerClient
                $cc->update();
                break;
            }
        //GESTION DES CAS D'ERREURS
        default :
        {
            require('../views/404.php');
            break;
        }

    }//**********************  FIN  DU  SWITCH
}// FIN DES REQUETES EN POST VIA LES FORMULAIRES
//*************************************************
//*************************************************
//*************************************************
