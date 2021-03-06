<?php

namespace PFS\Api\CardInquiry;

use PFS\Api\Request;

class CardInquiryRequest extends Request
{
    /**
     * Required fields.
     */
    /** @var int */
    public $Cardholderid;

    public function getSignature(): string
    {
        return 'CardInquiry';
    }

    public function getResponseClass(): string
    {
        return CardInquiryResponse::class;
    }
}
