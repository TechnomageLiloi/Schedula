<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Shots;

/**
 * Class diary types.
 */
class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const SUCCESS = 3;
    public const FAILURE = 4;

    // @ToDo: To more abstract level with redefine.
    static public array $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In hand',
        self::SUCCESS => 'Success',
        self::FAILURE => 'Failure',
    ];

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}