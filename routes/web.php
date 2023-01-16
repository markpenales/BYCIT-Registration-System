<?php

use App\Http\Controllers\RegistrationController;
use App\Models\Registration;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('register');
});

Route::post('/', [RegistrationController::class, 'store']);

Route::get('/registrations/bycit', function (Request $request) {
    if ($request->delete) {
        $id = $request->delete;
        $exists = Registration::find($id);
        if ($exists) {
            $exists->delete();
        }

        return redirect('/registrations/bycit');
    } else if ($request->confirm) {
        $id = $request->confirm;
        $exists = Registration::find($id);

        if ($exists) {
            $exists->confirmed = !($exists->confirmed);
            $exists->save();

        }
        return redirect('/registrations/bycit');
    }
    return view('dashboard');
});
