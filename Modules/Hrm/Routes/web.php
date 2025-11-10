<?php

use Illuminate\Support\Facades\Route;
use Modules\Hrm\Http\Controllers\EmployeeController;
use Modules\Hrm\Http\Controllers\LeaveController;
use Modules\Hrm\Http\Controllers\HolidayController;

Route::middleware(['web'])->group(function () {

    Route::middleware(['auth'])->group(function () {
        // Company-specific login (with dynamic slug)
        Route::prefix('{company}')->group(function () {
            Route::get('/employees', [EmployeeController::class, 'listView'])->name('company.employees');
            Route::get('/employee-grid_view', [EmployeeController::class, 'gridView'])->name('company.employees.grid-view');
            Route::group(['middleware' => ['company.permission:employees_add,employees']], function() {
                Route::post('/employees', [EmployeeController::class, 'store'])->name('company.employees.store');
            });
            Route::group(['middleware' => ['company.permission:employees_view,employees']], function() {
                Route::get('/employees-datatable', [EmployeeController::class, 'employeesDataTable'])->name('company.employees.data-table');
            });

            // Leave
            Route::get('/leaves-employee', [LeaveController::class, 'leavesEmployeeIndex'])->name('company.leave.employee');

            // Holidays
            Route::get('/holidays', [HolidayController::class, 'index'])->name('company.holidays');
            Route::group(['middleware' => ['company.permission:holidays_view,holidays']], function() {
                Route::get('/holidays-datatable', [HolidayController::class, 'dataTable'])->name('company.holidays.data-table');
            });
            Route::group(['middleware' => ['company.permission:holidays_add,holidays']], function() {
                Route::post('/holidays', [HolidayController::class, 'addHoliday'])->name('company.holiday.add');
            });
            Route::group(['middleware' => ['company.permission:ui-access']], function() {
                Route::post('/holidays-manage-table', [HolidayController::class, 'manageTable'])->name('company.holiday.manage.table');
                Route::post('/holidays-add-new-field', [HolidayController::class, 'addNewFieldHoliday'])->name('company.holiday.add.new.field');
            });
            // Route::group(['middleware' => ['company.permission:holidays_add']], function() {
            //     Route::post('/holidays', [EmployeeController::class, 'holidayStore'])->name('company.holidays.store');
            // });
            // Route::group(['middleware' => ['company.permission:holidays_view,holidays']], function() {
            //     Route::get('/holidays-datatable', [EmployeeController::class, 'holidayDataTable'])->name('company.holidays.data-table');
            // });

            // Dynamic Designation fetch
            Route::get('/departments/{department}/designations', [EmployeeController::class, 'designationsFetchByDepartment'])->name('company.designations');

        });
        
    });
});
