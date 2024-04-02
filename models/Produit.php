<?php

class Produit
{
    //DECLARATION DES ATTRIBUTS DE LA CLASSE
    private int $id;
    private string $nom;
    private float $prix;
    private int $request;
    private string $image;


    //**************METHODES ACCESSEURS (GETTERS AND SETTERS************)
    //setter pour l'attribut id permet d'accéder en écriture à l'attribut
    //cette méthode est une procédure (elle ne renvoie rien)
    /**
     * @param int $id
     * @param string $Nom
     * @param float $prix
     * @param int $request
     * @param string $image
     */
    public function __construct(int $id, string $nom, float $prix, int $request, string $image)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setPrix($prix);
        $this->setRequest($request);
        $this->setImage($image);
    }
    /*
    * @param string $id
    */
    public function setid(int $id): void
    {
        $this->id = $id;
    }

    //getter pour l'attribut id permet d'accéder en lecture à l'attribut
    //cette méthode est une fonction (elle renvoie un résultat typé)
    public function getid(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $Nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void
    {
        if ($prix >= 0) {
            $this->prix = $prix;
        } else {
            echo "LE PRIX DOIT ETRE SUPERIEUR A ZERO";
        }
    }
   /**
     * @return int
     */
    public function getRequest(): int
    {
        return $this->request;
    }

    /**
     * @param int $request
     */
    public function setRequest(int $request): void
    {
        $this->request = $request;

    }
    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }


}