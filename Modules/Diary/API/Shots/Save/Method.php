<?php

namespace Liloi\Schedula\Modules\Diary\API\Shots\Save;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Shots\Manager as ShotsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = ShotsManager::load(
            self::getParameter('key_day'),
            self::getParameter('key_hour'),
            self::getParameter('key_quarter')
        );

        $entity->setTitle(self::getParameter('title'));
        $entity->setStatus(self::getParameter('status'));
        $entity->setKarma(self::getParameter('karma'));

        $entity->save();

        return new Response();
    }
}