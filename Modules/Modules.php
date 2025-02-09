<?php

namespace Liloi\Schedula\Modules;

use Liloi\API\Manager as APIManager;
use Liloi\API\Method;

/**
 * @inheritDoc
 */
class Modules
{
    public static function collect(APIManager $manager): APIManager
    {
        $manager->add(new Method('Schedula.Diary.Road.Edit', '\Liloi\Schedula\Modules\Diary\API\Road\Edit\Method::execute'));
        $manager->add(new Method('Schedula.Diary.Road.Save', '\Liloi\Schedula\Modules\Diary\API\Road\Save\Method::execute'));
        $manager->add(new Method('Schedula.Diary.Road.Show', '\Liloi\Schedula\Modules\Diary\API\Road\Show\Method::execute'));

        $manager->add(new Method('Schedula.Diary.Shots.Edit', '\Liloi\Schedula\Modules\Diary\API\Shots\Edit\Method::execute'));
        $manager->add(new Method('Schedula.Diary.Shots.Save', '\Liloi\Schedula\Modules\Diary\API\Shots\Save\Method::execute'));
        $manager->add(new Method('Schedula.Diary.Shots.Create', '\Liloi\Schedula\Modules\Diary\API\Shots\Create\Method::execute'));

        $manager->add(new Method('Schedula.Quests.Problems.Edit', '\Liloi\Schedula\Modules\Quests\API\Problems\Edit\Method::execute'));
        $manager->add(new Method('Schedula.Quests.Problems.Save', '\Liloi\Schedula\Modules\Quests\API\Problems\Save\Method::execute'));
        $manager->add(new Method('Schedula.Quests.Problems.Create', '\Liloi\Schedula\Modules\Quests\API\Problems\Create\Method::execute'));

        return $manager;
    }
}