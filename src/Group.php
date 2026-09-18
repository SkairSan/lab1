<?php

namespace Skair\Php;
use Skair\Php\Exceptions\StudentException;

class Group
{
    private string $groupName;
    private array $students;

    public function __construct(string $groupName, array $students = [])
    {
        $this->groupName = $groupName;
        $this->students = $students;
    }

    public function getName() : string{
        return $this->groupName;
    }
    
    public function getStudents() : array
    {
        return $this->students;
    }

    public function addStudent(Student $student) : void
    {
        $students[] = $student;
    }

    public function getGroupAverage() : float
    {
        $sum = 0;
        $counter = 0;
        $result = 0;

        foreach ($this->students as $s){
            $sum += $s->getAvarage();
            $counter++;
        }

        $result = $sum / $counter;
        return $result;
    }

    public function getBestStudent() : Student
    {
        $bestStudent = 0;

        foreach ($this->students as $s){
            $avarage = $s->getAvarage();
            $bestResult = $bestStudent->getAvarage();

            if ($avarage > $bestResult){
                $bestStudent = $s;
            }
        }

        return $bestStudent;
    }

}