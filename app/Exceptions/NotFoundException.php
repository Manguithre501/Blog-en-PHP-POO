<?php

namespace App\Exceptions;

use Exception;
use Throwable;

final class NotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    static function erro404()
    {
        http_response_code(404);
        require_once(VIEWS . 'Errors/404.php');
        die();
    }
}
