<?php

namespace Skair\Php;

use Skair\Php\Exceptions\StudentException;

class Student
{
    private string $firstName;
    private string $lastName;
    /** @var array<int>*/
    private array $grades;



    /** @param int[] $grades */
    public function __construct(string $firstName, string $lastName, array $grades = [])
    {
        if ($firstName === "" || $lastName === "") {
            throw StudentException::emptyName();
        }
        $this->firstName = $firstName;
        $this->lastName = $lastName;


        foreach ($grades as $g) {
            if ($g < 2 || $g > 5) {
                throw StudentException::invalidGrade($g, $this->getFullName());
            }
        }

        $this->grades = $grades;
    }

    public function getFullname(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function addGrade(int $grade): void
    {
        if ($grade < 2 || $grade > 5) {
            throw StudentException::invalidGrade($grade, $this->getFullName());
        }

        $this->grades[] = $grade;
    }

    public function getAverage(): float
    {
        if (empty($this->grades)) {
            return 0.0;
        }
        return array_sum($this->grades) / count($this->grades);
    }
}
