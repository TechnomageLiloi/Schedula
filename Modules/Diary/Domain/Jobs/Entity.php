<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Jobs;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getType()
 * @method void setType(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getKarma()
 * @method void setKarma(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_job');
    }

    public function getStep(): string
    {
        return $this->getField('key_step');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function parse(): string
    {
        return Parser::parseString($this->getTitle());
    }

    public function getTimestamp(): string
    {
        return date('G:i', strtotime($this->getKey()));
    }

    public function getHour(): string
    {
        return date('G', strtotime($this->getKey()));
    }


    public function getDay(): string
    {
        return date('N', strtotime($this->getStep()));
    }

    public function getTypeTitle(): string
    {
        return Types::getList()[$this->getType()];
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }
}