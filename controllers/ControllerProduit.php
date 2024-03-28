<?php
require('../models/dao/DaoProduit.php');

class ControllerProduit
{
    //on déclare un attribut de type daoProduit
    private $daoProduit;
    public function __construct()
    {
        //on instancie un objet de type daoProduit
        //en utilisant la variable $daoProduit
        $this->daoProduit = new DaoProduit();
    }


    public function showAbo()
    {
        $contenu = $this->daoProduit->getAll();
        require('../views/abo.php');
    }



    /** Affichage des produits **/
    public function showAll()
    {

        //On récupère la methode de daoProduit qui recherche les produits
        //et qui les retourne sous forme de variable $contenu que l'on passe à la vue concernée.


        require('../views/abo.php');
    }

  

}