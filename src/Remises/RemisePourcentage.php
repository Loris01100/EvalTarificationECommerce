<?php

class RemisePourcentage implements RemiseInterface {
    private float $pourcentage;
    private float $seuilMinimal;

    public function __construct(float $pourcentage, float $seuilMinimal) {
        $this->pourcentage = $pourcentage;
        $this->seuilMinimal = $seuilMinimal;
    }

    public function appliquer(float $montant): float {
        if ($montant >= $this->seuilMinimal) {
            return $montant * (1 - $this->pourcentage / 100);
        }
        return $montant;
    }
}