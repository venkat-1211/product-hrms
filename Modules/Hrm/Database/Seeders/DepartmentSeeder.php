<?php

namespace Modules\Hrm\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Modules\Hrm\Models\Department;
use Modules\Hrm\Models\Designation; 

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            'Engineering' => [  // 5
                'team_lead',
                'project_lead',
                'project_manager',
                'frontend_developer',
                'backend_developer',
                'fullstack_developer',
                'mobile_web_designer',
                'mobile_backend_developer',
                'devops_engineer',
                'qa_engineer',
                'cloud_engineer'
            ],
            'Human Resources' => [ // 3
                'hr_manager',
                'hr_executive',
                'recruitment_specialist'
            ],
            'Sales & Marketing' => [ // 4
                'sales_executive',
                'sales_manager',
                'marketing_manager',
                'seo_specialist'
            ],
            'Product Management' => [ // 2
                'product_manager',
                'business_analyst'
            ],
            'Finance' => [], // 0
            'Customer Support' => [ // 1
                'support_executive'
            ],
            'IT Support' => [ // 4
                'it_support',
                'system_admin',
                'network_engineer',
                'security_analyst'
            ],
            'Administration' => [ // 0
            ],
            'Legal' => [ // 1
                'compliance_specialist',
            ],
            'Research & Development' => [ // 1
                'data_analyst',
            ],
        ];
        
        foreach ($departments as $deptName => $designations) {
            $department = Department::create([
                'name' => Str::snake($deptName),
                'display_name' => $deptName,
            ]);
        
            foreach ($designations as $designation) {
                Designation::create([
                    'name' => $designation,
                    'display_name' => Str::headline($designation),
                    'department_id' => $department->id,
                ]);
            }
        }
        
    }
}
