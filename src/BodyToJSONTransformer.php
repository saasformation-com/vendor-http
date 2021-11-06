<?php

namespace SaaSFormation\Vendor\HTTP;

class BodyToJSONTransformer implements BodyTransformerInterface
{
    public function transform(?Body $body = null): string
    {
        $response = "";
        if($body) {
            $response = json_encode(['data' => $body->data()], JSON_INVALID_UTF8_SUBSTITUTE);
        }
        return $response;
    }
}
