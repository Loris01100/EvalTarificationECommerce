<?php

class RemiseMontantFixe implements RemiseInterface {
    private float $montantFixe;
    private float $seuilMinimal;

    public function __construct(float $montantFixe, float $seuilMinimal) {
        $this->montantFixe = $montantFixe;
        $this->seuilMinimal = $seuilMinimal;
    }

    public function appliquer(float $montant): float {
        if ($montant >= $this->seuilMinimal) {
            return max(0, $montant - $this->montantFixe);
        }
        return $montant;
    }
}