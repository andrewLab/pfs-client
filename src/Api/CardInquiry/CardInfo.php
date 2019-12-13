<?php


namespace PFS\Api\CardInquiry;

class CardInfo
{
    /** @var int */
    public $AccountBaseCurrency;
    /** @var int */
    public $CardType;
    /** @var int */
    public $AccountNumber;
    /** @var string */
    public $CardStatus;
    /** @var int */
    public $PinTriesExceeded;
    /** @var int */
    public $BadPinTries;
    /** @var int */
    public $ExpirationDate;
    public $Client;
    public $PhonecardNumber;
    /** @var int */
    public $AvailBal;
    /** @var int */
    public $LedgerBal;
    public $DistributorCode;
    /** @var int */
    public $LoadAmount;
    public $CompanyName;
    public $CardStyle;
    public $DeliveryType;
}
