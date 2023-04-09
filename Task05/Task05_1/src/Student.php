<?php

namespace App;

class Student
{
    private static $id_num = 1;
    private $id;
    private $lastname;
    private $firstname;
    private $faculty;
    private $course;
    private $group;

    public function __construct()
    {
        $this->id = self::$id_num++;
    }

    public function __get($temp)
    {
        return $this->$temp;
    }

    public function __toString()
    {
        return "\nId: " . $this->id
        . "\nФамилия: " . $this->lastname
        . "\nИмя: " . $this->firstname
        . "\nФакультет: " . $this->faculty
        . "\nГруппа: " . $this->group;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function setFaculty($faculty)
    {
        $this->faculty = $faculty;
        return $this;
    }

    public function setCourse($course)
    {
        $this->course = $course;
        return $this;
    }

    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }
}
