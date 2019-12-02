<?php

namespace PFS\Api\ViewStatement;

class Transaction
{
    /** @var string */
    public $date;

    /** @var int */
    public $Cardholderid;

    /** @var int */
    public $TransactionType;

    /** @var string */
    public $MTI;

    /** @var string */
    public $STN;

    public $TermID;

    /** @var int */
    public $AuthNum;

    public $RecType;

    /** @var string */
    public $TransactionOrigin;

    /** @var string */
    public $description;

    /** @var int */
    public $amount;

    /** @var int */
    public $ledgerbalance;

    /** @var int */
    public $issuerfee;

    /** @var string */
    public $clientid;

    /** @var string */
    public $termnamelocation;

    public $termowner;

    public $termcity;

    public $termstate;

    public $termcountry;

    /** @var int */
    public $surcharge;

    /** @var int */
    public $rspcode;

    public $mcc;

    /** @var string */
    public $currency;

    /** @var int */
    public $origholdamt;

    /** @var string */
    public $termcurrency;

    /** @var int */
    public $origtransamt;
}
