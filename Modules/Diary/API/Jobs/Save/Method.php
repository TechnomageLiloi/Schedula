<?php

namespace Liloi\Schedula\Modules\Diary\API\Jobs\Save;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Jobs\Manager as DiaryManager;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as RoadManager;

/**
 * Schedula API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $road = RoadManager::loadCurrent();
        $entity = DiaryManager::load($road->getKey(), self::getParameter('key_job'));

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setKarma(self::getParameter('karma'));

        $entity->save();

        return new Response();
    }
}