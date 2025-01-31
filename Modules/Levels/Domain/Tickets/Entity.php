<?php

namespace Liloi\Schedula\Modules\Levels\Domain\Tickets;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getTitle()
 * @method void setTitle(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $status)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_ticket');
    }

    public function getKeyQuest(): string
    {
        return $this->getField('key_quest');
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function parse(): string
    {
        return Parser::parseString($this->getTitle());
    }

    public function getClass(): string
    {
        return str_replace(' ', '-', strtolower(Statuses::$list[$this->getStatus()]));
    }
}