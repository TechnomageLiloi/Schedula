<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Shots;

use Liloi\Tools\Collection as AbstractCollection;

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