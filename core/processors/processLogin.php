<?php 
require_once('../funcs.php');

// Vérifie si la méthode de la requête est POST et si les champs email et password sont définis.
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'], $_POST['password'])) {

    $loginResult = secureLogin($_POST['email'], $_POST['password']);

    if ($loginResult['status']) {
        // Si la connexion est réussie, initialise la session de l'utilisateur avec ses informations.
        $_SESSION['user'] = [
            'status' => "connected",
            'id' => $loginResult['id'], // Stocke également l'ID de l'utilisateur.
            'email' => htmlspecialchars($loginResult['email'])
        ];  

        header('Location: ../../profil.php');
    } else {
        // Si la connexion échoue, affiche le message d'erreur.
        echo $loginResult['message'];
    }
} else {
    // Affiche un message d'erreur général si la méthode n'est pas POST ou si les champs requis ne sont pas définis.
}


?>
