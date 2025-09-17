<?php

use Illuminate\Support\Facades\Route;
use Modules\Common\Http\Controllers\SettingController;

Route::middleware(['web'])->group(function () {

    Route::middleware(['auth', 'role:ceo'])->group(function () {
        // Company-specific login (with dynamic slug)
        Route::prefix('{company}')->group(function () {

            // <!-- Settings --> //
            // General
            Route::get('/profile-settings', [SettingController::class, 'profileSetting'])->name('company.profile.setting');
            Route::get('/security-settings', [SettingController::class, 'securitySetting'])->name('company.security.setting');
            Route::get('/notification-settings', [SettingController::class, 'notificationSetting'])->name('company.notification.setting');
            Route::get('/connected-apps', [SettingController::class, 'connectedApps'])->name('company.connected-apps');

            // Website
            Route::get('/bussiness-settings', [SettingController::class, 'bussinessSetting'])->name('company.bussiness.setting');
            Route::get('/seo-settings', [SettingController::class, 'seoSetting'])->name('company.seo.setting');
            Route::get('/authentication-settings', [SettingController::class, 'authenticationSetting'])->name('company.authentication.setting');
            Route::put('/authentication-settings-update', [SettingController::class, 'authenticationSettingsUpdate'])->name('company.authentication.setting.update');
            Route::get('/prefixes', [SettingController::class, 'prefix'])->name('company.prefix');
            Route::post('/prefixes', [SettingController::class, 'addPrefix'])->name('company.prefix.add');
            Route::put('/prefixes-update', [SettingController::class, 'updatePrefix'])->name('company.prefix.update');
            Route::get('/preferences', [SettingController::class, 'preferences'])->name('company.preferences');
            Route::get('/appearance', [SettingController::class, 'appearance'])->name('company.appearance');
            Route::get('/language', [SettingController::class, 'language'])->name('company.language');
            Route::get('/ai-settings', [SettingController::class, 'aiSetting'])->name('company.ai.setting');
            Route::get('/localization-settings', [SettingController::class, 'localizationSetting'])->name('company.localization.setting');
            Route::post('/localization-settings', [SettingController::class, 'addLocalizationSetting'])->name('company.localization.setting.add');

            // App
            Route::get('/leave-type', [SettingController::class, 'leaveType'])->name('company.leave-type');
            Route::get('/leave-types-datatable', [SettingController::class, 'leaveTypeDataTable'])->name('company.leave-type.datatable');
            Route::post('/leave-type', [SettingController::class, 'addLeaveType'])->name('company.leave-type.add');
            Route::get('/leave-type-get/{leave_type}', [SettingController::class, 'getLeaveType'])->name('company.leave-type.get');
            Route::put('/leave-type-update/{leave_type}', [SettingController::class, 'updateLeaveType'])->name('company.leave-type.update');
            Route::delete('/leave-type-delete/{leave_type}', [SettingController::class, 'deleteLeaveType'])->name('company.leave-type.delete');
            Route::get('/salary-settings', [SettingController::class, 'salarySettings'])->name('company.salary.setting');
            Route::get('/approval-settings', [SettingController::class, 'approvalSettings'])->name('company.approval.setting');
            Route::get('/invoice-settings', [SettingController::class, 'invoiceSettings'])->name('company.invoice.setting');
            Route::get('/custom-fields', [SettingController::class, 'customFields'])->name('company.custom-fields');

            // System
            Route::get('/email-settings', [SettingController::class, 'emailSettings'])->name('company.email.setting');
            Route::get('/email-template', [SettingController::class, 'emailTemplate'])->name('company.email.template');
            Route::get('/sms-settings', [SettingController::class, 'smsSettings'])->name('company.sms.setting');
            Route::get('/sms-template', [SettingController::class, 'smsTemplate'])->name('company.sms.template');
            Route::get('/otp-settings', [SettingController::class, 'otpSettings'])->name('company.otp.setting');
            Route::get('/gdpr', [SettingController::class, 'gdpr'])->name('company.gdpr');
            Route::get('/maintenance-mode', [SettingController::class, 'maintenanceMode'])->name('company.maintenance-mode');
            Route::post('/maintenance-mode', [SettingController::class, 'maintenanceModeStore'])->name('company.maintenance-mode.store');

            // financial
            Route::get('/payment-gateways', [SettingController::class, 'paymentGateways'])->name('company.payment-gateways');
            Route::get('/tax-rates', [SettingController::class, 'taxRates'])->name('company.tax-rates');
            Route::post('/tax-rates', [SettingController::class, 'AddtaxRate'])->name('company.tax-rates.add');
            Route::get('/tax-rates-datatable', [SettingController::class, 'taxRatesDataTable'])->name('company.tax-rates.datatable');
            Route::get('/tax-rate-get/{tax_rate}', [SettingController::class, 'getTaxRate'])->name('company.tax-rate.get');
            Route::put('/tax-rate-update/{tax_rate}', [SettingController::class, 'updateTaxRate'])->name('company.tax-rate.update');
            Route::delete('/tax-rate-delete/{tax_rate}', [SettingController::class, 'deleteTaxRate'])->name('company.tax-rate.delete');
            Route::get('/currencies', [SettingController::class, 'currencies'])->name('company.currencies');

            // Others
        });
        
    });
});
