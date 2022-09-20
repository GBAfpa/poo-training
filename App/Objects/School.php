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
}