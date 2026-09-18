<?php

declare(strict_types=1);

namespace Skair\Php\Tests;

use PHPUnit\Framework\TestCase;
use Skair\Php\Student;
use Skair\Php\Exceptions\StudentException;

class StudentTest extends TestCase
{
    public function testNewStudentHasNoGrades(): void
    {
        $student = new Student('Ivan', 'Ivanov');

        $this->assertSame(0.0, $student->getAverage());
    }

    public function testAddGradeAffectsAverage(): void
    {
        $student = new Student('Ivan', 'Ivanov');
        $student->addGrade(4);
        $student->addGrade(5);

        $this->assertSame(4.5, $student->getAverage());
    }

    public function testConstructorAcceptsGrades(): void
    {
        $student = new Student('Ivan', 'Ivanov', [3, 4, 5]);

        $this->assertSame(4.0, $student->getAverage());
    }

    public function testFullNameIsConcatenated(): void
    {
        $student = new Student('Ivan', 'Ivanov');

        $this->assertSame('Ivan Ivanov', $student->getFullName());
    }

    public function testInvalidGradeThrows(): void
    {
        $student = new Student('Ivan', 'Ivanov');

        $this->expectException(StudentException::class);

        $student->addGrade(10);
    }

    public function testInvalidGradeInConstructorThrows(): void
    {
        $this->expectException(StudentException::class);

        new Student('Ivan', 'Ivanov', [1, 3]);
    }
}
