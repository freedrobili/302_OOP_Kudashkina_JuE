<?php 

use App\Student;
use App\StudentsList;

function runTest()
{
    //Создаём первый объект класса студент и первый список студентов
    $sl1 = new StudentsList(array());
    $s1 = new Student();
    $s1->setLastname("Кудашкина")
    ->setFirstname("Юлия")
    ->setFaculty("ФМиИТ")
    ->setCourse(3)
    ->setGroup(302);
    echo $s1 . PHP_EOL;

    //Добавляем первого студента в список
    $sl1->add($s1);
    echo "Количество студентов в списке: " . $sl1->count() . PHP_EOL;

    //Создаём второй объект класса студент 
    $s2 = new Student();
    $s2->setLastname("Назаров")
    ->setFirstname("Кирилл")
    ->setFaculty("ФМиИТ")
    ->setCourse(3)
    ->setGroup(302);
    echo $s2 . PHP_EOL;

    //Добавляем второго студента в список
    $sl1->add($s2);
    echo "Количество студентов в списке: " . $sl1->count() . PHP_EOL;

    //Сериализуем текущий список студентов
    $sl1->store("StudentsList.bin");

    //Создаём третий объект класса студент 
    $s3 = new Student();
    $s3->setLastname("Соколова")
    ->setFirstname("Кристина")
    ->setFaculty("ФМиИТ")
    ->setCourse(3)
    ->setGroup(301);
    echo $s3 . PHP_EOL;

    //Добавляем третьего студента в список
    $sl1->add($s3);
    echo "Количество студентов в списке: " . $sl1->count() . PHP_EOL;

    //Выводим первый список студентов с помощью метода get()
    for ($i = 0; $i < $sl1->count(); $i++) {
        echo "\nStudentsList1" . $sl1->get($i) . PHP_EOL;
    }

    //Создаём второй список студентов
    $sl2 = new StudentsList(array());
    echo "Количество студентов в списке: " . $sl2->count() . PHP_EOL;

    //Загружаем во второй список первый список и выводим его 
    $sl2->load("StudentsList.bin");
    echo "Количество студентов в списке: " . $sl2->count() . PHP_EOL;
    for ($i = 0; $i < $sl2->count(); $i++) {
        echo "\nStudentsList2" . $sl2->get($i) . PHP_EOL;
    }
}
