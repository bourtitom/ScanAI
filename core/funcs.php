<?php
session_start();
define('BASE_PATH', __DIR__);
include(BASE_PATH . '/database.php');
include(BASE_PATH . '/components.php');


/*
 * Fonction pour enregistrer un nouvel utilisateur dans la base de données.
 * Valide l'email et le mot de passe avant de les insérer dans la base de données.
 * 
 * @param string $email Email de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.
 * @return mixed Retourne true en cas de succès, une chaîne de caractères contenant un message d'erreur sinon.
 */
function secureRegistration($email, $password)
{
    global $pdo; // Utilisation de l'objet PDO global pour la connexion à la base de données.

    // Vérifie si l'adresse e-mail est valide.
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Vérifie si le mot de passe est assez fort selon les critères définis.
        if (isStrongPassword($password)) {
            try {
                // Préparation de la requête SQL pour insérer le nouvel utilisateur.
                $sql = "INSERT INTO users (email, password, last_connexion, date_registered) VALUES (:email, :password, NOW(), NOW())";
                $stmt = $pdo->prepare($sql);

                // Hashage du mot de passe pour le stocker de manière sécurisée.
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Liaison des paramètres à la requête.
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

                // Exécution de la requête.
                $stmt->execute();

                // Si tout se passe bien, retourne vrai.
                return true;
            } catch (PDOException $e) {
                // Gestion des erreurs liées à la base de données.
                return "Erreur Interne lors de l'inscription";
            }
        } else {
            // Le mot de passe ne répond pas aux exigences de sécurité.
            return "Le mot de passe renseigné ne correspond pas aux critères requis";
        }
    } else {
        // L'adresse e-mail n'est pas valide.
        return "Adresse e-mail incorrecte";
    }
}

/*
 * Fonction pour connecter un utilisateur existant.
 * Vérifie si l'email et le mot de passe correspondent à un utilisateur en base de données.
 * 
 * @param string $email Email de l'utilisateur.
 * @param string $password Mot de passe de l'utilisateur.
 * @return mixed Retourne true en cas de connexion réussie, un message d'erreur sinon.
 */
function secureLogin($email, $password)
{
    global $pdo; // Utilisation de l'objet PDO global pour la connexion à la base de données.

    // Nettoyage de l'email pour éviter les injections XSS.
    $cleanEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');

    try {
        // Préparation de la requête SQL pour récupérer l'utilisateur par son email.
        $sql = "SELECT id, email, password FROM users WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);

        // Liaison de l'email à la requête.
        $stmt->bindParam(':email', $cleanEmail, PDO::PARAM_STR);

        // Exécution de la requête.
        $stmt->execute();

        // Récupération de l'utilisateur depuis la base de données.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification de l'existence de l'utilisateur et de la validité du mot de passe.
        if ($user && password_verify($password, $user['password'])) {
            // Si les informations sont correctes, retourne vrai.
            return true;
        } else {
            // Informations incorrectes, connexion échouée.
            return "Échec de la connexion, vérifiez votre mot de passe ou votre adresse e-mail ";
        }
    } catch (PDOException $e) {
        // Gestion des erreurs liées à la base de données.
        return "Erreur de connexion à la base de données";
    }
}


?>