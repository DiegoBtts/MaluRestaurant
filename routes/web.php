<?php

// Nos mostrará el formulario de login.
Route::get('/', 'Panel\AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('/', 'Panel\AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(['middleware' => 'auth' ], function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('home', [
		'uses' => 'Panel\SellController@index',
        'as'=> 'index'
	]);
        

    /* user */
    Route::get('/user', [
        'uses' => 'Panel\UserController@index',
        'as'=> 'user'
    ]);
    
    Route::get('/user/add', [
        'uses' => 'Panel\UserController@add',
        'as'=> 'user.add'
    ]);

    Route::post('/user/save/{user?}', [
        'uses' => 'Panel\UserController@save',
        'as'=> 'user.save'
    ]);

    Route::get('/user/{id}/edit', [
        'uses' => 'Panel\UserController@edit',
        'as'=> 'user.edit'
    ]);

    Route::get('/user/{id}/delete', [
        'uses' => 'Panel\UserController@delete',
        'as'=> 'user.delete'
    ]);

    /* Products */
    Route::get('/product', [
        'uses' => 'Panel\ProductsController@index',
        'as'=> 'product'
    ]);

    Route::put('/product/addStock/{id}', [
        'uses' => 'Panel\ProductsController@addStock',
        'as'=> 'product.addStock'
    ]);

    Route::post('/product/saveStock', [
        'uses' => 'Panel\ProductsController@saveStock',
        'as'=> 'product.saveStock'
    ]);

    Route::get('/product/add', [
        'uses' => 'Panel\ProductsController@add',
        'as'=> 'product.add'
    ]);

    Route::post('/product/save/{product?}', [
        'uses' => 'Panel\ProductsController@save',
        'as'=> 'product.save'
    ]);

    Route::get('/product/{id}/edit', [
        'uses' => 'Panel\ProductsController@edit',
        'as'=> 'product.edit'
    ]);

    Route::get('/product/{id}/delete', [
        'uses' => 'Panel\ProductsController@delete',
        'as'=> 'product.delete'
    ]);

    
    /* Sell*/

    Route::get('/sell', [
        'uses' => 'Panel\SellController@index',
        'as'=> 'sell'
    ]);
    Route::get('/sell/{id}/sale', [
        'uses' => 'Panel\SellController@sale',
        'as'=> 'sell.sale'
    ]);
    Route::post('/sell/search', [
        'uses' => 'Panel\SellController@search',
        'as'=> 'sell.search'
    ]);
    
    Route::post('/sell/save', [
        'uses' => 'Panel\SellController@save',
        'as'=> 'sell.save'
    ]);

    Route::get('/sell/Ticket', [
        'uses' => 'Panel\SellController@Ticket',
        'as'=> 'sell/Ticket'
    ]);

    /* SalesHistory*/

    Route::get('/saleshistory', [
        'uses' => 'Panel\SalesHistoryController@index',
        'as'=> 'saleshistory'
    ]);
    Route::post('/saleshistory/search', [
        'uses' => 'Panel\SalesHistoryController@search',
        'as'=> 'saleshistory.search'
    ]);
    
    Route::post('/saleshistory/save', [
        'uses' => 'Panel\SalesHistoryController@save',
        'as'=> 'saleshistory.save'
    ]);
    Route::get('/saleshistory/{id}/delete', [
        'uses' => 'Panel\SalesHistoryController@delete',
        'as'=> 'saleshistory.delete'
    ]);

    Route::put('/saleshistory/see/{id}', [
        'uses' => 'Panel\SalesHistoryController@showAppointment',
        'as'=> 'saleshistory.see'
    ]);

    /* OrderFood */
    
    Route::get('/orderfood', [
        'uses' => 'Panel\OrderFoodController@index',
        'as'=> 'orderfood'
    ]);
    
    Route::get('/orderfood/add', [
        'uses' => 'Panel\OrderFoodController@add',
        'as'=> 'orderfood.add'
    ]);

    Route::post('/orderfood/save/{orderfood?}', [
        'uses' => 'Panel\OrderFoodController@save',
        'as'=> 'orderfood.save'
    ]);

    Route::get('/orderfood/{id}/edit', [
        'uses' => 'Panel\OrderFoodController@edit',
        'as'=> 'orderfood.edit'
    ]);

    Route::get('/orderfood/{id}/delete', [
        'uses' => 'Panel\OrderFoodController@delete',
        'as'=> 'orderfood.delete'
    ]);

    

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'Panel\AuthController@logOut');
});