<?php

namespace PFS\Api;

use ReflectionObject;
use ReflectionProperty;
use SimpleXMLElement;

abstract class Request
{
    /**
     * @var string
     */
    private $id;

    public function __construct()
    {
        $this->id = $this->generateId();
    }

    private function generateId()
    {
        return substr(uniqid('pfs') . uniqid('post'), 0, 35);
    }

    public function getId()
    {
        return $this->id;
    }

    abstract public function getSignature(): string;

    abstract public function getResponseClass(): string;

    public function getPayload()
    {
        return $this->arrayToXml([
            $this->getSignature() => $this->toArray()
        ]);
    }

    /**
     * @param bool $keepEmptyValues
     * @return array
     */
    private function toArray($keepEmptyValues = false): array
    {
        $result = [];
        $properties = (new ReflectionObject($this))->getProperties(ReflectionProperty::IS_PUBLIC);
        foreach ($properties as $reflectionProperty) {
            $value = $reflectionProperty->getValue($this);
            if ($value || $value === 0 || $keepEmptyValues) {
                $result[$reflectionProperty->getName()] = $value;
            }
        }

        return $result;
    }

    /**
     * Array must have one key, that will become the root node.
     * @param $array
     * @return string|bool
     */
    private function arrayToXml($array)
    {
        if (count($array) !== 1) {
            return false;
        }

        foreach ($array as $key => $value) {
            $xml = new SimpleXMLElement('<' . $key . '/>');
            $this->toXml($xml, $value);

            return $xml->asXML();
        }

        return false;
    }

    /**
     * @param SimpleXMLElement $object
     * @param array $array
     */
    private function toXml(SimpleXMLElement $object, $array)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if ($key == 'attr') {
                    foreach ($value as $attrName => $attrValue) {
                        $object->addAttribute($attrName, $attrValue);
                    }
                } else {
                    $new_object = $object->addChild($key);
                    $this->toXml($new_object, $value);
                }
            } else {
                $object->addChild($key, $value);
            }
        }
    }
}
