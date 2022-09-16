<?php

namespace Database\Seeders;

use App\Models\User;
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
        $progress = $this->command->getOutput()->createProgressBar(2);
        $progress->start();


        #Web users
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'SuperAdmin',
            'email' => 'sadmin@ssdlv.com',
            'password' => 'password',
            'profile' => env('PROFILE_SUPER_ADMIN'),
        ]);
        $progress->advance();
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Admin',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'profile' => env('PROFILE_ADMIN'),
        ]);
        $progress->advance();

        $progress->finish();
    }
}
