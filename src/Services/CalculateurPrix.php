<?php

require_once __DIR__ . '/../../src/Models/Article.php';
require_once __DIR__ . '/../../src/Models/Panier.php';

function ajouterArticle(Panier $panier, Article $article, int $quantite = 1) {
    $panier->ajouterArticle($article, $quantite);
}

function retirerArticle(Panier $panier, Article $article) {
    $panier->retirerArticle($article);
}

function calculerMontantBrut(Panier $panier) {
    return $panier->calculerMontantBrut();
}