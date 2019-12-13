<?php

namespace PFS\Api\CardToCard;

use PFS\Api\Request;

class CardToCardRequest extends Request
{
    /** @var int */
    public $Cardholderid;

    /** @var int */
    public $Amount;

    /** @var string length:(?,6) */
    public $CurrencyCode;

    /** @var int */
    public $CardholderidTo;

    /** @var string length:(1,30) */
    public $TerminalOwner;

    /** @var string length:(1,30) */
    public $TerminalLocation;

    /** @var string length:(1,30) */
    public $TerminalCity;

    /** @var string length:2 */
    public $TerminalState;

    /**
     * @var int
     * length:20
     * Right justified zero padded
     */
    public $TerminalID;

    /** @var string length:2 */
    public $Country;

    /** @var string */
    public $Description;

    /** @var string length:3 */
    public $SettlementCurrencyCode;

    /**
     * @var string
     * length:6
     * default: **STR
     */
    public $DirectFee;

    public function getSignature(): string
    {
        return 'Cardtocard';
    }

    public function getResponseClass(): string
    {
        return CardToCardResponse::class;
    }

    public function getPayload($keepEmptyValues = false)
    {
        return parent::getPayload(true); // This request-specific override
    }
}
