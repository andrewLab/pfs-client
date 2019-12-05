<?php


namespace PFS\Exceptions;

class ConnectivityException extends PfsException
{

    /**
     * PfsConnectivityException constructor.
     * @param string $message
     */
    public function __construct(string $message = 'Connection failed')
    {
        parent::__construct($message);
    }
}
