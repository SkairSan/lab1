<?php

namespace Skair\Php;
use Skair\Php\Exceptions\StudentException;

class Student
{
    private string $firstName;
    private string $lastName;
    private array $grades;



    public function __construct(string $firstName, string $lastName, array $grades = [])
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        foreach ($grades as $g){
            if ($g < 2 || $g > 5){
                return;
            }
        }

        $this->grades = $grades;
    }

    public function getFullname() : string
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function addGrade(int $grade) : void
    {
        if ($grade < 2 || $grade > 5){
            throw new StudentException();
        }

        $this->grades[] = $grade;
    }

    public function getAverage() : float
    {
        $sum = 0;
        $counter = 0;
        $result = 0;

        foreach ($this->grades as $g){
            $sum += $g;
            $counter++;
        }

        $result = $sum / $counter;
        return $result;
    }

}