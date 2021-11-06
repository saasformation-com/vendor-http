<?php

namespace SaaSFormation\Vendor\HTTP;

use StraTDeS\VO\Single\Name;
use StraTDeS\VO\Single\Slug;
use StraTDeS\VO\Single\UUIDV1;

class Param
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function uuidv1(): UUIDV1
    {
        return UUIDV1::fromString($this->value);
    }

    public function string(): string
    {
        return (string)$this->value;
    }

    public function name(): Name
    {
        return Name::fromValue($this->value);
    }

    public function slug(): Slug
    {
        return Slug::fromValue($this->value);
    }

    public function datetime(): \DateTime
    {
        return new \DateTime($this->value);
    }
}
