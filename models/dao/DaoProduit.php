<?php
require_once('../config/config.php');
require_once('FonctionsBdd.php');
require_once('../models/Produit.php');
require_once('../utilitaires/FonctionsUtiles.php');

//*********************************************** PRODUIT PRODUIT PRODUIT
//*********************************************** PRODUIT PRODUIT PRODUIT
//*********************************************** PRODUIT PRODUIT PRODUIT


class DaoProduit
{
    //ATTRIBUT DE LA CLASSE DaoProduit
    private $maConnection;

    //CONSTRUCTEUR DE LA CLASSE DaoProduit
    public function __construct()
    {
        //INSTANCIATION DE LA CONNEXION PAR APPEL AU CONSTRUCTEUR PDO ET VALORISATION DES ATTRIBUTS
        $this->maConnection = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        //PARAMETRAGE POUR AFFICHAGE DES ERREURS RELATIVES A LA CONNEXION
        $this->maConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

//CETTE FONCTION PERMET DE CREER UN NOUVEAU PRODUIT
    function createProduit(): string
    {
        //ON INSTANCIE UN PRODUIT EN PASSANT DANS LE CONSTRUCTEUR LES VALEURS POSTEES VIA LE FORMULAIRE DE CREATION D UN PRODUIT
        $produit = new Produit(0, $_POST['produitNom'], $_POST['produitPrix'], $_POST['produitImage']);

        //ON UTILISE LA METHODE prepare() de PDO POUR FAIRE UNE REQUETE PARAMETREE
        $query = $this->maConnection->prepare("INSERT INTO produit(PRODUIT_NOM, PRODUIT_PRIX, PRODUIT_IMAGE) 
                                                        VALUES (?, ?, ?)");
        $result = $query->execute(array(
            $produit->getProduitNom(),
            $produit->getProduitPrix(),
            $produit->getProduitImage()
        ));

        //ON RECUPERE L'ID DU NOUVEAU PRODUIT INSERE
        $nouvelid = $this->maConnection->lastInsertId();
        return $nouvelid;
    }


//CETTE FONCTION PERMET DE METTRE A JOUR UN PRODUIT
    function updateProduit(): string
    {
        if (empty($_POST['newImage'])) {
            $image = $_POST['produitImage'];
        } else {
            $image = $_POST['newImage'];
        }

        $produit = new Produit($_POST['produitId'], $_POST['produitNom'], $_POST['produitPrix'], $image);

        $query = $this->maConnection->prepare("UPDATE produit SET PRODUIT_NOM = ?, PRODUIT_PRIX =? , PRODUIT_IMAGE = ? WHERE  PRODUIT_ID = ?");
        //ON APPELLE LA FONCTION QUI VA  EXECUTER LA REQUETE
        $result = $query->execute(array(
            $produit->getProduitNom(),
            $produit->getProduitPrix(),
            $produit->getProduitImage(),
            $produit->getProduitId()

        ));


        //ON RENVOIE L ID DU PRODUIT AU CONTROLEUR POUR QU il LE TRANSMETTE A LA VUE AFFICHERPRODUITS


        return $where = "PRODUIT_ID=" . $produit->getProduitId();

    }

    function deleteProduit(): void
    {
        $query = $this->maConnection->prepare("DELETE FROM produit WHERE PRODUIT_ID =?");
        $result = $query->execute(array($_POST['produitId']));
    }

    function resultToObjects($result)
    {   //ON RECUPERE LE RÉSULTAT DE LA REQUETE DANS UN TABLEAU
        //QUI CONTIENDRA 1 OU PLUSIEURS OBJETS DE TYPE PRODUIT
        $listProduits = array();
        foreach ($result as $row) {
            $produit = new Produit($row['PRODUIT_ID'], $row['PRODUIT_NOM'], $row['PRODUIT_PRIX'], $row['PRODUIT_IMAGE']);
            array_push($listProduits, $produit);
        }
        return $listProduits;
    }


    function getAll(): array
    {
        $query = $this->maConnection->prepare("SELECT PRODUIT_ID, PRODUIT_NOM,PRODUIT_PRIX ,PRODUIT_IMAGE FROM produit");
        $query->execute();
        $result = $query->fetchAll();
        //ON TRANSFORME LE RESULTAT EN TABLEAU CONTENANT UN OU PLUSIEURS OBJETS DE TYPE PRODUIT
        return $this->resultToObjects($result);
    }








}