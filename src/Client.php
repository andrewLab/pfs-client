<?php

namespace PFS;

use Exception;
use PFS\Exceptions\CommunicationException;
use PFS\Exceptions\ConnectivityException;
use PFS\Api\Mapper;
use PFS\Api\Request;
use PFS\Api\Response;
use PFS\Exceptions\InvalidResponseException;
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
     * @throws CommunicationException
     */
    public function makeRequest(Request $request): Response
    {
        try {
            $responseRaw = $this->soapCall($request->getId(), $request->getSignature(), $request->getPayload());
        } catch (ConnectivityException | InvalidResponseException $e) {
            throw new CommunicationException($e->getMessage());
        }

        try {
            $response = $this->mapper->map($responseRaw, $request->getResponseClass());
            if (!$response) {
                throw new InvalidResponseException();
            }
        } catch (Exception $e) {
            throw new CommunicationException("Response mapping failed");
        }

        $response->setRequestId($request->getId());

        return $response;
    }

    /**
     * @param string $MessageID
     * @param string $APISignature
     * @param string $Data
     * @return SimpleXMLElement
     * @throws ConnectivityException
     * @throws InvalidResponseException
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

        try {
            $client = new SoapClient($this->wsdl, [
                'encoding' => 'utf-8'
            ]);
        } catch (SoapFault $e) {
            throw new ConnectivityException($e->getMessage());
        }

        try {
            $rawResponse = $client->__soapCall('Process', $payload);
        } catch (Exception $e) {
            throw new ConnectivityException($e->getMessage());
        }

        if (!property_exists($rawResponse, 'ProcessResult') || empty($rawResponse->ProcessResult)) {
            throw new InvalidResponseException("Response does not contain ProcessResult");
        }

        $response = simplexml_load_string($rawResponse->ProcessResult);

        if (!$response) {
            throw new InvalidResponseException("Response contains invalid xml");
        }

        return $response;
    }
}
