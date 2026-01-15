<?php

class Panier {
    private float $prixTotal;
    private int $quantite;
    private array $articles = [];

    public function __construct($prixTotal, $quantite) 
    {
        $this->prixTotal = $prixTotal;
        $this->quantite = $quantite;
    }

    public function getPrixTotal() 
    {
        return $this->prixTotal;
    }

    public function getQuantite() 
    {
        return $this->quantite;
    }
    public function getArticles() 
    {
        return $this->articles;
    }

    public function setPrixTotal($prixTotal) 
    {
        $this->prixTotal = $prixTotal;
    }
    
    public function setQuantite($quantite) 
    {
        $this->quantite = $quantite;
    }

    public function setArticles($articles) 
    {
        $this->articles = $articles;
    }

    public function ajouterArticle(Article $article, int $quantite = 1)
    {
        $this->articles[] = $article;
    }

    public function retirerArticle(Article $article)
    {
        foreach ($this->articles as $index => $art) 
        {
            if ($art->getNom() === $article->getNom() && $art->getPrixUnitaire() === $article->getPrixUnitaire()) 
            {
                unset($this->articles[$index]);
                $this->articles = array_values($this->articles);
                break;
            }
        }
    }

    public function calculerMontantBrut()
    {
        $montant = 0;
        foreach ($this->articles as $article) 
        {
            $montant += $article->getPrixUnitaire();
        }
        return $montant;
    }
}