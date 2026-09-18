<?php

declare(strict_types=1);

namespace Skair\Php\Tests;

use PHPUnit\Framework\TestCase;
use Skair\Php\Exceptions\GroupException;
use Skair\Php\Group;
use Skair\Php\Student;

class GroupTest extends TestCase
{
    public function testNewGroupIsEmpty(): void
    {
        $group = new Group('P-31');

        $this->assertSame(0, count($group->getStudents()));
        $this->assertSame(0.0, $group->getGroupAverage());
        $this->expectException(GroupException::class);
        $group->getBestStudent();
    }

    public function testAddStudentIncreasesCount(): void
    {
        $group = new Group('P-31');
        $group->addStudent(new Student('Ivan', 'Ivanov'));

        $this->assertSame(1, count($group->getStudents()));
    }

    public function testGroupAverageIsMeanOfStudentAverages(): void
    {
        $group = new Group('P-31');
        $group->addStudent(new Student('Ivan', 'Ivanov', [5, 5]));
        $group->addStudent(new Student('Petr', 'Petrov', [3, 4]));

        $this->assertSame(4.25, $group->getGroupAverage());
    }

    public function testBestStudentHasHighestAverage(): void
    {
        $group = new Group('P-31');
        $weak   = new Student('Petr', 'Petrov', [3, 3]);
        $strong = new Student('Ivan', 'Ivanov', [5, 5]);
        $group->addStudent($weak);
        $group->addStudent($strong);
        $this->assertSame($strong, $group->getBestStudent());
    }
}