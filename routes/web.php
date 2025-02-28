<?php


use App\Livewire\SalesList;
use App\Livewire\SalesCreate;
use App\Livewire\RepairOrders;
use App\Livewire\SalesInvoice;
use App\Livewire\ManageCustomer;
use App\Livewire\ProductManager;
use App\Livewire\RepairProgress;
use App\Livewire\CategoryManager;
use App\Livewire\SupplierManager;
use App\Livewire\InventoryManager;
use App\Livewire\CreateRepairOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    // Sales
    Route::get('/sales/orders', SalesList::class)->name('sales.list');
    Route::get('sales/create', SalesCreate::class)->name('sales.create');
    Route::get('/admin/sales/detail/{saleId}/{template?}', SalesInvoice::class)->name('sales.invoice');
    Route::get('/admin/sales/invoice/download/{saleId}/{template?}', [SalesInvoice::class, 'downloadPDF'])->name('sales.invoice.download');

    // New Product CRUD Livewire route
   Route::get('/products', ProductManager::class)->name('products.manage');

   // Repair Management
   Route::get('/repairs', RepairOrders::class)->name('repairs.list');
   Route::get('/repairs/create', CreateRepairOrder::class)->name('repairs.create');

   Route::get('/repairs/progress/{repairOrder}', RepairProgress::class)->name('repairs.progress')->middleware('role:repair_technician');

    //Users
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::put('user/status/{id}', [App\Http\Controllers\Admin\UserController::class, 'status'])->name('user.status');
    Route::get('user/remove-image/{id}', [App\Http\Controllers\Admin\UserController::class, 'removeImage'])->name('user.removeImage');

    //User_Profile
    Route::get('profile-edit', [App\Http\Controllers\Admin\UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::get('get-state', [App\Http\Controllers\Admin\UserController::class, 'getStates'])->name('user.get-states');
    Route::post('update-profile', [App\Http\Controllers\Admin\UserController::class, 'updateProfile'])->name('user.update-profile');


});
