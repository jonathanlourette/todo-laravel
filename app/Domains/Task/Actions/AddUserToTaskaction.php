<?php

declare(strict_types=1);

namespace App\Domains\Task\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\Task\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddUserToTaskaction extends Action
{
    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        try {
            /** @var App\Domains\Task\Task $task */
            $task = Task::findOrFail($this->data->get('taskId'));
            $userId = $this->data->get('user');
            
            DB::beginTransaction();
            $task->users()->attach($userId);
            DB::commit();

            return $task;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao salvar item!');
        }
    }
}
