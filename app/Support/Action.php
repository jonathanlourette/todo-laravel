<?php

declare(strict_types=1);

namespace App\Support;

use App\Core\Exceptions\UserException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

abstract class Action
{
    protected Data $data;

    public function __construct(array $data = [])
    {
        $this->data = new Data($data);
    }

    public function setData(array|Data $data): self
    {
        if ($data instanceof Data) {
            $this->data = $data;
            return $this;
        }

        $this->data = new Data($data);
        return $this;
    }

    public function getData(): Data
    {
        return $this->data;
    }

    /**
     * @return mixed
     * @throws UserException
     */
    public abstract function perform(): mixed;
}
