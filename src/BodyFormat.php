<?php

namespace SaaSFormation\Vendor\HTTP;

abstract class BodyFormat
{
    public const JSON = 'JSON';
    public const XML = 'XML';

    public abstract function contentType(): string;
}
