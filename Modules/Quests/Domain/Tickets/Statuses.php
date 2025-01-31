<?php

namespace Liloi\Schedula\Modules\Quests\Domain\Tickets;

/**
 * Question's type.
 *
 * @package Liloi\Exams\Engine\Domain\Questions
 */
class Statuses
{
    public const NOT_COMPLETE = 1;
    public const COMPLETE = 2;

    /**
     * Type list.
     *
     * @var string[]
     */
    public static $list = [
        self::NOT_COMPLETE => 'Not complete',
        self::COMPLETE => 'Complete',
    ];
}