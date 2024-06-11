<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Routing\ResourceRegistrar;
use App\Http\Controllers\Api\V2\Auth\LoginController;
use App\Http\Controllers\Api\V2\Auth\LogoutController;
use App\Http\Controllers\Api\V2\Auth\RegisterController;
use App\Http\Controllers\Api\V2\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V2\Auth\ResetPasswordController;
use App\Http\Controllers\Api\V2\MeController;
use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

Route::prefix('v1')->middleware('json.api')->group(function () {
    Route::post('/login', LoginController::class)->name('login');
    Route::post('/logout', LogoutController::class)->middleware('auth:api');
    Route::post('/register', RegisterController::class);
    Route::post('/password-forgot', ForgotPasswordController::class);
    Route::post('/password-reset', ResetPasswordController::class)->name('password.reset');
    Route::get('/roles', [RegisterController::class, 'getRoles']);

    Route::apiResource('categories', CategoriesController::class);
    Route::apiResource('channels', ChannelController::class);
    Route::apiResource('sources', SourceController::class);
    Route::apiResource('district', DistrictController::class);
    Route::middleware(['auth:api', 'check.permission:user_management'])->apiResource('users', UserController::class);
    Route::middleware(['auth:api', 'check.permission:ticket_management'])->apiResource('tickets', TicketController::class);
    Route::middleware('auth:api')->get('/assign-ticket', [TicketController::class, 'assignTicket']);
    Route::middleware('auth:api')->get('/user/permissions', [UserController::class, 'getPermissions']);
    Route::middleware('auth:api')->get('/ppa_users', [UserController::class, 'ppaUsers']);
   
    
    Route::middleware('auth:api')->get('tickets/search-ticket', [TicketController::class,'search']);
   
    
});

JsonApiRoute::server('v2')->prefix('v2')->resources(function (ResourceRegistrar $server) {
    $server->resource('users', JsonApiController::class);
    Route::get('me', [MeController::class, 'readProfile']);
    Route::patch('me', [MeController::class, 'updateProfile']);
});

Route::get('test', function() {
    return \Response::json(['status' => true]);
});