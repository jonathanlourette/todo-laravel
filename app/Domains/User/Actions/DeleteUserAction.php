<?php

declare(strict_types=1);

namespace App\Domains\User\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\User\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteUserAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        try {
            $user = User::findOrFail($this->data->get('userId'));

            DB::beginTransaction();
            $user->delete();
            DB::commit();

            return $user;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao deletar item!');
        }
    }
}