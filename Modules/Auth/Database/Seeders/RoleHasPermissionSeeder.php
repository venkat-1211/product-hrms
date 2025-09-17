<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Auth\Models\Permission;
use Modules\Auth\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superAdminPermissions = [
            'companies',
            'subscriptions',
            'packages',
            'domain',
            'purchase_transaction',
            'clients',
            'projects',
            'tasks',
            'task_board',
            'sub_task',
            'contact',
            'crm_company',
            'deal',
            'lead',
            'pipeline',
            'analytics',
            'activity',
            'employee',
            'employee-details',
            'departments',
            'designations',
            'policies',
            'ticket',
            'holidays',
            'attendance-admin',
            'attendance-employee',
            'leaves-admin',
            'leaves-employee',
            'leaves-settings',
            'timesheets',
            'shift-schedule',
            'overtime',
            'performance_indicator',
            'performance_review',
            'performance_appraisal',
            'goal_list',
            'goal_type',
            'training',
            'trainers',
            'training_type',
            'promotion',
            'resignation',
            'termination',
            'job',
            'candidate',
            'referral',
            'estimate',
            'invoice',
            'payment',
            'expense',
            'provident_fund',
            'tax',
            'category',
            'budget',
            'budget_expense',
            'budget_revenue',
            'employee_salary',
            'payslip',
            'payroll',
            'assets',
            'assets_category',
            'knowledgebase',
            'admin_activity',
            'reports',
            'ui-access',
            'role-permission-access'
        ];

        $superAdmin = Role::where('name', 'super_admin')->first();

        if ($superAdmin) {
            $permissions = Permission::whereIn('name', $superAdminPermissions)->pluck('id', 'name');

            $syncData = [];

            foreach ($superAdminPermissions as $permissionName) {
                if (isset($permissions[$permissionName])) {
                    $syncData[] = $permissions[$permissionName];
                }
            }

            $superAdmin->permissions()->syncWithoutDetaching($syncData); // Prevents overwriting, avoids duplicates
        }

        // CEO
        $ceo = Role::where('name', 'ceo')->first();

        $ceoPermissions = [
            'role-permission-access'
        ];
        
        if ($ceo) {
            $permissions = Permission::whereIn('name', $ceoPermissions)->pluck('id', 'name');

            $syncData = [];

            foreach ($ceoPermissions as $permissionName) {
                if (isset($permissions[$permissionName])) {
                    $syncData[] = $permissions[$permissionName];
                }
            }

            $ceo->permissions()->syncWithoutDetaching($syncData); // Prevents overwriting, avoids duplicates
        }

    }
}
