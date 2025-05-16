<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domains\User\Actions\DeleteUserAction;
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

        /** @var \App\Domains\User\User[]|Illuminate\Database\Eloquent\Collection items */
        $items = $action->setData($request->all())->perform();
        return view('user.index', compact('items'));
    }

    public function create(): mixed
    {
        return view('user.create');
    }

    public function store(Request $request, RegisterUserAction $action ): mixed 
    {
        $this->authorize('is_admin');

        try {
            /** @var App\Domains\User\User $user */
            $user = $action->setData($request->all())->perform();
            return redirect()
                ->route('user.show', $user->id)
                ->with('success', 'Usuario cadastrado com sucesso!');
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
            /** @var App\Domains\User\User $user */
            $user = $action->setData($request->all() + compact('userId'))->perform();
            return redirect()
                ->route('user.show', $user->id)
                ->with('success', 'Usuario atualizado com sucesso');
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
                ->with('success', 'Usuario deletado com sucesso!');
        } catch (UserException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
