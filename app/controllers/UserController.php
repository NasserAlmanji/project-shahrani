<?php

class UserController extends \BaseController {

	public function signup() {
		
		$username 			= Input::get('email');
		$firstName 			= Input::get('firstName');
		$password 			= Input::get('password');
		$password_retyped 	= Input::get('password_retyped');

	    $validator = Validator::make (
    	   	array(
		        'email' => $username,
		        'password' => $password,
		        'password_retyped' => $password_retyped,
		    ),
		    array(
		        'email' => 'required|email',
		        'password' => 'required|min:6',
		        'password_retyped' => 'same:password',
		    )
	    );


		if ($validator->fails()) {
			return View::make('signup', array('Messagetype'=>'error','message' => $validator->messages()));
		}

	    try {
	    	$user = Sentry::register(array(
		        'email'     => $username,
		        'first_name' => $firstName,
		        'password'  => $password,
		    ));

		    $activationCode = $user->getActivationCode();
		    $data = array();
		    
		    $data['activationCode'] = $activationCode;
		    $data['username'] = $username;
		    $data['firstName']= $firstName;

        	Queue::push('EmailQueue', $data);
    
			return Redirect::to('login')->with(array('Messagetype'=>'success','message' => 'لقد قمنا بارسال بريد الكتروني الى: '.$username));

		}
	   	catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			return View::make('signup', array('Messagetype'=>'error','message' => 'Login field is required.'));
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			return View::make('signup', array('Messagetype'=>'error','message' => 'Password field is required.'));
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			return View::make('signup', array('Messagetype'=>'error','message' => 'User with this login already exists.'));			
		}
		catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			return View::make('signup', array('Messagetype'=>'error','message' => 'Group was not found.'));			
		}

	}

	public function logout() {
		Sentry::logout();
		echo 'user has logged out';
		return Redirect::guest('login');

	}

	public function login()
	{
		$username = Input::get('email');
		$password = Input::get('password');

		// Server Side Validation for
		// User Login Form
		$validator = Validator::make(
		    array(
		        'email' => $username,
		        'password' => $password,
		    ),
		    array(
		        'email' => 'required|email',
		        'password' => 'required|min:6',
		    )
		);

		if ($validator->fails()) {
			return View::make('login', array('Messagetype'=>'error','message' => $validator->messages()));
		}

		try
			{
			    // Login credentials
			    $credentials = array(
			        'email'    => $username,
			        'password' => $password,
			    );

			    if (Input::get('rememberme')=='on') {
			    	$user = Sentry::authenticateAndRemember($credentials);
			    	Sentry::loginAndRemember($user);

			    } else {
				    $user = Sentry::authenticate($credentials, false);
		       		Sentry::login($user, false);		
			    }

				return Redirect::to('home');
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'عذراً، حقل المستخدم فارغاً'));
			}
			catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'عذراً، حقل كلمة المرور فارغاً'));
			}
			catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'عذراً، المستخدم أو كلمة المرور لا تطابق بيانات أي مستخدم'));

			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'عذراً، المستخدم أو كلمة المرور لا تطابق بيانات أي مستخدم'));

			}
			catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'عذراً، المستخدم لم يتم تفعيله بعد'));
			}

			// The following is only required if the throttling is enabled
			catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)	
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'User is suspended.'));
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
				return View::make('login', array('Messagetype'=>'error','message' => 'User is banned.'));
			}
	}

	public function activate($code,$email)
	{
		try
		{
		    // Find the user using the user id
			$user = Sentry::findUserByLogin($email);
		    // Attempt to activate the user
		    if ($user->attemptActivation($code))
		    {
    			return Redirect::to('login')->with(array('Messagetype'=>'success','message' => 'لقد تم تفعيل بنجاح تفعيل: '.$user->email));
		    }
		    else
		    {
				return Redirect::to('signup')->with(array('Messagetype'=>'error','message' => 'User activation failed for: '.$user->email));
		    }
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::to('signup')->with(array('Messagetype'=>'error','message' => 'User was not found'));
		}
		catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e)
		{
    			return Redirect::to('login')->with(array('Messagetype'=>'success','message' => 'User already activated: '.$user->email));
		}


	}



}