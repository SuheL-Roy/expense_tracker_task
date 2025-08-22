<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TicketController;
use App\Models\Store;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



        /**-------------Category-----------------**/
Route::prefix('category/')->middleware('auth')->name('category.')->group(function () {
    Route::get('/list', [CategoryController::class, 'list'])->name('list');
});

/**------------- Expense -----------------**/
Route::prefix('expense/')->middleware('auth')->name('expense.')->group(function () {
    Route::get('/list', [ExpenseController::class, 'list'])->name('list');
    Route::get('/current-month-report', [ExpenseController::class, 'current_month_report'])->name('current_month_report');
    Route::get('/current-month-report-graph', [ExpenseController::class, 'current_month_report_graph'])->name('current_month_report_graph');
    Route::post('/expense-store', [ExpenseController::class, 'expense_store'])->name('expense_store');
    Route::get('/destroy', [ExpenseController::class, 'destroy'])->name('destroy');
});
