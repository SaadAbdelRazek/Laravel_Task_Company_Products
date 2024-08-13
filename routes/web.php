<?php

use App\Http\Controllers\CompanyController; //import this
use App\Http\Controllers\ProductController; //import this
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db', function () {
    return view('test_db');
});

Route::get('/companies',[CompanyController::class,'loadAllCompanies']);
Route::get('/products',[ProductController::class,'loadAllProducts']);

//company routes
Route::get('/add/company',[CompanyController::class,'loadAddCompanyForm']);

Route::post('/add/company',[CompanyController::class,'AddCompany'])->name('AddCompany');

Route::get('/edit/{id}',[CompanyController::class,'loadEditForm']);
Route::get('/delete/{id}',[CompanyController::class,'deleteCompany']);

Route::post('/edit/company',[CompanyController::class,'EditCompany'])->name('EditCompany');

//product routes--------
Route::get('/add/product',[ProductController::class,'loadAddProductForm']);
Route::get('/add/product',[CompanyController::class,'loadAllCompanies_2']);
Route::post('/add/product',[ProductController::class,'AddProduct'])->name('AddProduct');

Route::get('/edit/product/{id}',[ProductController::class,'loadEditForm']);
Route::get('/delete/product/{id}',[ProductController::class,'deleteProduct']);

Route::post('/edit/product',[ProductController::class,'EditProduct'])->name('EditProduct');