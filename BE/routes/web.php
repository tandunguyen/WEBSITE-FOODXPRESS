<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainChatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/train-all', [TrainChatController::class, 'trainAll']);
Route::get('/train/static', [TrainChatController::class, 'trainStatic']);
Route::get('/train/quan-an', [TrainChatController::class, 'trainQuanAn']);
Route::get('/train/mon-an', [TrainChatController::class, 'trainMonAn']);
Route::get('/train/vouchers', [TrainChatController::class, 'trainVouchers']);
