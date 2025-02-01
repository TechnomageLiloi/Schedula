<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Jobs;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getKarma()
 * @method void setKarma(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKeyDay(): string
    {
        return $this->getField('key_day');
    }

    public function getKeyHour(): string
    {
        return $this->getField('key_hour');
    }

    public function getKeyQuarter(): string
    {
        return $this->getField('key_quarter');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function parse(): string
    {
        return Parser::parseString($this->getTitle());
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }

    public function getStatusClass(): string
    {
        return strtolower(str_replace(' ', '-', $this->getStatusTitle()));
    }
}