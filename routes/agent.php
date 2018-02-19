<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('agent')->user();

    //dd($users);

    return view('agent.home');
})->name('home');

