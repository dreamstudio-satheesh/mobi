<?php


use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ManageCustomer;
use App\Http\Livewire\ProductManager;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryManager;
use App\Http\Livewire\SupplierManager;
use App\Http\Livewire\InventoryManager;

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware' => ['auth'], 'as' => 'admin.', 'prefix' => 'admin'], function () {

    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


    // Roles
    Route::resource('role', App\Http\Controllers\Admin\RoleController::class);



    Route::get('/customers', ManageCustomer::class)->name('customers.manage');

    Route::get('/category', CategoryManager::class)->name('category.manage');

    //Suppliers
    Route::get('/suppliers', SupplierManager::class)->name('suppliers.index');
   
    // Inventory manager
    Route::get('/inventory', InventoryManager::class)->name('inventory.manager');

    // New Product CRUD Livewire route
   Route::get('/products', ProductManager::class)->name('products.manage');

    //Users
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::put('user/status/{id}', [App\Http\Controllers\Admin\UserController::class, 'status'])->name('user.status');
    Route::get('user/remove-image/{id}', [App\Http\Controllers\Admin\UserController::class, 'removeImage'])->name('user.removeImage');

    //User_Profile
    Route::get('profile-edit', [App\Http\Controllers\Admin\UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::get('get-state', [App\Http\Controllers\Admin\UserController::class, 'getStates'])->name('user.get-states');
    Route::post('update-profile', [App\Http\Controllers\Admin\UserController::class, 'updateProfile'])->name('user.update-profile');


});
