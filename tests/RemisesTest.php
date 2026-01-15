<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Models/Panier.php';
require_once 'src/Models/Article.php';
require_once 'src/Models/Client.php';
require_once 'src/Remises/RemiseInterface.php';
require_once 'src/Remises/RemisePourcentage.php';
require_once 'src/Remises/RemiseMontantFixe.php';
require_once 'src/Remises/RemiseTroisPourDeux.php';
require_once 'src/Remises/RemiseFidelite.php';

class RemisesTest extends TestCase {
    public function testRemisePourcentage() {
        $montant = 20;
        $remisePourcentage = new RemisePourcentage(10, 0);
        $montantFinal = $remisePourcentage->appliquer($montant); 
        $this->assertEquals(18, $montantFinal);
    }

    public function testRemiseMontantFixe() {
        $montant = 50;
        $remiseMontantFixe = new RemiseMontantFixe(15, 0);
        $montantFinal = $remiseMontantFixe->appliquer($montant); 
        $this->assertEquals(35, $montantFinal);
    }

    public function testRemiseTroisPourDeux() {
        $panier = new Panier(100, 3);
        $article1 = new Article("Produit A", 10, "Livres");
        $article2 = new Article("Produit B", 10, "Livres");
        $article3 = new Article("Produit C", 10, "Livres");
        
        $panier->ajouterArticle($article1);
        $panier->ajouterArticle($article2);
        $panier->ajouterArticle($article3);
        
        $remiseTroisPourDeux = new RemiseTroisPourDeux("Livres");
        $montantFinal = $remiseTroisPourDeux->appliquer($panier->calculerMontantBrut(), $panier);
        
        $this->assertEquals(20, $montantFinal);
    }

    public function testRemiseFidelite() {
        $client = new Client("Or");
        $panier = new Panier(200, 3);
        
        $remiseFidelite = new RemiseFidelite("15");
        $montantFinal = $remiseFidelite->appliquer($panier->calculerMontantBrut(), $client);
        
        $this->assertEquals(170, $montantFinal);  // 200 - (200 * 15%) = 170
    }
}