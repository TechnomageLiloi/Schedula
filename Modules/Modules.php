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
        /*
        $manager->add(new Method('Schedula.Levels.Quest.Create', '\Liloi\Schedula\Modules\Levels\API\Quests\Create\Method::execute'));
        $manager->add(new Method('Schedula.Levels.Quest.Show', '\Liloi\Schedula\Modules\Levels\API\Quests\Show\Method::execute'));
        $manager->add(new Method('Schedula.Levels.Quest.Edit', '\Liloi\Schedula\Modules\Levels\API\Quests\Edit\Method::execute'));
        $manager->add(new Method('Schedula.Levels.Quest.Save', '\Liloi\Schedula\Modules\Levels\API\Quests\Save\Method::execute'));

        $manager->add(new Method('Schedula.Levels.Tickets.Create', '\Liloi\Schedula\Modules\Levels\API\Tickets\Create\Method::execute'));
        $manager->add(new Method('Schedula.Levels.Tickets.Edit', '\Liloi\Schedula\Modules\Levels\API\Tickets\Edit\Method::execute'));
        $manager->add(new Method('Schedula.Levels.Tickets.Save', '\Liloi\Schedula\Modules\Levels\API\Tickets\Save\Method::execute'));
*/
        return $manager;
    }
}