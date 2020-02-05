<?php

/*
|--------------------------------------------------------------------------
| Catatan
|--------------------------------------------------------------------------
|penamaan route bisa menggunakan chain name pada web.php. {{ route(nama_route) }} pada halaman awal
|untuk proses CRUD lebih baik membuat controller dengan flag -r agar bisa menggunakan route::resource untuk akses semua method CRUD
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/contact-me', function () {
    return view('contact');
})->name('contact');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('create-new-article', 'ArticleController@create')->name('articles.create');
Route::post('create-new-article', 'ArticleController@store');

Route::get('articles', 'ArticleController@index')->name('articles.index');

Route::get('articles/{article}', 'ArticleController@show')->name('articles.show');

Route::get('edit-the-article-about/{article}', 'ArticleController@edit')->name('articles.edit');
Route::post('edit-the-article-about/{article}', 'ArticleController@update');

Route::post('kick-this-out/{article}', 'ArticleController@destroy')->name('articles.delete');





// Route::get('posts/create', 'PostController@create')->name('posts.create');
// Route::get('posts/edit', 'PostController@edit')->name('posts.edit');
// Route::get('posts/destroy', 'PostController@destroy')->name('posts.delete');
// 3 route diatas sama saja dengan 1 route dibawah
Route::resource('posts','PostController'); 
// mengambil semua method yang ada di PostController untuk proses CRUD
