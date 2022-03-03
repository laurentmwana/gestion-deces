<?php

namespace App\Models;

use DateTime;

class Posts {

    private $id;

    private $name;

    private $firtsname;

    private $lastname;

    private $happy;

    private $createdate;

    private $updatedate;

    private $civil;

    private $profile;

    private $cause;

    private $star;

    private $datehead;

    public function getId (): int {
        return $this->id;
    }

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

    public function getHappy (): ?DateTime {
        if ($this->happy) {
            return new DateTime($this->happy);
        }
        return $this->name;
    }

    public function setHappy (string $happy): void {
        $this->happy = $happy;
    }

    
    public function getCause (): ?string {
        return $this->cause;
    }

    public function setCause ($cause): void {
        $this->cause = $cause;
    }
}