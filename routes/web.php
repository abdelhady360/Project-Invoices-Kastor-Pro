<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes();


// register = false
Auth::routes(['register'=> false]);
// ./register = false


// auth.login
Route::get('/', function () { return view('auth.login'); });
// ./auth.login


// HomeController
Route::get('/index', 'HomeController@index');
// ./HomeController


// InvoicesController
Route::resource('invoices', 'InvoicesController');
Route::resource('sections', 'SectionsController');
Route::resource('products', 'ProductsController');
// ./InvoicesController


// InvoicesController
Route::get('/section/{id}', 'InvoicesController@getproducts');
Route::get('/edit_invoice/{id}', 'InvoicesController@edit');
Route::get('export_invoice', 'InvoicesController@export');
Route::get('Print_invoice/{id}','InvoicesController@Print_invoice');
Route::get('/status_show/{id}', 'InvoicesController@show')->name('status_show');
Route::get('MarkAsRead_all','InvoicesController@MarkAsRead_all')->name('MarkAsRead_all');
Route::get('invoice_paid','InvoicesController@Invoice_Paid')->name('invoice_paid');
Route::get('invoice_unpaid','InvoicesController@Invoice_UnPaid')->name('invoice_unpaid');;
Route::get('invoice_partial','InvoicesController@Invoice_Partial')->name('invoice_partial');
Route::delete('invoice_destroy','InvoicesController@softDelete')->name('invoice_destroy');
Route::post('/Status_Update/{id}', 'InvoicesController@Status_Update')->name('Status_Update');
// ./InvoicesController


// InvoicesDetailsController
Route::get('/details_invoice/{id}', 'InvoicesDetailsController@edit');
Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');
Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');
Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');
// ./InvoicesDetailsController


// RoleController
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});
// ./RoleController


// InvoiceAchiveController
Route::resource('Archive', 'InvoiceAchiveController');
Route::delete('Archive', 'InvoiceAchiveController@softDelete')->name('archive_destroy');
// ./InvoiceAchiveController


// Invoices_Report
Route::get('invoices_report', 'Invoices_Report@index');
Route::post('Search_invoices', 'Invoices_Report@Search_invoices');
// ./Invoices_Report


// Customers_Report
Route::get('customers_report', 'Customers_Report@index')->name("customers_report");
Route::post('Search_customers', 'Customers_Report@Search_customers');
// ./Customers_Report


// InvoiceAttachmentsController
Route::resource('InvoiceAttachments', 'InvoiceAttachmentsController');
// ./InvoiceAttachmentsController


// AdminController
Route::get('/{page}', 'AdminController@index');
// ./ AdminController
