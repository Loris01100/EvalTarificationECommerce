<?php

interface RemiseInterface {
    public function appliquer(float $montant): float;
}