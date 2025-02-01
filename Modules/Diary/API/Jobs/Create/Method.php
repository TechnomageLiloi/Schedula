<?php

namespace Liloi\Schedula\Modules\Diary\API\Jobs\Create;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as RoadManager;
use Liloi\Schedula\Modules\Diary\Domain\Jobs\Manager as JobsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        JobsManager::create(
            self::getParameter('key_day'),
            self::getParameter('key_hour'),
            self::getParameter('key_quarter')
        );
        return new Response();
    }
}