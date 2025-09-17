<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;
use Modules\Auth\Models\Profile;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'username' => 'Venkatesh Mahalingam',
            'email' => 'venkatesh@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $superAdmin->addRole('super_admin');

        Profile::create([
            'user_id' => $superAdmin->id,
            'first_name' => 'Venkatesh',
            'last_name' => 'Mahalingam',
            'employee_id' => 'EMP00123',
            'joining_date' => now(),
            'phone_number' => '6379102578',
            'address' => json_encode([
                'address' => '178, Meenavar Street',
                'city' => 'Kattumavadi',
                'state' => 'Tamil Nadu',
                'country' => 'India',
                'postal_code' => '614630',
            ])
        ]);
    }
}
