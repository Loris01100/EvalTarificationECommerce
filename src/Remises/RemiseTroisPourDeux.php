<?php

class RemiseTroisPourDeux implements RemiseInterface {
    private string $categorie;

    public function __construct(string $categorie) {
        $this->categorie = $categorie;
    }

    public function appliquer(float $montant, Panier $panier = null): float {
                
        $montantTotal = 0;
        $articlesCategorie = [];

        foreach ($panier->getArticles() as $article) {
            $montantTotal += $article->getPrixUnitaire();
            if ($article->getCategorie() === $this->categorie) {
                $articlesCategorie[] = $article;
            }
        }

        $nombreArticlesGratuits = intdiv(count($articlesCategorie), 3);
        
        if ($nombreArticlesGratuits > 0 && count($articlesCategorie) > 0) {
            $montantTotal -= $articlesCategorie[2]->getPrixUnitaire();
        }

        return $montantTotal;
    }
}