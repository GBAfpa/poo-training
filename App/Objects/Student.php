<?php

namespace App\Objects;

use DateTime;

class Student {
    // --------------------------
    // Statics
    // --------------------------

    private static string $dateFormat = "Y-m-d";
    private static string $introduction = "Bonjour, je m'appelle ##firstname## ##lastname##, j'ai ##age## ans et je vais à l'école ##school## en class de ##grade##.";

    public static function getDateFormat():string {
        return self::$dateFormat;
    }
    public static function setDateFormat(string $dateFormat):void {
        self::$dateFormat = $dateFormat;
    }

    public static function getIntroduction():string {
        return self::$introduction;
    }
    public static function setIntroduction(string $introduction):void {
        self::$introduction = $introduction;
    }



    // --------------------------
    // Instances
    // --------------------------

    private string $lastname;
    private string $firstname;
    private DateTime $birthdate;
    private string $grade;
    private string $school;

    public function __construct(string $lastname, string $firstname, DateTime $birthdate, string $grade) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->birthdate = $birthdate;
        $this->grade = $grade;
        $this->school = "";
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

    public function getGrade():string {
        return $this->grade;
    }
    public function setGrade(string $grade):void {
        $this->grade = $grade;
    }

    public function getBirthdate():DateTime {
        return $this->birthdate;
    }
    public function setBirthdate(DateTime $birthdate):void {
        $this->birthdate = $birthdate;
    }

    public function getSchool():string {
        return $this->school;
    }
    public function setSchool(string $school):void {
        $this->school = $school;
    }

    // Methods

    public function showBirthdate():string {
        return $this->getBirthdate()->format(self::getDateFormat());
    }

    public function getAge():int {
        // return $this->birthdate->diff(new DateTime())->format("%y");
        return $this->birthdate->diff(new DateTime())->y;
    }

    public function introduceMySelf():string {
        $search = [
            "firstname" => $this->getFirstname(),
            "lastname" => $this->getLastname(),
            "age" => $this->getAge(),
            "school" => $this->getSchool(),
            "grade" => $this->getGrade()
        ];
        return str_replace(array_map(fn($s)=>"##$s##", array_keys($search)), array_values($search), self::getIntroduction());
    }
}