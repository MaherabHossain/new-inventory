<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\PaymentController;
use App\Http\Controllers\customer\InvoiceController;
use App\Http\Controllers\customer\RefundController;
use App\Http\Controllers\customer\CustomerInvoiceItemController;

use App\Http\Controllers\supplier\SupplierController;
use App\Http\Controllers\supplier\SupplierInvoiceController;
use App\Http\Controllers\supplier\SupplierPaymentController;
use App\Http\Controllers\supplier\SupplierRefundController;
use App\Http\Controllers\supplier\SupplierInvoiceItemController;
use App\Http\Controllers\product\BrandController;
use App\Http\Controllers\product\ProductController;


Route::get('/', function () {
    return view('welcome');
});

// customers route

Route::resource('customers', CustomerController::class);

// invoices route
Route::get('customer/invoices/{customer_id}/show',[InvoiceController::class, 'customerInvoice'])->name('customerInvoice.show');
Route::post('customer/invoice/{customer_id}', [InvoiceController::class, 'store'])->name('customer.invoice.store');
Route::get('customer/invoice/{invoice_id}/{customer_id}', [InvoiceController::class, 'show'])->name('customer.invoice.details');
Route::delete('customer/invoice/{invoice_id}/{customer_id}', [InvoiceController::class,'destroy'])->name('customer.invoice.delete');
Route::post('customer/product/{invoice_id}/{customer_id}', [CustomerInvoiceItemController::class,'store'])->name('customer.invoiceitem.store') ;
Route::delete('customer/product/{invoice_item}/{customer_id}', [CustomerInvoiceItemController::class,'destroy'])->name('customer.invoiceitem.delete');
// Receipt
Route::post('receipt/{customer_id}/{invoice_id}', function ($customer_id,$receipt_id) {
    return 'store receipt';
})->name('customer.invoice.receipt.store');

// payment


Route::get('customer/payment/{customer_id}/show',[PaymentController::class, 'customerPayment'])->name('customerPayment.show');
Route::get('customer/refund/{customer_id}/show',[RefundController::class, 'customerRefund'])->name('customerRefund.show');
Route::post('customer/refund/{customer_id}',[RefundController::class,'store'])->name('customer.refund.store');
Route::delete('customer/refund/{refund_id}/{customer_id}', [RefundController::class,'destroy'])->name('customer.refund.delete');
Route::post('customer/payment/{customer_id}/{invoice_id?}', [PaymentController::class,'store'])->name('customer.payment.store');
Route::delete('customer/payment/{payment_id}/{customer_id}', [PaymentController::class,'destroy'])->name('customer.payment.delete');
Route::get('customer/payment/{payment_id}/{customer_id}', [PaymentController::class,'show'])->name('customer.payment.show');

// suppliers routes

Route::resource('supplier', SupplierController::class);
// supplier invoice item delete
Route::get('supplier/invoice/{invoice_item}/item',[SupplierInvoiceItemController::class,'destroy']);
Route::prefix('supplier/')->group(function () {
    Route::get('invoice/{supplier_id}/show',[SupplierInvoiceController::class, 'supplierInvoice'])->name('supplierInvoice.show');
    // supplier invoice
    Route::get('invoice/{invoice_id}/{supplier_id}', [SupplierInvoiceController::class, 'show'])->name('supplier.invoice.details');
    Route::post('invoice/{supplier_id}', [SupplierInvoiceController::class, 'store'])->name('supplier.invoice.store');
    Route::delete('invoice/{invoice_id}/{supplier_id}', [SupplierInvoiceController::class, 'destroy']);
    Route::post('invoice/product/{invoice_id}/{supplier_id}', [SupplierInvoiceItemController::class,'store'])->name('supplier.invoiceitem.store');
   Route::get('invoice/delete/', function () {
       return 'fuck of';
   });
    // supplier payment
    Route::get('payment/{supplier_id}/show',[SupplierPaymentController::class, 'supplierPayment'])->name('supplierPayment.show');
    Route::post('payment/{supplier_id}/{invoice_id?}', [SupplierPaymentController::class,'store'])->name('supplier.payment.store');
    Route::delete('payment/{payment_id}', [SupplierPaymentController::class,'destroy'])->name('supplier.payment.delete');
    Route::get('payment/{payment_id}/{supplier_id}', [SupplierPaymentController::class,'show'])->name('supplier.payment.details');
    Route::get('supplier/refund/{supplier_id}/show',[SupplierRefundController::class, 'supplierRefund'])->name('supplierRefund.show');
    Route::post('supplier/refund/{supplier_id}', [SupplierRefundController::class,'store'])->name('supplier.refund.store');
    Route::delete('supplier/refund/{refund_id}', [SupplierRefundController::class,'destroy'])->name('supplier.refund.delete');
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

Route::resource('product', ProductController::class);

Route::get('products/inapprove', [ProductController::class,'inapproveProduct'] )->name('inapprove.product');
Route::put('product/approve/{item_id}', [ProductController::class,'approveProduct'])->name('approve.product');
Route::get('product/inapprove/delete/{item_id}', [ProductController::class,'deleteInapproveProduct'])->name('delete.inapprove.product');