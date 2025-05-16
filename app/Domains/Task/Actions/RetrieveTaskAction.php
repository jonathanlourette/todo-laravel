<?php

declare(strict_types=1);

namespace App\Domains\Task\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\Task\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RetrieveTaskAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
       try {
            $task = Task::findOrFail($this->data->get('taskId'));
            return $task;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        }
    }
}