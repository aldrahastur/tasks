<?php

namespace Database\Seeders;


use App\Models\Customer;
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
        $customer = Customer::first();

        User::create([
            'firstname' => 'Max',
            'name' => 'Mustermann',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
            'customer_id' => $customer->id,
        ]);
    }
}
