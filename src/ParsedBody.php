<?php

namespace SaaSFormation\Vendor\HTTP;

use Psr\Http\Message\StreamInterface;

class ParsedBody
{
    private string $body;

    public function __construct(StreamInterface $body)
    {
        $this->body = (string)$body;
    }

    private function getBody(): string
    {
        return $this->body;
    }

    /**
     * @throws ParamNotFoundException
     */
    public function get(string $paramKey): Param
    {
        $bodyArray = json_decode($this->getBody(), true);

        $paramKeyParts = explode('.', $paramKey);

        foreach($paramKeyParts as $part) {
            if(isset($bodyArray[$part])) {
                $bodyArray = $bodyArray[$part];
            } else {
                throw new ParamNotFoundException();
            }
        }

        return new Param($bodyArray);
    }
}
