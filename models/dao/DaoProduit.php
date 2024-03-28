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




  

    function resultToObjects($result)
    {   //ON RECUPERE LE RÉSULTAT DE LA REQUETE DANS UN TABLEAU
        //QUI CONTIENDRA 1 OU PLUSIEURS OBJETS DE TYPE PRODUIT
        $listProduits = array();
        foreach ($result as $row) {
            $produit = new Produit($row['id'], $row['nom'], $row['prix'], $row['request'], $row['image']);
            array_push($listProduits, $produit);
        }
        return $listProduits;
    }


    function getAll(): array
    {
        $query = $this->maConnection->prepare("SELECT id, nom,prix ,request, image FROM produit");
        $query->execute();
        $result = $query->fetchAll();
        //ON TRANSFORME LE RESULTAT EN TABLEAU CONTENANT UN OU PLUSIEURS OBJETS DE TYPE PRODUIT
        return $this->resultToObjects($result);
    }








}