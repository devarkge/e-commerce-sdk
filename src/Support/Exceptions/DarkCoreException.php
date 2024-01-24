<?php

namespace DevArk\Sdk\ECommerce\Support\Exceptions;

use Throwable;
class DarkCoreException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(
            $message,
            $code,
            $previous
        );
    }
}
