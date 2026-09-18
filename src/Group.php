<?php

namespace Skair\Php;

use Skair\Php\Exceptions\GroupException;

class Group
{
    private string $groupName;
    /** @var array<Student> */
    private array $students;

    /**
 * @param array<Student> $students
 */
    public function __construct(string $groupName, array $students = [])
    {
        if ($groupName === "") {
            throw GroupException::emptyName();
        }
        $this->groupName = $groupName;
        $this->students = $students;
    }

    public function getName(): string
    {
        return $this->groupName;
    }

    /**
 * @return array<Student>
 */
    public function getStudents(): array
    {
        return $this->students;
    }

    public function addStudent(Student $student): void
    {
        $students[] = $student;
    }

    public function getGroupAverage(): float
    {
        $sum = 0;
        $counter = 0;
        $result = 0;

        foreach ($this->students as $s) {
            $sum += $s->getAverage();
            $counter++;
        }

        $result = $sum / $counter;
        return $result;
    }

    public function getBestStudent(): Student
    {
        $bestStudent = $this->students[0];
        if ($bestStudent == null) {
            throw GroupException::emptyGroup();
        }


        foreach ($this->students as $s) {
            $average = $s->getAverage();
            $bestResult = $bestStudent->getAverage();

            if ($average > $bestResult) {
                $bestStudent = $s;
            }
        }

        if ($bestStudent == null) {
            throw GroupException::emptyGroup();
        }
        return $bestStudent;
    }
}
