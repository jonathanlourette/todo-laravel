<?php

declare(strict_types=1);

namespace App\Support\Contracts;

use Illuminate\Validation\ValidationException;

interface Data
{
    public function __construct(array $content);

    /**
     * @param array $rules
     * @param array $messages
     * @return array
     * @throws ValidationException
     */
    public function validate(array $rules, array $messages = []): array;

    /**
     * Get item by key from the data using dot notation.
     *
     * @param string|int $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Get all data.
     *
     * @return array
     */
    public function getContent(): array;
}
