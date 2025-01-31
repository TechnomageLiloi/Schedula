<?php

namespace Liloi\Schedula\Modules\Diary\API\Road\Save;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as DiaryManager;

/**
 * Schedula API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = DiaryManager::load(self::getParameter('key_step'));

        $entity->setData(self::getParameter('data'));
        $entity->setSummary(self::getParameter('summary'));

        $entity->save();

        return new Response();
    }
}