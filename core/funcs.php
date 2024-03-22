<?php
session_start();
define('BASE_PATH', __DIR__);
include(BASE_PATH . '/database.php');
include(BASE_PATH . '/components.php');


/*
Fonction permettant de s'enregistrer sur le site internet

params : email & password (donnés post reçus)
*/
function secureRegistration($email, $password)
{
    global $pdo;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (isStrongPassword($password)) {
            // Informations validées par notre algo

            try {
                // Préparation de la requête SQL
                $sql = "INSERT INTO users (email, password, last_connexion, date_registered) VALUES (:email, :password, NOW(), NOW())";
                $stmt = $pdo->prepare($sql);

                // Hash du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Liaison des valeurs
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

                // Exécution de la requête
                $stmt->execute();
                

                // Renvoyer true car l'enregistrement a été une réussite ! 
                return true;
            } catch (PDOException $e) {
                // Renvoyer l'erreur
                return "Erreur Interne lors de l'inscription";
            }
        } else {
             // Renvoyer l'erreur
            return "Le mot de passe renseigné ne correspond pas aux critères requis";
        }
    } else {
         // Renvoyer l'erreur
        return "Adresse e-mail incorrecte";
    }
}


function secureLogin($email, $password)
{
    global $pdo;
    
    // Nettoyer les entrées
    $cleanEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

    // Préparation de la requête SQL
    $sql = "SELECT id, email, password FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);

    // Liaison des valeurs
    $stmt->bindParam(':email', $cleanEmail, PDO::PARAM_STR);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // Connexion réussie, renvoyer True
        return true;
    } else {
        // Échec de la connexion
        return "Échec de la connexion, vérifiez votre mot de passe ou votre adresse e-mail ";
    }
}


?>