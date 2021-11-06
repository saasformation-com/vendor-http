<?php

namespace SaaSFormation\Vendor\HTTP;

class BodyToXMLTransformer implements BodyTransformerInterface
{
    public function transform(?Body $body = null): string
    {
        $response = "";
        if($body) {
            $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><data></data>');
            $this->toXml($xml, $body->data());
            $response = $xml->asXML();
        }
        return $response;
    }

    private function toXml(\SimpleXMLElement $object, array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $new_object = $object->addChild($key);
                $this->toXml($new_object, $value);
            } else {
                // if the key is an integer, it needs text with it to actually work.
                if ($key != 0 && $key == (int) $key) {
                    $key = "key_$key";
                }

                $object->addChild($key, $value);
            }
        }
    }
}
