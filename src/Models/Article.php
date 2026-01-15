<?php

class Article {
    private string $nom;
    private float $prixUnitaire;
    private string $categorie;

    public function __construct($nom, $prixUnitaire, $categorie) 
    {
        $this->nom = $nom;
        $this->prixUnitaire = $prixUnitaire;
        $this->categorie = $categorie;
    }

    public function getNom() 
    {
        return $this->nom;
    }
    public function getPrixUnitaire() 
    {
        return $this->prixUnitaire;
    }
    public function getCategorie() 
    {
        return $this->categorie;
    }
    public function setNom($nom) 
    {
        $this->nom = $nom;
    }
    public function setPrixUnitaire($prixUnitaire) 
    {
        $this->prixUnitaire = $prixUnitaire;
    }
    public function setCategorie($categorie) 
    {
        $this->categorie = $categorie;
    }

}