<?php

namespace App\Objects;

class School {
    // -----------
    // Static
    // -----------

    protected static array $grades = [];

    // -----------
    // Instances
    // -----------
    public string $town;
    public string $name;

    public function __construct(string $name, string $town) {
        $this->name = $name;
        $this->town = $town;
    }

    // Getters & Setters 

    public function getName():string {
        return $this->name;
    }

    public function setName(string $name):void {
        $this->name = $name;
    }

    public function getTown():string {
        return $this->town;
    }

    public function setTown(string $town):void {
        $this->town = $town;
    }

    public function getGrades():array {
        return static::$grades;
    }

    // Methods 

    public function haveGrade(string $grade):string{
        if (in_array($grade,static::$grades)) {
            return "oui on a la classe";
        }
        return "ou on ne l'a pas";
    }
}