<?php

namespace SaaSFormation\Vendor\HTTP;

class JSONResponder extends AbstractResponder
{
    protected function defaultFormat(): string
    {
        return 'application/json';
    }

    protected function transformer(): BodyTransformerInterface
    {
        return new BodyToJSONTransformer();
    }
}
