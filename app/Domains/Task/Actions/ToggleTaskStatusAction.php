<?php

declare(strict_types=1);

namespace App\Domains\Task\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\Task\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class ToggleTaskStatusAction extends Action
{
    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        try {
            $task = Task::findOrFail($this->data->get('taskId'));
            $task->status = !$task->status;

            DB::beginTransaction();
            $task->save();
            DB::commit();

            return $task;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao atualizar item!');
        }
    }
}
