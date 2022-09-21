<?php

    Route::prefix('/admin')->group(function(){

        //Dashboard
        Route::get('/','Admin\DashboardController@getDashboard')->name('dashboard');

        //Assigments
        Route::get('/asignaciones', 'Admin\AssigmentController@getHome')->name('park_list');
        Route::get('/asignacion/nueva', 'Admin\AssigmentController@getAssignmentAdd')->name('park_add');
        Route::post('/asignacion/nueva', 'Admin\AssigmentController@postAssignmentAdd')->name('park_add');
        Route::get('/asignacion/{id}/quitar_acceso', 'Admin\AssigmentController@getRemoveAccess')->name('park_add');

        Route::get('/garitas_de_seguridad', 'Admin\AssigmentController@getSecurityCheckpoint')->name('park_list');
        Route::post('/garita_de_seguridad/crear', 'Admin\AssigmentController@postSecurityCheckpoint')->name('park_list');
        Route::get('/garita_de_seguridad/{id}/espacios', 'Admin\AssigmentController@getParkingLot')->name('park_list');
        Route::post('/garita_de_seguridad/espacios/crear', 'Admin\AssigmentController@postParkingLot')->name('park_list');
        //Users
        Route::get('/usuarios', 'Admin\UserController@getUsers')->name('user_list');
        Route::post('/usuario/agregar', 'Admin\UserController@postUserAdd')->name('user_add');
        Route::get('/usuario/{id}/editar', 'Admin\UserController@getUserEdit')->name('user_edit');
        Route::post('/usuario/{id}/editar', 'Admin\UserController@postUserEdit')->name('user_edit');
        Route::post('/usuario/{id}/reiniciar_contrasena','Admin\UserController@postResetPassword')->name('user_reset_password');
        Route::get('/usuario/{id}/suspender', 'Admin\UserController@getUserBanned')->name('user_banned');
        Route::get('/usuario/{id}/permisos', 'Admin\UserController@getUserPermissions')->name('user_permissions');
        Route::post('/usuario/{id}/permisos', 'Admin\UserController@postUserPermissions')->name('user_permissions');
        Route::get('/usuario/{id}/solicitudes_fuera_de_tiempo', 'Admin\UserController@getUserRequestsOut')->name('user_requests_out');
        Route::post('/usuario/{id}/solicitudes_fuera_de_tiempo', 'Admin\UserController@postUserRequestsOut')->name('user_requests_out');
        Route::get('/usuario/cuenta/informacion','Admin\UserController@getAccountInfo')->name('user_info');
        Route::post('/usuario/cuenta/cambiar/contrasena','Admin\UserController@postAccountChangePassword')->name('user_change_password');
        
    });
