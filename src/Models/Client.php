<?php

class Client {
    private string $fidelite;

    public function __construct(string $fidelite) 
    {
        $this->fidelite = $fidelite;
    }

    public function getFidelite(): string 
    {
        return $this->fidelite;
    }

    public function setFidelite(string $fidelite): void 
    {
        $this->fidelite = $fidelite;
    }

    public function getPourcentageRemise(): float {
        switch ($this->fidelite) {
            case 'Bronze':
                return 5;
            case 'Argent':
                return 10;
            case 'Or':
                return 15;
            default:
                return 0;
        }
    }
}