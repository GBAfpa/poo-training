<?php

namespace App\Objects;

class Teacher extends Person {
    // --------------------------
    // Statics
    // --------------------------

    protected static string $introduction = "Bonjour, je m'appelle ##firstname## ##lastname## et j'enseigne à l'école ##school## les matières suivantes : ##subjects##.";


    // --------------------------
    // Instances
    // --------------------------
    public array $subjects;
    public string $school;

    public function __construct(string $lastname, string $firstname, array $subjects = [], string $school = "") {
        parent::__construct($firstname, $lastname, $school);
        $this->subjects = $subjects;
    }

    // Getters and Setters

    public function getSubjects():array {
        return $this->subjects;
    }
    public function setSubjects(array $subjects) {
        $this->subjects = $subjects;
    }

    // Methods

    public function addSubject(string $subject):void {
        if (in_array($subject, $this->subjects)) return;
        $this->subjects[] = $subject;
    }

    public function removeSubject(string $subject):void {
        // unset($this->subjects[array_search($subject, $this->subjects)]);
        $this->subjects = array_filter($this->subjects, fn($s) => $s !== $subject);
    }

    public function getSubjectsToString():string {
        return implode(", ", $this->getSubjects());
    }

    public function introduceMySelf():string {
        return self::buildIntroduction([
            'lastname' => $this->getLastname(),
            'firstname' => $this->getFirstname(),
            'subjects' => $this->getSubjectsToString(),
            'school' => $this->getSchool()
        ]);
    }
}