<?php

use App\Models\Posting;
use Svg\Tag\RadialGradient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkgController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RadiologiController;
use Symfony\Component\VarDumper\Caster\RdKafkaCaster;

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
    return view('akses', [
        "title" => "Akses Pengguna",
        "image" => "bg.jpg"
    ]);
});

Route::get('data-master', [PenggunaController::class, 'index'])->name('dataMaster');
Route::get('data/{jabatan:jabatan}', [PenggunaController::class, 'display']);
Route::get('data-master/karyawan', [PenggunaController::class, 'karyawan']);
Route::get('data-master/jabatan', [PenggunaController::class, 'jabatan']);
// Route::get('data/{nama:nama_user}',[PenggunaController::class,'display']);

Route::get('laboratorium', function () {
    return view('lab', [
        "title" => "Laboratorium"
    ]);
})->name('lab');

Route::get('panduan', [PostingController::class, 'main'])->name('panduan');
Route::get('panduan/{judul:url}', [PostingController::class, 'display']);


Route::get('template', function () {
    return view(
        'template/template',
        [
            "title" => "template",
            "akses" => "akses.png"
        ]
    );
})->name('template');
Route::group(['prefix' => '/radiologi'], function () {
    Route::get('/', [RadiologiController::class, 'index']);
    Route::group(['prefix' => 'group'], function () {
        Route::get('/', [RadiologiController::class, 'group']);
        Route::post('/add', [RadiologiController::class, 'addgroup']);
        Route::get('/add', [RadiologiController::class, 'vaddg']);
        Route::get('/delete/{id}', [RadiologiController::class, 'deletegroup']);
        Route::get('/delete', [RadiologiController::class, 'deletegroup']);
        Route::post('/delete/{id}', [RadiologiController::class, 'deletegroup']);
        Route::get('/search', [RadiologiController::class, 'searchgroup']);
        Route::post('/search', [RadiologiController::class, 'searchgroup']);
        Route::get('/edit/{id}', [RadiologiController::class, 'veg']);
        Route::get('/edit', [RadiologiController::class, 'veg']);
        Route::post('/edit/{id}', [RadiologiController::class, 'veg']);
        Route::get('/pratinjau', [RadiologiController::class, 'tinjaug']);
    });
    Route::group(['prefix' => 'item-test'], function () {
        Route::get('/', [RadiologiController::class, 'itemtest']);
        Route::post('/search', [RadiologiController::class, 'searchitem']);
        Route::get('/search', [RadiologiController::class, 'searchitem']);
        Route::post('/add', [RadiologiController::class, 'additem']);
        Route::get('/add', [RadiologiController::class, 'additem']);
        Route::post('/edit/{id}', [RadiologiController::class, 'edititem']);
        Route::get('/edit', [RadiologiController::class, 'edititem']);
        Route::get('/edit/{id}', [RadiologiController::class, 'edititem']);
        Route::post('/delete/{id}', [RadiologiController::class, 'hapusi']);
        Route::get('/delete', [RadiologiController::class, 'hapusi']);
        Route::get('/delete/{id}', [RadiologiController::class, 'hapusi']);
        Route::get('/pratinjau', [RadiologiController::class, 'tinjaui']);
        Route::get('/popup', [RadiologiController::class, 'gpop']);
        Route::get('/popup/{id}', [RadiologiController::class, 'gpop']);
        Route::post('/popup/{id}', [RadiologiController::class, 'gpop']);
    });
    Route::group(['prefix' => 'film'], function () {
        Route::get('/', [RadiologiController::class, 'film']);
        Route::get('/add', [RadiologiController::class, 'vfa']);
        Route::post('/add', [RadiologiController::class, 'addfilm']);
        Route::get('/edit', [RadiologiController::class, 'editfilm']);
        Route::get('/edit/{id}', [RadiologiController::class, 'editfilm']);
        Route::post('/edit/{id}', [RadiologiController::class, 'editfilm']);
        Route::get('/delete/{id}', [RadiologiController::class, 'hapusfilm']);
        Route::post('/delete/{id}', [RadiologiController::class, 'hapusfilm']);
        Route::get('/delete', [RadiologiController::class, 'hapusfilm']);
        Route::get('/search', [RadiologiController::class, 'searchfilm']);
        Route::post('/search', [RadiologiController::class, 'searchfilm']);
        Route::get('/pratinjau', [RadiologiController::class, 'tinjauf']);
    });
    Route::group(['prefix' => 'pemeriksaan-pasien'], function () {
        Route::get('/', [RadiologiController::class, 'periksa']);
        Route::post('/add', [RadiologiController::class, 'addr']);
        Route::get('/periksa2', [RadiologiController::class, 'periksa2']);
    });
    Route::group(['prefix' => 'data-pemeriksaan'], function () {
        Route::get('/', [RadiologiController::class, 'data']);
        // Route::get('/search', [RadiologiController::class, 'searchdata']);
        // Route::post('/search', [RadiologiController::class, 'searchdata']);
    });
    Route::group(['prefix' => 'laporan-radiologi'], function () {
        Route::get('/', [RadiologiController::class, 'laporan']);
        Route::get('/add', [RadiologiController::class, 'addlap']);
    });
    Route::group(['prefix' => 'laporan-kegiatan-radiologi'], function () {
        Route::get('/', [RadiologiController::class, 'laporan2']);
    });
});

Route::get('ekg', function () {
    return view('elektro',[
        "title" => "Elektrokardiogram",
        
    ]);
})->name('ekg');
Route::controller(EkgController::class)->group(function(){
    // Group
    Route::get('/ekg/group', 'group')->name('grup');
    Route::post('/ekg/group/{id}','showG')->name('showG');
    Route::get('/ekg/group/{id}/{button}','btn')->name('btn');
    Route::post('/ekg/group', 'addGroup')->name('createG');
    Route::put('/ekg/group/{id}', 'updateGroup')->name('editG');
    Route::delete('/ekg/group/{id}', 'deleteGroup')->name('deleteG');
    Route::get('/ekg/group/pratinjau', 'pratinjauGroup')->name('pratinjauG');

    // Sub Group
    Route::get('/ekg/sub-group', 'subGroup')->name('subGrup');
    Route::post('/ekg/sub-group/{id}/{idg}','showSG')->name('showSG');
    Route::get('/ekg/sub-group/{id}/{sendG}/{button}','btnSG')->name('btnSG');
    Route::post('/ekg/sub-group', 'addSGroup')->name('createSG');
    Route::put('/ekg/sub-group/{id}/{idG}', 'editSG')->name('editSG');
    Route::delete('/ekg/sub-group/{id}/{idG}', 'deleteSGroup')->name('deleteSG');
    Route::get('/ekg/sub-group/{id}/windowedit', 'popupGedit')->name('windowsedit.subgrup');


    // Item Test
    Route::get('/ekg/item-test', 'itemTest')->name('itemTest');
    Route::post('/ekg/item-test/{id}/{idg}','showIT')->name('showIT');
    Route::get('/ekg/item-test/{id}/{sendG}/{button}','btnIT')->name('btnIT');
    Route::post('/ekg/item-test', 'addIT')->name('createIT');
    Route::put('/ekg/item-test/{id}/{idg}', 'updateIT')->name('editIT');
    Route::delete('/ekg/item-test/{id}/{idg}', 'deleteIT')->name('deleteIT');
    Route::get('/ekg/item-test/{id}/windowITE', 'popupGITE')->name('windowsIT');
    Route::get('/ekg/item-test/pratinjau', 'pratinjauIT')->name('pratinjauIT');

    // Film
    Route::get('/ekg/film', 'film')->name('film');
    Route::get('/ekg/film/{id}','showFilm')->name('showF');
    Route::get('/ekg/film/{id}/{button}','btnfilm')->name('btnfilm');
    Route::post('/ekg/film', 'addFilm')->name('createF');
    Route::put('/ekg/film/{id}', 'updateFilm')->name('editF');
    Route::delete('/ekg/film/{id}', 'deleteFilm')->name('deleteF');
    Route::get('/ekg/film/x/x/pratinjau', 'pratinjauFilm')->name('pritinjauF');

    // Pemeriksaan Pasien
    Route::get('/ekg/pemeriksaan-pasien', 'pemeriksaanPasien')->name('pemeriksaanPasien');
    Route::get('/ekg/pemeriksaan-pasien-crud', 'CrudPP')->name('pemeriksaanPasienCrud');
    Route::post('/ekg/pemeriksaan-pasien', 'addPP')->name('addPP');

    //popup-itemtest
    Route::get('/ekg/pemeriksaan-pasien/windowITE', 'popupPP')->name('windowsPP');
    Route::post('/ekg/pemeriksaan-pasien/windowITE/{id}/{idg}','showITPP')->name('showITPP');
    Route::get('/ekg/pemeriksaan-pasien/windowITE/{id}/{sendG}/{button}','btnITPP')->name('btnITPP');
    Route::post('/ekg/pemeriksaan-pasien/windowITE', 'addIT')->name('createITPP');
    Route::put('/ekg/pemeriksaan-pasien/windowITE/{id}/{idg}', 'updateITPP')->name('editITPP');
    Route::delete('/ekg/pemeriksaan-pasien/windowITE/{id}/{idg}', 'deleteITPP')->name('deleteITPP');
    Route::get('/ekg/pemeriksaan-pasien/windowITE/{id}/windowITE', 'popupGITEPP')->name('windowsITPP');
    Route::get('/ekg/pemeriksaan-pasien/windowITE/pratinjau', 'pratinjauITPP')->name('pratinjauITPP');


    // Data Pemeriksaan
    Route::get('/ekg/data-pemeriksaan', 'dataPemeriksaan')->name('dataPemeriksaan');
    Route::get('/ekg/data-pemeriksaan/{id}','showDP')->name('showDP');
    Route::get('/ekg/data-pemeriksaan/{id}/{button}','btnDP')->name('btnDP');
    Route::post('/ekg/data-pemeriksaan', 'addDP')->name('createDP');
    Route::put('/ekg/data-pemeriksaan/{id}', 'updateDP')->name('editDP');
    Route::delete('/ekg/data-pemeriksaan/{id}', 'deleteDP')->name('deleteDP');
});

Route::get('/clear', function() {
    $exitCode = Artisan::call('route:clear');
    return redirect('/');
});
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return redirect('/');
});