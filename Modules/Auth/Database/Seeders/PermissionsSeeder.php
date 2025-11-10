<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Auth\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::insert([

            // SuperAdmin //
            
            // Company
            ['name' => 'companies', 'display_name' => 'Company', 'description' => 'Access For Full Company Module Access'],
            ['name' => 'companies_list', 'display_name' => 'Company List', 'description' => 'Access For Company List'],
            ['name' => 'companies_view', 'display_name' => 'Company View', 'description' => 'Access For Company View'],
            ['name' => 'companies_add', 'display_name' => 'Company Add', 'description' => 'Access For Company Add'],
            ['name' => 'companies_edit', 'display_name' => 'Company Edit', 'description' => 'Access For Company Edit'],
            ['name' => 'companies_delete', 'display_name' => 'Company Delete', 'description' => 'Access For Company Delete'],
            ['name' => 'companies_export', 'display_name' => 'Company Export', 'description' => 'Access For Company Export'],

            // Subscription
            ['name' => 'subscriptions', 'display_name' => 'Subscription', 'description' => 'Access For Full Subscription Module Access'],
            ['name' => 'subscriptions_list', 'display_name' => 'Subscription List', 'description' => 'Access For Subscription List'],
            ['name' => 'subscriptions_view', 'display_name' => 'Subscription View', 'description' => 'Access For Subscription View'],
            ['name' => 'subscriptions_delete', 'display_name' => 'Subscription Delete', 'description' => 'Access For Subscription Delete'],
            ['name' => 'subscriptions_download', 'display_name' => 'Subscription Download', 'description' => 'Access For Subscription Download'],
            ['name' => 'subscriptions_export', 'display_name' => 'Subscription Export', 'description' => 'Access For Subscription Export'],

            // Packages 
            ['name' => 'packages', 'display_name' => 'Package', 'description' => 'Access For Full Package Module Access'],
            ['name' => 'packages_list', 'display_name' => 'Package List', 'description' => 'Access For Package List'],
            ['name' => 'packages_add', 'display_name' => 'Package Add', 'description' => 'Access For Package Add'],
            ['name' => 'packages_edit', 'display_name' => 'Package Edit', 'description' => 'Access For Package Edit'],
            ['name' => 'packages_delete', 'display_name' => 'Package Delete', 'description' => 'Access For Package Delete'],
            ['name' => 'packages_export', 'display_name' => 'Package Export', 'description' => 'Access For Package Export'],

            // Domain
            ['name' => 'domain', 'display_name' => 'Domain', 'description' => 'Access For Full Domain Module Access'],
            ['name' => 'domain_list', 'display_name' => 'Domain List', 'description' => 'Access For Domain List'],
            ['name' => 'domain_view', 'display_name' => 'Domain View', 'description' => 'Access For Domain View'],
            ['name' => 'domain_delete', 'display_name' => 'Domain Delete', 'description' => 'Access For Domain Delete'],
            ['name' => 'domain_export', 'display_name' => 'Domain Export', 'description' => 'Access For Domain Export'],

            // Purchase Transaction
            ['name' => 'purchase-transactions', 'display_name' => 'Purchase Transaction', 'description' => 'Access For Full Purchase Transaction Module Access'],
            ['name' => 'purchase-transactions_list', 'display_name' => 'Purchase Transaction List', 'description' => 'Access For Purchase Transaction List'],
            ['name' => 'purchase-transactions_view', 'display_name' => 'Purchase Transaction View', 'description' => 'Access For Purchase Transaction View'],
            ['name' => 'purchase-transactions_delete', 'display_name' => 'Purchase Transaction Delete', 'description' => 'Access For Purchase Transaction Delete'],
            ['name' => 'purchase-transactions_download', 'display_name' => 'Purchase Transaction Download', 'description' => 'Access For Purchase Transaction Download'],
            ['name' => 'purchase-transactions_export', 'display_name' => 'Purchase Transaction Export', 'description' => 'Access For Purchase Transaction Export'],

            // SuperAdmin End //

            // Projects Start //

            // Clients
            ['name' => 'clients', 'display_name' => 'Client', 'description' => 'Access For Full Client Module Access'],
            ['name' => 'clients_list', 'display_name' => 'Client List', 'description' => 'Access For Client List'],
            ['name' => 'clients_view', 'display_name' => 'Client View', 'description' => 'Access For Client View'],
            ['name' => 'clients_add', 'display_name' => 'Client Add', 'description' => 'Access For Client Add'],
            ['name' => 'clients_edit', 'display_name' => 'Client Edit', 'description' => 'Access For Client Edit'],
            ['name' => 'clients_delete', 'display_name' => 'Client Delete', 'description' => 'Access For Client Delete'],
            ['name' => 'clients_export', 'display_name' => 'Client Export', 'description' => 'Access For Client Export'],

            // Projects
            ['name' => 'projects', 'display_name' => 'Project', 'description' => 'Access For Full Project Module Access'],
            ['name' => 'projects_list', 'display_name' => 'Project List', 'description' => 'Access For Project List'],
            ['name' => 'projects_view', 'display_name' => 'Project View', 'description' => 'Access For Project View'],
            ['name' => 'projects_add', 'display_name' => 'Project Add', 'description' => 'Access For Project Add'],
            ['name' => 'projects_edit', 'display_name' => 'Project Edit', 'description' => 'Access For Project Edit'],
            ['name' => 'projects_delete', 'display_name' => 'Project Delete', 'description' => 'Access For Project Delete'],
            ['name' => 'projects_export', 'display_name' => 'Project Export', 'description' => 'Access For Project Export'],

            // Tasks
            ['name' => 'tasks', 'display_name' => 'Task', 'description' => 'Access For Full Task Module Access'],
            ['name' => 'tasks_list', 'display_name' => 'Task List', 'description' => 'Access For Task List'],
            ['name' => 'tasks_view', 'display_name' => 'Task View', 'description' => 'Access For Task View'],
            ['name' => 'tasks_add', 'display_name' => 'Task Add', 'description' => 'Access For Task Add'],
            ['name' => 'tasks_edit', 'display_name' => 'Task Edit', 'description' => 'Access For Task Edit'],
            ['name' => 'tasks_delete', 'display_name' => 'Task Delete', 'description' => 'Access For Task Delete'],
            ['name' => 'tasks_export', 'display_name' => 'Project Export', 'description' => 'Access For Project Export'],
            
            // Task Board
            ['name' => 'task_board', 'display_name' => 'Task Board', 'description' => 'Access For Full Task Board Module Access'],
            ['name' => 'task_board_view', 'display_name' => 'Task View', 'description' => 'Access For Task View'],
            ['name' => 'task_board_add', 'display_name' => 'Task Add', 'description' => 'Access For Task Add'],
            ['name' => 'task_board_edit', 'display_name' => 'Task Edit', 'description' => 'Access For Task Edit'],
            ['name' => 'task_board_delete', 'display_name' => 'Task Delete', 'description' => 'Access For Task Delete'],

            // Sub Tasks
            ['name' => 'sub_task', 'display_name' => 'Sub Task', 'description' => 'Access For Full Sub Task Module Access'],
            ['name' => 'sub_task_list', 'display_name' => 'Sub Task List', 'description' => 'Access For Sub Task List'],
            ['name' => 'sub_task_add', 'display_name' => 'Sub Task Add', 'description' => 'Access For Sub Task Add'],
            ['name' => 'sub_task_edit', 'display_name' => 'Sub Task Edit', 'description' => 'Access For Sub Task Edit'],
            ['name' => 'sub_task_delete', 'display_name' => 'Sub Task Delete', 'description' => 'Access For Sub Task Delete'],

            // Projects End //

            // CRM Start  //

            //contact
            ['name' => 'contact', 'display_name' => 'Contact', 'description' => 'Access For Full Contact Module Access'],
            ['name' => 'contact_list', 'display_name' => 'Contact List', 'description' => 'Access For Contact List'],
            ['name' => 'contact_view', 'display_name' => 'Contact View', 'description' => 'Access For Contact View'],
            ['name' => 'contact_add', 'display_name' => 'Contact Add', 'description' => 'Access For Contact Add'],
            ['name' => 'contact_edit', 'display_name' => 'Contact Edit', 'description' => 'Access For Contact Edit'],
            ['name' => 'contact_delete', 'display_name' => 'Contact Delete', 'description' => 'Access For Contact Delete'],
            ['name' => 'contact_export', 'display_name' => 'Contact Export', 'description' => 'Access For Contact Export'],

            // CRM Company
            ['name' => 'crm_company', 'display_name' => 'Company', 'description' => 'Access For Full Company Module Access'],
            ['name' => 'crm_company_list', 'display_name' => 'Company List', 'description' => 'Access For Company List'],
            ['name' => 'crm_company_view', 'display_name' => 'Company View', 'description' => 'Access For Company View'],
            ['name' => 'crm_company_add', 'display_name' => 'Company Add', 'description' => 'Access For Company Add'],
            ['name' => 'crm_company_edit', 'display_name' => 'Company Edit', 'description' => 'Access For Company Edit'],
            ['name' => 'crm_company_delete', 'display_name' => 'Company Delete', 'description' => 'Access For Company Delete'],
            ['name' => 'crm_company_export', 'display_name' => 'Company Export', 'description' => 'Access For Company Export'],

            // Deals
            ['name' => 'deal', 'display_name' => 'Deal', 'description' => 'Access For Full Deal Module Access'],
            ['name' => 'deal_list', 'display_name' => 'Deal List', 'description' => 'Access For Deal List'],
            ['name' => 'deal_view', 'display_name' => 'Deal View', 'description' => 'Access For Deal View'],
            ['name' => 'deal_add', 'display_name' => 'Deal Add', 'description' => 'Access For Deal Add'],
            ['name' => 'deal_edit', 'display_name' => 'Deal Edit', 'description' => 'Access For Deal Edit'],
            ['name' => 'deal_delete', 'display_name' => 'Deal Delete', 'description' => 'Access For Deal Delete'],
            ['name' => 'deal_export', 'display_name' => 'Deal Export', 'description' => 'Access For Deal Export'],

            // Leads
            ['name' => 'lead', 'display_name' => 'Lead', 'description' => 'Access For Full Lead Module Access'],
            ['name' => 'lead_list', 'display_name' => 'Lead List', 'description' => 'Access For Lead List'],
            ['name' => 'lead_view', 'display_name' => 'Lead View', 'description' => 'Access For Lead View'],
            ['name' => 'lead_add', 'display_name' => 'Lead Add', 'description' => 'Access For Lead Add'],
            ['name' => 'lead_edit', 'display_name' => 'Lead Edit', 'description' => 'Access For Lead Edit'],
            ['name' => 'lead_delete', 'display_name' => 'Lead Delete', 'description' => 'Access For Lead Delete'],
            ['name' => 'lead_export', 'display_name' => 'Lead Export', 'description' => 'Access For Lead Export'],

            // Pipe Line
            ['name' => 'pipeline', 'display_name' => 'Pipeline', 'description' => 'Access For Full Pipeline Module Access'],
            ['name' => 'pipeline_list', 'display_name' => 'Pipeline List', 'description' => 'Access For Pipeline List'],
            ['name' => 'pipeline_add', 'display_name' => 'Pipeline Add', 'description' => 'Access For Pipeline Add'],
            ['name' => 'pipeline_edit', 'display_name' => 'Pipeline Edit', 'description' => 'Access For Pipeline Edit'],
            ['name' => 'pipeline_delete', 'display_name' => 'Pipeline Delete', 'description' => 'Access For Pipeline Delete'],
            ['name' => 'pipeline_export', 'display_name' => 'Pipeline Export', 'description' => 'Access For Pipeline Export'],

            // Analytics
            ['name' => 'analytics', 'display_name' => 'Analytics', 'description' => 'Access For Full Analytics Module Access'],
            ['name' => 'analytics_list', 'display_name' => 'Analytics List', 'description' => 'Access For Analytics List'],
            ['name' => 'analytics_export', 'display_name' => 'Analytics Export', 'description' => 'Access For Analytics Export'],

            // Activity
            ['name' => 'activity', 'display_name' => 'Activity', 'description' => 'Access For Full Activity Module Access'],
            ['name' => 'activity_list', 'display_name' => 'Activity List', 'description' => 'Access For Activity List'],
            ['name' => 'activity_add', 'display_name' => 'Activity Add', 'description' => 'Access For Activity Add'],
            ['name' => 'activity_edit', 'display_name' => 'Activity Edit', 'description' => 'Access For Activity Edit'],
            ['name' => 'activity_delete', 'display_name' => 'Activity Delete', 'description' => 'Access For Activity Delete'],
            ['name' => 'activity_export', 'display_name' => 'Activity Export', 'description' => 'Access For Activity Export'],

            // CRM END //

            // HRM START //

            // Employee List
            ['name' => 'employees', 'display_name' => 'Employee', 'description' => 'Access For Full Employee Module Access'],
            ['name' => 'employees_view', 'display_name' => 'Employee View', 'description' => 'Access For Employee View'],
            ['name' => 'employees_add', 'display_name' => 'Employee Add', 'description' => 'Access For Employee Add'],
            ['name' => 'employees_edit', 'display_name' => 'Employee Edit', 'description' => 'Access For Employee Edit'],
            ['name' => 'employees_delete', 'display_name' => 'Employee Delete', 'description' => 'Access For Employee Delete'],
            ['name' => 'employees_export', 'display_name' => 'Employee Export', 'description' => 'Access For Employee Export'],

            // Employee Grid
            ['name' => 'employee-grid', 'display_name' => 'Employee', 'description' => 'Access For Full Employee Module Access'],
            ['name' => 'employee-grid_view', 'display_name' => 'Employee View', 'description' => 'Access For Employee View'],
            ['name' => 'employee-grid_add', 'display_name' => 'Employee Add', 'description' => 'Access For Employee Add'],
            ['name' => 'employee-grid_edit', 'display_name' => 'Employee Edit', 'description' => 'Access For Employee Edit'],
            ['name' => 'employee-grid_delete', 'display_name' => 'Employee Delete', 'description' => 'Access For Employee Delete'],
            ['name' => 'employee-grid_export', 'display_name' => 'Employee Export', 'description' => 'Access For Employee Export'],

            // Employee Details
            ['name' => 'employee-details', 'display_name' => 'Employee Details', 'description' => 'Access For Full Employee Module Access'],
            ['name' => 'employee-details_view', 'display_name' => 'Employee View', 'description' => 'Access For Employee View'],
            ['name' => 'employee-details_add', 'display_name' => 'Employee Add', 'description' => 'Access For Employee Add'],
            ['name' => 'employee-details_edit', 'display_name' => 'Employee Edit', 'description' => 'Access For Employee Edit'],
            ['name' => 'employee-details_delete', 'display_name' => 'Employee Delete', 'description' => 'Access For Employee Delete'],
            ['name' => 'employee-details_export', 'display_name' => 'Employee Export', 'description' => 'Access For Employee Export'],

            // Departments
            ['name' => 'departments', 'display_name' => 'Department', 'description' => 'Access For Full Department Module Access'],
            ['name' => 'departments_list', 'display_name' => 'Department List', 'description' => 'Access For Department List'],
            ['name' => 'departments_add', 'display_name' => 'Department Add', 'description' => 'Access For Department Add'],
            ['name' => 'departments_edit', 'display_name' => 'Department Edit', 'description' => 'Access For Department Edit'],
            ['name' => 'departments_delete', 'display_name' => 'Department Delete', 'description' => 'Access For Department Delete'],
            ['name' => 'departments_export', 'display_name' => 'Department Export', 'description' => 'Access For Department Export'],

            // Designations
            ['name' => 'designations', 'display_name' => 'Designation', 'description' => 'Access For Full Designation Module Access'],
            ['name' => 'designations_list', 'display_name' => 'Designation List', 'description' => 'Access For Designation List'],
            ['name' => 'designations_add', 'display_name' => 'Designation Add', 'description' => 'Access For Designation Add'],
            ['name' => 'designations_edit', 'display_name' => 'Designation Edit', 'description' => 'Access For Designation Edit'],
            ['name' => 'designations_delete', 'display_name' => 'Designation Delete', 'description' => 'Access For Designation Delete'],
            ['name' => 'designations_export', 'display_name' => 'Designation Export', 'description' => 'Access For Designation Export'],

            // Policy
            ['name' => 'policies', 'display_name' => 'Policy', 'description' => 'Access For Full Policy Module Access'],
            ['name' => 'policies_list', 'display_name' => 'Policy List', 'description' => 'Access For Policy List'],
            ['name' => 'policies_add', 'display_name' => 'Policy Add', 'description' => 'Access For Policy Add'],
            ['name' => 'policies_edit', 'display_name' => 'Policy Edit', 'description' => 'Access For Policy Edit'],
            ['name' => 'policies_delete', 'display_name' => 'Policy Delete', 'description' => 'Access For Policy Delete'],
            ['name' => 'policies_export', 'display_name' => 'Policy Export', 'description' => 'Access For Policy Export'],

            // Tickets
            ['name' => 'ticket', 'display_name' => 'Ticket', 'description' => 'Access For Full Ticket Module Access'],
            ['name' => 'ticket_list', 'display_name' => 'Ticket List', 'description' => 'Access For Ticket List'],
            ['name' => 'ticket_view', 'display_name' => 'Ticket View', 'description' => 'Access For Ticket View'],
            ['name' => 'ticket_add', 'display_name' => 'Ticket Add', 'description' => 'Access For Ticket Add'],
            ['name' => 'ticket_edit', 'display_name' => 'Ticket Edit', 'description' => 'Access For Ticket Edit'],
            ['name' => 'ticket_delete', 'display_name' => 'Ticket Delete', 'description' => 'Access For Ticket Delete'],
            ['name' => 'ticket_export', 'display_name' => 'Ticket Export', 'description' => 'Access For Ticket Export'],
            ['name' => 'ticket_post_reply', 'display_name' => 'Ticket Post Reply', 'description' => 'Access For Ticket Post Reply'],

            // Holiday
            ['name' => 'holidays', 'display_name' => 'Holiday', 'description' => 'Access For Full Holiday Module Access'],
            ['name' => 'holidays_view', 'display_name' => 'Holiday List', 'description' => 'Access For Holiday List'],
            ['name' => 'holidays_add', 'display_name' => 'Holiday Add', 'description' => 'Access For Holiday Add'],
            ['name' => 'holidays_edit', 'display_name' => 'Holiday Edit', 'description' => 'Access For Holiday Edit'],
            ['name' => 'holidays_delete', 'display_name' => 'Holiday Delete', 'description' => 'Access For Holiday Delete'],

            // Attendance Admin
            ['name' => 'attendance-admin', 'display_name' => 'Attendance', 'description' => 'Access For Full Attendance Module Access'],
            ['name' => 'attendance-admin_view', 'display_name' => 'Attendance List', 'description' => 'Access For Attendance List'],
            ['name' => 'attendance-admin_edit', 'display_name' => 'Attendance Edit', 'description' => 'Access For Attendance Edit'],
            ['name' => 'attendance-admin_delete', 'display_name' => 'Attendance Delete', 'description' => 'Access For Attendance Delete'],
            // ['name' => 'attendance-admin_report', 'display_name' => 'Attendance Report', 'description' => 'Access For Attendance Report'], 
            ['name' => 'attendance-admin_export', 'display_name' => 'Attendance Export', 'description' => 'Access For Attendance Export'],

            // Attendance Employee
            ['name' => 'attendance-employee', 'display_name' => 'Attendance', 'description' => 'Access For Full Attendance Module Access'],
            ['name' => 'attendance-employee_view', 'display_name' => 'Attendance List', 'description' => 'Access For Attendance List'],
            ['name' => 'attendance-employee_edit', 'display_name' => 'Attendance Edit', 'description' => 'Access For Attendance Edit'],
            ['name' => 'attendance-employee_delete', 'display_name' => 'Attendance Delete', 'description' => 'Access For Attendance Delete'],
            // ['name' => 'attendance-employee_report', 'display_name' => 'Attendance Report', 'description' => 'Access For Attendance Report'], 
            ['name' => 'attendance-employee-admin_export', 'display_name' => 'Attendance Export', 'description' => 'Access For Attendance Export'],

            // Leaves Admin
            ['name' => 'leaves-admin', 'display_name' => 'Leave', 'description' => 'Access For Full Leave Module Access'],
            ['name' => 'leaves-admin_view', 'display_name' => 'Leave List', 'description' => 'Access For Leave List'],
            ['name' => 'leaves-admin_add', 'display_name' => 'Leave Add', 'description' => 'Access For Leave Add'],
            ['name' => 'leaves-admin_edit', 'display_name' => 'Leave Edit', 'description' => 'Access For Leave Edit'],
            ['name' => 'leaves-admin_delete', 'display_name' => 'Leave Delete', 'description' => 'Access For Leave Delete'],
            ['name' => 'leaves-admin_export', 'display_name' => 'Leave Export', 'description' => 'Access For Leave Export'],

            // Leaves Employee
            ['name' => 'leaves-employee', 'display_name' => 'Leave', 'description' => 'Access For Full Leave Module Access'],
            ['name' => 'leaves-employee_view', 'display_name' => 'Leave List', 'description' => 'Access For Leave List'],
            ['name' => 'leaves-employee_add', 'display_name' => 'Leave Add', 'description' => 'Access For Leave Add'],
            ['name' => 'leaves-employee_edit', 'display_name' => 'Leave Edit', 'description' => 'Access For Leave Edit'],
            ['name' => 'leaves-employee_delete', 'display_name' => 'Leave Delete', 'description' => 'Access For Leave Delete'],
            ['name' => 'leaves-employee_export', 'display_name' => 'Leave Export', 'description' => 'Access For Leave Export'],

            // Leaves Settings
            ['name' => 'leaves-settings', 'display_name' => 'Leave', 'description' => 'Access For Full Leave Module Access'],
            ['name' => 'leaves-settings_view', 'display_name' => 'Leave List', 'description' => 'Access For Leave List'],
            ['name' => 'leaves-settings_add', 'display_name' => 'Leave Add', 'description' => 'Access For Leave Add'],
            ['name' => 'leaves-settings_edit', 'display_name' => 'Leave Edit', 'description' => 'Access For Leave Edit'],
            ['name' => 'leaves-settings_delete', 'display_name' => 'Leave Delete', 'description' => 'Access For Leave Delete'],
            ['name' => 'leaves-settings_export', 'display_name' => 'Leave Export', 'description' => 'Access For Leave Export'],

            // Timesheets
            ['name' => 'timesheets', 'display_name' => 'Timesheet', 'description' => 'Access For Full Timesheet Module Access'],
            ['name' => 'timesheets_view', 'display_name' => 'Timesheet List', 'description' => 'Access For Timesheet List'],
            ['name' => 'timesheets_add', 'display_name' => 'Timesheet Add', 'description' => 'Access For Timesheet Add'],
            ['name' => 'timesheets_edit', 'display_name' => 'Timesheet Edit', 'description' => 'Access For Timesheet Edit'],
            ['name' => 'timesheets_delete', 'display_name' => 'Timesheet Delete', 'description' => 'Access For Timesheet Delete'],
            ['name' => 'timesheets_export', 'display_name' => 'Timesheet Export', 'description' => 'Access For Timesheet Export'],

            // Shift And schedule
            ['name' => 'shift-schedule', 'display_name' => 'Shift Schedule', 'description' => 'Access For Full Shift And Schedule Module Access'],
            ['name' => 'shift-schedule_view', 'display_name' => 'Shift Schedule List', 'description' => 'Access For Shift Schedule List'],
            ['name' => 'shift-schedule_add', 'display_name' => 'Shift Schedule Add', 'description' => 'Access For Shift Schedule Add'],
            ['name' => 'shift-schedule_edit', 'display_name' => 'Shift Schedule Edit', 'description' => 'Access For Shift Schedule Edit'],
            ['name' => 'shift-schedule_delete', 'display_name' => 'Shift Schedule Delete', 'description' => 'Access For Shift Schedule Delete'],
            ['name' => 'shift-schedule_export', 'display_name' => 'Shift Schedule Export', 'description' => 'Access For Shift Schedule Export'],

            // Overtime
            ['name' => 'overtime', 'display_name' => 'Overtime', 'description' => 'Access For Full Overtime Module Access'],
            ['name' => 'overtime_list', 'display_name' => 'Overtime List', 'description' => 'Access For Overtime List'],
            ['name' => 'overtime_add', 'display_name' => 'Overtime Add', 'description' => 'Access For Overtime Add'],
            ['name' => 'overtime_edit', 'display_name' => 'Overtime Edit', 'description' => 'Access For Overtime Edit'],
            ['name' => 'overtime_delete', 'display_name' => 'Overtime Delete', 'description' => 'Access For Overtime Delete'],
            ['name' => 'overtime_export', 'display_name' => 'Overtime Export', 'description' => 'Access For Overtime Export'],

            // Performance Indicator
            ['name' => 'performance_indicator', 'display_name' => 'Performance Indicator', 'description' => 'Access For Full Performance Indicator Module Access'],
            ['name' => 'performance_indicator_list', 'display_name' => 'Performance Indicator List', 'description' => 'Access For Performance Indicator List'],
            ['name' => 'performance_indicator_add', 'display_name' => 'Performance Indicator Add', 'description' => 'Access For Performance Indicator Add'],
            ['name' => 'performance_indicator_edit', 'display_name' => 'Performance Indicator Edit', 'description' => 'Access For Performance Indicator Edit'],
            ['name' => 'performance_indicator_delete', 'display_name' => 'Performance Indicator Delete', 'description' => 'Access For Performance Indicator Delete'],

            // Performance Review
            ['name' => 'performance_review', 'display_name' => 'Performance Review', 'description' => 'Access For Full Performance Review Module Access'],
            ['name' => 'performance_review_list', 'display_name' => 'Performance Review List', 'description' => 'Access For Performance Review List'],
            ['name' => 'performance_review_add', 'display_name' => 'Performance Review Add', 'description' => 'Access For Performance Review Add'],
            ['name' => 'performance_review_edit', 'display_name' => 'Performance Review Edit', 'description' => 'Access For Performance Review Edit'],
            ['name' => 'performance_review_delete', 'display_name' => 'Performance Review Delete', 'description' => 'Access For Performance Review Delete'],
            ['name' => 'performance_review_export', 'display_name' => 'Performance Review Export', 'description' => 'Access For Performance Review Export'],

            // Performance Appraisal
            ['name' => 'performance_appraisal', 'display_name' => 'Performance Appraisal', 'description' => 'Access For Full Performance Appraisal Module Access'],
            ['name' => 'performance_appraisal_list', 'display_name' => 'Performance Appraisal List', 'description' => 'Access For Performance Appraisal List'],
            ['name' => 'performance_appraisal_add', 'display_name' => 'Performance Appraisal Add', 'description' => 'Access For Performance Appraisal Add'],
            ['name' => 'performance_appraisal_edit', 'display_name' => 'Performance Appraisal Edit', 'description' => 'Access For Performance Appraisal Edit'],
            ['name' => 'performance_appraisal_delete', 'display_name' => 'Performance Appraisal Delete', 'description' => 'Access For Performance Appraisal Delete'],

            // Goal List
            ['name' => 'goal_list', 'display_name' => 'Goal List', 'description' => 'Access For Full Goal List Module Access'],
            ['name' => 'goal_list_all', 'display_name' => 'Goal List All ', 'description' => 'Access For Goal List'],
            ['name' => 'goal_add', 'display_name' => 'Goal Add', 'description' => 'Access For Goal Add'],
            ['name' => 'goal_edit', 'display_name' => 'Goal Edit', 'description' => 'Access For Goal Edit'],
            ['name' => 'goal_delete', 'display_name' => 'Goal Delete', 'description' => 'Access For Goal Delete'],

            // Goal Type
            ['name' => 'goal_type', 'display_name' => 'Goal Type', 'description' => 'Access For Full Goal Type Module Access'],
            ['name' => 'goal_type_list', 'display_name' => 'Goal Type List', 'description' => 'Access For Goal Type List'],
            ['name' => 'goal_type_add', 'display_name' => 'Goal Type Add', 'description' => 'Access For Goal Type Add'],
            ['name' => 'goal_type_edit', 'display_name' => 'Goal Type Edit', 'description' => 'Access For Goal Type Edit'],
            ['name' => 'goal_type_delete', 'display_name' => 'Goal Type Delete', 'description' => 'Access For Goal Type Delete'],

            // Training
            ['name' => 'training', 'display_name' => 'Training', 'description' => 'Access For Full Training Module Access'],
            ['name' => 'training_list', 'display_name' => 'Training List', 'description' => 'Access For Training List'],
            ['name' => 'training_add', 'display_name' => 'Training Add', 'description' => 'Access For Training Add'],
            ['name' => 'training_edit', 'display_name' => 'Training Edit', 'description' => 'Access For Training Edit'],
            ['name' => 'training_delete', 'display_name' => 'Training Delete', 'description' => 'Access For Training Delete'],

            // Trainers
            ['name' => 'trainers', 'display_name' => 'Trainers', 'description' => 'Access For Full Trainers Module Access'],
            ['name' => 'trainers_list', 'display_name' => 'Trainers List', 'description' => 'Access For Trainers List'],
            ['name' => 'trainers_add', 'display_name' => 'Trainers Add', 'description' => 'Access For Trainers Add'],
            ['name' => 'trainers_edit', 'display_name' => 'Trainers Edit', 'description' => 'Access For Trainers Edit'],
            ['name' => 'trainers_delete', 'display_name' => 'Trainers Delete', 'description' => 'Access For Trainers Delete'],

            // Training Type
            ['name' => 'training_type', 'display_name' => 'Training Type', 'description' => 'Access For Full Training Type Module Access'],
            ['name' => 'training_type_list', 'display_name' => 'Training Type List', 'description' => 'Access For Training Type List'],
            ['name' => 'training_type_add', 'display_name' => 'Training Type Add', 'description' => 'Access For Training Type Add'],
            ['name' => 'training_type_edit', 'display_name' => 'Training Type Edit', 'description' => 'Access For Training Type Edit'],
            ['name' => 'training_type_delete', 'display_name' => 'Training Type Delete', 'description' => 'Access For Training Type Delete'],

            // Promotion
            ['name' => 'promotion', 'display_name' => 'Promotion', 'description' => 'Access For Full Promotion Module Access'],
            ['name' => 'promotion_list', 'display_name' => 'Promotion List', 'description' => 'Access For Promotion List'],
            ['name' => 'promotion_add', 'display_name' => 'Promotion Add', 'description' => 'Access For Promotion Add'],
            ['name' => 'promotion_edit', 'display_name' => 'Promotion Edit', 'description' => 'Access For Promotion Edit'],
            ['name' => 'promotion_delete', 'display_name' => 'Promotion Delete', 'description' => 'Access For Promotion Delete'],

            // Resignation
            ['name' => 'resignation', 'display_name' => 'Resignation', 'description' => 'Access For Full Resignation Module Access'],
            ['name' => 'resignation_list', 'display_name' => 'Resignation List', 'description' => 'Access For Resignation List'],
            ['name' => 'resignation_add', 'display_name' => 'Resignation Add', 'description' => 'Access For Resignation Add'],
            ['name' => 'resignation_edit', 'display_name' => 'Resignation Edit', 'description' => 'Access For Resignation Edit'],
            ['name' => 'resignation_delete', 'display_name' => 'Resignation Delete', 'description' => 'Access For Resignation Delete'],

            // Termination
            ['name' => 'termination', 'display_name' => 'Termination', 'description' => 'Access For Full Termination Module Access'],
            ['name' => 'termination_list', 'display_name' => 'Termination List', 'description' => 'Access For Termination List'],
            ['name' => 'termination_add', 'display_name' => 'Termination Add', 'description' => 'Access For Termination Add'],
            ['name' => 'termination_edit', 'display_name' => 'Termination Edit', 'description' => 'Access For Termination Edit'],
            ['name' => 'termination_delete', 'display_name' => 'Termination Delete', 'description' => 'Access For Termination Delete'],

            // HRM END //

            // Recruitment Start //

            // Job
            ['name' => 'job', 'display_name' => 'Job', 'description' => 'Access For Full Job Module Access'],
            ['name' => 'job_list', 'display_name' => 'Job List', 'description' => 'Access For Job List'],
            ['name' => 'job_add', 'display_name' => 'Job Add', 'description' => 'Access For Job Add'],
            ['name' => 'job_edit', 'display_name' => 'Job Edit', 'description' => 'Access For Job Edit'],
            ['name' => 'job_delete', 'display_name' => 'Job Delete', 'description' => 'Access For Job Delete'],
            ['name' => 'job_export', 'display_name' => 'Job Export', 'description' => 'Access For Job Export'],

            // Candidates
            ['name' => 'candidate', 'display_name' => 'Candidate', 'description' => 'Access For Full Candidate Module Access'],
            ['name' => 'candidate_list', 'display_name' => 'Candidate List', 'description' => 'Access For Candidate List'],
            ['name' => 'candidate_add', 'display_name' => 'Candidate Add', 'description' => 'Access For Candidate Add'],
            ['name' => 'candidate_edit', 'display_name' => 'Candidate Edit', 'description' => 'Access For Candidate Edit'],
            ['name' => 'candidate_delete', 'display_name' => 'Candidate Delete', 'description' => 'Access For Candidate Delete'],
            ['name' => 'candidate_export', 'display_name' => 'Candidate Export', 'description' => 'Access For Candidate Export'],
            ['name' => 'candidate_resume_download', 'display_name' => 'Candidate Resume Download', 'description' => 'Access For Candidate Resume Download'],

            // Referals
            ['name' => 'referral', 'display_name' => 'Referral', 'description' => 'Access For Full Referral Module Access'],
            ['name' => 'referral_list', 'display_name' => 'Referral List', 'description' => 'Access For Referral List'],
            ['name' => 'referral_add', 'display_name' => 'Referral Add', 'description' => 'Access For Referral Add'],
            ['name' => 'referral_edit', 'display_name' => 'Referral Edit', 'description' => 'Access For Referral Edit'],
            ['name' => 'referral_delete', 'display_name' => 'Referral Delete', 'description' => 'Access For Referral Delete'],

            // Recruitment End //

            // Finance And Accounts Start //

            // Sales

            // Estimates
            ['name' => 'estimate', 'display_name' => 'Estimate', 'description' => 'Access For Full Estimate Module Access'],
            ['name' => 'estimate_list', 'display_name' => 'Estimate List', 'description' => 'Access For Estimate List'],
            ['name' => 'estimate_add', 'display_name' => 'Estimate Add', 'description' => 'Access For Estimate Add'],
            ['name' => 'estimate_edit', 'display_name' => 'Estimate Edit', 'description' => 'Access For Estimate Edit'],
            ['name' => 'estimate_delete', 'display_name' => 'Estimate Delete', 'description' => 'Access For Estimate Delete'],

            // invoices
            ['name' => 'invoice', 'display_name' => 'Invoice', 'description' => 'Access For Full Invoice Module Access'],
            ['name' => 'invoice_list', 'display_name' => 'Invoice List', 'description' => 'Access For Invoice List'],
            ['name' => 'invoice_view', 'display_name' => 'Invoice View', 'description' => 'Access For Invoice View'],
            ['name' => 'invoice_add', 'display_name' => 'Invoice Add', 'description' => 'Access For Invoice Add'],
            ['name' => 'invoice_edit', 'display_name' => 'Invoice Edit', 'description' => 'Access For Invoice Edit'],
            ['name' => 'invoice_delete', 'display_name' => 'Invoice Delete', 'description' => 'Access For Invoice Delete'],
            ['name' => 'invoice_export', 'display_name' => 'Invoice Export', 'description' => 'Access For Invoice Export'],

            // Payments 
            ['name' => 'payment', 'display_name' => 'Payment', 'description' => 'Access For Full Payment Module Access'],
            ['name' => 'payment_list', 'display_name' => 'Payment List', 'description' => 'Access For Payment List'],
            ['name' => 'payment_view', 'display_name' => 'Payment View', 'description' => 'Access For Payment View'],
            ['name' => 'payment_add', 'display_name' => 'Payment Add', 'description' => 'Access For Payment Add'],
            ['name' => 'payment_edit', 'display_name' => 'Payment Edit', 'description' => 'Access For Payment Edit'],
            ['name' => 'payment_delete', 'display_name' => 'Payment Delete', 'description' => 'Access For Payment Delete'],
            ['name' => 'payment_export', 'display_name' => 'Payment Export', 'description' => 'Access For Payment Export'],

            // Expenses
            ['name' => 'expense', 'display_name' => 'Expense', 'description' => 'Access For Full Expense Module Access'],
            ['name' => 'expense_list', 'display_name' => 'Expense List', 'description' => 'Access For Expense List'],
            ['name' => 'expense_view', 'display_name' => 'Expense View', 'description' => 'Access For Expense View'],
            ['name' => 'expense_add', 'display_name' => 'Expense Add', 'description' => 'Access For Expense Add'],
            ['name' => 'expense_edit', 'display_name' => 'Expense Edit', 'description' => 'Access For Expense Edit'],
            ['name' => 'expense_delete', 'display_name' => 'Expense Delete', 'description' => 'Access For Expense Delete'],
            ['name' => 'expense_export', 'display_name' => 'Expense Export', 'description' => 'Access For Expense Export'],

            // Provident Fund
            ['name' => 'provident_fund', 'display_name' => 'Provident Fund', 'description' => 'Access For Full Provident Fund Module Access'],
            ['name' => 'provident_fund_list', 'display_name' => 'Provident Fund List', 'description' => 'Access For Provident Fund List'],
            ['name' => 'provident_fund_view', 'display_name' => 'Provident Fund View', 'description' => 'Access For Provident Fund View'],
            ['name' => 'provident_fund_add', 'display_name' => 'Provident Fund Add', 'description' => 'Access For Provident Fund Add'],
            ['name' => 'provident_fund_edit', 'display_name' => 'Provident Fund Edit', 'description' => 'Access For Provident Fund Edit'],
            ['name' => 'provident_fund_delete', 'display_name' => 'Provident Fund Delete', 'description' => 'Access For Provident Fund Delete'],
            ['name' => 'provident_fund_export', 'display_name' => 'Provident Fund Export', 'description' => 'Access For Provident Fund Export'],

            // Taxes
            ['name' => 'tax', 'display_name' => 'Tax', 'description' => 'Access For Full Tax Module Access'],
            ['name' => 'tax_list', 'display_name' => 'Tax List', 'description' => 'Access For Tax List'],
            ['name' => 'tax_view', 'display_name' => 'Tax View', 'description' => 'Access For Tax View'],
            ['name' => 'tax_add', 'display_name' => 'Tax Add', 'description' => 'Access For Tax Add'],
            ['name' => 'tax_edit', 'display_name' => 'Tax Edit', 'description' => 'Access For Tax Edit'],
            ['name' => 'tax_delete', 'display_name' => 'Tax Delete', 'description' => 'Access For Tax Delete'],
            ['name' => 'tax_export', 'display_name' => 'Tax Export', 'description' => 'Access For Tax Export'],

            // Sales End

            // Accounting 

            // Categories
            ['name' => 'category', 'display_name' => 'Category', 'description' => 'Access For Full Category Module Access'],
            ['name' => 'category_list', 'display_name' => 'Category List', 'description' => 'Access For Category List'],
            ['name' => 'category_view', 'display_name' => 'Category View', 'description' => 'Access For Category View'],
            ['name' => 'category_add', 'display_name' => 'Category Add', 'description' => 'Access For Category Add'],
            ['name' => 'category_edit', 'display_name' => 'Category Edit', 'description' => 'Access For Category Edit'],
            ['name' => 'category_delete', 'display_name' => 'Category Delete', 'description' => 'Access For Category Delete'],

            // Budget
            ['name' => 'budget', 'display_name' => 'Budget', 'description' => 'Access For Full Budget Module Access'],
            ['name' => 'budget_list', 'display_name' => 'Budget List', 'description' => 'Access For Budget List'],
            ['name' => 'budget_view', 'display_name' => 'Budget View', 'description' => 'Access For Budget View'],
            ['name' => 'budget_add', 'display_name' => 'Budget Add', 'description' => 'Access For Budget Add'],
            ['name' => 'budget_edit', 'display_name' => 'Budget Edit', 'description' => 'Access For Budget Edit'],
            ['name' => 'budget_delete', 'display_name' => 'Budget Delete', 'description' => 'Access For Budget Delete'],

            // budget-expense
            ['name' => 'budget_expense', 'display_name' => 'Budget Expense', 'description' => 'Access For Full Budget Expense Module Access'],
            ['name' => 'budget_expense_list', 'display_name' => 'Budget Expense List', 'description' => 'Access For Budget Expense List'],
            ['name' => 'budget_expense_view', 'display_name' => 'Budget Expense View', 'description' => 'Access For Budget Expense View'],
            ['name' => 'budget_expense_add', 'display_name' => 'Budget Expense Add', 'description' => 'Access For Budget Expense Add'],
            ['name' => 'budget_expense_edit', 'display_name' => 'Budget Expense Edit', 'description' => 'Access For Budget Expense Edit'],
            ['name' => 'budget_expense_delete', 'display_name' => 'Budget Expense Delete', 'description' => 'Access For Budget Expense Delete'],

            // budget-revenue
            ['name' => 'budget_revenue', 'display_name' => 'Budget Revenue', 'description' => 'Access For Full Budget Revenue Module Access'],
            ['name' => 'budget_revenue_list', 'display_name' => 'Budget Revenue List', 'description' => 'Access For Budget Revenue List'],
            ['name' => 'budget_revenue_view', 'display_name' => 'Budget Revenue View', 'description' => 'Access For Budget Revenue View'],
            ['name' => 'budget_revenue_add', 'display_name' => 'Budget Revenue Add', 'description' => 'Access For Budget Revenue Add'],
            ['name' => 'budget_revenue_edit', 'display_name' => 'Budget Revenue Edit', 'description' => 'Access For Budget Revenue Edit'],
            ['name' => 'budget_revenue_delete', 'display_name' => 'Budget Revenue Delete', 'description' => 'Access For Budget Revenue Delete'],

            // Accounting End

            // PayRoll

            // employee-salary
            ['name' => 'employee_salary', 'display_name' => 'Employee Salary', 'description' => 'Access For Full Employee Salary Module Access'],
            ['name' => 'employee_salary_list', 'display_name' => 'Employee Salary List', 'description' => 'Access For Employee Salary List'],
            ['name' => 'employee_salary_view', 'display_name' => 'Employee Salary View', 'description' => 'Access For Employee Salary View'],
            ['name' => 'employee_salary_add', 'display_name' => 'Employee Salary Add', 'description' => 'Access For Employee Salary Add'],
            ['name' => 'employee_salary_edit', 'display_name' => 'Employee Salary Edit', 'description' => 'Access For Employee Salary Edit'],
            ['name' => 'employee_salary_delete', 'display_name' => 'Employee Salary Delete', 'description' => 'Access For Employee Salary Delete'],

            // Payslip
            ['name' => 'payslip', 'display_name' => 'Payslip', 'description' => 'Access For Full Payslip Module Access'],
            ['name' => 'payslip_view', 'display_name' => 'Payslip View', 'description' => 'Access For Payslip View'],
            ['name' => 'payslip_download', 'display_name' => 'Payslip Download', 'description' => 'Access For Payslip Download'],

            // payroll
            ['name' => 'payroll', 'display_name' => 'Payroll', 'description' => 'Access For Full Payroll Module Access'],
            ['name' => 'payroll_list', 'display_name' => 'Payroll List', 'description' => 'Access For Payroll List'],
            ['name' => 'payroll_view', 'display_name' => 'Payroll View', 'description' => 'Access For Payroll View'],
            ['name' => 'payroll_add', 'display_name' => 'Payroll Add', 'description' => 'Access For Payroll Add'],
            ['name' => 'payroll_edit', 'display_name' => 'Payroll Edit', 'description' => 'Access For Payroll Edit'],
            ['name' => 'payroll_delete', 'display_name' => 'Payroll Delete', 'description' => 'Access For Payroll Delete'],

            // PayRoll End

            // Finance And Accounts End

            // Administration Start

            // Assets
            ['name' => 'assets', 'display_name' => 'Assets', 'description' => 'Access For Full Assets Module Access'],
            ['name' => 'assets_list', 'display_name' => 'Assets List', 'description' => 'Access For Assets List'],
            ['name' => 'assets_view', 'display_name' => 'Assets View', 'description' => 'Access For Assets View'],
            ['name' => 'assets_add', 'display_name' => 'Assets Add', 'description' => 'Access For Assets Add'],
            ['name' => 'assets_edit', 'display_name' => 'Assets Edit', 'description' => 'Access For Assets Edit'],
            ['name' => 'assets_delete', 'display_name' => 'Assets Delete', 'description' => 'Access For Assets Delete'],

            // Assets Category
            ['name' => 'assets_category', 'display_name' => 'Assets Category', 'description' => 'Access For Full Assets Category Module Access'],
            ['name' => 'assets_category_list', 'display_name' => 'Assets Category List', 'description' => 'Access For Assets Category List'],
            ['name' => 'assets_category_view', 'display_name' => 'Assets Category View', 'description' => 'Access For Assets Category View'],
            ['name' => 'assets_category_add', 'display_name' => 'Assets Category Add', 'description' => 'Access For Assets Category Add'],
            ['name' => 'assets_category_edit', 'display_name' => 'Assets Category Edit', 'description' => 'Access For Assets Category Edit'],
            ['name' => 'assets_category_delete', 'display_name' => 'Assets Category Delete', 'description' => 'Access For Assets Category Delete'],

            // Help And Supports

            // knowledegebase
            ['name' => 'knowledgebase', 'display_name' => 'Knowledgebase', 'description' => 'Access For Full Knowledgebase Module Access'],
            ['name' => 'knowledgebase_list', 'display_name' => 'Knowledgebase List', 'description' => 'Access For Knowledgebase List'],
            ['name' => 'knowledgebase_view', 'display_name' => 'Knowledgebase View', 'description' => 'Access For Knowledgebase View'],
            ['name' => 'knowledgebase_add', 'display_name' => 'Knowledgebase Add', 'description' => 'Access For Knowledgebase Add'],
            ['name' => 'knowledgebase_edit', 'display_name' => 'Knowledgebase Edit', 'description' => 'Access For Knowledgebase Edit'],
            ['name' => 'knowledgebase_delete', 'display_name' => 'Knowledgebase Delete', 'description' => 'Access For Knowledgebase Delete'],

            // Activity
            ['name' => 'admin_activity', 'display_name' => 'Admin Activity', 'description' => 'Access For Full Admin Activity Module Access'],
            ['name' => 'admin_activity_list', 'display_name' => 'Admin Activity List', 'description' => 'Access For Admin Activity List'],
            ['name' => 'admin_activity_view', 'display_name' => 'Admin Activity View', 'description' => 'Access For Admin Activity View'],
            ['name' => 'admin_activity_add', 'display_name' => 'Admin Activity Add', 'description' => 'Access For Admin Activity Add'],
            ['name' => 'admin_activity_edit', 'display_name' => 'Admin Activity Edit', 'description' => 'Access For Admin Activity Edit'],
            ['name' => 'admin_activity_delete', 'display_name' => 'Admin Activity Delete', 'description' => 'Access For Admin Activity Delete'],

            // Reports
            ['name' => 'reports', 'display_name' => 'Reports', 'description' => 'Access For Full Reports Module'],
            ['name' => 'expense_report', 'display_name' => 'Expense Report', 'description' => 'Access For Expense Report'],
            ['name' => 'invoice_report', 'display_name' => 'Invoice Report', 'description' => 'Access For Invoice Report'],
            ['name' => 'payment_report', 'display_name' => 'Payment Report', 'description' => 'Access For Payment Report'],
            ['name' => 'project_report', 'display_name' => 'Project Report', 'description' => 'Access For Project Report'],
            ['name' => 'task_report', 'display_name' => 'Task Report', 'description' => 'Access For Task Report'],
            ['name' => 'employee_report', 'display_name' => 'Employee Report', 'description' => 'Access For Employee Report'],
            ['name' => 'payslip_report', 'display_name' => 'Payslip Report', 'description' => 'Access For Payslip Report'],
            ['name' => 'attendance_report_admin', 'display_name' => 'Attendance Report Admin', 'description' => 'Access For Attendance Report Admin'],
            ['name' => 'leave_report', 'display_name' => 'Leave Report', 'description' => 'Access For Leave Report'],
            ['name' => 'daily_report', 'display_name' => 'Daily Report', 'description' => 'Access For Daily Report'],
            
            // Administration End

            // Custom Permissions
            ['name' => 'ui-access', 'display_name' => 'UI Access', 'description' => 'Access For User Interface Access'],
            ['name' => 'role-permission-access', 'display_name' => 'Role Permission Access', 'description' => 'Access For Role Permission Access'],



            // Content Balance
            // Pages Balance

            
        ]);
    }
}
