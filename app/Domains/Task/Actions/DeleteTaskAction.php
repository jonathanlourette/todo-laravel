<?php

declare(strict_types=1);

namespace App\Domains\Task\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\Task\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteTaskAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        try {
            /** @var Task $task*/
            $task = Task::findOrFail($this->data->get('taskId'));

            if ($task->users->isNotEmpty()) {
                throw new UserException('Não é possivel deletar, tarefa tem usuarios relacionado.');
            }

            DB::beginTransaction();
            $task->delete();
            DB::commit();

            return $task;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao deletar item!');
        }
    }
}
