<?php

namespace PFS\Api;

use PFS\Api\ViewStatement\CardAccount;
use PFS\Api\ViewStatement\CardPan;
use SimpleXMLElement;
use SimpleXmlMapper\XmlMapper;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;

class Mapper
{
    /** @var XmlMapper */
    protected $mapper;

    public function __construct()
    {
        $this->mapper = new XmlMapper(
            new PropertyInfoExtractor([new ReflectionExtractor()], [new PhpDocExtractor])
        );
        $this->registerCustomTypes();
    }

    public function map(SimpleXMLElement $xml, $class): Response
    {
        return $this->mapper->map($xml, $class);
    }

    private function registerCustomTypes()
    {
        $this->mapper->addType(CardPan::class, function ($xml) {
            $cardPan = new CardPan();
            $cardPan->currency = $xml->currency;

            foreach ($xml->cardaccount as $cardAccountXml) {
                $cardPan->cardaccount[] = $this->mapper->map($cardAccountXml, CardAccount::class);
            }
            return $cardPan;
        });
    }
}
