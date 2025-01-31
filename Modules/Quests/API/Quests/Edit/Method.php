<?php

namespace Liloi\Schedula\Modules\Quests\API\Quests\Edit;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Quests\Domain\Quests\Manager as QuestsManager;
use Liloi\Schedula\Modules\Quests\Domain\Quests\Statuses as QuestsStatuses;

/**
 * Schedula API: Interstate60.Application.Quests.Edit
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $entity = QuestsManager::load(self::getParameter('key_quest'));

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $entity,
            'statuses' => QuestsStatuses::$list
        ]));

        return $response;
    }
}