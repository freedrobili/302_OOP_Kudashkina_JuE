<?php

namespace App\Tests;

use App\StudentsList;
use App\Student;
use PHPUnit\Framework\TestCase;

class StudentsListTest extends TestCase
{
    static $sl1;
    public static function setUpBeforeClass(): void
    {
        $s1 = new Student();
        $s1->setLastname("Кудашкина")
        ->setFirstname("Юлия")
        ->setFaculty("ФМиИТ")
        ->setCourse(3)
        ->setGroup(302);

        $s2 = new Student();
        $s2->setLastname("Назаров")
        ->setFirstname("Кирилл")
        ->setFaculty("ФМиИТ")
        ->setCourse(3)
        ->setGroup(302);

        $s3 = new Student();
        $s3->setLastname("Соколова")
        ->setFirstname("Кристина")
        ->setFaculty("ФМиИТ")
        ->setCourse(3)
        ->setGroup(301);

        self::$sl1 = new StudentsList(array($s1, $s2, $s3));
    }

    public function testRewind()
    {
        self::$sl1->rewind();
        self::$sl1->next();
        self::$sl1->next();
        self::$sl1->next();
        self::$sl1->rewind();
        $this->assertSame(self::$sl1->get(0), self::$sl1->current());
    }

    public function testNext()
    {
        self::$sl1->next();
        $this->assertSame(self::$sl1->get(1), self::$sl1->current());
        self::$sl1->next();
        $this->assertSame(
            self::$sl1->get(2),
            self::$sl1->current()
        );
    }

    public function testValid()
    {
        self::$sl1->rewind();
        $this->assertSame(
            true,
            self::$sl1->valid()
        );
        self::$sl1->next();
        $this->assertSame(
            true,
            self::$sl1->valid()
        );
        self::$sl1->next();
        $this->assertSame(
            true,
            self::$sl1->valid()
        );
        self::$sl1->next();
        $this->assertSame(
            false,
            self::$sl1->valid()
        );
    }

    public function testValue()
    {
        self::$sl1->rewind();
        $this->assertSame(
            self::$sl1->get(0),
            self::$sl1->current()
        );
        self::$sl1->next();
        $this->assertSame(
            self::$sl1->get(1),
            self::$sl1->current()
        );
        self::$sl1->next();
        $this->assertSame(
            self::$sl1->get(2),
            self::$sl1->current()
        );
    }
    public function testKey()
    {
        self::$sl1->rewind();
        $this->assertSame(
            self::$sl1->get(0)->getId(),
            self::$sl1->key()
        );
        self::$sl1->next();
        $this->assertSame(
            self::$sl1->get(1)->getId(),
            self::$sl1->key()
        );
        self::$sl1->next();
        $this->assertSame(
            self::$sl1->get(2)->getId(),
            self::$sl1->key()
        );
    }
}
