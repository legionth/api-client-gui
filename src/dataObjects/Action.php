<?php

namespace onOffice\Api\Client\Gui\dataObjects;

/**
 * Class Action
 *
 * data-object for json-action-tag
 */

class Action
{
    /** @var string */
    private $id = '';

    /** @var string */
    private $identifier = '';

    public function __construct(string $id, string $identifier = '')
    {
        $this->id = $id;
        $this->identifier = $identifier;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}