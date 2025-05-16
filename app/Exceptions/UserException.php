<?php

declare(strict_types=1);

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

/**
 * This kind of exception can be displayed to final user.
 */
class UserException extends HttpException
{
    /**
     * Create a new "user" exception instance.
     *
     * @param  string|null  $message
     * @param  Throwable|null  $previous
     * @param  array  $headers
     * @param  int  $code
     * @return void
     */
    public function __construct($message = null, Throwable $previous = null, array $headers = [], $code = 0)
    {
        parent::__construct(400, $message, $previous, $headers, $code);
    }
}
