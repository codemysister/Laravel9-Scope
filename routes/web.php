<?php

use App\Models\Mahasiswa;
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
    return view('welcome');
});

Route::get('/mahasiswa-ipk', function () {
    $mahasiswas = Mahasiswa::where('ipk', '>', '3.5')->get();
    foreach ($mahasiswas as $mahasiswa) {
        echo ($mahasiswa->nama) . '<br>';
    }
});

Route::get('/mahasiswa-ipk-scope', function () {
    $mahasiswas = Mahasiswa::cumlaude()->get();
    foreach ($mahasiswas as $mahasiswa) {
        echo ($mahasiswa->nama) . '<br>';
    }
});

Route::get('/mahasiswa-lahir', function () {
    $mahasiswas = Mahasiswa::whereYear('tanggal_lahir', '=', '2002')->get();
    foreach ($mahasiswas as $mahasiswa) {
        echo ($mahasiswa->nama) . '<br>';
    }
});

Route::get('/tampil-lahir-scope-dynamic', function () {
    $mahasiswas = Mahasiswa::lahir(2002)->get();
    foreach ($mahasiswas as $mahasiswa) {
        echo ($mahasiswa->nama) . '<br>';
    }
});

Route::get('/scope-chain', function () {
    $mahasiswas = Mahasiswa::lahir(2002)->cumlaude()->get();
    foreach ($mahasiswas as $mahasiswa) {
        echo ($mahasiswa->nama) . '<br>';
    }
});
