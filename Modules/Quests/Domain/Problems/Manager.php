<?php

namespace Liloi\Schedula\Modules\Quests\Domain\Problems;

use Liloi\Schedula\Domain\Manager as DomainManager;

class Manager extends DomainManager
{
    /**
     * Get table name.
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return self::getTablePrefix() . 'problems';
    }

    public static function loadCollection(string $status = Statuses::TODO): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status="%s" order by key_problem asc;',
            $name, $status
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadActive(): Collection
    {
        $name = self::getTableName();
        $collection = new Collection();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status in ("%s", "%s") order by key_problem desc;',
            $name, Statuses::TODO, Statuses::IN_HAND
        ));

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where status in ("%s", "%s") order by key_problem desc limit 7;',
            $name, Statuses::SUCCESS, Statuses::FAILURE
        ));

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadActiveList(): array
    {
        $collection = self::loadActive();
        $result = [];

        /** @var Entity $entity */
        foreach($collection as $entity)
        {
            $result[$entity->getKey()] = $entity->getTitle();
        }

        return $result;
    }

    /**
     * Load day by key.
     *
     * @param string $keyProblem
     * @return Entity
     */
    public static function load(string $keyProblem): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_problem="%s";',
            $name, $keyProblem
        ));

        if(!$row)
        {
            // @todo: throw exception
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
        unset($data['key_problem']);

        self::update($name, $data, sprintf('key_problem="%s"', $entity->getKey()));
    }

    /**
     * Create new day.
     */
    public static function create(): Entity
    {
        $data = [
            'title' => 'Enter the problem title',
            'program' => '-',
            'status' => Statuses::TODO,
            'data' => '{}'
        ];

        self::insert(self::getTableName(), $data);

        return Entity::create($data);
    }
}