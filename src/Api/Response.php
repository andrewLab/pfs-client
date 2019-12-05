<?php

namespace PFS\Api;

abstract class Response
{
    /** @var int */
    public $ErrorCode;

    /** @var string */
    public $Description;

    /** @var int */
    public $ReferenceID;

    private $requestId;

    public function setRequestId(string $requestId)
    {
        $this->requestId = $requestId;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function isError():bool
    {
        return 0 !== $this->ErrorCode;
    }
}
