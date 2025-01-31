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
        $entity = DiaryManager::load(self::getParameter('key_day'));

        $entity->setData(self::getParameter('data'));
        $entity->setProgram(self::getParameter('program'));

        $entity->save();

        return new Response();
    }
}