<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@admin.com')->exists()){
            $admin = User::factory()->withEmail('admin@admin.com')->create();
            $admin->assignRole('admin');
            $admin->removeRole('customer');
        }

        User::factory(5)->create();
    }
}
