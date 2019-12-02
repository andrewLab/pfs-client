<?php

namespace PFS\Api\CardIssue;

class CardIssueResponseBody
{
    /** @var int */
    public $Cardholderid;
    /** @var int */
    public $AvailableBalance;
    /** @var int */
    public $LedgerBalance;
    /** @var string */
    public $ExpiryDate;
}
