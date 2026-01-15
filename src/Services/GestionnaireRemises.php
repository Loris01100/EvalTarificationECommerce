<?php

require_once __DIR__ . '/../../src/Models/Article.php';
require_once __DIR__ . '/../../src/Models/Panier.php';
require_once __DIR__ . '/../../src/Services/RemiseInterface.php';
require_once __DIR__ . '/../../src/Services/RemisePourcentage.php';
require_once __DIR__ . '/../../src/Services/RemiseMontantFixe.php';
require_once __DIR__ . '/../../src/Services/RemiseFidelite.php';
require_once __DIR__ . '/../../src/Services/RemiseTroisPourDeux.php';

function appliquerRemisePourcentage(float $montant, float $pourcentage, float $seuilMinimal = 0) {
    $remise = new RemisePourcentage($pourcentage, $seuilMinimal);
    return $remise->appliquer($montant);
}

function appliquerRemiseMontantFixe(float $montant, float $montantFixe, float $seuilMinimal = 0) {
    $remise = new RemiseMontantFixe($montantFixe, $seuilMinimal);
    return $remise->appliquer($montant);
}

function appliquerRemiseFidelite(float $montant, float $pourcentage, int $nombreAnnees) {
    $remise = new RemiseFidelite($pourcentage, $nombreAnnees);
    return $remise->appliquer($montant);
}

function appliquerRemise3Pour2(Panier $panier, string $categorie) {
    $remise = new RemiseTroisPourDeux($categorie);
    return $remise->calculer($panier);
}