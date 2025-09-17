<?php

use Illuminate\Support\Facades\Route;
use Modules\SuperAdmin\Http\Controllers\CompanyController;
use Modules\SuperAdmin\Http\Controllers\PackageController;

Route::middleware(['web', 'auth', 'role:super_admin'])->group(function () {
    // Companies
    Route::get('companies', [CompanyController::class, 'index'])->name('companies');
    Route::post('add-company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('companies-datatable', [CompanyController::class, 'dataTable'])->name('companies.data-table');

    //Packages
    Route::get('packages', [PackageController::class, 'index'])->name('packages');
    Route::get('packages-grid', [PackageController::class, 'indexGrid'])->name('packages-grid');
    Route::get('packages-datatable', [PackageController::class, 'dataTable'])->name('package.data-table');
    Route::post('add-package', [PackageController::class, 'store'])->name('package.store');
    Route::delete('delete-package/{package}', [PackageController::class, 'delete'])->name('package.delete');
});
