<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::insert([
            'name' => 'Raihan Caesario Ammar Saputra',
            'email' => 'Raihan.saputra@mhs.unsoed.ac.id',
            'password' => bcrypt('ammar'),
            'role' => 'admin'
        ]);
        $user = User::insert([
            'name' => 'Aufa Syaihan',
            'email' => 'user2@unsoed.ac.id',
            'password' => bcrypt('user12345'),
            'role' => 'voter'
        ]);
        $user = User::insert([
            'name' => 'M.Naufal Azizi',
            'email' => 'user3@unsoed.ac.id',
            'password' => bcrypt('user12345'),
            'role' => 'voter'
        ]);

    }


}
?>