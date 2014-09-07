<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{

     var_dump(Post::all()->first());

	try
	{
	    // Create the group
	    $group = Sentry::createGroup(array(
	        'name'        => 'Moderator',
	        'permissions' => array(
	            'admin' => 1,
	            'users' => 1,
	        ),
	    ));
	}
	catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
	{
	    echo 'Name field is required';
	}
	catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
	{
	    echo 'Group already exists';
	}*/

/*try
{
    // Create the user
    $user = Sentry::findUserById(1);

    // Find the group using the group id
    $adminGroup = Sentry::findGroupById(1);

    // Assign the group to the user
    $user->addGroup($adminGroup);
}
catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
{
    echo 'Login field is required.';
}
catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
{
    echo 'Password field is required.';
}
catch (Cartalyst\Sentry\Users\UserExistsException $e)
{
    echo 'User with this login already exists.';
}
catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
{
    echo 'Group was not found.';
}


});*/


/*
##########################################
	Single View Pages
##########################################
*/

Route::get('queue/add', 'QueueController@add');
Route::get('time',function() {
	echo date('Y-m-d H:i:s').'<br>';
	printf("Right now is %s", Carbon::now()->toDateTimeString());
	echo '<br>';
	printf("Right now is %s", Carbon::now()->toRFC2822String());


});

Route::get('activate/{code}/{email}',array('as'=>'Activation','uses'=>'UserController@activate'));

Route::get('/home', array('as' => 'home', 'uses' => 'PostsController@index'));

Route::get('/', function(){
	return View::make('main');
});

Route::get('/login', array('as'=> 'login', function()
{
	$message = Session::get('message');
	$Messagetype = Session::get('Messagetype');
	$old['message'] = $message;
	$old['Messagetype'] = $Messagetype;
	return View::make('login')->with($old);
}));

Route::get('signup', array('as' => 'signup', function()
{
	$message = Session::get('message');
	$Messagetype = Session::get('Messagetype');
	$old['message'] = $message;
	$old['Messagetype'] = $Messagetype;
	return View::make('signup')->with($old);
}));
/*
##########################################
	END Single View Pages
##########################################
*/

Route::post('/login','UserController@login');
Route::get('/logout','UserController@logout');
Route::post('/signup','UserController@signup');
Route::get('/user','UserController@home');


Route::group(array('before' => array('authSentry','admin')), function()
{	
    //Route::get('admin/index', 'PostsController@index');


	Route::get('admin/post/create','PostsController@createIndex');
    Route::post('admin/post/create', 'PostsController@create');

    Route::get('admin/delete/{id}','PostsController@destroy');

    Route::get('admin/company/create','CompaniesController@index');
    Route::post('admin/company/create','CompaniesController@create');


});


Route::get('/papertail', function() {
	$monolog = Log::getMonolog();
	$syslog = new \Monolog\Handler\SyslogHandler('papertrail');
	$formatter = new \Monolog\Formatter\LineFormatter('%channel%.%level_name%: %message% %extra%');
	$syslog->setFormatter($formatter);

	$monolog->pushHandler($syslog);
});
