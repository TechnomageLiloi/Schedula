<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Jobs;

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
        return self::getTablePrefix() . 'jobs';
    }

    public static function loadCollection(string $keyDay): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_day="%s" order by key_hour asc, key_quarter asc;',
            $name, $keyDay
        ));

        $collection = new Collection();

        foreach($rows as $row)
        {
            $collection[] = Entity::create($row);
        }

        return $collection;
    }

    public static function loadSchedule(string $keyDay): array
    {
        $schedule = [];

        for($hour=0;$hour<24;$hour++)
        {
            $schedule[$hour] = [];

            for($quarter=0;$quarter<4;$quarter++)
            {
                $schedule[$hour][$quarter] = null;
            }
        }

        return $schedule;
    }

    public static function loadByPeriod(string $from, string $to): Collection
    {
        $name = self::getTableName();

        $rows = self::getAdapter()->getArray(sprintf(
            'select * from %s where key_step between "%s" and "%s" order by key_job asc;',
            $name, $from, $to
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
     * @param string $keyHour
     * @param string $keyDay
     * @param string $keyQuarter
     * @return Entity
     */
    public static function load(string $keyDay, string $keyHour, string $keyQuarter): Entity
    {
        $name = self::getTableName();

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s where key_day="%s" and key_hour="%s" and key_quarter="%s";',
            $name, $keyDay, $keyHour, $keyQuarter
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

        $row = self::getAdapter()->getRow(sprintf(
            'select * from %s order by key_step desc, key_job desc limit 1;',
            $name
        ));

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
//        unset($data['key_job']);

        self::update($name, $data, sprintf('key_job="%s" and key_step="%s"', $entity->getKey(), $data['key_step']));
    }

    /**
     * Create new day.
     * @param string $key_step
     * @return Entity
     */
    public static function create(string $keyDay, string $keyHour, string $keyQuarter): Entity
    {
        $data = [
            'key_day' => $keyDay,
            'key_hour' => $keyHour,
            'key_quarter' => $keyQuarter,
            'title' => '-',
            'status' => Statuses::TODO,
            'karma' => 0
        ];

        self::getAdapter()->insert(self::getTableName(), $data);

        return Entity::create($data);
    }
}