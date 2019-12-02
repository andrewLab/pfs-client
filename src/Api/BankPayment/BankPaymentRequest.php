<?php

namespace PFS\Api\BankPayment;

use PFS\Api\Request;

class BankPaymentRequest extends Request
{
    /** CardHolder Id - Numeric[0­9]{12} */
    public $P1;

    /** Beneficiary Name - String[a­z,A­Z ]{0,20} */
    public $B1;

    /** Account number - Numeric[0­9] */
    public $B2;

    /** Sort Code - [[0­9]{2}­[0­9]{2}­[0­9]{2}] */
    public $B3;

    /** Payment Amount - [0­9]{2} */
    public $S1;

    /** Type - Holds the type of payment 1 = one of payment,
     * 2 = Recurring payments by amount, 3 = recurring payments by date */
    public $S2;

    /** Payment Date - dd­MM­yyyy */
    public $S3;

    /** Automatic Fee Mode - Enterbit 0offor1on */
    public $S9;

    /** Bank - [a­z,A­Z ]{20} */
    public $O2;

    /** Reference - [a­z,A­Z 0­9­]{18} */
    public $O1;

    public function getSignature(): string
    {
        return 'BankPayment';
    }

    public function getResponseClass(): string
    {
        return BankPaymentResponse::class;
    }

    public function getPayloadEntityName()
    {
        return 'A33';
    }
}
