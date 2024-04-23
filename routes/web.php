<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\product\ProductController AS PordCtrl; 
use App\Http\Controllers\Customer\CustomerController AS CstCtrl;
use App\Http\Controllers\Sales\SalesController AS SlsCtrl;
use App\Http\Controllers\Supplier\SupplierController AS SuplCtrl;
use App\Http\Controllers\Marchant\MarchantController AS MrctCtrl;
use App\Http\Controllers\Report\ReportController AS ReptCtrl;
use App\Http\Controllers\Payable\PayableController AS PayCtrl;
use App\Http\Controllers\Exchange\ExchangeController AS ExcCtrl;
use App\Http\Controllers\Receivable\ReceivableController AS RcvCTRL;
use App\Http\Controllers\product\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*
Route::get('products',function(){
    return View('products.products');
})->middleware(['auth', 'verified']);
*/

Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');

/* Product */
Route::get('products',[PordCtrl::class,'index'])->middleware(['auth', 'verified'])->name('productList');
Route::get('product/view/{productId}',[PordCtrl::class,'show'])->middleware(['auth', 'verified'])->name('productView');
Route::get('product/new',[PordCtrl::class,'create'])->middleware(['auth', 'verified'])->name('newProduct');
Route::post('product/new',[PordCtrl::class,'store'])->middleware(['auth', 'verified']);
Route::get('product/edit/{productId}',[PordCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editProduct');
Route::post('product/update',[PordCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updateProduct');
Route::delete('product/delete',[PordCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteProduct');
Route::get('product/category/new',[CategoryController::class,'create'])->middleware(['auth', 'verified'])->name('createCategory');
Route::post('product/category/new',[CategoryController::class,'store'])->middleware(['auth', 'verified'])->name('createCategoryPost');
Route::get('product/categories',[CategoryController::class,'index'])->middleware(['auth', 'verified'])->name('getCategories');


/* Customer */
Route::get('customers',[CstCtrl::class,'index'])->middleware(['auth', 'verified'])->name('customerList');
Route::get('customer/view/{customerId}',[CstCtrl::class,'show'])->middleware(['auth', 'verified'])->name('customerView');
Route::get('customer/new',[CstCtrl::class,'create'])->middleware(['auth', 'verified']);
Route::post('customer/new',[CstCtrl::class,'store'])->middleware(['auth', 'verified'])->name('newCustomer');
Route::get('customer/edit/{customerId}',[CstCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editCustomer');
Route::post('customer/update',[CstCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updateCustomer');
Route::delete('customer/delete',[CstCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteCustomer');

/* Sales */
Route::get('sales',[SlsCtrl::class,'index'])->middleware(['auth', 'verified'])->name('salesList');
Route::get('sale/view/{saleId}',[SlsCtrl::class,'show'])->middleware(['auth', 'verified'])->name('salesView');
Route::get('sale/invoice/{saleId}',[SlsCtrl::class,'invoice'])->middleware(['auth', 'verified'])->name('invoiceView');
Route::get('sale/new',[SlsCtrl::class,'create'])->middleware(['auth', 'verified'])->name('newSale');
Route::post('sale/new',[SlsCtrl::class,'store'])->middleware(['auth', 'verified'])->name('postNewSale');
Route::get('sale/edit/{saleId}',[SlsCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editSale');
Route::post('sale/update',[SlsCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updateSale');
Route::delete('sale/delete',[SlsCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteSale');


/* Exchanges */
Route::get('exchanges',[ExcCtrl::class,'index'])->middleware(['auth', 'verified'])->name('exchangeList');
Route::get('exchange/view/{exchangeId}',[ExcCtrl::class,'show'])->middleware(['auth', 'verified'])->name('exchangeView');
Route::get('exchange/new',[ExcCtrl::class,'create'])->middleware(['auth', 'verified'])->name('newExchange');
Route::post('exchange/new',[ExcCtrl::class,'store'])->middleware(['auth', 'verified']);
Route::get('exchange/edit/{exchangeId}',[ExcCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editExchange');
Route::post('exchange/update',[ExcCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updateExchange');
Route::delete('exchange/delete',[ExcCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteExchange');

/* Supplier */
Route::get('suppliers',[SuplCtrl::class,'index'])->middleware(['auth', 'verified'])->name('supplierList');
Route::get('supplier/view/{supplierId}',[SuplCtrl::class,'show'])->middleware(['auth', 'verified'])->name('supplierView');
Route::get('supplier/new',[SuplCtrl::class,'create'])->middleware(['auth', 'verified'])->name('newSupplier');
Route::post('supplier/new',[SuplCtrl::class,'store'])->middleware(['auth', 'verified']);
Route::get('supplier/edit/{supplierId}',[SuplCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editSupplier');
Route::post('supplier/update',[SuplCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updateSupplier');
Route::delete('supplier/delete',[SuplCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteSupplier');

/* Marchant */
Route::get('marchants',[MrctCtrl::class,'index'])->middleware(['auth', 'verified'])->name('marchantList');
Route::get('marchant/view/{marchantId}',[MrctCtrl::class,'show'])->middleware(['auth', 'verified'])->name('marchantView');
Route::get('marchant/new',[MrctCtrl::class,'create'])->middleware(['auth', 'verified'])->name('newMarchant');
Route::post('marchant/new',[MrctCtrl::class,'store'])->middleware(['auth', 'verified']);
Route::get('marchant/edit/{supplierId}',[MrctCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editMarchant');
Route::post('marchant/update',[MrctCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updateMarchant');
Route::delete('marchant/delete',[MrctCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteMarchant');

/* Amount receivable */
Route::get('receivables',[RcvCTRL::class,'index'])->middleware(['auth', 'verified'])->name('receivableList');
Route::get('receivable/view/{recevableId}',[RcvCTRL::class,'show'])->middleware(['auth', 'verified'])->name('receivableView');
Route::get('receivable/new',[RcvCTRL::class,'create'])->middleware(['auth', 'verified'])->name('newReceivable');
Route::post('receivable/new',[RcvCTRL::class,'store'])->middleware(['auth', 'verified']);
Route::get('receivable/edit/{recevableId}',[RcvCTRL::class,'edit'])->middleware(['auth', 'verified'])->name('editReceivable');
Route::post('receivable/update',[RcvCTRL::class,'update'])->middleware(['auth', 'verified'])->name('updateReceivable');
Route::delete('receivable/delete',[RcvCTRL::class,'destroy'])->middleware(['auth', 'verified'])->name('deleteReceivable');

/* Marchant */
Route::get('payables',[PayCtrl::class,'index'])->middleware(['auth', 'verified'])->name('payableList');
Route::get('payable/view/{marchantId}',[PayCtrl::class,'show'])->middleware(['auth', 'verified'])->name('payableView');
Route::get('payable/new',[PayCtrl::class,'create'])->middleware(['auth', 'verified'])->name('newPayable');
Route::post('payable/new',[PayCtrl::class,'store'])->middleware(['auth', 'verified']);
Route::get('payable/edit/{supplierId}',[PayCtrl::class,'edit'])->middleware(['auth', 'verified'])->name('editPayable');
Route::post('payable/update',[PayCtrl::class,'update'])->middleware(['auth', 'verified'])->name('updatePayable');
Route::delete('payable/delete',[PayCtrl::class,'destroy'])->middleware(['auth', 'verified'])->name('deletePayable');

/* Reports */
Route::get('reports',[ReptCtrl::class,'index'])->middleware(['auth', 'verified'])->name('reportsDashboard');
Route::get('report/sales',[ReptCtrl::class,'salesReport'])->middleware(['auth', 'verified'])->name('salesReport');
Route::get('report/inventory',[ReptCtrl::class,'inventoryReport'])->middleware(['auth', 'verified'])->name('inventoryReport');