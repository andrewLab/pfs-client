<?php

namespace PFS\Api\DepositToCard;

use PFS\Api\Request;

class DepositToCardRequest extends Request
{
    /**
     * Required fields.
     */
    /** @var string */
    public $Cardholderid;
    /** @var int */
    public $Amount;
    /** @var int */
    public $TransactionType;
    /** @var string */
    public $CurrencyCode;
    /** @var string */
    public $SettlementCurrencyCode;
    /** @var string */
    public $TransactionDescription;

    /**
     * Not required fields
     */
    public $TerminalOwner;
    public $SettlementAmount;
    public $TerminalCity;
    public $TerminalState;
    public $TerminalID;
    public $Country;
    public $TransactionFlatFee;
    public $FeeDescription;
    public $DirectFee;
    public $VoucherCode;

    public function getSignature(): string
    {
        return 'DepositToCard';
    }

    public function getResponseClass(): string
    {
        return DepositToCardResponse::class;
    }
}
