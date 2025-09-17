<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Auth\Models\Role;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::insert([
            // Top-Level Executives
            ['name' => 'ceo', 'display_name' => 'CEO', 'description' => 'Chief Executive Officer'],
        
            // Managers
            ['name' => 'hr_manager', 'display_name' => 'HR Manager', 'description' => 'Manages human resources'],
            ['name' => 'project_manager', 'display_name' => 'Project Manager', 'description' => 'Manages projects'],
            ['name' => 'sales_manager', 'display_name' => 'Sales Manager', 'description' => 'Manages sales operations'],
            ['name' => 'marketing_manager', 'display_name' => 'Marketing Manager', 'description' => 'Manages marketing strategy'],
            ['name' => 'product_manager', 'display_name' => 'Product Manager', 'description' => 'Leads product development'],
        
            // Team Leads
            ['name' => 'team_lead', 'display_name' => 'Team Lead', 'description' => 'Leads technical teams'],
            ['name' => 'project_lead', 'display_name' => 'Project Lead', 'description' => 'Leads project teams'],
        
            // Developers
            ['name' => 'frontend_developer', 'display_name' => 'Frontend Developer', 'description' => 'Builds UI interfaces'],
            ['name' => 'backend_developer', 'display_name' => 'Backend Developer', 'description' => 'Handles server-side logic'],
            ['name' => 'fullstack_developer', 'display_name' => 'Full Stack Developer', 'description' => 'Handles both frontend and backend'],
            ['name' => 'mobile_web_designer','display_name' => 'Mobile Web Designer','description' => 'Designs mobile apps'],
            ['name' => 'mobile_backend_developer','display_name' => 'Mobile Backend Developer','description' => 'Handles mobile backend logic'],
        
            // Engineers
            ['name' => 'devops_engineer', 'display_name' => 'DevOps Engineer', 'description' => 'Handles infrastructure and deployment'],
            ['name' => 'qa_engineer', 'display_name' => 'QA Engineer', 'description' => 'Ensures quality through testing'],
            ['name' => 'network_engineer', 'display_name' => 'Network Engineer', 'description' => 'Manages network systems'],
            ['name' => 'cloud_engineer', 'display_name' => 'Cloud Engineer', 'description' => 'Works on cloud infrastructure'],
        
            // Analysts
            ['name' => 'business_analyst', 'display_name' => 'Business Analyst', 'description' => 'Analyzes business needs'],
            ['name' => 'security_analyst', 'display_name' => 'Security Analyst', 'description' => 'Secures systems and data'],
            ['name' => 'data_analyst', 'display_name' => 'Data Analyst', 'description' => 'Analyzes data for insights'],
        
            // Specialists
            ['name' => 'recruitment_specialist', 'display_name' => 'Recruitment Specialist', 'description' => 'Specializes in hiring'],
            ['name' => 'seo_specialist', 'display_name' => 'SEO Specialist', 'description' => 'Optimizes content for search engines'],
            ['name' => 'compliance_specialist', 'display_name' => 'Compliance Specialist', 'description' => 'Ensures regulatory compliance'],
        
            // Executives
            ['name' => 'hr_executive', 'display_name' => 'HR Executive', 'description' => 'Handles HR tasks'],
            ['name' => 'sales_executive', 'display_name' => 'Sales Executive', 'description' => 'Handles sales activities'],
            ['name' => 'support_executive', 'display_name' => 'Customer Support Executive', 'description' => 'Assists customers with issues'],

            //  IT/Support Admins:
            ['name' => 'system_admin', 'display_name' => 'System Admin', 'description' => 'Manages infrastructure & security'],
            ['name' => 'it_support', 'display_name' => 'IT Support', 'description' => 'Provides technical support'],

        
            // Super Admin
            ['name' => 'super_admin', 'display_name' => 'Super Admin', 'description' => 'Developer of the project'],
        ]);
        
    }
}
