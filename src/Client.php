<?php

namespace PFS;

use PFS\Api\Mapper;
use PFS\Api\Request;
use PFS\Api\Response;
use SimpleXMLElement;
use SoapClient;
use SoapFault;

class Client
{
    private const STAGING_WSDL = 'https://staging.prepaidfinancialservices.com/accountapiv2/service.wsdl';
    private const PROD_WSDL = 'https://www.prepaidfinancialservices.com/accountapiv2/service.wsdl';

    /**
     * @var string
     */
    private $Username;

    /**
     * @var string
     */
    private $Password;

    /**
     * @var string
     */
    private $wsdl;

    /**
     * @var Mapper
     */
    private $mapper;

    /**
     * Client constructor.
     * @param string $Username
     * @param string $Password
     * @param bool $isStagingEnv
     */
    public function __construct(string $Username, string $Password, bool $isStagingEnv = false)
    {
        $this->Username = $Username;
        $this->Password = $Password;
        $this->wsdl = $isStagingEnv ? self::STAGING_WSDL : self::PROD_WSDL;

        $this->mapper = new Mapper();
    }

    /**
     * @param Request $request
     * @return Response
     * @throws SoapFault
     */
    public function makeRequest(Request $request): Response
    {
        $responseRaw = $this->soapCall($request->getId(), $request->getSignature(), $request->getPayload());

        $response = $this->mapper->map($responseRaw, $request->getResponseClass());

        $response->setRequestId($request->getId());

        return $response;
    }

    /**
     * @param string $MessageID
     * @param string $APISignature
     * @param string $Data
     * @return SimpleXMLElement
     * @throws SoapFault
     */
    private function soapCall(string $MessageID, string $APISignature, string $Data): SimpleXMLElement
    {
        $payload = [
            [
                'Username' => $this->Username,
                'Password' => $this->Password,
                'APISigniture' => $APISignature,
                'MessageID' => $MessageID,
                'Data' => $Data,
            ]
        ];

        $client = new SoapClient($this->wsdl, [
            'trace' => true,
            'encoding' => 'utf-8',
        ]);

        $rawResponse = $client->__soapCall('Process', $payload);
        $response = simplexml_load_string($rawResponse->ProcessResult);

        return $response;
    }
}
