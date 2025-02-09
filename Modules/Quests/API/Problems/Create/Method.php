<?php

namespace Liloi\Schedula\Modules\Quests\API\Problems\Create;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Quests\Domain\Problems\Manager as ProblemsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Create
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        ProblemsManager::create();
        return new Response();
    }
}