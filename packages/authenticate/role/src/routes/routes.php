<?php

use Authenticate\Role\Http\Controllers\ValidUser;
use Authenticate\Role\Http\Middleware\checkAuth;
use Illuminate\Support\Facades\Route;

Route::get('/checkwithout',[ValidUser::class,'index'])->name('check-auth');
Route::any('/post-data',[ValidUser::class,'postData'])->name('post-data');

Route::middleware([checkAuth::class])->group(function(){
	Route::get('/checkAuth',function(){
        return "Authenticated";
    });
    Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

});
