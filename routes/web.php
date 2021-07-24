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

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;




Route::get('/download-image', function () {
    $d = public_path('storage/images/');
    $path = $d.'VLxk0vYCDpBnUmpjM4QA8pkibp0esVFOWEyCWiUt.jpg';
    return response()->download($path , "mamam.jpg");

});

Route::get('/delet-images', function () {

    // Get All Directories Within A Directory
    $directories = Storage::disk('public')->allDirectories();
    foreach ($directories as $directory) {
        // Get All Files Within A Directory
        $files = Storage::disk('public')->files($directory);
        foreach ($files as $file) {
            Storage::disk('public')->delete($file);
        }
        // for ($i=0; $i < count($files); $i = $i =+2) {
        //     Storage::disk('public')->delete($files[$i]);
        // }
        // Delete Directory
        Storage::disk('public')->deleteDirectory($directory);
    }

    dd("images and folders Deeted successfuly");
});
// })->middleware(['auth' ,'vertifyisadmin']);


Route::get('/findOrFail/{id}', function ($id) {

    try
    {
        $r = Post::findOrFail($id);
        dd($r);
        // return view('posts.index')->with('post',$r);
    }
    // catch(Exception $e) catch any exception
    catch(ModelNotFoundException $e)
    {
        dd(get_class_methods($e)); // lists all available methods for exception object
        dd($e);
    }

});








Auth::routes();


Route::group(['middleware' => 'auth' , 'prefix' => 'Dash' , 'namespace' => 'Dash'] , function(){

    Route::get('/dashbord', 'HomeController@index')->name('home');

    Route::resource('/categories', 'categoriesController');

    Route::resource('/tags', 'tagController');

    Route::resource('/posts', 'postController');

    Route::get('/posts-withtrashed', 'postController@withtrashed')->name('posts.withtrashed');

    Route::get('/trashed-posts','postController@trashed')->name('trashed.index');

    Route::get('/trashed-posts/{post}','postController@restore')->name('trashed.restore');

    Route::resource('comment', 'CommentController');

    Route::get('/users' , 'UserController@index')->name('users.index');
    Route::post('/users/{user}/make-admin' , 'UserController@makeAdmin')->name('users.make-admin');

    Route::get('/users/profile' , 'UserController@profile')->name('users.profile');
    Route::post('/users/update' , 'UserController@update')->name('users.update');

});


Route::group(['namespace' => 'Dash'] , function(){
    Route::get('/', 'BlogController@index')->name('blog');
    Route::get('/post/{post}', 'BlogController@show')->name('show.post');
    Route::get('/your-profile' , 'BlogController@showProfile')->name('prof')->middleware('auth');
    Route::get('/publisher-profile/{id}' , 'BlogController@publisherprofile')->name('publisher.profile');
});
