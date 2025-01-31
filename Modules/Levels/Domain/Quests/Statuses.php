<?php

namespace Liloi\Schedula\Modules\Levels\Domain\Quests;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Statuses
{
    public const TODO = 1;
    public const IN_HAND = 2;
    public const COMPLETE = 3;
    public const FAILURE = 4;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::TODO => 'To Do',
        self::IN_HAND => 'In Hand',
        self::COMPLETE => 'Complete',
        self::FAILURE => 'Failure',
    ];
}