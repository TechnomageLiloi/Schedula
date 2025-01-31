<?php

namespace Liloi\Schedula\Modules\Quests\Domain\Quests;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getSummary()
 * @method void setSummary(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 *
 * @method string getStatus()
 * @method void setStatus(string $value)
 *
 * @method string getDt()
 * @method void setDt(string $value)
 *
 * @method string getXp()
 * @method void setXp(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_quest');
    }

    public function getKeyLevel(): string
    {
        return $this->getField('key_level');
    }

    public function setKeyLevel($keyLevel): void
    {
        $this->setField('key_level', $keyLevel);
    }

    public function parse(): string
    {
        return Parser::parseString($this->getSummary());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStep(): string
    {
        return date('Y F j (D) - g:i a', strtotime($this->getKey()));
    }

    public function getStatusTitle(): string
    {
        return Statuses::$list[$this->getStatus()];
    }
}