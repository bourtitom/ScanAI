<?php
require_once('../config/config.php');
require_once('FonctionsBdd.php');
require_once('../utilitaires/FonctionsUtiles.php');
require_once('../models/Users.php');
//***********************************************users  user  user
//***********************************************user  user  user
//***********************************************user  user  user
class DaoUsers
{
    private $maConnection;

    public function __construct()
    {
        //INSTANCIATION DE LA CONNEXION PAR APPEL AU CONSTRUCTEUR PDO ET VALORISATION DES ATTRIBUTS
        $this->maConnection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        //PARAMETRAGE POUR AFFICHAGE DES ERREURS RELATIVES A LA CONNEXION
        $this->maConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

//CETTE FONCTION PERMET DE CREER UN NOUVEAU user
    function createuser(): string
    {

        $query = $this->maConnection->prepare("INSERT INTO `users`(`email`,`password`) values(?, ?)");
        //ON APPELLE LA FONCTION QUI VA  EXECUTER LA REQUETE
        $result = $query->execute(array(
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_BCRYPT),
        ));

        return $this->maConnection->lastInsertId();
    }

//CETTE FONCTION PERMET DE METTRE A JOUR UN user
    function updateuser(): string
    {


        $user = new user($_POST['userId'], $_POST['userPrenom'], $_POST['userNom'], $_POST['userNaissance'], $_POST['userMail'], password_hash($_POST['userPassword'], PASSWORD_BCRYPT));

        $query = $this->maConnection->prepare("UPDATE user SET user_PRENOM = ?, user_NOM = ? , user_NAISSANCE = ? , user_MAIL= ? , user_PASSWORD = ?  WHERE user_ID = ? ");
        //ON APPELLE LA FONCTION QUI VA  EXECUTER LA REQUETE
        $result = $query->execute(array(
            $user->getuserPrenom(),
            $user->getuserNom(),
            $user->getuserNaissance(),
            $user->getuserMail(),
            $user->getuserPassword(),
            $user->getuserId()

        ));
        //ON RENVOIE L ID DU user AU CONTROLEUR POUR QU il LE TRANSMETTE A LA VUE AFFICHERuserS
        return $where = "user_ID=" . $user->getuserId();
    }


//CETTE FONCTION PERMET DE SUPPRIMER UN user
    function deleteuser(): void
    {

        $query = $this->maConnection->prepare("DELETE FROM user WHERE user_ID = ?");
        $result = $query->execute(array(
            $_POST['userId']
        ));
    }
    function resultToObjects($result)
    {   //ON RECUPERE LE RÉSULTAT DE LA REQUETE DANS UN TABLEAU
        //QUI CONTIENDRA 1 OU PLUSIEURS OBJETS DE TYPE PRODUIT
        $listusers = array();
        foreach ($result as $row) {
            $user = new Users($row['id'], $row['email'], $row['password'],$row['last_connexion'],$row['date_registered']);
            array_push($listusers, $user);
        }
        return $listusers;
    }
    function getUserById($id): array
    {
        $query = $this->maConnection->prepare("SELECT id,email, password, last_connexion , date_registered 
                                    FROM users
                                    WHERE id=?");

        $query->execute(array(
            $id));
        $result = $query->fetchAll();
        //ON TRANSFORME LE RESULTAT EN TABLEAU CONTENANT UN OU PLUSIEURS OBJETS DE TYPE PRODUIT
        return $this->resultToObjects($result);
    }
    function getUserByEmail($email): array
    {
        $query = $this->maConnection->prepare("SELECT id,email, password, last_connexion , date_registered 
                                    FROM users
                                    WHERE email=?");

        $query->execute(array(
            $email));
        $result = $query->fetchAll();
        //ON TRANSFORME LE RESULTAT EN TABLEAU CONTENANT UN OU PLUSIEURS OBJETS DE TYPE PRODUIT
        return $this->resultToObjects($result);
    }

    function getAll(): array
    {
        $query = $this->maConnection->prepare("SELECT user_ID,user_PRENOM, user_NOM, user_NAISSANCE , user_MAIL , user_PASSWORD
                                    FROM user");
        $query->execute();
        $result = $query->fetchAll();
        //ON TRANSFORME LE RESULTAT EN TABLEAU CONTENANT UN OU PLUSIEURS OBJETS DE TYPE PRODUIT
        return $this->resultToObjects($result);
    }
    //CETTE FONCTION RENVOIE UN TABLEAU CONTENANT UN OU PLUSIEURS OBJETS DE TYPE user

    //CETTE FONCTION VERIFIE LE LOGIN ET MET LE user EN SESSION
    function login()
    {
       $tuser = $this->getUserByEmail($_POST['email']);
        
       var_dump($tuser);
       $ok = false;

        //SI LE TABLEAU CONTIENT UN ELEMENT
        //ON VERIFIE QUE LE MOT DE PASSE FOURNI (POST) CORRESPOND AU MOT DE PASSE CRYPTE DANS LA BASE DE DONNEES
        //SI TOUT EST BON ON PASSE LE BOOLEEN ok A TRUE
        if (count($tuser) == 1) {
            $user = $tuser[0];
            if (password_verify($_POST['password'], $user->getPassword())) {
                $ok = true;

            }
        }

        //SI ok EST FALSE, ON RETOURNE UN MESSAGE D'ERREUR
        if (!$ok) {
            return "LE LOGIN EST ERRONE";
        
        }
        //SINON ON MET LE CLIENT EN SESSION ET ON APPELLE LA FONCTION QUI PERMETTRA
        //DE L'AFFICHER DANS "Layout'
        else {
            $_SESSION["user"] = [
                "id" => $user->getId(),
                "email" => $user->getEmail(),
            ];
        }
    }


    function afficherusers($Iduser = null): string
    {
            $lesusers = array();
         if ($Iduser !== null) {

            /* récupérer les données du formulaire en utilisant
           la valeur des attributs name comme clé */
             $lesusers = $this->getUserById($Iduser);
        }
        if (isset($_SESSION['user']) ) {

                $lesusers = $this->getAll();

        }
        else if (!empty($_POST['nomuser'])) {
            /* récupérer les données du formulaire en utilisant
               la valeur des attributs name comme clé
              */

            $lesusers = $this->getUserById($_POST['nomuser']);
        }


        //ON AFFICHE LE HTML POUR LE FICHIER "Afficherusers"
        if($_SESSION["user"]['id'] !== 0){
            $contenu =
                "<section id='slogan'>
    <h2>Mon Profil</h2></div ></section><div id='menu'>";

        }if($_SESSION["user"]['id'] == 0){
        $contenu =
            "<section id='slogan'>
    <h2>Catalogue users</h2></div ></section><div id='menu'>";

        }

        foreach ($lesusers as $user) {
            $id = $user->getuserId();
            $naissance = strftime('%d/%m/%Y', strtotime($user->getuserNaissance()));
            $signe = $user->getuserSigne();
            $contenu .= "<article class='article' >
        <div class='container' ><img class='image' src = '../assets/img/" . $signe . " ' alt=''></div >
         <h2 > " . $user->getuserPrenom() . ' ' . $user->getuserNom() . "</h2 >
         <p style='text-align: center;'> date de naissance " . $naissance . " 
         <br>" . $user->getuserAge() . " ANS</p><br>
        <button id='submit'>
            <a href = '../controllers/Controller.php?todo=modifieruser&id=$id'>MODIFIER OU SUPPRIMER LE user</a>
        </button><br> ";


            if (isset($_SESSION["user"])) {
                $contenu .= "<a href = '../controllers/Controller.php?todo=commencerCommande'>PASSER UNE COMMANDE</a>";
            }
            $contenu .= "</article > ";

        }
        return $contenu;
    }


//CETTE FONCTION PERMET D'AFFICHER UN FORMULAIRE DE RECHERCHE DE userS
    function rechercheuser(): string
    {    //ON APPELLE LA FONCTION QUI VA FAIRE LA REQUETE AUPRES DE LA BASE DE DONNEES
        //CETTE FONCTION RENVOIE TOUS LES user SOUS FORME DE TABLEAU D'OBJETS
        $lesusers = $this->getAll();

        //ON AFFICHE LE HTML POUR LE FICHIER "Modifierusers"
        $recherche = "
<form name='searchProduct' action='../controllers/Controller.php' method='post' class='search-form'>
            <input type='hidden' name='todo' value='afficherusers'>
    <label for='nomuser' hidden></label>
    <select name='nomuser' id='nomuser' class='header-select' onchange='this.form.submit()'>
        <option value=''>Choisir un user</option>";
        foreach ($lesusers as $user) {
            $recherche .= "<option value=" . $user->getuserId() . ">" . $user->getuserPrenom() . ' ' . $user->getuserNom() . "</option>";
        }

        $recherche .= "</select>
</form>";

        return $recherche;
    }

//CETTE FONCTION PREND EN GET DANS L URL UN ID user
//ET RENVOIE user
    function afficherFormModif(): user
    {

        //ON APPELLE LA FONCTION QUI VA FAIRE LA REQUETE AUPRES DE LA BASE DE DONNEES
        //CETTE FONCTION RENVOIE UN TABLEAU CONTENANT LE user A MODIFIER
        //ON RETOURNE CET OBJET user AU CONTROLEUR QUI A APPELLE LA FONCTION
        //LE CONTROLEUR RETOURNERA L'OBJET A LA VUE "Modifieruser";
        return $this->getUserById($_GET['id'])[0];

    }

    function secureRegistration($email, $password)
{

    // Vérifie si l'adresse e-mail est valide.
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Vérifie si le mot de passe est assez fort selon les critères définis.
        die($email);
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

                // Récupère l'ID de l'utilisateur nouvellement créé.
                $userId = $pdo->lastInsertId();
                // Si tout se passe bien, retourne l'ID de l'utilisateur.
                return [
                    'status' => true,
                    'id' => $userId
                ];
            } catch (PDOException $e) {
                // Gestion des erreurs liées à la base de données.
                return [
                    'status' => false,
                    'message' => "Erreur Interne lors de l'inscription"
                ];
            }
        } else {
            // Le mot de passe ne répond pas aux exigences de sécurité.
            return [
                'status' => false,
                'message' => "Le mot de passe renseigné ne correspond pas aux critères requis"
            ];
        }
    } else {
        // L'adresse e-mail n'est pas valide.
        return [
            'status' => false,
            'message' => "Adresse e-mail incorrecte"
        ];
    }
}


}