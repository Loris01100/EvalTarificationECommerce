<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Models/Panier.php';
require_once 'src/Models/Article.php';
require_once 'src/Services/CalculateurPrix.php';

class PanierTest extends TestCase {

    public function testGestionPanier() {
        $panier = new Panier(40, 2);
        $livre = new Article("Le Petit Prince", 15.00, "Livres");
        $tshirt = new Article("Pull and bear T-Shirt", 25.00, "Vêtements");

        ajouterArticle($panier, $livre);
        ajouterArticle($panier, $tshirt);
        $this->assertCount(2, $panier->getArticles());
    }

    public function testGestionPanierRetirerArticle() {
        $panier = new Panier(40, 2);
        $livre = new Article("Le Petit Prince", 15.00, "Livres");
        $tshirt = new Article("Pull and bear T-Shirt", 25.00, "Vêtements");

        ajouterArticle($panier, $livre);
        ajouterArticle($panier, $tshirt);
        retirerArticle($panier, $livre);
        $this->assertCount(1, $panier->getArticles());
        $this->assertEquals($tshirt, $panier->getArticles()[0]);
    }

    public function testGestionPanierMontantTotalBrut() {
        $panier = new Panier(40, 2);
        $livre = new Article("Le Petit Prince", 15.00, "Livres");
        $tshirt = new Article("Pull and bear T-Shirt", 25.00, "Vêtements");

        ajouterArticle($panier, $livre);
        ajouterArticle($panier, $tshirt);
        
        $montantBrut = $panier->calculerMontantBrut();
        $this->assertEquals(40.00, $montantBrut);
    }
}