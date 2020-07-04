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
        /* client */
    Route::get('/client', [
        'uses' => 'Panel\ClientController@index',
        'as'=> 'client'
    ]);
    
    Route::get('/client/add', [
        'uses' => 'Panel\ClientController@add',
        'as'=> 'client.add'
    ]);

    Route::post('/client/save/{client?}', [
        'uses' => 'Panel\ClientController@save',
        'as'=> 'client.save'
    ]);

    Route::get('/client/{id}/edit', [
        'uses' => 'Panel\ClientController@edit',
        'as'=> 'client.edit'
    ]);

    Route::get('/client/{id}/delete', [
        'uses' => 'Panel\ClientController@delete',
        'as'=> 'client.delete'
    ]);

    /* Clinical Exam */
    Route::get('/clinicalexam', [
        'uses' => 'Panel\ClinicalExamController@index',
        'as'=> 'clinicalexam'
    ]);
    
    Route::get('/clinicalexam/add', [
        'uses' => 'Panel\ClinicalExamController@add',
        'as'=> 'clinicalexam.add'
    ]);

    Route::post('/clinicalexam/save/{clinicalexam?}', [
        'uses' => 'Panel\ClinicalExamController@save',
        'as'=> 'clinicalexam.save'
    ]);

    Route::get('/clinicalexam/{id}/edit', [
        'uses' => 'Panel\ClinicalExamController@edit',
        'as'=> 'clinicalexam.edit'
    ]);

    Route::get('/clinicalexam/{id}/delete', [
        'uses' => 'Panel\ClinicalExamController@delete',
        'as'=> 'clinicalexam.delete'
    ]);

    /* Clinical grupos */
    Route::get('/groups', [
        'uses' => 'Panel\GroupsController@index',
        'as'=> 'groups'
    ]);
    
    Route::get('/groups/add', [
        'uses' => 'Panel\GroupsController@add',
        'as'=> 'groups.add'
    ]);

    Route::post('/groups/save/{groups?}', [
        'uses' => 'Panel\GroupsController@save',
        'as'=> 'groups.save'
    ]);

    Route::get('/groups/{id}/edit', [
        'uses' => 'Panel\GroupsController@edit',
        'as'=> 'groups.edit'
    ]);

    Route::get('/groups/{id}/delete', [
        'uses' => 'Panel\GroupsController@delete',
        'as'=> 'groups.delete'
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

    /* category */
    Route::get('/category', [
        'uses' => 'Panel\CategoryController@index',
        'as'=> 'category'
    ]);

    Route::get('/category/add', [
        'uses' => 'Panel\CategoryController@add',
        'as'=> 'category.add'
    ]);

    Route::post('/category/save/{category?}', [
        'uses' => 'Panel\CategoryController@save',
        'as'=> 'category.save'
    ]);

    Route::get('/category/{id}/edit', [
        'uses' => 'Panel\CategoryController@edit',
        'as'=> 'category.edit'
    ]);

    Route::get('/category/{id}/delete', [
        'uses' => 'Panel\CategoryController@delete',
        'as'=> 'category.delete'
    ]);

    /* samplestype */
    Route::get('/samplestype', [
        'uses' => 'Panel\SamplesTypeController@index',
        'as'=> 'samplestype'
    ]);

    Route::get('/samplestype/add', [
        'uses' => 'Panel\SamplesTypeController@add',
        'as'=> 'samplestype.add'
    ]);

    Route::post('/samplestype/save/{samplestype?}', [
        'uses' => 'Panel\SamplesTypeController@save',
        'as'=> 'samplestype.save'
    ]);

    Route::get('/samplestype/{id}/edit', [
        'uses' => 'Panel\SamplesTypeController@edit',
        'as'=> 'samplestype.edit'
    ]);

    Route::get('/samplestype/{id}/delete', [
        'uses' => 'Panel\SamplesTypeController@delete',
        'as'=> 'samplestype.delete'
    ]);

    /* testtype */
    Route::get('/testtype', [
        'uses' => 'Panel\TestTypeController@index',
        'as'=> 'testtype'
    ]);

    Route::get('/testtype/add', [
        'uses' => 'Panel\TestTypeController@add',
        'as'=> 'testtype.add'
    ]);

    Route::post('/testtype/save/{testtype?}', [
        'uses' => 'Panel\TestTypeController@save',
        'as'=> 'testtype.save'
    ]);

    Route::get('/testtype/{id}/edit', [
        'uses' => 'Panel\TestTypeController@edit',
        'as'=> 'testtype.edit'
    ]);

    Route::get('/testtype/{id}/delete', [
        'uses' => 'Panel\TestTypeController@delete',
        'as'=> 'testtype.delete'
    ]);

     /* appointment */
     Route::get('/appointment', [
        'uses' => 'Panel\AppointmentController@index',
        'as'=> 'appointment'
    ]);

    Route::put('/appointment/see/{id}', [
        'uses' => 'Panel\AppointmentController@showAppointment',
        'as'=> 'appointment.see'
    ]);

    Route::get('/appointment/add', [
        'uses' => 'Panel\AppointmentController@add',
        'as'=> 'appointment.add'
    ]);

    Route::post('/appointment/save/{appointment?}', [
        'uses' => 'Panel\AppointmentController@save',
        'as'=> 'appointment.save'
    ]);

    Route::get('/appointment/{id}/edit', [
        'uses' => 'Panel\AppointmentController@edit',
        'as'=> 'appointment.edit'
    ]);

    Route::get('/appointment/{id}/delete', [
        'uses' => 'Panel\AppointmentController@delete',
        'as'=> 'appointment.delete'
    ]);

    Route::put('/appointment/show', [
        'uses' => 'Panel\AppointmentController@showAppointmentTable',
        'as'=> 'appointment.show'
    ]);
    Route::post('/appointment/CheckDates', [
        'uses' => 'Panel\AppointmentController@CheckDates',
        'as'=> 'appointment.CheckDates'
    ]);

    /* receiptsamples*/
    Route::get('/receiptsamples', [
        'uses' => 'Panel\ReceiptSamplesController@index',
        'as'=> 'receiptsamples'
    ]);

    Route::get('/receiptsamples/add/{id?}', [
        'uses' => 'Panel\ReceiptSamplesController@add',
        'as'=> 'receiptsamples.add'
    ]);

    Route::post('/receiptsamples/save/{receiptsamples?}', [
        'uses' => 'Panel\ReceiptSamplesController@save',
        'as'=> 'receiptsamples.save'
    ]);

    Route::get('/receiptsamples/{id}/delete', [
        'uses' => 'Panel\ReceiptSamplesController@delete',
        'as'=> 'receiptsamples.delete'
    ]);

    Route::put('/receiptsamples/see/{id}', [
        'uses' => 'Panel\ReceiptSamplesController@seeSampleDates',
        'as'=> 'receiptsamples.see'
    ]);

    Route::put('/receiptsamples/show', [
        'uses' => 'Panel\ReceiptSamplesController@showReceiptTable',
        'as'=> 'receiptsamples.show'
    ]);

    Route::get('/receiptsamples/add', [
        'uses' => 'Panel\ReceiptSamplesController@add',
        'as'=> 'receiptsamples.add'
    ]);

    Route::post('/receiptsamples/save/{receiptsamples?}', [
        'uses' => 'Panel\ReceiptSamplesController@save',
        'as'=> 'receiptsamples.save'
    ]);

    Route::get('/receiptsamples/{id}/edit', [
        'uses' => 'Panel\ReceiptSamplesController@edit',
        'as'=> 'receiptsamples.edit'
    ]);

    Route::get('/receiptsamples/{id}/delete', [
        'uses' => 'Panel\ReceiptSamplesController@delete',
        'as'=> 'receiptsamples.delete'
    ]);

    /* Sell*/

    Route::get('/sell', [
        'uses' => 'Panel\SellController@index',
        'as'=> 'sell'
    ]);
    Route::post('/sell/search', [
        'uses' => 'Panel\SellController@search',
        'as'=> 'sell.search'
    ]);
    
    Route::post('/sell/save', [
        'uses' => 'Panel\SellController@save',
        'as'=> 'sell.save'
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

    /* exam*/
    Route::get('/exam/{id?}', [
        'uses' => 'Panel\ExamController@index',
        'as'=> 'exam'
    ]);

    Route::get('/exam/delete/{exam_id?}/{group_id?}', [
        'uses' => 'Panel\ExamController@delete',
        'as'=> 'exam.delete'
    ]);

    Route::get('/group/delete/{id?}', [
        'uses' => 'Panel\GroupsController@delete',
        'as'=> 'group.delete'
    ]);

    Route::get('/exam/add/{id}', [
        'uses' => 'Panel\ExamController@add',
        'as'=> 'exam.add'
    ]);

    Route::post('/exam/save/{appointment?}', [
        'uses' => 'Panel\ExamController@save',
        'as'=> 'exam.save'
    ]);

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'Panel\AuthController@logOut');
});