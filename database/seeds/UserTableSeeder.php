<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator ;
use Illuminate\Support\Str;
use Faker\Factory;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $user = User::where('email', 'mahmoudkamal012011@gmail.com')->first();
        if (!$user) {
            $u = User::create([
                'name' => 'Mahmoud Kamal',
                'email' => 'mahmoudkamal012011@gmail.com',
                'password' => Hash::make('123456789'),
                'role'  =>'admin'
            ]);

            Profile::create(['user_id' => $u->id]);
        }
        for ($i=0; $i < 15; $i++) {
            $u = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);

            Profile::create(['user_id' => $u->id]);
        }

        // factory(User::class,100)->create();
    }
}
