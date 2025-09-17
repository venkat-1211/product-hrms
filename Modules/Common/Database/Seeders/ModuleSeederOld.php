<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Common\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Module::insert([
            // Main Menu
            [
                'id' => 1,
                'parent_id' => null,
                'name' => 'Main Menu',
                'slug' => 'main-menu',
                'description' => 'Main Menu Purpose For Super Admin',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'description' => 'Super Admin Purpose For Super Admin',
                'icon' => '<i class="ti ti-user-star"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'description' => 'Dashboard Purpose For Super Admin',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 4,
                'parent_id' => 2,
                'name' => 'Companies',
                'slug' => 'companies',
                'description' => 'Super Admin Companies Management',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'name' => 'Subscriptions',
                'slug' => 'subscriptions',
                'description' => 'Super Admin Subscriptions Management',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 6,
                'parent_id' => 2,
                'name' => 'Packages',
                'slug' => 'packages',
                'description' => 'Super Admin Packages Management',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 7,
                'parent_id' => 2,
                'name' => 'Domain',
                'slug' => 'domain',
                'description' => 'Super Admin Domain Management',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 8,
                'parent_id' => 2,
                'name' => 'Purchase Transactions',
                'slug' => 'purchase-transactions',
                'description' => 'Super Admin Purchase Transactions Management',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            // Projects
            [
                'id' => 9,
                'parent_id' => null,
                'name' => 'PROJECTS',
                'slug' => 'projects',
                'description' => 'Projects Module',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 10,
                'parent_id' => 9,
                'name' => 'Clients',
                'slug' => 'clients',
                'description' => 'Clients Management',
                'icon' => '<i class="ti ti-users-group"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 11,
                'parent_id' => 9,
                'name' => 'Projects',
                'slug' => 'projects',
                'description' => 'Projects Management Main Menu',
                'icon' => '<i class="ti ti-box"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 12,
                'parent_id' => 11,
                'name' => 'Projects',
                'slug' => 'projects',
                'description' => 'Projects Management Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 13,
                'parent_id' => 11,
                'name' => 'Tasks',
                'slug' => 'tasks',
                'description' => 'Tasks Management Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 14,
                'parent_id' => 11,
                'name' => 'Task Board',
                'slug' => 'task-board',
                'description' => 'Task Board Management Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            // CRM
            [
                'id' => 15,
                'parent_id' => null,
                'name' => 'CRM',
                'slug' => 'crm',
                'description' => 'CRM Module',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 16,
                'parent_id' => 15,
                'name' => 'Contacts',
                'slug' => 'contacts',
                'description' => 'Contacts Management Main Menu',
                'icon' => '<i class="ti ti-user-shield"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 17,
                'parent_id' => 15,
                'name' => 'Companies',
                'slug' => 'crm-companies',
                'description' => 'Companies Management Main Menu',
                'icon' => '<i class="ti ti-building"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 18,
                'parent_id' => 15,
                'name' => 'Deals',
                'slug' => 'deals',
                'description' => 'Deals Management Main Menu',
                'icon' => '<i class="ti ti-heart-handshake"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 19,
                'parent_id' => 15,
                'name' => 'Leads',
                'slug' => 'leads',
                'description' => 'Leads Management Main Menu',
                'icon' => '<i class="ti ti-user-check"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 20,
                'parent_id' => 15,
                'name' => 'Pipeline',
                'slug' => 'pipeline',
                'description' => 'Pipeline Management Main Menu',
                'icon' => '<i class="ti ti-timeline-event-text"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 21,
                'parent_id' => 15,
                'name' => 'Analytics',
                'slug' => 'analytics',
                'description' => 'Analytics Management Main Menu',
                'icon' => '<i class="ti ti-graph"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 22,
                'parent_id' => 15,
                'name' => 'Activities',
                'slug' => 'activities',
                'description' => 'Activities Management Main Menu',
                'icon' => '<i class="ti ti-activity"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            // HRM
            [
                'id' => 23,
                'parent_id' => null,
                'name' => 'HRM',
                'slug' => 'hrm',
                'description' => 'HRM Module',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 24,
                'parent_id' => 23,
                'name' => 'Employees',
                'slug' => 'employees',
                'description' => 'Employee Main Menu',
                'icon' => '<i class="ti ti-users"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 25,
                'parent_id' => 24,
                'name' => 'Employee List',
                'slug' => 'employee-list',
                'description' => 'Employee List Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 26,
                'parent_id' => 24,
                'name' => 'Employee Grid',
                'slug' => 'employee-grid',
                'description' => 'Employee Grid Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 27,
                'parent_id' => 24,
                'name' => 'Employee Details',
                'slug' => 'employee-details',
                'description' => 'Employee Details Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 28,
                'parent_id' => 24,
                'name' => 'Departments',
                'slug' => 'departments',
                'description' => 'Departments Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 29,
                'parent_id' => 24,
                'name' => 'Designations',
                'slug' => 'designations',
                'description' => 'Designations Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 30,
                'parent_id' => 24,
                'name' => 'Policies',
                'slug' => 'policies',
                'description' => 'Policies Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 31,
                'parent_id' => 23,
                'name' => 'Tickets',
                'slug' => 'tickets',
                'description' => 'Tickets Main Menu',
                'icon' => '<i class="ti ti-ticket"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 32,
                'parent_id' => 31,
                'name' => 'Tickets',
                'slug' => 'tickets',
                'description' => 'Tickets Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 33,
                'parent_id' => 31,
                'name' => 'Ticket Details',
                'slug' => 'ticket-details',
                'description' => 'Ticket Details Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 34,
                'parent_id' => 23,
                'name' => 'Holidays',
                'slug' => 'holidays',
                'description' => 'Holidays Menu',
                'icon' => '<i class="ti ti-calendar-event"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 35,
                'parent_id' => 23,
                'name' => 'Attendance',
                'slug' => 'attendance',
                'description' => 'Attendance Menu',
                'icon' => '<i class="ti ti-file-time"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 36,
                'parent_id' => 35,
                'name' => 'Leaves',
                'slug' => 'leaves',
                'description' => 'Leaves Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 37,
                'parent_id' => 36,
                'name' => 'Leaves (Admin)',
                'slug' => 'leaves-admin',
                'description' => 'Leaves (Admin) Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 38,
                'parent_id' => 36,
                'name' => 'Leaves (Employee)',
                'slug' => 'leaves-employee',
                'description' => 'Leaves (Employee) Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 39,
                'parent_id' => 36,
                'name' => 'Leaves Settings',
                'slug' => 'leaves-settings',
                'description' => 'Leaves Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 40,
                'parent_id' => 35,
                'name' => 'Attendance (Admin)',
                'slug' => 'attendance-admin',
                'description' => 'Attendance (Admin) Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 41,
                'parent_id' => 35,
                'name' => 'Attendance (Employee)',
                'slug' => 'attendance-employee',
                'description' => 'Attendance (Employee) Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 42,
                'parent_id' => 35,
                'name' => 'Timesheets',
                'slug' => 'timesheets',
                'description' => 'Timesheets Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 43,
                'parent_id' => 35,
                'name' => 'Shift & Schedule',
                'slug' => 'shift-schedule',
                'description' => 'Shift & Schedule Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 44,
                'parent_id' => 35,
                'name' => 'Overtime',
                'slug' => 'overtime',
                'description' => 'Overtime Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 45,
                'parent_id' => 23,
                'name' => 'Performance',
                'slug' => 'performance',
                'description' => 'Performance Menu',
                'icon' => '<i class="ti ti-school"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 46,
                'parent_id' => 45,
                'name' => 'Performance Indicator',
                'slug' => 'performance-indicator',
                'description' => 'Performance Indicator Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 47,
                'parent_id' => 45,
                'name' => 'Performance Review',
                'slug' => 'performance-review',
                'description' => 'Performance Review Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 48,
                'parent_id' => 45,
                'name' => 'Performance Appraisal',
                'slug' => 'performance-appraisal',
                'description' => 'Performance Appraisal Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 49,
                'parent_id' => 45,
                'name' => 'Goal List',
                'slug' => 'goal-list',
                'description' => 'Goal List Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 50,
                'parent_id' => 45,
                'name' => 'Goal Type',
                'slug' => 'goal-type',
                'description' => 'Goal Type Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 51,
                'parent_id' => 23,
                'name' => 'Training',
                'slug' => 'training',
                'description' => 'Training Menu',
                'icon' => '<i class="ti ti-edit"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 52,
                'parent_id' => 51,
                'name' => 'Training List',
                'slug' => 'training-list',
                'description' => 'Training List Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 53,
                'parent_id' => 51,
                'name' => 'Trainers',
                'slug' => 'trainers',
                'description' => 'Trainers Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 54,
                'parent_id' => 51,
                'name' => 'Training Type',
                'slug' => 'training-type',
                'description' => 'Training Type Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 55,
                'parent_id' => 23,
                'name' => 'Promotion',
                'slug' => 'promotion',
                'description' => 'Promotion Main Menu',
                'icon' => '<i class="ti ti-speakerphone"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 56,
                'parent_id' => 23,
                'name' => 'Resignation',
                'slug' => 'resignation',
                'description' => 'Resignation Main Menu',
                'icon' => '<i class="ti ti-external-link"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 57,
                'parent_id' => 23,
                'name' => 'Termination',
                'slug' => 'termination',
                'description' => 'Termination Main Menu',
                'icon' => '<i class="ti ti-circle-x"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            // Recruitment
            [
                'id' => 58,
                'parent_id' => null,
                'name' => 'RECRUITMENT',
                'slug' => 'recruitment',
                'description' => 'Recruitment Module',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 59,
                'parent_id' => 58,
                'name' => 'Jobs',
                'slug' => 'jobs',
                'description' => 'Jobs Main Menu',
                'icon' => '<i class="ti ti-timeline"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 60,
                'parent_id' => 58,
                'name' => 'Candidates',
                'slug' => 'candidates',
                'description' => 'Candidates Main Menu',
                'icon' => '<i class="ti ti-user-shield"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 61,
                'parent_id' => 58,
                'name' => 'Referrals',
                'slug' => 'referrals',
                'description' => 'Referrals Main Menu',
                'icon' => '<i class="ti ti-ux-circle"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            // Finance & Accounts
            [
                'id' => 62,
                'parent_id' => null,
                'name' => 'FINANCE & ACCOUNTS',
                'slug' => 'finance-and-accounts',
                'description' => 'Finance & Accounts Module',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 63,
                'parent_id' => 62,
                'name' => 'Sales',
                'slug' => 'sales',
                'description' => 'Sales Main Menu',
                'icon' => '<i class="ti ti-shopping-cart-dollar"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 64,
                'parent_id' => 63,
                'name' => 'Estimates',
                'slug' => 'estimates',
                'description' => 'Estimates Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 65,
                'parent_id' => 63,
                'name' => 'Invoices',
                'slug' => 'invoices',
                'description' => 'Invoices Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 66,
                'parent_id' => 63,
                'name' => 'Payments',
                'slug' => 'payments',
                'description' => 'Payments Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 67,
                'parent_id' => 63,
                'name' => 'Expenses',
                'slug' => 'expenses',
                'description' => 'Expenses Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 68,
                'parent_id' => 63,
                'name' => 'Provident Fund',
                'slug' => 'provident-fund',
                'description' => 'Provident Fund Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 69,
                'parent_id' => 63,
                'name' => 'Taxes',
                'slug' => 'taxes',
                'description' => 'Taxes Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 70,
                'parent_id' => 62,
                'name' => 'Accounting',
                'slug' => 'accounting',
                'description' => 'Accounting Main Menu',
                'icon' => '<i class="ti ti-file-dollar"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 71,
                'parent_id' => 70,
                'name' => 'Categories',
                'slug' => 'categories',
                'description' => 'Categories Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 72,
                'parent_id' => 70,
                'name' => 'Budgets',
                'slug' => 'budgets',
                'description' => 'Budgets Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 73,
                'parent_id' => 70,
                'name' => 'Budget Expenses',
                'slug' => 'budget-expenses',
                'description' => 'Budget Expenses Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 74,
                'parent_id' => 70,
                'name' => 'Budget Revenues',
                'slug' => 'budget-revenues',
                'description' => 'Budget Revenues Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 75,
                'parent_id' => 62,
                'name' => 'Payroll',
                'slug' => 'payroll',
                'description' => 'Payroll Main Menu',
                'icon' => '<i class="ti ti-cash"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 76,
                'parent_id' => 75,
                'name' => 'Employee Salary',
                'slug' => 'employee-salary',
                'description' => 'Employee Salary Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 77,
                'parent_id' => 75,
                'name' => 'Payslip',
                'slug' => 'payslip',
                'description' => 'Payslip Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 78,
                'parent_id' => 75,
                'name' => 'Payroll Items',
                'slug' => 'payroll-items',
                'description' => 'Payroll Items Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            // Administration
            [
                'id' => 79,
                'parent_id' => null,
                'name' => 'ADMINISTRATION',
                'slug' => 'administration',
                'description' => 'Administration Module',
                'icon' => null,
                'type' => 'module',
                'is_active' => true
            ],
            [
                'id' => 80,
                'parent_id' => 79,
                'name' => 'Assets',
                'slug' => 'assets',
                'description' => 'Assets Main Menu',
                'icon' => '<i class="ti ti-cash"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 81,
                'parent_id' => 80,
                'name' => 'Assets',
                'slug' => 'assets',
                'description' => 'Assets Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 82,
                'parent_id' => 80,
                'name' => 'Asset Categories',
                'slug' => 'asset-categories',
                'description' => 'Asset Categories Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 83,
                'parent_id' => 79,
                'name' => 'Help & Supports',
                'slug' => 'help-supports',
                'description' => 'Help & Supports Main Menu',
                'icon' => '<i class="ti ti-headset"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 84,
                'parent_id' => 83,
                'name' => 'Knowledge Base',
                'slug' => 'knowledge-base',
                'description' => 'Knowledge Base Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 85,
                'parent_id' => 83,
                'name' => 'Activities',
                'slug' => 'activities',
                'description' => 'Activities Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 86,
                'parent_id' => 79,
                'name' => 'User Management',
                'slug' => 'user-management',
                'description' => 'User Management Main Menu',
                'icon' => '<i class="ti ti-user-star"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 87,
                'parent_id' => 86,
                'name' => 'Users',
                'slug' => 'users',
                'description' => 'Users Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 88,
                'parent_id' => 86,
                'name' => 'Roles & Permissions',
                'slug' => 'roles-permissions',
                'description' => 'Roles & Permissions Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 89,
                'parent_id' => 79,
                'name' => 'Reports',
                'slug' => 'reports',
                'description' => 'Reports Main Menu',
                'icon' => '<i class="ti ti-user-star"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 90,
                'parent_id' => 89,
                'name' => 'Expense Report',
                'slug' => 'expense-report',
                'description' => 'Expense Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 91,
                'parent_id' => 89,
                'name' => 'Invoice Report',
                'slug' => 'invoice-report',
                'description' => 'Invoice Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 92,
                'parent_id' => 89,
                'name' => 'payment Report',
                'slug' => 'payment-report',
                'description' => 'payment Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 93,
                'parent_id' => 89,
                'name' => 'project Report',
                'slug' => 'project-report',
                'description' => 'project Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 94,
                'parent_id' => 89,
                'name' => 'Task Report',
                'slug' => 'task-report',
                'description' => 'Task Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 95,
                'parent_id' => 89,
                'name' => 'User Report',
                'slug' => 'user-report',
                'description' => 'User Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 96,
                'parent_id' => 89,
                'name' => 'Employee Report',
                'slug' => 'employee-report',
                'description' => 'Employee Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 97,
                'parent_id' => 89,
                'name' => 'Payslip Report',
                'slug' => 'payslip-report',
                'description' => 'Payslip Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 98,
                'parent_id' => 89,
                'name' => 'Attendance Report',
                'slug' => 'attendance-report',
                'description' => 'Attendance Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 99,
                'parent_id' => 89,
                'name' => 'Leave Report',
                'slug' => 'leave-report',
                'description' => 'Leave Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 100,
                'parent_id' => 89,
                'name' => 'Daily Report',
                'slug' => 'daily-report',
                'description' => 'Daily Report Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 101,
                'parent_id' => 79,
                'name' => 'Settings',
                'slug' => 'settings',
                'description' => 'Settings Main Menu',
                'icon' => '<i class="ti ti-settings"></i>',
                'type' => 'menu',
                'is_active' => true
            ],
            [
                'id' => 102,
                'parent_id' => 101,
                'name' => 'General Settings',
                'slug' => 'general-settings',
                'description' => 'General Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 103,
                'parent_id' => 102,
                'name' => 'Profile',
                'slug' => 'profile',
                'description' => 'Profile Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 104,
                'parent_id' => 102,
                'name' => 'Security',
                'slug' => 'security',
                'description' => 'Security Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 105,
                'parent_id' => 102,
                'name' => 'Notifications',
                'slug' => 'notifications',
                'description' => 'Notifications Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 106,
                'parent_id' => 102,
                'name' => 'Connected Apps',
                'slug' => 'connected-apps',
                'description' => 'Connected Apps Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 107,
                'parent_id' => 101,
                'name' => 'Website Settings',
                'slug' => 'website-settings',
                'description' => 'Website Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 108,
                'parent_id' => 107,
                'name' => 'Business Settings',
                'slug' => 'business-settings',
                'description' => 'Business Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 109,
                'parent_id' => 107,
                'name' => 'SEO Settings',
                'slug' => 'seo-settings',
                'description' => 'SEO Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 110,
                'parent_id' => 107,
                'name' => 'Localization',
                'slug' => 'localization',
                'description' => 'Localization Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 111,
                'parent_id' => 107,
                'name' => 'Prefixes',
                'slug' => 'prefixes',
                'description' => 'Prefixes Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 112,
                'parent_id' => 107,
                'name' => 'Preferences',
                'slug' => 'preferences',
                'description' => 'Preferences Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 113,
                'parent_id' => 107,
                'name' => 'Appearance',
                'slug' => 'appearance',
                'description' => 'Appearance Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 114,
                'parent_id' => 107,
                'name' => 'Language',
                'slug' => 'language',
                'description' => 'Language Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 115,
                'parent_id' => 107,
                'name' => 'Authentication',
                'slug' => 'authentication',
                'description' => 'Authentication Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 116,
                'parent_id' => 107,
                'name' => 'AI Settings',
                'slug' => 'ai-settings',
                'description' => 'AI Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 117,
                'parent_id' => 101,
                'name' => 'App Settings',
                'slug' => 'app-settings',
                'description' => 'App Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 118,
                'parent_id' => 117,
                'name' => 'Salary Settings',
                'slug' => 'salary-settings',
                'description' => 'Salary Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 119,
                'parent_id' => 117,
                'name' => 'Approval Settings',
                'slug' => 'approval-settings',
                'description' => 'Approval Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 120,
                'parent_id' => 117,
                'name' => 'Invoice Settings',
                'slug' => 'invoice-settings',
                'description' => 'Invoice Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 121,
                'parent_id' => 117,
                'name' => 'Leave Type',
                'slug' => 'leave-type',
                'description' => 'Leave Type Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 122,
                'parent_id' => 117,
                'name' => 'Custom Fields',
                'slug' => 'custom-fields',
                'description' => 'Custom Fields Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 123,
                'parent_id' => 101,
                'name' => 'System Settings',
                'slug' => 'system-settings',
                'description' => 'System Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 124,
                'parent_id' => 123,
                'name' => 'Email Settings',
                'slug' => 'email-settings',
                'description' => 'Email Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 125,
                'parent_id' => 123,
                'name' => 'Email Templates',
                'slug' => 'email-templates',
                'description' => 'Email Templates Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 126,
                'parent_id' => 123,
                'name' => 'SMS Settings',
                'slug' => 'sms-settings',
                'description' => 'SMS Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 127,
                'parent_id' => 123,
                'name' => 'SMS Templates',
                'slug' => 'SMS-templates',
                'description' => 'SMS Templates Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 128,
                'parent_id' => 123,
                'name' => 'OTP',
                'slug' => 'otp',
                'description' => 'OTP Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 129,
                'parent_id' => 123,
                'name' => 'GDPR Cookies',
                'slug' => 'gdpr-cookies',
                'description' => 'GDPR Cookies Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 130,
                'parent_id' => 123,
                'name' => 'Maintenance Mode',
                'slug' => 'maintenance-mode',
                'description' => 'Maintenance Mode Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 131,
                'parent_id' => 101,
                'name' => 'Financial Settings',
                'slug' => 'financial-settings',
                'description' => 'Financial Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 132,
                'parent_id' => 131,
                'name' => 'Payment Gateways',
                'slug' => 'payment-gateways',
                'description' => 'Payment Gateways Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 133,
                'parent_id' => 131,
                'name' => 'Tax Rate',
                'slug' => 'tax-rate',
                'description' => 'Tax Rate Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 134,
                'parent_id' => 131,
                'name' => 'Currencies',
                'slug' => 'currencies',
                'description' => 'Currencies Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 135,
                'parent_id' => 101,
                'name' => 'Other Settings',
                'slug' => 'other-settings',
                'description' => 'Other Settings Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 136,
                'parent_id' => 135,
                'name' => 'Custom CSS',
                'slug' => 'custom-css',
                'description' => 'Custom CSS Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 137,
                'parent_id' => 135,
                'name' => 'Custom JS',
                'slug' => 'custom-js',
                'description' => 'Custom JS Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 138,
                'parent_id' => 135,
                'name' => 'Cronjob',
                'slug' => 'cronjob',
                'description' => 'Cronjob Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 139,
                'parent_id' => 135,
                'name' => 'Storage',
                'slug' => 'storage',
                'description' => 'Storage Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 140,
                'parent_id' => 135,
                'name' => 'Ban IP Address',
                'slug' => 'ban-ip-address',
                'description' => 'Ban IP Address Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 141,
                'parent_id' => 135,
                'name' => 'Backup',
                'slug' => 'backup',
                'description' => 'Backup Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
            [
                'id' => 142,
                'parent_id' => 135,
                'name' => 'Clear Cache',
                'slug' => 'clear-cache',
                'description' => 'Clear Cache Sub Menu',
                'icon' => null,
                'type' => 'submenu',
                'is_active' => true
            ],
        ]);
    }
}
