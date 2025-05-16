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

class RegisterUserAction extends Action
{

    /**
     * @inheritDoc
     * @throws UserException
     */
    public function perform(): mixed
    {
        $this->validate();
        
        try {
            $user = new User();
            $user->name = $this->data->get('name');
            $user->email = $this->data->get('email');
            $user->password = Hash::make($this->data->get('password'));
            $user->administrator = $this->data->get('administrator') === "true";
            $user->active = $this->data->get('active') === "true";

        
            DB::beginTransaction();
            $user->save();
            DB::commit();

            return $user;
        } catch (QueryException) {
            DB::rollBack();
            throw new UserException('Erro ao salvar item!');
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
                'unique:App\Domains\User\User,email',
            ],
            'password' => [
                'required',
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
