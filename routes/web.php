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

    Route::post('/sell/Ticket', [
        'uses' => 'Panel\SellController@Ticket',
        'as'=> 'sell.Ticket'
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

    Route::post('/saleshistory/ticket', [
        'uses' => 'Panel\SalesHistoryController@ticket',
        'as'=> 'saleshistory.ticket'
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
    Route::post('/orderfood/ticket', [
        'uses' => 'Panel\OrderFoodController@ticketComanda',
        'as'=> 'orderfood.ticket'
    ]);

    Route::get('/orderfood/{id}/edit', [
        'uses' => 'Panel\OrderFoodController@edit',
        'as'=> 'orderfood.edit'
    ]);

    Route::get('/orderfood/{id}/delete', [
        'uses' => 'Panel\OrderFoodController@delete',
        'as'=> 'orderfood.delete'
    ]);
  /* Invoices */
  Route::get('/invoices', [
    'uses' => 'Panel\InvoicesController@index',
    'as'=> 'invoices'
]);

Route::get('/invoices/add', [
    'uses' => 'Panel\InvoicesController@add',
    'as'=> 'invoices.add'
]);

Route::post('/invoices/save/{invoices?}', [
    'uses' => 'Panel\InvoicesController@save',
    'as'=> 'invoices.save'
]);

Route::get('/invoices/{id}/edit', [
    'uses' => 'Panel\InvoicesController@edit',
    'as'=> 'invoices.edit'
]);

Route::get('/invoices/{id}/delete', [
    'uses' => 'Panel\InvoicesController@delete',
    'as'=> 'invoices.delete'
]);
    

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'Panel\AuthController@logOut');
});