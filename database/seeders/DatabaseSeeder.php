<?php

namespace Database\Seeders;

use App\Domains\User\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@teste.com.br';
        $user->password = bcrypt('123456789');
        $user->email_verified_at = Carbon::now();
        $user->is_admin = true;
        $user->save();
    }
}
