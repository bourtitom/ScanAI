<?php 

require_once('../funcs.php');

// Vérifie si la méthode de la requête est POST et si les champs email, password et passwordConfirm sont définis.
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['email'], $_POST['password'], $_POST['passwordConfirm']))
{

    if($_POST['password'] == $_POST['passwordConfirm'])
    {
        $registerResponse = secureRegistration(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password']));
        if($registerResponse === true)
        {
            $_SESSION['user'] = [

                'status' => "connected",
                'email' => htmlspecialchars($_POST['emailid'])
            ];
            header('Location: ../../profil.php');
        }
        else{
            // Si l'enregistrement échoue, MESSAGE ERREUR
        }
    }
    else{
                // Les mots de passe ne correspondent pas. 
    }



}
else{
        // Si la méthode n'est pas POST ou si tous les champs requis ne sont pas définis,
}
?>
