<?php

namespace App\Models;

use DateTime;

class Category {

    private int $id;

    private string $content;

    private string $type;

    private string $categorie;

    
    public function getId (): int {
        return $this->id;
    }

    public function setId ($id): void {
        $this->id = $id;
    }


    public function getContent (): string {
        return $this->content;
    }

    public function setContent (string $content): void {
        $this->content = $content;
    }
    

    public function getType (): string {
        return $this->type;
    }

    public function getCategorie (): string {
        return $this->categorie;
    }

    public function setCategorie (string $categorie): void {
        $this->categorie = $categorie;
    }

    public function setType (string $type): void {
        $this->type = $type;
    }

    public function getCreateDate(): ?string {
        return $this->createdate;
    }

    public function getUpdateDate (): ?string {
        return $this->updatedate;
    }
}