<?php

namespace Liloi\Schedula\Modules\Quests\API\Quests\Save;

use Liloi\API\Response;
use Liloi\Schedula\API\Method as SuperMethod;
use Liloi\Schedula\Modules\Quests\Domain\Quests\Manager as QuestsManager;

/**
 * Schedula API: Interstate60.Application.Quests.Save
 */
class Method extends SuperMethod
{
    public static function execute(): Response
    {
        $entity = QuestsManager::load(self::getParameter('key_quest'));

        if(self::getParameterExist('data'))
        {
            $entity->setData(self::getParameter('data'));
        }

        if(self::getParameterExist('summary'))
        {
            $entity->setSummary(self::getParameter('summary'));
        }

        if(self::getParameterExist('status'))
        {
            $entity->setStatus(self::getParameter('status'));
        }

        if(self::getParameterExist('dt'))
        {
            $entity->setDt(self::getParameter('dt'));
        }

        $entity->save();

        return new Response();
    }
}