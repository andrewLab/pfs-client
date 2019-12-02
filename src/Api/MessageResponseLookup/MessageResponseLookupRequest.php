<?php

namespace PFS\Api\MessageResponseLookup;

use PFS\Api\Request;

class MessageResponseLookupRequest extends Request
{
    /** @var string */
    public $MessageID;

    public function getSignature(): string
    {
        return 'MessageResponseLookup';
    }

    public function getResponseClass(): string
    {
        return MessageResponseLookupResponse::class;
    }
}
