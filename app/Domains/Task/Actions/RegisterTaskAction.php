<?php

declare(strict_types=1);

namespace App\Domains\Task\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\Task\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class RegisterTaskAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        $this->validate();

        try {
            $task = new Task();
            $task->title = $this->data->get('title');
            $task->description = $this->data->get('description');
            $task->status = $this->data->get('status') === 'true';

            DB::beginTransaction();
            $task->save();

            $task->users()->attach($this->data->get('userId'));
            DB::commit();

            return $task;
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao salvar item!');
        }
    }

    private function validate(): void
    {
        $this->data->validate([
            'title' => [
                'required',
                'min:3',
                'max:255',
            ],
            'description' => [
                'nullable',
                'max:500',
            ],
            'status' => [
                'required',
                'in:true,false'
            ],
        ], [
            'title.required' => 'Titulo é obrigatorio!',
            'title.min' => 'Titulo não pode ser menos que 3 caracteres!',
            'title.max' => 'Titulo nao pode conter mais de 255 caracteres!',
            'description.max' => 'Descrição não pode conter mais de 500 caracteres!',
            'status' => 'Informe o status da tarefa!'
        ]);
    }
}
