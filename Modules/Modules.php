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

        $manager->add(new Method('Schedula.Diary.Jobs.Edit', '\Liloi\Schedula\Modules\Diary\API\Jobs\Edit\Method::execute'));
        $manager->add(new Method('Schedula.Diary.Jobs.Save', '\Liloi\Schedula\Modules\Diary\API\Jobs\Save\Method::execute'));
        $manager->add(new Method('Schedula.Diary.Jobs.Create', '\Liloi\Schedula\Modules\Diary\API\Jobs\Create\Method::execute'));

        return $manager;
    }
}