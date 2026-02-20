<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Admin();
        $admin->name = 'sai sasank';
        $admin->email = 'saisasank2323@gmail.com';
        $admin->password = Hash::make('123456');
        $admin->token = bin2hex(random_bytes(16));
        $admin->save();
    }
}
