<?php

class RemiseFidelite implements RemiseInterface {
    private float $pourcentage;
    private string $nombreAnnees;

    public function __construct(float $pourcentage) {
        $this->pourcentage = $pourcentage;
        $this->nombreAnnees = $nombreAnnees;
    }

    public function appliquer(float $montant, ?Panier $panier = null): float {
        if (!$client) {
            return $montant;
        }
        return $montant * (1 - ($this->pourcentage / 100));
    }
}