<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Jobs;

use Liloi\Schedula\Modules\Degrees\Domain\Degrees\Manager as DegreesManager;

/**
 * Jobs types.
 */
class Types
{
    static public ?array $list = null;

    public static function getList(): array
    {
        if(self::$list === null)
        {
            self::$list = DegreesManager::getListResource();
        }

        return self::$list;
    }

    // @todo: move this method to more abstract level.
    public static function getClass(string $id): string
    {
        return strtolower(str_replace(' ', '-', self::$list[$id]));
    }
}