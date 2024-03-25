<?php 
require_once('../funcs.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'], $_POST['password'], $_POST['passwordConfirm'])) {

    if ($_POST['password'] === $_POST['passwordConfirm']) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $registerResponse = secureRegistration($email, $password);

        if ($registerResponse['status'] === true) {
            // Enregistrement réussi, initialise la session de l'utilisateur.
            $_SESSION['user'] = [
                'status' => "connected",
                'id' => $registerResponse['id'],
                'email' => $email
            ];
            header('Location: ../../profil.php');
        } else {
            // Si l'enregistrement échoue, affiche le message d'erreur.
            // Utiliser $registerResponse['message'] pour informer l'utilisateur du problème.
        }
    } else {
        // Les mots de passe ne correspondent pas, affiche un message d'erreur.
    }
} else {
    // Si la méthode n'est pas POST ou si tous les champs requis ne sont pas définis, affiche un message d'erreur.
}
?>
