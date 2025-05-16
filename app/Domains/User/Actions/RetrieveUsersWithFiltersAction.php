<?php

declare(strict_types=1);

namespace App\Domains\User\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\User\User;

class RetrieveUsersWithFiltersAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        $query = User::query();
        return $query->paginate();
    }
}
