<?php

namespace App\Exceptions;

use Exception;

class GeneralException extends Exception
{
    public function __construct($message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {

        return redirect()->back();

    }
}
