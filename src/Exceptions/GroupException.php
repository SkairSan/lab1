<?php

namespace Skair\Php\Exceptions;

class GroupException extends \Exception
{
    public static function emptyName(): self
    {
        return new self("Group name can't be empty");
    }

    public static function emptyGroup(): self
    {
        return new self("Group can't be empty");
    }
}
