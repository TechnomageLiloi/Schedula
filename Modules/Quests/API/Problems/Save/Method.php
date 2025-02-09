<?php

namespace Liloi\Schedula\Modules\Quests\API\Problems\Save;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Quests\Domain\Problems\Manager as ProblemsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = ProblemsManager::load(self::getParameter('key_problem'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setData(self::getParameter('data'));
        $entity->setProgram(self::getParameter('program'));

        $entity->save();

        return new Response();
    }
}