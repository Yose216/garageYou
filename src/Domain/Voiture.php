<?php

namespace garage\Domain;

class Voiture 

{

    /**
     * voiture id.
     *
     * @var integer
    **/
    private $id;

    /**
     * voiture model.
     *
     * @var string
    **/
    private $model;

    /**
     * Voiture marque.
     *
     * @var string
    **/
    private $marque;
	
	/**
     * Voiture année.
     *
     * @var integer
    **/
    private $annee;
	
	/**
     * Voiture kilometrage.
     *
     * @var integer
    **/
    private $kilometrage;
    
    /**
     * Voiture carburant.
     *
     * @var string
    **/
    private $carburant;
    
    /**
     * Voiture boiteVitesse.
     *
     * @var string
    **/
    private $boiteVitesse;
    
    /* Pour plus tard ajout des option */
	

    public function getId() {
        return $this->id;
    }
	
    public function setId($id) {
        $this->id = $id;
    }
	
    public function getModel() {
        return $this->model;
    }
	
    public function setModel($model) {
        $this->model = $model;
    }
	
    public function getMarque() {
        return $this->marque;
    }
	
    public function setMarque($marque) {
        $this->marque = $marque;
    }
	
    public function getAnnee() {
        return $this->annee;
    }
	
    public function setAnnee($annee) {
        $this->annee = $annee;
    }
    
    public function getKilometrage() {
        return $this->kilometrage;
    }
	
    public function setKilometrage($kilometrage) {
        $this->kilometrage = $kilometrage;
    }
    
    public function getCarburant() {
        return $this->carburant;
    }
	
    public function setCarburant($carburant) {
        $this->carburant = $carburant;
    }
    
    public function getBoiteVitesse() {
        return $this->boiteVitesse;
    }
	
    public function setBoiteVitesse($boiteVitesse) {
        $this->boiteVitesse = $boiteVitesse;
    }
	
	

}