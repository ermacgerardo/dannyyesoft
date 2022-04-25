<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Exception;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



Route::group(['prefix' => 'auth'], function () {

	Route::post('/login', [AuthController::class, 'login']);//->middleware('throttle:5,60');

	Route::group(['middleware' => 'auth:api'], function() {

		Route::get('user', [AuthController::class, 'user']);
                
		Route::apiResource('/corporativos',TwCorporativoController::class)->middleware('scope:corporativos');
                Route::apiResource('/empresas-corporativos', TwEmpresaCorporativoController::class)->middleware('scope:empresas-corporativos');
                Route::apiResource('/contactos-corporativos', TwContactoCorporativoController::class)->middleware('scope:contactos-corporativos');
                Route::apiResource('/contratos-corporativos',TwContratoCorporativoController::class)->middleware('scope:contratos-corporativos');
                Route::apiResource('/documentos', TwDocumentoController::class)->middleware('scope:documentos');
                Route::apiResource('/documentos-corporativos', TwDocumentoCorporativoController::class)->middleware('scope:documentos-corporativos');

                //Route::get('',['AppController@crearBackupAll']);
                Route::get('/backup/all', 'App\Http\Controllers\AppController@crearBackupAll');
                Route::get('/backup/only-tables', 'App\Http\Controllers\AppController@crearBackupOnlyTables');
                //Route::get('backup/all/',['as'=>'backup.all','uses' =>'AppController@crearBackupAll']);
    });
});


//Route::resource('corporativos', TwCorporativoController::class)->middleware(['auth:api', 'scope:corporativos']);


