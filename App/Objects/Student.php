<?php

namespace App\Objects;

use DateTime;

class Student extends Person {
    // --------------------------
    // Statics
    // --------------------------

    private static string $dateFormat = "Y-m-d";
    protected static string $introduction = "Bonjour, je m'appelle ##firstname## ##lastname##, j'ai ##age## ans et je vais à l'école ##school## en class de ##grade##.";

    public static function getDateFormat():string {
        return self::$dateFormat;
    }
    public static function setDateFormat(string $dateFormat):void {
        self::$dateFormat = $dateFormat;
    }


    // --------------------------
    // Instances
    // --------------------------

    private DateTime $birthdate;
    private string $grade;

    public function __construct(string $lastname, string $firstname, DateTime $birthdate, string $grade) {
        parent::__construct($firstname, $lastname, "");
        $this->birthdate = $birthdate;
        $this->grade = $grade;
    }

    // Getters and Setters

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

    // Methods

    public function showBirthdate():string {
        return $this->getBirthdate()->format(self::getDateFormat());
    }

    public function getAge():int {
        // return $this->birthdate->diff(new DateTime())->format("%y");
        return $this->birthdate->diff(new DateTime())->y;
    }

    public function introduceMySelf():string {
        return self::buildIntroduction([
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
            'age' => $this->getAge(),
            'school' => $this->getSchool(),
            'grade' => $this->getGrade()
        ]);
    }
}