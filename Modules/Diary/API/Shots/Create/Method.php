<?php

namespace Liloi\Schedula\Modules\Diary\API\Shots\Create;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as RoadManager;
use Liloi\Schedula\Modules\Diary\Domain\Shots\Manager as ShotsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        ShotsManager::create(
            self::getParameter('key_day'),
            self::getParameter('key_hour'),
            self::getParameter('key_quarter')
        );
        return new Response();
    }
}