<?php

declare(strict_types=1);

namespace App\Domains\User\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\User\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RetrieveUserAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        try {
            $user = User::findOrFail($this->data->get('userId'));
            return $user;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        }
    }
}