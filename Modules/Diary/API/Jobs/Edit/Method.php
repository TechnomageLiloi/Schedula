<?php

namespace Liloi\Schedula\Modules\Diary\API\Jobs\Edit;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Jobs\Manager as JobsManager;
use Liloi\Schedula\Modules\Diary\Domain\Jobs\Statuses as JobsStatuses;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as RoadManager;

/**
 * Schedula API: Interstate60.Application.Diary.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = JobsManager::load(
            self::getParameter('key_day'),
            self::getParameter('key_hour'),
            self::getParameter('key_quarter')
        );

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => JobsStatuses::$list,
        ]));

        return $response;
    }
}