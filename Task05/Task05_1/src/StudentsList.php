<?php

namespace App;

use Iterator;

class StudentsList implements Iterator
{
    private $students;

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function rewind()
    {
        reset($this->students);
    }

    public function key()
    {
        return current($this->students)->getId();
    }

    public function current()
    {
        return current($this->students);
    }

    public function next()
    {
        next($this->students);
    }

    public function valid()
    {
        return $this->current() !== false;
    }

    public function add(Student $students)
    {
        $this->students[] = $students;
    }

    public function count()
    {
        return count($this->students);
    }

    public function get($n)
    {
        if ($n < $this->count()) {
            return $this->students[$n];
        } else {
            echo "Такого элемента не существует";
        }
    }

    public function store($fileName)
    {
        file_put_contents($fileName, serialize($this->students));
    }

    public function load($fileName)
    {
        if (!file_exists($fileName)) {
            return "Такого файла не существует";
        }
        $this->students = unserialize(file_get_contents($fileName));
    }
}
