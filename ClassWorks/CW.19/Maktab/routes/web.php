<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', function (Request $request) {
    return view('index');
})->name('home');

Route::get('/find', function(Request $request) {
    $user = User::where('name', '=', $request->input('username'))->first();
    if ($user) {
        return view('index', ['username' => $user->email]);
    } else {
        return view('index');
    }
});

Route::post('/create', function(Request $request) {
    if (isset($request)) {
        $user = new User();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
    }
    return redirect('/');
});