<?php

namespace App\Objects;

abstract class Person {
    // --------------------------
    // Statics
    // --------------------------
    protected static string $introduction = "Bonjour, je m'appelle ##firstname## ##lastname##.";

    public static function getIntroduction():string {
        return static::$introduction;
    }
    public static function setIntroduction(string $introduction):void {
        static::$introduction = $introduction;
    }

    /**
     * Generates a text from the introduction sentence with given datas.
     *
     * @param array $datas
     * @return string
     */
    protected static function buildIntroduction(array $datas):string {
        return str_replace(array_map(fn($s)=>"##$s##", array_keys($datas)), array_values($datas), self::getIntroduction());
    }

    // --------------------------
    // Instances
    // --------------------------
    private string $lastname;
    private string $firstname;
    private string $school;

    public function __construct(string $firstname, string $lastname, string $school) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->school = $school;
    }

    // Getters and Setters

    public function getLastname():string {
        return $this->lastname;
    }
    public function setLastname(string $lastname):void {
        $this->lastname = $lastname;
    }

    public function getFirstname():string {
        return $this->firstname;
    }
    public function setFirstname(string $firstname):void {
        $this->firstname = $firstname;
    }

    public function getSchool():string {
        return $this->school;
    }
    public function setSchool(string $school):void {
        $this->school = $school;
    }
}