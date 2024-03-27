<?php

class Users
{
    //DECLARATION DES ATTRIBUTS DE LA CLASSE
    private int $id;
    private string $email;
    private string $password;
    private $last_connexion;
    private $date_registered;

    /**  CONSTRUCTEUR
     * @param int $id
     * @param string $email
     * @param string $password
     * @param $last_connexion
     * @param $date_registered
     */
    public function __construct(int $id, string $email, string $password, $last_connexion, $date_registered)
    {
        $this->setId($id);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setLastConnexion($last_connexion);
        $this->setDateRegistered($date_registered);
    }



    //**************METHODES ACCESSEURS (GETTERS AND SETTERS************)
    //setter pour l'attribut Id permet d'accéder en écriture à l'attribut
    //cette méthode est une procédure (elle ne renvoie rien)

 /**
     * @return int
     */
    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     */
    public function setId(int $Id): void
    {
        $this->Id = $Id;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

  
    public function getLastConnexion()
    {
        return $this->last_connexion;
    }


    public function setLastConnexion($last_connexion)
    {
        $this->last_connexion = $last_connexion;
    }

    public function getDateRegistered()
    {
        return $this->date_registered;
    }


    public function setDateRegistered($date_registered)
    {
        $this->date_registered = $date_registered;
    }

}