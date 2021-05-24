<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::redirect('/', '/admin/home');
    Route::get('/home','HomeController@index');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Areas
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController'); 

    // Peoples
    Route::delete('peoples/destroy', 'PeopleController@massDestroy')->name('peoples.massDestroy');
    Route::resource('peoples', 'PeopleController');

    // Contracts
    Route::delete('contracts/destroy', 'ContractController@massDestroy')->name('contracts.massDestroy');
    Route::resource('contracts', 'ContractController');

    // Routes
    Route::delete('routes/destroy', 'RouteController@massDestroy')->name('routes.massDestroy');
    Route::resource('routes', 'RouteController');


    // Drivers
    Route::delete('drivers/destroy', 'DriverController@massDestroy')->name('drivers.massDestroy');
    Route::resource('drivers', 'DriverController');

    // Badges
    Route::delete('badges/destroy', 'BadgeController@massDestroy')->name('badges.massDestroy');
    Route::resource('badges', 'BadgeController');

    // insurances
    Route::delete('insurances/destroy', 'InsuranceController@massDestroy')->name('insurances.massDestroy');
    Route::resource('insurances', 'InsuranceController');

    // Daily Entry
    Route::delete('entries/destroy', 'DailyEntryController@massDestroy')->name('entries.massDestroy');
    Route::resource('entries', 'DailyEntryController');

    // Holidays
    Route::delete('holidays/destroy', 'HolidayController@massDestroy')->name('holidays.massDestroy');
    Route::resource('holidays', 'HolidayController');

    // Suppliers
    Route::delete('suppliers/destroy', 'SupplierController@massDestroy')->name('suppliers.massDestroy');
    Route::resource('suppliers', 'SupplierController');

    // Expensis
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Maintenances
    Route::delete('maintenances/destroy', 'MaintenanceController@massDestroy')->name('maintenances.massDestroy');
    Route::resource('maintenances', 'MaintenanceController');
});
