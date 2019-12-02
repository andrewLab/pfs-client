<?php

namespace PFS\Api\ViewStatement;

use PFS\Api\Request;

class ViewStatementRequest extends Request
{
    /** @var int */
    public $Cardholderid;

    /**
     * @var string
     * Format: dd/MM/yyyy
     */
    public $StartDate;

    /**
     * @var string
     * Format: dd/MM/yyyy
     */
    public $EndDate;

    /**
     * @var string
     * Optional
     * To view 2 line or 1 line transaction
     * Y=For Auth and Clearing
     * N=For Auth if No Clearing; if Clearing comes in Auth will not visible.
     */
    public $ViewStyle;

    public function getSignature(): string
    {
        return 'ViewStatement';
    }

    public function getResponseClass(): string
    {
        return ViewStatementResponse::class;
    }
}
