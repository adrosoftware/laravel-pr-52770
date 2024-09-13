<?php

use App\Mail as Mailables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/working', function () {
    Mail::to('adro@example.com')->send(new Mailables\TestMailWorking());
})->name('working');

Route::get('/failing', function () {
    Mail::to('adro@example.com')->send(new Mailables\TestMailFailing());
})->name('failing');
