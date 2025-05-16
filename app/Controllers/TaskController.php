<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domains\Task\Actions\AddUserToTaskaction;
use App\Domains\Task\Actions\DeleteTaskAction;
use App\Domains\Task\Actions\RegisterTaskAction;
use App\Domains\Task\Actions\RemoveUserFromTaskAction;
use App\Domains\Task\Actions\RetrieveTaskAction;
use App\Domains\Task\Actions\RetrieveTasksWithFiltersAction;
use App\Domains\Task\Actions\ToggleTaskStatusAction;
use App\Domains\Task\Actions\UpdateTaskAction;
use App\Domains\User\User;
use Illuminate\Http\Request;
use App\Exceptions\UserException;

class TaskController extends BaseController
{
    public function index(Request $request, RetrieveTasksWithFiltersAction $action): mixed
    {

        

        //$userId = auth()->user()->id;

        //$title = '';

        $data = $request->all();// + compact('title');

        /** @var \App\Domains\Task\Task[]|Illuminate\Database\Eloquent\Collection tasks */
        $tasks = $action->setData($data)->perform();
        return view('task.index', compact('tasks'));
    }

    public function create(): mixed
    {
        return view('task.create');
    }

    public function store(Request $request, RegisterTaskAction $action): mixed
    {
        try {
            $userId = auth()->user()->id;
            $data = $request->all() + compact('userId');

            /** @var App\Domains\Task\Task task */
            $task = $action->setData($data)->perform();
            return redirect()
                ->route('task.show', $task->id)
                ->with('success', 'Tarefa cadastrada com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(int $taskId, Request $request, RetrieveTaskAction $action): mixed
    {
        try {
            /** @var Task $task */
            $task = $action->setData(compact('taskId'))->perform();
            $usersTask = $task->users;
            $users = User::all();

            return view('task.show', compact('task', 'usersTask', 'users'));
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(int $taskId, Request $request, UpdateTaskAction $action): mixed
    {
        try {
            $data = $request->all() + compact('taskId');

            /** @var App\Domains\Task\Task $task */
            $task = $action->setData($data)->perform();

            return redirect()
                ->route('task.show', $task->id)
                ->with('success', 'Tarefa atualizada com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $taskId, Request $request, DeleteTaskAction $action): mixed
    {
        try {
            $action->setData(compact('taskId'))->perform();
            return redirect()
                ->route('task.index')
                ->with('success', 'Tarefa deletada com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function toggleStatus(int $taskId, Request $request, ToggleTaskStatusAction $action): mixed
    {
        try {
            $action->setData(compact('taskId'))->perform();
            return redirect()
                ->route('task.index')
                ->with('success', 'Ação concluida com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function addUser(int $taskId, Request $request, AddUserToTaskaction $action): mixed
    {
        try {
            $data = $request->all() + compact('taskId');

            /** @var App\Domains\Task\Task $task */
            $task = $action->setData($data)->perform();

            return redirect()
                ->route('task.show', $task->id)
                ->with('success', 'Usuario adicionado com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function removeUser(int $taskId, int $userId, RemoveUserFromTaskAction $action): mixed
    {
        try {
            $data = compact('taskId', 'userId');

            /** @var App\Domains\Task\Task $task */
            $task = $action->setData($data)->perform();

            return redirect()
                ->route('task.show', $task->id)
                ->with('success', 'Usuario removido com sucesso!');

            return $task;
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
