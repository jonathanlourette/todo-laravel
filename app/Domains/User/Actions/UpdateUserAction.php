<?php

declare(strict_types=1);

namespace App\Domains\User\Actions;

use App\Exceptions\UserException;
use App\Support\Action;
use App\Domains\User\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateUserAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        $this->validate();

        try {
            $user = User::findOrFail($this->data->get('userId'));

            $user->email = $this->data->get('email');
            $user->name = $this->data->get('name');
            $user->administrator = $this->data->get('administrator') === "true";
            $user->active = $this->data->get('active') === "true";

            //Validade duplicate Email
            if (User::query()->where('email', '=', $user->email)->whereNot('id', '=', $user->id)->exists()) {
                throw new UserException('Já existe outro usuário com este email!');
            }

            if ($password = $this->data->get('password')) {
                $user->password = Hash::make($password);
            }

            DB::beginTransaction();
            $user->save();
            DB::commit();

            return $user;
        } catch (ModelNotFoundException) {
            throw new UserException('Item não encontrado!');
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao atualizar item!');
        }
    }

    private function validate(): void
    {
        $this->data->validate([
            'name' => [
                'required',
                'min:3',
                'max:200',
            ],
            'email' => [
                'required',
                'email',
                'max:200',
            ],
            'password' => [
                'nullable',
                'confirmed:confirm_password',
                Password::min(8)->letters()->numbers()->symbols(),
            ],
            'administrator' => [
                'required',
                'in:true,false'
            ],
            'active' => [
                'required',
                'in:true,false'
            ],
        ]);
    }
}
