<?php

namespace Liloi\Schedula\Modules\Levels\API\Tickets\Create;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Levels\Domain\Tickets\Manager as TicketsManager;

/**
 * Schedula API: Interstate60.Application.Quests.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyQuest = self::getParameter('key_quest');
        TicketsManager::create($keyQuest);
        return new Response();
    }
}