<?php

declare(strict_types=1);

namespace App\Support;

use App\Support\Contracts\Data as DataContract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class Data implements DataContract
{
    private array $content;

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    public function validate(array $rules, array $messages = []): array
    {
        return Validator::validate($this->content, $rules, $messages);
    }

    public function getContent(): array
    {
        return $this->content;
    }

    public function get($key, $default = null)
    {
        return Arr::get($this->content, $key, $default);
    }

    public function set($key, $value): void
    {
        Arr::set($this->content, $key, $value);
    }
}
