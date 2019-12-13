<?php

namespace PFS\Api\ChangeCardStatus;

use PFS\Api\Request;

class ChangeCardStatusRequest extends Request
{
    public const STATUS_ISSUED = "0";
    public const STATUS_OPEN = "1";
    public const STATUS_LOST = "2";
    public const STATUS_STOLEN = "3";
    public const STATUS_DEPOSIT_ONLY = "4";
    public const STATUS_CHECK_REASON = "6";
    public const STATUS_CLOSED = "9";
    public const STATUS_PIN_CHANGE_REQUIRED = "A";
    public const STATUS_PHONE_NUMBER_VERIFICATION = "C";

    /** @var int */
    public $Cardholderid;

    /**
     * @var string
     * length:1
     * options:[0123469AC]
     */
    public $OldStatus;

    /**
     * @var string
     * length:1
     * options:[0123469AC]
     */
    public $NewStatus;

    public function getSignature(): string
    {
        return 'ChangeCardStatus';
    }

    public function getResponseClass(): string
    {
        return ChangeCardStatusResponse::class;
    }

    public function getPayload($keepEmptyValues = false)
    {
        return parent::getPayload(true);
    }
}
