<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::get('/fetch',[QuestionController::class,'fetchInsert']);
Route::get('/',[QuestionController::class,'show']);