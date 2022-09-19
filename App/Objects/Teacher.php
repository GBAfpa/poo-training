<?php

namespace App\Objects;

class Teacher {
    public string $lastname;
    public string $firstname;
    public array $subjects;
    public string $school;

    public function __construct(string $lastname, string $firstname, array $subjects = [], string $school = "") {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->subjects = $subjects;
        $this->school = $school;
    }

    // Getters and Setters

    public function getLastname():string {
        return $this->lastname;
    }
    public function setLastname(string $lastname) {
        $this->lastname = $lastname;
    }

    public function getFirstname():string {
        return $this->firstname;
    }
    public function setFirstname(string $firstname) {
        $this->firstname = $firstname;
    }

    public function getSubjects():array {
        return $this->subjects;
    }
    public function setSubjects(array $subjects) {
        $this->subjects = $subjects;
    }

    public function getSchool():string {
        return $this->school;
    }
    public function setSchool(string $school) {
        $this->school = $school;
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
        $replace = [
            "lastname" => $this->getLastname(),
            "firstname" => $this->getFirstname(),
            "subjects" => $this->getSubjectsToString(),
            "school" => $this->getSchool()
        ];
        $template = "Bonjour, je m'appelle ##firstname## ##lastname## et j'enseigne à l'école ##school## les matières suivantes : ##subjects##.";
        return str_replace(array_map(fn($v) => "##$v##", array_keys($replace)), array_values($replace), $template);
    }
}