<?php

namespace PFS\Api;

use SimpleXMLElement;
use SimpleXmlMapper\XmlMapper;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class Mapper
{
    /** @var XmlMapper  */
    protected $mapper;

    public function __construct()
    {
        $this->mapper = new XmlMapper(
            new PropertyInfoExtractor([new ReflectionExtractor()], [new PhpDocExtractor])
        );
    }

    public function map(SimpleXMLElement $xml, $class): Response
    {
        return $this->mapper->map($xml, $class);
    }
}
