<?php

namespace Liloi\Schedula\Modules\Levels\Domain\Quests;

use Liloi\Schedula\Domain\Manager as DomainManager;

use Liloi\Schedula\Exceptions\NotFoundException;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'quests';
    }

    public static function loadCollection(string $status = '2'): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status = %s order by dt desc limit 17;',
            $name, $status
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    /**
     * Load day by key.
     *
     * @param string $keyQuest
     * @return Entity
     */
    public static function load(string $keyQuest): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_quest="%s";',
            $name, $keyQuest
        ));

        if(!$row)
        {
            // @todo: throw exception
        }

        return Entity::create($row);
    }

    /**
     * Load current day.
     *
     * @return Entity
     */
    public static function loadCurrent(): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf('select * from %s order by dt desc limit 1;', $name));

        if(empty($row))
        {
            throw new NotFoundException();
        }

        return Entity::create($row);
    }

    /**
     * Save day.
     *
     * @param Entity $entity
     */
    public static function save(Entity $entity): void
    {
        $name = self::getTableName();
        $data = $entity->get();

        self::update($name, $data, sprintf('key_quest="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): Entity
    {
        $data = [
            'data' => '{}',
            'summary' => '-',
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }
}