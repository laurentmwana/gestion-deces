<?php

namespace App\Models;

use DateTime;

class Category {

    private $id;

    private  $content;

    private  $type;

    private  $categorie;

    private  $createdate;

    private  $updatedate;

    /**
     * l'id
     *
     * @return integer|null
     */
    public function getId (): ?int {
        return $this->id;
    }

    public function setId ($id): void {
        $this->id = $id;
    }

    /**
     *
     * @return string|null
     */
    public function getContent (): ?string {
        return $this->content;
    }

    public function setContent (string $content): void {
        $this->content = $content;
    }
    

    public function getType (): ?string {
        return $this->type;
    }

    public function getCategorie (): ?string {
        return $this->categorie;
    }

    public function setCategorie (string $categorie): void {
        $this->categorie = $categorie;
    }

    public function setType (string $type): void {
        $this->type = $type;
    }

    public function getCreateDate(): ?DateTime {
        if ($this->createdate) {
            return new datetime($this->createdate);
        }

        return null;
    }

    public function setCreateDate($createdate): void {
        $this->createdate = $createdate;
    }

    public function getUpdateDate (): ?DateTime {
        if ($this->createdate) {
            return new datetime($this->updatedate);
        }

        return null;
    }
}