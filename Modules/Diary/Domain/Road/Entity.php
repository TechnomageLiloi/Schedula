<?php

namespace Liloi\Schedula\Modules\Diary\Domain\Road;

use Liloi\Stylo\Parser;
use Liloi\Tools\Entity as AbstractEntity;

/**
 * @method string getProgram()
 * @method void setProgram(string $value)
 *
 * @method string getData()
 * @method void setData(string $value)
 */
class Entity extends AbstractEntity
{
    public function getKey(): string
    {
        return $this->getField('key_day');
    }

    public function parse(): string
    {
        return Parser::parseString($this->getProgram());
    }

    public function save(): void
    {
        Manager::save($this);
    }

    public function getStep(): string
    {
        return date('Y F j (D)', strtotime($this->getKey()));
    }
}