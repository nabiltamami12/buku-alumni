<?php

use Illuminate\Support\Facades\Route;
//Akademik
use App\Http\Controllers\Akademik\AlbumController;
use App\Http\Controllers\API\APIUuserController;
use App\Http\Controllers\Akademik\DetailAlbumController;
use App\Http\Controllers\Akademik\AddProdiController;
use App\Http\Controllers\Akademik\AddUserMahasiswaController;
use App\Http\Controllers\Akademik\AdminController;
use App\Http\Controllers\Akademik\ProfileController as AkademikProfileController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ExportPDFController;
use App\Http\Controllers\DetailAlumniController;
use App\Http\Controllers\EditProfileAlumni;


//Mahasiswa
use App\Http\Controllers\Mahasiswa\ProfileController;
use App\Http\Controllers\Mahasiswa\AlbumAlumniController;
//All
use App\Http\Controllers\AlumniController;

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

//Akademik
Route::resource('album-akademik', AlbumController::class)->only([
    'index', 'edit', 'store', 'update' , 'destroy', 
])->middleware(['auth']);

Route::resource('detail-album-alumni/{id}', DetailAlbumController::class)->only([
    'index'
])->middleware(['auth']);

Route::resource('prodi', AddProdiController::class)->only([
    'index', 'edit', 'store', 'update' , 'destroy'
])->middleware(['auth']);
Route::resource('user-mahasiswa', AddUserMahasiswaController::class)->only([
    'index', 'edit', 'store', 'update' , 'destroy'
])->middleware(['auth']);
Route::resource('import-mahasiswa-excel', ImportController::class)->only([
    'store'
])->middleware(['auth']);
Route::resource('download-album/{id}', ExportPDFController::class)->only([
    'index'
])->middleware(['auth']);
//Mahasiswa
Route::resource('album-alumni', AlbumAlumniController::class)->only([
    'index', 
])->middleware(['auth']);
Route::resource('profile', ProfileController::class)->only([
    'index', 'edit', 'store', 'update' , 'destroy' ,'show'
])->middleware(['auth']);
Route::resource('detail-alumni_mahasiswa', DetailAlumniController::class)->only([
    'index', 'edit', 'store', 'update' , 'destroy', 'show'
])->middleware(['auth']);


Route::get('change-password', [AkademikProfileController::class, 'index'])->name('change-password')->middleware(['auth']);
Route::patch('update-password', [AkademikProfileController::class, 'updateUser'])->name('update-user')->middleware(['auth']);
Route::get('update-user_profil/{id}', [AkademikProfileController::class, 'show'])->name('show')->middleware(['auth']);
Route::post('update-user_profil_store/{id}', [AkademikProfileController::class, 'store'])->name('store')->middleware(['auth']);


Route::resource('user-Admin', AdminController::class)->middleware(['auth']);
Route::resource('api-user', APIUuserController::class);
// Route::get('edit-alumni_mahasiswa', EditProfileAlumni::class)->only([
//     'index'
// ])->middleware(['auth']);
// Route::get('/edit-alumni_mahasiswa/{id}', 'EditProfileAlumni@index');
//All
Route::get('/', function () {
    return view('auth.login');
});
Route::resource('alumni', AlumniController::class)->only([
    'index', 'edit', 'store', 'update' , 'destroy', 'show'
])->middleware(['auth']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// template baru
// Route::get('/dashboard-baru', function () {
//     return view('dashboard-baru');
// })->name('dashboard-baru');

// Route::get('/profile-mahasiswa', function () {
//     return view('pages.mahasiswa.profile_template');
// })->name('profile-mahasiswa');

Route::get('/prodi-baru', function () {
    return view('pages.akademikprodi-baru');
})->name('alumni-baru');

require __DIR__.'/auth.php';
