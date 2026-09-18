<?php

require __DIR__ . '/vendor/autoload.php';

use Skair\Php\Exceptions\GroupException;
use Skair\Php\Student;
use Skair\Php\Group;
use Skair\Php\Exceptions\StudentException;




$printStudentInfo = function (Student $student) : void
{
    echo "Name: " . $student->getFullname() . " || " . "Average grade: " . $student->getAverage() . "\n";
};

$printGroupInfo = function (Group $group) : void
{
    echo "Name: " . $group->getName() . "\n"
    . "Number of students: " . count($group->getStudents()) . "\n" 
    . "Average grade: " . $group->getGroupAverage() . "\n";
};



try {
$student1 = new Student("Ivan", "Ivanov", [2,3]);
$student2 = new Student("Sergey", "Sergeev", [3, 3, 4]);
$student3 = new Student("Kirill", "Kirillov");

$student1->addGrade(4);
$student1->addGrade(5);
$student2->addGrade(5);
$student3->addGrade(2);



$group = new Group("P-31", [$student1]);

$group->addStudent($student2);
$group->addStudent($student3);




$printStudentInfo($student1);
$printStudentInfo($student2);
$printStudentInfo($student3);
echo "\n";
$printGroupInfo($group);

} catch(StudentException $e){
    echo "StudentException: " . $e->getMessage() . "\n";
} catch(GroupException $e){
    echo "GroupException: " . $e->getMessage() . "\n";
}

