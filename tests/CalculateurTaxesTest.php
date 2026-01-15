<?php

use PHPUnit\Framework\TestCase;
require_once 'src/Services/CalculateurTaxes.php';

class CalculateurTaxesTest extends TestCase {

    public function testCalculerTaxes() {
        $montantHorsTaxes = 100.0;
        $tauxTaxe = 20.0;

        $taxes = calculerTaxes($montantHorsTaxes, $tauxTaxe);

        $this->assertEquals(20.0, $taxes);
    }

    public function testCalculerTaxesZero() {
        $montantHorsTaxes = 0.0;
        $tauxTaxe = 15.0;

        $taxes = calculerTaxes($montantHorsTaxes, $tauxTaxe);

        $this->assertEquals(0.0, $taxes);
    }

    public function testCalculerTaxesDifferentTaux() {
        $montantHorsTaxes = 200.0;
        $tauxTaxe = 5.0;

        $taxes = calculerTaxes($montantHorsTaxes, $tauxTaxe);

        $this->assertEquals(10.0, $taxes);
    }
}