<?php

namespace Liloi\Schedula\Modules\Levels\Domain\Quests;

use Liloi\Tools\Collection as AbstractCollection;

/**
 * @todo: add tests
 * @todo: add docs
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function getKeys(): array
    {
        $keys = [];

        /** @var Entity $entity */
        foreach ($this as $entity)
        {
            $keys[] = $entity->getKey();
        }

        return $keys;
    }
}