<?php

use App\Http\Controllers\crud;
use App\Models\userr;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function(){
    return view('homepage',[
        'userr' => userr::all()
        //  'userr' => userr::getData()
    ]);
});
Route::get('inputData', [crud::class,'tambah']);
Route::get('edit/{id}', [crud::class,'edit']);
// Route::get('inputData', 'crud@tambah');
Route::delete('destroy/{id}', 'crud@hapus');

Route::post('postPaketNasional',[crud::class,'createPaketNasional']);
Route::get('updatePaketNasional',[crud::class,'getDataAPI']);