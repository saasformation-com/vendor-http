<?php

namespace SaaSFormation\Vendor\HTTP;

interface BodyTransformerInterface
{
    public function transform(?Body $body = null): string;
}
