<?php

namespace SaaSFormation\Vendor\HTTP;

class XMLResponder extends AbstractResponder
{
    protected function defaultFormat(): string
    {
        return 'application/xml';
    }

    protected function transformer(): BodyTransformerInterface
    {
        return new BodyToXMLTransformer();
    }
}
