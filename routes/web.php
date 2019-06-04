<?php

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

Route::group(['middleware' => ['auth'],'namespace' => 'Admin', 'prefix' => 'admin','as'=>'admin.'],function (){
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/roles-permission', 'AdminController@rolesPermission')->name('admin.roles');

    Route::resources([
        'users' => 'UserController',
        'typeusers' => 'TypeUserController',
        'modalities' => 'ModalityController',
        'teams' => 'TeamController',
        'address' => 'AddressController',
        'comments' => 'CommentController',
        'locals' => 'LocalController',
        'games' => 'GameController',
        'notices' => 'NoticeController',
        'players' => 'PlayerController',
        'punctuations' => 'PunctuationController',
        'results' => 'ResultController',
        'scoreboards' => 'ScoreboardController',
        'solicitations' => 'SolicitationController',
        'gallery' => 'GalleryController',
    ]);
});

Route::get('/', 'Site\SiteController@index')->name('home');
Route::get('/teste', function (){
    return view('teste');
});

Route::get('/home/{num_page}', 'Site\SiteController@pageNotices')->name('pageNotices');
Route::get('/team_modality', 'Admin\GameController@teamJson')->name('teamJson');
Route::get('/games/punctuations', 'Site\GameController@punctuation')->name('punctuations');
Route::get('sede', 'Site\SiteController@headquarter')->name('headquarter');
Route::resource('notices', 'Site\NoticeController');
Route::resource('locals', 'Site\LocalController');
Route::resource('games', 'Site\GameController');
Route::resource('teams', 'Site\TeamController');
Route::resource('modalities', 'Site\ModalityController');
Route::resource('gallery', 'Site\GalleryController');
Auth::routes();
