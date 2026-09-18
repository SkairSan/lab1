<?php

namespace Skair\Php\Exceptions;

class StudentException extends \Exception
{
    public static function invalidGrade(float $grade, string $studentName): self
    {
        return new self(
            sprintf('Invalid grade %s of a student %s', $grade, $studentName)
        );
    }

    public static function emptyName(): self
    {
        return new self("Firstname and lastname can't be empty");
    }
}
