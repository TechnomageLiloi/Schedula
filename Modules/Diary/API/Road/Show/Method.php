<?php

namespace Liloi\Schedula\Modules\Diary\API\Road\Show;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Shots\Manager as ShotsManager;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as DaysManager;
use Liloi\Schedula\Modules\Quests\Domain\Problems\Manager as ProblemsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $step = DaysManager::loadCurrent();
        $schedule = ShotsManager::loadSchedule($step->getKey());
        $problems = ProblemsManager::loadActive();

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $step,
            'schedule' => $schedule,
            'problems' => $problems
        ]));

        return $response;
    }
}