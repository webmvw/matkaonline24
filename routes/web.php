<?php

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
    return view('auth.login');
});

Auth::routes();




/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['admin', 'auth']], function(){
	Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

	// setups management
	Route::group(['prefix' => 'setups'], function(){
		// account
		Route::get('admin/account/view', [App\Http\Controllers\Admin\AccountController::class, 'view'])->name('admin.account.view');
		Route::get('admin/account/add', [App\Http\Controllers\Admin\AccountController::class, 'add'])->name('admin.account.add');
		Route::post('admin/account/store', [App\Http\Controllers\Admin\AccountController::class, 'store'])->name('admin.account.store');
		Route::get('admin/account/edit/{id}', [App\Http\Controllers\Admin\AccountController::class, 'edit'])->name('admin.account.edit');
		Route::post('admin/account/update/{id}', [App\Http\Controllers\Admin\AccountController::class, 'update'])->name('admin.account.update');
		Route::get('admin/account/delete/{id}', [App\Http\Controllers\Admin\AccountController::class, 'delete'])->name('admin.account.delete');

		// Game Category
		Route::get('admin/gameCategory/view', [App\Http\Controllers\Admin\GameCategoryController::class, 'view'])->name('admin.gameCategory.view');
		Route::get('admin/gameCategory/add', [App\Http\Controllers\Admin\GameCategoryController::class, 'add'])->name('admin.gameCategory.add');
		Route::post('admin/gameCategory/store', [App\Http\Controllers\Admin\GameCategoryController::class, 'store'])->name('admin.gameCategory.store');
		Route::get('admin/gameCategory/edit/{id}', [App\Http\Controllers\Admin\GameCategoryController::class, 'edit'])->name('admin.gameCategory.edit');
		Route::post('admin/gameCategory/update/{id}', [App\Http\Controllers\Admin\GameCategoryController::class, 'update'])->name('admin.gameCategory.update');
		Route::get('admin/gameCategory/delete/{id}', [App\Http\Controllers\Admin\GameCategoryController::class, 'delete'])->name('admin.gameCategory.delete');

		// bazar
		Route::get('bazar', [App\Http\Controllers\Admin\BazarController::class, 'view'])->name('admin.bazar.view');
		Route::get('bazar/add', [App\Http\Controllers\Admin\BazarController::class, 'add'])->name('admin.bazar.add');
		Route::post('bazar/store', [App\Http\Controllers\Admin\BazarController::class, 'store'])->name('admin.bazar.store');
		Route::get('bazar/edit/{id}', [App\Http\Controllers\Admin\BazarController::class, 'edit'])->name('admin.bazar.edit');
		Route::post('bazar/update/{id}', [App\Http\Controllers\Admin\BazarController::class, 'update'])->name('admin.bazar.update');
		Route::get('bazar/delete/{id}', [App\Http\Controllers\Admin\BazarController::class, 'delete'])->name('admin.bazar.delete');

		// Game time
		Route::get('admin/gameTime/view', [App\Http\Controllers\Admin\GameTimeController::class, 'view'])->name('admin.gameTime.view');
		Route::get('admin/gameTime/add', [App\Http\Controllers\Admin\GameTimeController::class, 'add'])->name('admin.gameTime.add');
		Route::post('admin/gameTime/store', [App\Http\Controllers\Admin\GameTimeController::class, 'store'])->name('admin.gameTime.store');
		Route::get('admin/gameTime/edit/{id}', [App\Http\Controllers\Admin\GameTimeController::class, 'edit'])->name('admin.gameTime.edit');
		Route::post('admin/gameTime/update/{id}', [App\Http\Controllers\Admin\GameTimeController::class, 'update'])->name('admin.gameTime.update');
		Route::get('admin/gameTime/delete/{id}', [App\Http\Controllers\Admin\GameTimeController::class, 'delete'])->name('admin.gameTime.delete');

		// settings
		Route::get('settings/view', [App\Http\Controllers\Admin\SettingsController::class, 'view'])->name('admin.settings.view');
		Route::post('settings/update/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');

		// notice
		Route::get('notice/view', [App\Http\Controllers\Admin\NoticeController::class, 'view'])->name('admin.notice.view');
		Route::post('notice/update/{id}', [App\Http\Controllers\Admin\NoticeController::class, 'update'])->name('admin.notice.update');


	});	

	// balance
	Route::group(['prefix' => 'balance'], function(){
		// deposit
		Route::get('deposit/view', [App\Http\Controllers\Admin\DepositController::class, 'view'])->name('admin.deposit.view');
		Route::get('deposit/reject/{id}', [App\Http\Controllers\Admin\DepositController::class, 'reject'])->name('admin.deposit.reject');
		Route::get('deposit/accept/{id}', [App\Http\Controllers\Admin\DepositController::class, 'accept'])->name('admin.deposit.accept');
		Route::get('deposit/reject-list', [App\Http\Controllers\Admin\DepositController::class, 'rejectList'])->name('admin.deposit.rejectlist');
		Route::get('deposit/accept-list', [App\Http\Controllers\Admin\DepositController::class, 'acceptList'])->name('admin.deposit.acceptlist');

		// withdraw
		Route::get('withdraw/view', [App\Http\Controllers\Admin\WithdrawController::class, 'view'])->name('admin.withdraw.view');
		Route::get('withdraw/reject/{id}', [App\Http\Controllers\Admin\WithdrawController::class, 'reject'])->name('admin.withdraw.reject');
		Route::get('withdraw/accept/{id}', [App\Http\Controllers\Admin\WithdrawController::class, 'accept'])->name('admin.withdraw.accept');
		Route::get('withdraw/reject-list', [App\Http\Controllers\Admin\WithdrawController::class, 'rejectList'])->name('admin.withdraw.rejectlist');
		Route::get('withdraw/accept-list', [App\Http\Controllers\Admin\WithdrawController::class, 'acceptList'])->name('admin.withdraw.acceptlist');


		// balance transfer list view
		Route::get('balance_transfer/view', [App\Http\Controllers\Admin\BalanceTransferController::class, 'view'])->name('admin.balance_transfer.view');
	});


	// user information
	Route::group(['prefix' => 'user'], function(){
	    // user list
		Route::get('userlist/view', [App\Http\Controllers\Admin\UserListController::class, 'view'])->name('admin.userlist.view');
		Route::get('userlist/active/{id}', [App\Http\Controllers\Admin\UserListController::class, 'active'])->name('admin.userlist.active');
		Route::get('userlist/suspend/{id}', [App\Http\Controllers\Admin\UserListController::class, 'suspend'])->name('admin.userlist.suspend');
		Route::get('userlist/edit/{id}', [App\Http\Controllers\Admin\UserListController::class, 'edit'])->name('admin.userlist.edit');
		Route::post('userlist/update/{id}', [App\Http\Controllers\Admin\UserListController::class, 'update'])->name('admin.userlist.update');
	});

	// game information
	Route::group(['prefix' => 'game'], function(){
		// view
		Route::get('admin/view', [App\Http\Controllers\Admin\GameController::class, 'view'])->name('admin.game.view');
	});

	// result information
	Route::group(['prefix' => 'result'], function(){
		// view
		Route::get('admin/view', [App\Http\Controllers\Admin\ResultController::class, 'view'])->name('admin.result.view');
		Route::get('admin/add', [App\Http\Controllers\Admin\ResultController::class, 'add'])->name('admin.result.add');
		Route::post('admin/store', [App\Http\Controllers\Admin\ResultController::class, 'store'])->name('admin.result.store');
	});

	// public result
	Route::group(['prefix' => 'public_result'], function(){
		// view
		Route::get('admin/view', [App\Http\Controllers\Admin\PublicResultController::class, 'view'])->name('admin.public_result.view');
		Route::get('admin/add', [App\Http\Controllers\Admin\PublicResultController::class, 'add'])->name('admin.public_result.add');
		Route::post('admin/store', [App\Http\Controllers\Admin\PublicResultController::class, 'store'])->name('admin.public_result.store');
		Route::get('admin/edit/{id}', [App\Http\Controllers\Admin\PublicResultController::class, 'edit'])->name('admin.public_result.edit');
		Route::post('admin/update/{id}', [App\Http\Controllers\Admin\PublicResultController::class, 'update'])->name('admin.public_result.update');
		Route::get('admin/delete/{id}', [App\Http\Controllers\Admin\PublicResultController::class, 'delete'])->name('admin.public_result.delete');
	});

	// employee
	Route::group(['prefix' => 'employee'], function(){
		// view
		Route::get('view', [App\Http\Controllers\Admin\EmployeeController::class, 'view'])->name('admin.employee.view');
		Route::get('add', [App\Http\Controllers\Admin\EmployeeController::class, 'add'])->name('admin.employee.add');
		Route::post('store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('admin.employee.store');
		Route::get('delete/{id}', [App\Http\Controllers\Admin\EmployeeController::class, 'delete'])->name('admin.employee.delete');
	});
	
	// Change password
	Route::get('admin/password', [App\Http\Controllers\Admin\ChangePassController::class, 'CPassword'])->name('admin.change.password');
	Route::post('admin/password/update', [App\Http\Controllers\Admin\ChangePassController::class, 'UpdatePassword'])->name('Admin.Update.Password');



});









/*
|--------------------------------------------------------------------------
|  Routes for user
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['user', 'auth']], function(){
	Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');

	//user profile edit and update
	Route::get('user/edit_profile', [App\Http\Controllers\User\UserController::class, 'editProfile'])->name('user.editprofile');
	Route::post('user/update_profile/', [App\Http\Controllers\User\UserController::class, 'updateProfile'])->name('user.updateprofile');

	// balance
	Route::group(['prefix' => 'balance'], function(){
		// deposit
		Route::get('user/deposit/view', [App\Http\Controllers\User\DepositController::class, 'view'])->name('user.deposit.view');
		Route::get('user/deposit/add', [App\Http\Controllers\User\DepositController::class, 'add'])->name('user.deposit.add');
		Route::post('user/deposit/store', [App\Http\Controllers\User\DepositController::class, 'store'])->name('user.deposit.store');

		// withdraw
		Route::get('user/withdraw/view', [App\Http\Controllers\User\WithdrawController::class, 'view'])->name('user.withdraw.view');
		Route::get('user/withdraw/add', [App\Http\Controllers\User\WithdrawController::class, 'add'])->name('user.withdraw.add');
		Route::post('user/withdraw/store', [App\Http\Controllers\User\WithdrawController::class, 'store'])->name('user.withdraw.store');

		// balance transfer
		Route::get('user/balance_transfer/view', [App\Http\Controllers\User\BalanceTransferController::class, 'view'])->name('user.balance_transfer.view');
		Route::post('user/balance_transfer/store', [App\Http\Controllers\User\BalanceTransferController::class, 'store'])->name('user.balance_transfer.store');
		Route::get('user/balance_transfer/history', [App\Http\Controllers\User\BalanceTransferController::class, 'history'])->name('user.balance_transfer.history');
		Route::get('user/balance_receive/history', [App\Http\Controllers\User\BalanceTransferController::class, 'receive'])->name('user.balance_receive.history');


	});	

	// Game Rate
	Route::get('user/game-rate', [App\Http\Controllers\User\GameRateController::class, 'view'])->name('user.gamerate');

	// Game Time
	Route::get('user/game-time', [App\Http\Controllers\User\GameTimingController::class, 'view'])->name('user.gametime');

	// single game
	Route::get('user/single-game', [App\Http\Controllers\User\SingleController::class, 'view'])->name('user.single_game.view');
	Route::post('user/single-game/store', [App\Http\Controllers\User\SingleController::class, 'store'])->name('user.single_game.store');

	// single patti game
	Route::get('user/single-patti', [App\Http\Controllers\User\SinglePattiController::class, 'view'])->name('user.single_patti.view');
	Route::post('user/single-patti/store', [App\Http\Controllers\User\SinglePattiController::class, 'store'])->name('user.single_patti.store');
	
	// double patti game
	Route::get('user/double-patti', [App\Http\Controllers\User\DoublePattiController::class, 'view'])->name('user.double_patti.view');
	Route::post('user/double-patti/store', [App\Http\Controllers\User\DoublePattiController::class, 'store'])->name('user.double_patti.store');

	// triple patti game
	Route::get('user/triple-patti', [App\Http\Controllers\User\TriplePattiController::class, 'view'])->name('user.triple_patti.view');
	Route::post('user/triple-patti/store', [App\Http\Controllers\User\TriplePattiController::class, 'store'])->name('user.triple_patti.store');

	// jori game
	Route::get('user/jori-game', [App\Http\Controllers\User\JoriController::class, 'view'])->name('user.jori_game.view');
	Route::post('user/jori-game/store', [App\Http\Controllers\User\JoriController::class, 'store'])->name('user.jori_game.store');


	// played game
	Route::get('user/played-game', [App\Http\Controllers\User\PlayedGameController::class, 'view'])->name('user.played_game.view');

	// Result
	Route::get('user/result', [App\Http\Controllers\User\ResultController::class, 'view'])->name('user.result.view');

	// Notice
	Route::get('user/notice', [App\Http\Controllers\User\NoticeController::class, 'view'])->name('user.notice.view');

	// Change password
	Route::get('user/password', [App\Http\Controllers\User\ChangePassController::class, 'CPassword'])->name('change.password');
	Route::post('user/password/update', [App\Http\Controllers\User\ChangePassController::class, 'UpdatePassword'])->name('Update.Password');

});








/*
|--------------------------------------------------------------------------
|  Routes for Employee
|--------------------------------------------------------------------------
|
| this routes access for only employee
|
*/
Route::group(['middleware' => ['employee', 'auth']], function(){
	Route::get('employee/dashboard', [App\Http\Controllers\Employee\EmployeeController::class, 'index'])->name('employee.dashboard');

	// game information
	Route::group(['prefix' => 'game'], function(){
		// view
		Route::get('view', [App\Http\Controllers\Employee\GameController::class, 'view'])->name('employee.game.view');
	});

	// result information
	Route::group(['prefix' => 'result'], function(){
		// view
		Route::get('view', [App\Http\Controllers\Employee\ResultController::class, 'view'])->name('employee.result.view');
		Route::get('add', [App\Http\Controllers\Employee\ResultController::class, 'add'])->name('employee.result.add');
		Route::post('store', [App\Http\Controllers\Employee\ResultController::class, 'store'])->name('employee.result.store');
	});

	// public result
	Route::group(['prefix' => 'public_result'], function(){
		// view
		Route::get('view', [App\Http\Controllers\Employee\PublicResultController::class, 'view'])->name('employee.public_result.view');
		Route::get('add', [App\Http\Controllers\Employee\PublicResultController::class, 'add'])->name('employee.public_result.add');
		Route::post('store', [App\Http\Controllers\Employee\PublicResultController::class, 'store'])->name('employee.public_result.store');
		Route::get('edit/{id}', [App\Http\Controllers\Employee\PublicResultController::class, 'edit'])->name('employee.public_result.edit');
		Route::post('update/{id}', [App\Http\Controllers\Employee\PublicResultController::class, 'update'])->name('employee.public_result.update');
		Route::get('delete/{id}', [App\Http\Controllers\Employee\PublicResultController::class, 'delete'])->name('employee.public_result.delete');
	});

});	