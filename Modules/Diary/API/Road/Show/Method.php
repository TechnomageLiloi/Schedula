<?php

namespace Liloi\Schedula\Modules\Diary\API\Road\Show;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Diary\Domain\Jobs\Manager as JobsManager;
use Liloi\Schedula\Modules\Diary\Domain\Problems\Manager as ProblemsManager;
use Liloi\Schedula\Modules\Diary\Domain\Problems\Entity as ProblemsEntity;
use Liloi\Schedula\Modules\Diary\Domain\Road\Manager as RoadManager;
use Liloi\Schedula\Modules\Diary\Domain\Jobs\Types as DegreeTypes;
use Liloi\Schedula\Modules\Degrees\Domain\Lessons\Manager as LessonsManager;

/**
 * Schedula API: Interstate60.Application.Diary.Show
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        self::accessCheck();
        $step = RoadManager::loadCurrent();

        $jobs = JobsManager::loadCollection($step->getKey());
        $problems = ProblemsManager::loadCollection();
        $lessons = LessonsManager::loadGroup();
        $degrees = DegreeTypes::getList();

        $times = [];

        /**
         * @var int $key
         * @var ProblemsEntity $problem
         */
        foreach ((array)$problems as $key => $problem)
        {
            $number = $problem->getTime();

            if($number !== null)
            {
                $times[$number] = $problem;
                $problems->offsetUnset($key);
            }
        }

        $response = new Response();
        $response->set('render', static::render(__DIR__ . '/Template.tpl', [
            'entity' => $step,
            'jobs' => $jobs,
            'problems' => $problems,
            'times' => $times,
            'degrees' => $degrees,
            'lessons' => $lessons,
        ]));

        return $response;
    }
}