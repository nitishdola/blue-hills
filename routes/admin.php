<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('admin.home');

Route::get('/home', 'Admin\AdminDashboardController@showDashboard')->name('dashboard');

Route::group(['prefix' => 'seat-layout'], function () {
  Route::get('/', [
      'as' => 'seat_layouts',
      'middleware' => ['admin'],
      'uses' => 'Admin\SeatLayout\SeatLayoutsController@viewAll'
  ]);

  Route::get('/create', [
      'as' => 'seat_layout.create',
      'middleware' => ['admin'],
      'uses' => 'Admin\SeatLayout\SeatLayoutsController@create'
  ]);

  Route::post('/save', [
      'as' => 'seat_layout.store',
      'middleware' => ['admin'],
      'uses' => 'Admin\SeatLayout\SeatLayoutsController@store'
  ]);

});


Route::group(['prefix' => 'bus'], function () {
  Route::get('/', [
      'as' => 'bus',
      'middleware' => ['admin'],
      'uses' => 'Admin\Bus\BusesController@viewAll'
  ]);

  Route::get('/create', [
      'as' => 'bus.create',
      'middleware' => ['admin'],
      'uses' => 'Admin\Bus\BusesController@create'
  ]);

  Route::post('/save', [
      'as' => 'bus.store',
      'middleware' => ['admin'],
      'uses' => 'Admin\Bus\BusesController@store'
  ]);

  Route::group(['prefix' => 'routes'], function () {
    Route::get('/', [
        'as' => 'bus.routes',
        'middleware' => ['admin'],
        'uses' => 'Admin\Bus\RoutesController@viewAll'
    ]);

    Route::get('/create', [
        'as' => 'bus.routes.create',
        'middleware' => ['admin'],
        'uses' => 'Admin\Bus\RoutesController@create'
    ]);

    Route::post('/save', [
        'as' => 'bus.routes.store',
        'middleware' => ['admin'],
        'uses' => 'Admin\Bus\RoutesController@store'
    ]);


    Route::group(['prefix' => 'schedule'], function () {
      Route::get('/create', [
        'as' => 'bus.routes.schedule.create',
        'middleware' => ['admin'],
        'uses' => 'Admin\Bus\RouteSchdulesController@create'
      ]);

      Route::post('/save', [
        'as' => 'bus.routes.schedule.store',
        'middleware' => ['admin'],
        'uses' => 'Admin\Bus\RouteSchdulesController@store'
      ]);

    });
  });

});


