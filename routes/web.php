    <?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[UserController::class, 'index'])->name('user.index');
Route::get('/create',[UserController::class, 'create'])->name('user.create');
Route::post('/store',[UserController::class, 'store'])->name('user.store');
