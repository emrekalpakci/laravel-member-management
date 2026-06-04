<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/members', [MemberController::class, 'index'])->name('members.index');


Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');


Route::get('/members/{id}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{id}', [MemberController::class, 'update'])->name('members.update');


Route::delete('/members/{id}', [MemberController::class, 'destroy'])->name('members.destroy');