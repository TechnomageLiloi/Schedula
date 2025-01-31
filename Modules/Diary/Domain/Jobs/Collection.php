<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Jobs;

use Liloi\Tools\Collection as AbstractCollection;
use Liloi\Schedula\Modules\Degrees\Domain\Degrees\Manager as DegreesManager;

/**
 * @todo: add tests
 * @todo: add docs
 * @package Engine\Domain\Exercise
 */
class Collection extends AbstractCollection
{
    public function getKarma(): int
    {
        $karma = 0;

        /** @var Entity $job */
        foreach($this as $job)
        {
            if($job->getStatus() != Statuses::SUCCESS)
            {
                continue;
            }

            $karma += $job->getKarma();
        }

        return $karma;
    }

    public function getResources(): array
    {
        $listDegrees = DegreesManager::getListResource();
        $resources = [];
        
        foreach ($listDegrees as $key => $title)
        {
            $resources[$key] = 0;
        }

        /** @var Entity $job */
        foreach($this as $job)
        {
            if($job->getStatus() != Statuses::SUCCESS)
            {
                continue;
            }

            $resources[$job->getType()] += (int)$job->getKarma();
        }

        return array_combine($listDegrees, $resources);
    }

    public function getByHour(): array
    {
        $day = [];

        for ($i=0;$i<24;$i++)
        {
            $day[$i] = [];
        }

        foreach ($this as $job)
        {
            $day[$job->getHour()][] = $job;
        }

        return $day;
    }

    public function getByDays(): array
    {
        $day = [];

        for ($i=1;$i<=7;$i++)
        {
            $day[$i] = [];
        }

        foreach ($this as $job)
        {
            $day[$job->getDay()][] = $job;
        }

        return $day;
    }
}