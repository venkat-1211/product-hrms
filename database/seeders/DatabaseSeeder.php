<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            \Modules\Auth\Database\Seeders\RolesSeeder::class,
            \Modules\Auth\Database\Seeders\PermissionsSeeder::class,
            \Modules\Common\Database\Seeders\ModuleSeeder::class,
            \Modules\Auth\Database\Seeders\SuperAdminSeeder::class,
            \Modules\Auth\Database\Seeders\RoleHasPermissionSeeder::class,
            \Modules\Hrm\Database\Seeders\DepartmentSeeder::class
        ]);
    }
}
