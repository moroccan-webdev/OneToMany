<?php
use App\User;
use App\Post;
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

Route::get('/create', function () {
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'My first Post in the website', 'body'=>'I love to laravel myself']);
    $user->posts()->save($post);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);
    foreach($user->posts as $post)
    echo $post->title."<br>";
});

Route::get('/update', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(3)->update(['title'=>'this title has been updated',
                                        'body'=>'The body has been updated from the route'
                                       ]);

});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->posts()->whereId(2)->delete();
});

