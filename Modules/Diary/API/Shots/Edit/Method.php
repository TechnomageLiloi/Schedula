<?php

namespace Liloi\Schedula\Modules\Diary\API\Shots\Edit;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Shots\Manager as ShotsManager;
use Liloi\Schedula\Modules\Diary\Domain\Shots\Statuses as ShotsStatuses;
use Liloi\Schedula\Modules\Quests\Domain\Problems\Manager as ProblemsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Edit
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

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => ShotsStatuses::$list,
            'problems' => ProblemsManager::loadActiveList()
        ]));

        return $response;
    }
}