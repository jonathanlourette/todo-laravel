<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domains\User\Actions\DeleteUserAction;
use App\Domains\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Domains\User\Actions\RetrieveUsersWithFiltersAction;
use App\Domains\User\Actions\RegisterUserAction;
use App\Domains\User\Actions\RetrieveUserAction;
use App\Domains\User\Actions\UpdateUserAction;
use App\Exceptions\UserException;

class UserController extends BaseController
{
    public function index(Request $request, RetrieveUsersWithFiltersAction $action): mixed
    {
        $this->authorize('is_admin');

        /** @var User[]|Collection $users */
        $users = $action->setData($request->all())->perform();
        return view('user.index', compact('users'));
    }

    public function create(): mixed
    {
        return view('user.create');
    }

    public function store(Request $request, RegisterUserAction $action ): mixed
    {
        $this->authorize('is_admin');

        try {
            /** @var User $user */
            $user = $action->setData($request->all())->perform();
            return redirect()
                ->route('user.show', $user->id)
                ->with('success', 'Usuário cadastrado com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(int $userId, Request $request, RetrieveUserAction $action): mixed
    {
        $this->authorize('is_admin');

        try {
            $data = compact('userId');

            /** @var User $user */
            $user = $action->setData($data)->perform();
            return view('user.show', compact('user'));

        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(int $userId, Request $request, UpdateUserAction $action): mixed
    {
        $this->authorize('is_admin');

        try {
            /** @var User $user */
            $user = $action->setData($request->all() + compact('userId'))->perform();
            return redirect()
                ->route('user.show', $user->id)
                ->with('success', 'Usuário atualizado com sucesso');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete(int $userId, Request $request, DeleteUserAction $action): mixed
    {
        $this->authorize('is_admin');

        try {
            $action->setData(compact('userId'))->perform();
            return redirect()
                ->route('user.index')
                ->with('success', 'Usuário deletado com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
