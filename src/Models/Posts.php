<?php

namespace App\Models;

class Posts {

    private $name;

    private $firtsname;

    private $lastname;

    private $happy;

    private $createdate;

    private $updatedate;

    private $civil;

    private $profile;

    private $star;

    private $datehead;

    public function getName (): ?string {
        return $this->name;
    }

    public function setFirtsname (string $firtsname): void {
        $this->firtsname = $firtsname;
    }

    public function getFirtsname (): ?string {
        return $this->firtsname;
    }

    public function setName (string $name): void {
        $this->name = $name;
    }

    public function getHappy (): ?string {
        return $this->name;
    }

    public function setHappy (string $happy): void {
        $this->happy = $happy;
    }
}