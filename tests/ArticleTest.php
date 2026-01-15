<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Models/Article.php';

class ArticleTest extends TestCase {

    public function testCreationArticleLivre() {
        $article = new Article("1984", 29.99, "Livres");
        $this->assertEquals("1984", $article->getNom());
        $this->assertEquals(29.99, $article->getPrixUnitaire());
        $this->assertEquals("Livres", $article->getCategorie());
    }

    public function testCreationArticleElectromenager() {
        $article = new Article("Lave-vaisselle", 500, "Electroménager");
        $this->assertEquals("Lave-vaisselle", $article->getNom());
        $this->assertEquals(500, $article->getPrixUnitaire());
        $this->assertEquals("Electroménager", $article->getCategorie());
    }
}