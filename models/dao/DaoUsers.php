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
        $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];
        $passwordConfirm = $_POST["passwordConfirm"];
        if ($password != $passwordConfirm) {
            $_SESSION['error'] = "Erreur : Les mots de passe ne correspondent pas.";
            header('Location: Controller.php?todo=AfficherRegister');
            exit();
        }
        if ($email == false) {
            $_SESSION['error'] = "Erreur : Email invalide.";
            header('Location: Controller.php?todo=AfficherRegister');
            exit();
        }
        if (strlen($password) < 8) {
            $_SESSION['error'] = "Erreur : Le mot de passe doit contenir au moins 8 caractères.";
            header('Location: Controller.php?todo=AfficherRegister');
            exit();
        }
        if (strlen($password) > 20) {
            $_SESSION['error'] = "Erreur : Le mot de passe doit contenir au maximum 20 caractères.";
            header('Location: Controller.php?todo=AfficherRegister');
            exit();
        }
        if (strlen($email) > 50) {
            $_SESSION['error'] = "Erreur : L'email doit contenir au maximum 50 caractères.";
            header('Location: Controller.php?todo=AfficherRegister');
            exit();
        }
        $tuser = $this->getUserByEmail($_POST['email']);
        if (count($tuser) == 1) {
            $_SESSION['error'] = "Erreur : Email déjà utilisé.";
            header('Location: Controller.php?todo=AfficherRegister');
            exit();
        }

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


        $query = $this->maConnection->prepare("UPDATE users SET email = ?  WHERE id = ? ");
        //ON APPELLE LA FONCTION QUI VA  EXECUTER LA REQUETE
        $result = $query->execute(array(
            $_POST['email'],
            $_POST['id']
        ));
        //ON RENVOIE L ID DU user AU CONTROLEUR POUR QU il LE TRANSMETTE A LA VUE AFFICHERuserS
        return $where = "user_ID=" .  $_POST['id'];
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
        $query = $this->maConnection->prepare("SELECT * 
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
    function trad()
    {
        $url = 'http://37.221.65.85:8001/translate_image';
        $imagePath = $_SESSION["ImgScan"];
        $curl = curl_init($url);
        $cfile = new CURLFile(realpath($imagePath), 'image/jpeg', 'test_image.jpg');

        $data = array('image' => $cfile);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60); // Temps en secondes
        curl_setopt($curl, CURLOPT_BUFFERSIZE, 12800); // Taille du buffer en octets

        // Envoyer la requête et récupérer la réponse
        $response = curl_exec($curl);

        // Vérifier s'il y a eu une erreur
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
            echo "Erreur cURL : " . $error_msg;
        } else {
            // Si pas d'erreur, décoder la réponse (supposant que la réponse est un JSON avec une clé 'image_base64')
            $responseArray = json_decode($response, true);
            if (isset($responseArray['image_base64'])) {
                $imageBase64 = $responseArray['image_base64'];
                // Afficher l'image en utilisant une balise img avec la source en base64
                echo '<img src="data:image/jpeg;base64,' . $imageBase64 . '" />';
            } else {
                echo "La réponse de l'API ne contient pas d'image en base64.";
            }
        }

        // Fermer la session cURL
        curl_close($curl);

    }

    function update(){
        $tuser = $this->getUserById($_POST['id'])[0];
   
        if(!password_verify($_POST['password'], $tuser->getPassword())){
            if($_POST['password'] != "" && $_POST['email'] != $tuser->getEmail()){  // SI LE MOT DE PASSE EST DIFFERENT DE VIDE ALORS ON MET A JOUR L'EMAIL ET LE MOT DE PASSE
                $query = $this->maConnection->prepare("UPDATE users SET email = ? , password = ?  WHERE id = ?");
                $result = $query->execute(array(
                    $_POST['email'],
                    password_hash($_POST['password'], PASSWORD_BCRYPT),
                    $_POST['id']
                ));
                $_SESSION['user']['email'] = $_POST['email'];
            }else if($_POST['password'] != "" && $_POST['email'] == $tuser->getEmail()){
                $query = $this->maConnection->prepare("UPDATE users SET password = ?  WHERE id = ?");
                $result = $query->execute(array(
                    password_hash($_POST['password'], PASSWORD_BCRYPT),
                    $_POST['id']
                ));
            }
            else if($_POST['password'] == "" && $_POST['email'] != $tuser->getEmail()){
                $query = $this->maConnection->prepare("UPDATE users SET email = ?  WHERE id = ?");
                $result = $query->execute(array(
                    $_POST['email'],
                    $_POST['id']
                ));
                $_SESSION['user']['email'] = $_POST['email'];
            }else{
                $_SESSION['error'] = "Erreur : Le mot de passe est vide ou l'email est le meme.";
                header('Location: Controller.php?todo=myProfil');
                exit();
            }
           
        }else{
            $_SESSION['error'] = "Erreur : Le mot de passe est le même.";
            header('Location: Controller.php?todo=myProfil');
            exit();
        }
    }
    
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
            $_SESSION['error'] = "Erreur : Email ou mot de passe incorrect.";
            header('Location: Controller.php?todo=AfficherLogin');
            exit();

        }
        //SINON ON MET LE CLIENT EN SESSION ET ON APPELLE LA FONCTION QUI PERMETTRA
        //DE L'AFFICHER DANS "Layout'
        else {
            $_SESSION["user"] = [
                "id" => $user->getId(),
                "email" => $user->getEmail(),
            ];
            header('Location: ../index.php');

        }
    }





}