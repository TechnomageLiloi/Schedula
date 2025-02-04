<?php

namespace Liloi\Schedula\Modules\Quests\API\Quests\Create;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Quests\Domain\Quests\Manager as QuestsManager;

/**
 * Schedula API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        QuestsManager::create();
        return new Response();
    }
}