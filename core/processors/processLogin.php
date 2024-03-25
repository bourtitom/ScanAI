<?php 

require_once('../funcs.php');

// Vérifie si la méthode de la requête est POST et si les champs email et password sont définis.

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'], $_POST['password']))
{

    if(secureLogin($_POST['email'], $_POST['password'])){

        // Si la connexion est réussie, initialise la session de l'utilisateur avec ses informations.
        $_SESSION['user'] = [
            'status' => "connected",
            'email' => htmlspecialchars($_POST['email'])
        ];

        header('Location: ../../profil.php');

    }
    else{
        // Si la connexion echoue => message d'erreur
        
    }



}
else{
    // ERROR MSG
}
?>
