<?php
class Commande {
    protected $ref;
    private $date;
    private $etat;

    protected $prenom;
    protected $nom;
    protected $email;

    private $numero;

    public function getRef() {
        return $this->ref;
    }
    public function getDate() {
        return $this->date;
    }
    public function getEtat() {
        return $this->etat;
    }

    public function getPrenom() {
        return $this->prenom;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getNumero() {
        return $this->numero;
    }

    public function setRef($ref) {
        $this->ref = $ref;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($date) {
        $this->email = $email;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
}