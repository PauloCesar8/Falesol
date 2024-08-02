<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SolicitaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {
	Route::get('serviços', function () {
		return view('seções/serviços');
	})->name('serviços');

	Route::get('solicitação', function () {
		return view('seções/solicitação');
	})->name('solicitação');


	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});

Route::middleware(['auth', 'checkAccountType:user'])->group(function () {
    Route::get('/solicitar', [SolicitaController::class, 'create'])->name('solicitar');
    Route::get('/consulta-protocolo', [SolicitaController::class, 'showConsultaForm'])->name('consulta.protocolo');
});

Route::middleware(['auth', 'checkAccountType:employee'])->group(function () {
    Route::get('/consultar-todas', [SolicitaController::class, 'index'])->name('consultar.todas');
    Route::post('/mudar-estado/{id}', [SolicitaController::class, 'mudarEstado'])->name('mudar.estado');
    Route::post('/responder/{id}', [SolicitaController::class, 'responder'])->name('responder.solicitacao');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');

Route::get('/consulta-solicitacao', [SolicitaController::class, 'showConsultaForm'])->name('solicitacao.consulta');
Route::post('/consulta-solicitacao', [SolicitaController::class, 'consultarSolicitacao'])->name('solicitacao.consultar');
Route::get('/responder-solicitacao/{id}', [SolicitaController::class, 'showResponderForm'])->name('solicitacao.responder');
Route::post('/responder-solicitacao/{id}', [SolicitaController::class, 'responderSolicitacao'])->name('solicitacao.responder.salvar');

Route::get('teste', function () {
	return view('welcome');
});
Route::get('/', [HomeController::class, 'home']);
Route::get('pesquisa', [ServiceController::class, 'index'])->name('pesquisa');
Route::get('dashboard', [ServiceController::class, 'index2'])->name('dashboard');
Route::get('consulta', [SolicitaController::class, 'index'])->name('Consulta');

// SERVIÇOS BANCO DE DADOS
Route::get('/', [ServiceController::class, 'index']);
Route::get('/events/create', [ServiceController::class, 'create']);
Route::post('/submit-form', [SolicitaController::class, 'salvar'])->name('form.salvar');



Route::get('/Saúde', function () {
    return view('Saúde');
})->name('Saúde');

Route::get('/Vacinação', function () {
    return view('Vacinação');
})->name('Vacinação');

Route::get('/Serviços', function () {
    return view('Serviços');
})->name('Seviços');

Route::get('/Trânsito', function () {
    return view('Trânsito');
})->name('Trânsito');

Route::get('/Educação', function () {
    return view('Educação');
})->name('Educação');

Route::get('/Segurança', function () {
    return view('Segurança');
})->name('Segurança');