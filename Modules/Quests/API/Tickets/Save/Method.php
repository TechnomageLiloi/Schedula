<?php

namespace Liloi\Schedula\Modules\Quests\API\Tickets\Save;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Quests\Domain\Tickets\Manager as TicketsManager;

/**
 * Schedula API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $keyQuest = self::getParameter('key_quest');
        $entity = TicketsManager::load($keyQuest, self::getParameter('key_ticket'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));

        $entity->save();

        return new Response();
    }
}