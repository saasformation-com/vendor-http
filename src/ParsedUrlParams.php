<?php

namespace SaaSFormation\Vendor\HTTP;

use Psr\Http\Message\UriInterface;

class ParsedUrlParams
{
    private UriInterface $uri;

    public function __construct(UriInterface $uri)
    {
        $this->uri = $uri;
    }

    public function get(string $param): Param
    {
        return new Param($param);
    }
}
