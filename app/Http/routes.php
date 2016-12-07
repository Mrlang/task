<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('laravel');
});
Route::get('/send','TestServiceController@send');
Route::get('/addjob','TestServiceController@addJob');
Route::get('/addevent', 'TestServiceController@addEvent');
Route::get('/upload', 'FileController@uploadForm');
Route::post('/upload', 'FileController@uploadFile');
/*

Route::get('/sites/article','SitesController@article');
Route::get('/', function () {
    return view('welcome');
});



Route::post('/task',function(Request $request){
    $validator = Validator::make($request->all(),['name'=>'required|max:255']);
    if($validator->fails()){
        return redirect('/task')->withInput()->withErrors($validator);
        //dd($validator);
    }

    $task = new \App\Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/task');
});

Route::get('/task',function(){
    $data['tasks'] = \App\Task::orderBy('created_at','asc')->get();
    //dd($data['tasks']);
    return view('tasks',$data);
})->middleware([
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class
]);


/*Route::delete('/task/{id}',function($id){
    \App\Task::findOrFail($id)->delete();
    return redirect('/task');
});
Route::delete('/task/{id}','TasksController@delete');
*/




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //Route::get('/articles','ArticlesController@index');
    Route::get('/home',function(){return view('home');});
    Route::get('/tasks', 'TasksController@index');
    Route::post('/task', 'TasksController@store');
    Route::delete('/task/{id}', 'TasksController@destory');

    Route::auth();

});


