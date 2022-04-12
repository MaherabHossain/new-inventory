<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\PaymentController;
use App\Http\Controllers\customer\InvoiceController;
use App\Http\Controllers\customer\RefundController;

use App\Http\Controllers\supplier\SupplierController;
use App\Http\Controllers\supplier\SupplierInvoiceController;
use App\Http\Controllers\supplier\SupplierPaymentController;
use App\Http\Controllers\supplier\SupplierRefundController;
use App\Http\Controllers\product\BrandController;
use App\Http\Controllers\product\ProductController;


Route::get('/', function () {
    return view('welcome');
});

// customers route

Route::resource('customers', CustomerController::class);

// invoices route
Route::get('customer/invoices/{customer_id}/show',[InvoiceController::class, 'customerInvoice'])->name('customerInvoice.show');
Route::post('customer/invoice/{customer_id}', [InvoiceController::class, 'store'])->name('invoice.store');
Route::get('customer/invoice/{invoice_id}/{customer_id}', [InvoiceController::class, 'show'])->name('invoice.details');

// Receipt
Route::post('receipt/{customer_id}/{invoice_id}', function ($customer_id,$receipt_id) {
    return 'store receipt';
})->name('customer.invoice.receipt.store');

// payment
Route::get('customer/payment/{customer_id}/show',[PaymentController::class, 'customerPayment'])->name('customerPayment.show');
Route::get('customer/refund/{customer_id}/show',[RefundController::class, 'customerRefund'])->name('customerRefund.show');
Route::post('customer/payment/{customer_id}/{invoice_id}', function ($customer_id,$receipt_id) {
    return 'store payment';
})->name('customer.invoice.payment.store');

// suppliers routes
Route::resource('supplier', SupplierController::class);

Route::prefix('supplier/')->group(function () {
    Route::get('invoice/{supplier_id}/show',[SupplierInvoiceController::class, 'supplierInvoice'])->name('supplierInvoice.show');
    // supplier invoice
    Route::get('invoice/{invoice_id}/{supplier_id}', [SupplierInvoiceController::class, 'show'])->name('supplier.invoice.details');
    Route::post('invoice/{supplier_id}', [SupplierInvoiceController::class, 'store'])->name('supplier.invoice.store');
    // supplier payment
    Route::get('payment/{supplier_id}/show',[SupplierPaymentController::class, 'supplierPayment'])->name('supplierPayment.show');
    Route::post('payment/{supplier_id}/{invoice_id}', function ($supplier_id,$receipt_id) {
        return 'store payment';
    })->name('supplier.invoice.payment.store');
    Route::get('supplier/refund/{supplier_id}/show',[SupplierRefundController::class, 'supplierRefund'])->name('supplierRefund.show');
});

// product and brand
// brand 
// resourse route not working :(
Route::prefix('brand')->group(function () {
    Route::get('',[BrandController::class, 'index']);
    Route::post('',[BrandController::class, 'store']);
    Route::get('/{id}/edit',[BrandController::class, 'edit']);
    Route::put('/{id}/update',[BrandController::class, 'update']);
    Route::post('/{id}/delete', [BrandController::class, 'destroy']);
});
// product
// resourse route not working :(

Route::resource('product', ProductController::class);