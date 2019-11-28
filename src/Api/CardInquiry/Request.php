<?php

namespace PFS\Api\CardInquiry;

use PFS\Api\Request as BaseRequest;

class Request extends BaseRequest
{
    /**
     * Required fields.
     */
    /** @var string */
    public $Cardholderid;

    public function getSignature(): string
    {
        return 'CardInquiry';
    }

    public function getResponseClass(): string
    {
        return Response::class;
    }
}
