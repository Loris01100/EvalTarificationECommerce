<?php

function calculerTaxes(float $montantHorsTaxes, float $tauxTaxe): float {
    return $montantHorsTaxes * ($tauxTaxe / 100);
}