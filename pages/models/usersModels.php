<?php

class Users {
    protected $userName;
    protected $passWord;
    protected $nom;
    protected $prenom;
    protected $numTel;
    protected $email;
    protected $statut;

    function __construct(
        $userName,
        $passWord,
        $nom,
        $prenom,
        $numTel,
        $email,
        $statut
    ) {
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numTel = $numTel;
        $this->email = $email;
        $this->statut = $statut;
    }

    protected function getUserNamee(){
        return $this->userName;
    }
}
