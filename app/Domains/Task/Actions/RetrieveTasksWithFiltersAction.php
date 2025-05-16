<?php

declare(strict_types=1);

namespace App\Domains\Task\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\Task\Task;
use App\Domains\User\User;

class RetrieveTasksWithFiltersAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        $query = Task::query();

        if ($user = $this->data->get('user')) {
            $query->whereHas(User::TABLE, function($query) use ($user) {
                $query->where(User::TABLE.'.id', $user);
            });
        }

        if ($title = $this->data->get('title')) {
            $query->where('title', 'like', $title.'%');
        }

        if ($status = $this->data->get('status')) {
            $query->where('status', '=', $status === 'true');
        }

        return $query->paginate();
    }
}
