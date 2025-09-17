<?php

use Illuminate\Support\Facades\Route;
use Modules\Hrm\Http\Controllers\EmployeeController;
use Modules\Hrm\Http\Controllers\LeaveController;

Route::middleware(['web'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        // Company-specific login (with dynamic slug)
        Route::prefix('{company}')->group(function () {
            Route::get('/employees', [EmployeeController::class, 'listView'])->name('company.employees');
            Route::group(['middleware' => ['company.permission:employees_add']], function() {
                Route::post('/employees', [EmployeeController::class, 'store'])->name('company.employees.store');
            });
            Route::group(['middleware' => ['company.permission:employees_view,employees']], function() {
                Route::get('/employees-datatable', [EmployeeController::class, 'employeesDataTable'])->name('company.employees.data-table');
            });

            // Leave
            Route::get('/leaves-employee', [LeaveController::class, 'leavesEmployeeIndex'])->name('company.leave.employee');

            // Dynamic Designation fetch
            Route::get('/departments/{department}/designations', [EmployeeController::class, 'designationsFetchByDepartment'])->name('company.designations');

        });
        
    });
});
