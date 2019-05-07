<?php

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
    return redirect(route('login'));
});

Route::post('upload','ImageController@upload')->name('upload');

Route::get('/phonebook/{name}',function(){
	return redirect('/');
})->where('name','[A-Za-z]+');



Route::group(['middleware' => ['auth']], function () {

	

	Route::resource('phonebook','PhonebookController');
	Route::post('getData','PhonebookController@getData');

	// Buyer Route ====================================
	Route::resource('buyer','BuyerController');

	// Fabric Route ====================================
	Route::resource('fabric','FabricController');
	Route::resource('fabric_delivery','FabricDeliveryController');
	Route::resource('fabric/add','FabricController@addCreate');
	Route::resource('fabric_stock','FabricStockController');
	Route::get('/findFbric',array('as'=>'findFbric','uses'=>'FabricStockController@findFbric'));
	Route::get('/findPrices',array('as'=>'findPrices','uses'=>'FabricDeliveryController@findPrices'));

	// Department Route ====================================
	Route::resource('department','DepartmentController');

	// Desingation Route ====================================
	Route::resource('designation','DesignationController');

	// Bank Route ====================================
	Route::resource('bank','BankController');
	Route::get('/bank-delete/{id}','BankController@destroy');

	// Branch Route ====================================
	Route::resource('branch','BranchController');
	Route::get('/branch-delete/{id}','BranchController@destroy');

	// Company Route ====================================
	Route::get('/company-delete/{id}','CompanyController@destroy');
	Route::resource('company','CompanyController');

	// Inventory Route ====================================
	Route::resource('inventory','InventoryController');
	Route::post('inventory/fetch', 'InventoryController@fetch')->name('inventory.fetch');

	// Personal Route ====================================
	Route::resource('personal','PersonalController');

	// Chemical Route ====================================
	Route::resource('chemical','ChemicalController');
	Route::resource('chemical-inventory','ChemicalInventoryController');
	// Route::get('chemical/stock','ChemicalInventoryController@chemicalStock')->name('chemical.stock');

	// Consumption Route ====================================
	Route::resource('consumption','DailyConsumptionController');

	// Stock Route ====================================
	Route::resource('stock','ChemicalStockController');
	Route::get('chemical-stock','ChemicalStockController@chemicalStock')->name('chemicalStock.index');
	Route::get('chemical-stock/edit/{id}','ChemicalStockController@EditChemicalStock')->name('chemical-stock.edit');
	Route::post('chemical-stock/updates/{id}', 'ChemicalStockController@UpdateChemicalStock')->name('chemical_stock.update');

	// Issue Route =======================================
	Route::get('chemical-issue','IssueController@ChemicalIssue')->name('chemicalIssue');
	Route::get('chemical-issue/create','IssueController@ChemicalIssueCreate')->name('ChemicalIssueCreate');
	Route::post('chemical-issue/store','IssueController@ChemicalIssueInsert')->name('chemicalIssueStore');
	Route::get('chemical-issue/show/{id}','IssueController@ChemicalIssueShow')->name('chemicalIssueShow');
	Route::get('chemical-issue/edit/{id}','IssueController@ChemicalIssueEdit')->name('chemicalIssueEdit');
	Route::get('chemical-issue/delete/{id}','IssueController@ChemicalIssueDelete');
	Route::post('chemical-issue/status/{id}','IssueController@ChemicalIssueStatus');

	//Yarn Issue Route ==============================================
	
	Route::get('yarn-issue','IssueController@YarnIssue')->name('yarnIssue');
	Route::get('yarn-issue/create','IssueController@YarnIssueCreate')->name('yarnIssueCreate');
	Route::post('yarn-issue/store','IssueController@YarnIssueInsert')->name('yarnIssueStore');
	Route::get('yarn-issue/show/{id}','IssueController@YarnIssueShow')->name('yarnIssueShow');
	Route::get('yarn-issue/edit/{id}','IssueController@YarnIssueEdit')->name('yarnIssueEdit');
	Route::get('yarn-issue/delete/{id}','IssueController@YarnIssueDelete');
	Route::post('yarn-issue/status/{id}','IssueController@YarnIssueStatus');
	// Category Route ====================================
	Route::resource('category','CategoryController');

	// Yarn Route ====================================
	Route::resource('yarn','YarnController');
	Route::get('yarn/yarn_stock/{id}','YarnController@UpdateStock');
	Route::get('yarnstock','YarnStockController@index')->name('yarnstock');
	Route::get('yarnstock/edit/{id}','YarnStockController@edit')->name('yarnstock.edit');
	Route::post('yarnstock/updates/{id}', 'YarnStockController@update')->name('yarnstock.update');
	Route::post('yarnstock/getPositions', 'YarnStockController@getPositions')->name('getPositions');
//=========================================================

	Route::get('/yarnstock/test', 'YarnStockController@indext');

	Route::post('yarnstock/fetch', 'YarnStockController@fetch')->name('yarnstock.fetch');
//=========================================
	// Route::get('yarnstock/creates','YarnStockController@creates');
	Route::get('yarn-delete/{id}','YarnController@destroy');
	Route::post('yarnstock/store','YarnStockController@store')->name('yarnstock.store');
	Route::get('yarn-receive','ReceiveController@YarnReceiveList')->name('yarn-receive');
	// Route::get('/yarn-receive-create','ReceiveController@YarnReceiveCreate');
	Route::post('/insert_yarn_receive','ReceiveController@YarnReceiveStore');
	Route::get('/yarn-receive-show/{id}','ReceiveController@YarnReceiveShow');
	Route::get('/findStock',array('as'=>'findStock','uses'=>'ReceiveController@findStock'));

	// Manufacture Route ====================================
	Route::resource('manufacture','ManufactereController');
	Route::get('manufacture-delete/{id}','ManufactereController@destroy');

	//Employee Routes =============================================================================
	Route::get('/employee','EmployeeController@index')->name('employee');
	Route::get('/employee/creates/{id}','EmployeeController@creates')->name('employee.creates');
	Route::get('/employee/create','EmployeeController@create')->name('employee.create');
	Route::post('/employee/store','EmployeeController@store')->name('employee.store');
	Route::get('/view-employee/{id}', 'EmployeeController@ViewEmployee');
	Route::get('/delete-employee/{id}', 'EmployeeController@DeleteEmployee');
	Route::get('/edit-employee/{id}', 'EmployeeController@EditEmployee');
	Route::post('/update-employee/{id}','EmployeeController@UpdateEmployee');


	//LC Routes =============================================================================
	Route::resource('lc','LcController');
	Route::post('/add-to-cart','LcController@add_to_cart');
	Route::get('delete-to-cart/{rowId}','LcController@delete_to_cart');
	Route::post('master-lc-info','LcController@master_lc_info');

	// Product Route ====================================
	// Route::resource('product-list','ProductController');
	Route::get('/products',array('as'=>'info','uses'=>'InvoiceController@index'));
	Route::get('/products/info',array('as'=>'info_list','uses'=>'InvoiceController@info_list'));
	Route::get('/products/info/{customer_id}',array('as'=>'show_info','uses'=>'InvoiceController@show_info'));

	Route::get('/findPrice',array('as'=>'findPrice','uses'=>'InvoiceController@findPrice'));
	Route::post('/insert',array('as'=>'insert','uses'=>'InvoiceController@insert'));


	Route::resource('receive','ReceiveController');
	// Route::get('/yarn-receive-create','ReceiveController@YarnReceiveCreate');
	Route::post('/insert_yarn_receive','ReceiveController@YarnReceiveStore');
	Route::get('/findPrice',array('as'=>'findPrice','uses'=>'ReceiveController@findPrice'));


	Route::get('profile/my_profile','ProfileController@my_profile')->name('profile.my_profile');
	Route::get('profile/edit','ProfileController@edit')->name('profile.edit');
	Route::post('profile/update', 'ProfileController@update');
	Route::get('profile/changepassword', 'ProfileController@change_password')->name('profile.changepassword');
	Route::post('profile/updatepassword', 'ProfileController@update_password');


	/** Permission Route Group **/
	Route::group(['middleware' => ['permission']], function () {
		Route::resource('users','UserController');
		Route::get('/user-delete/{id}','UserController@destroy');
		Route::get('/yarn-receive-create','ReceiveController@YarnReceiveCreate');
		Route::resource('product-list','ProductController');
	});

	/** Teacher Route Group **/
	Route::group(['middleware' => ['storeg']], function () {
		Route::get('storeg/test','Users\StoregController@index');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Menu Route Here===========================================================

// Route::get('/menus',array('as'=>'menus','uses'=>'MenuController@index'));
// Route::post('/menus/save-menu',array('as'=>'save_menu','uses'=>'MenuController@seve_menu'));
// Route::post('/menus/save',array('as'=>'save','uses'=>'MenuController@seve'));
// Route::get('/menu/create',array('as'=>'create','uses'=>'MenuController@create'));
// Route::get('/', 'HomeController@index');



Route::get('/menus',array('as'=>'menus','uses'=>'MenuController@menu_get'));
