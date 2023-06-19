<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(2)->has(
        //     Kelas::factory()->count(2)
        // )->create();
        Kelas::create([
            'nama_kelas' => 'admin'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 1'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 2'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 3'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 4'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 5'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 6'
        ]);
        Kelas::create([
            'nama_kelas' => 'X MIPA 7'
        ]);
        Kelas::create([
            'nama_kelas' => 'X IPS 1'
        ]);
        Kelas::create([
            'nama_kelas' => 'X IPS 2'
        ]);
        Kelas::create([
            'nama_kelas' => 'X IPS 3'
        ]);
        Kelas::create([
            'nama_kelas' => 'X IPS 4'
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin12345',
            'role' => 'admin',
            'kelas_id' => '1',
        ]);
        User::create([
            'name' => 'Aufa',
            'email' => 'aufa@email.com',
            'password' => 'user12345',
            'kelas_id' => '2',
        ]);
        User::create([
            'name' => 'Azizi',
            'email' => 'azizi@email.com',
            'password' => 'user12345',
            'kelas_id' => '3',
        ]);
        User::create([
            'name' => 'Ammar',
            'email' => 'ammar@email.com',
            'password' => 'user12345',
            'kelas_id' => '4',
        ]);
    }


}
?>