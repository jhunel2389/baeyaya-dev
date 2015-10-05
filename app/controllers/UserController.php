<?php
	class UserController extends BaseController
	{
		// get the view for the regoster page
		public function getCreate()
		{
			return View::make('user.register');
		}

		// get the view for the login page
		public function getLogin()
		{
			return View::make('user.login');
		}

		public function userInfo($id)
		{
			return UserInfo::where('user_id','=',$id)->first();
		}
		public function postCreate()
		{
			$vCode = str_random(120);
			$emailChecker = User::where('email','=',Input::get('email'))->first();
			if(!empty($emailChecker))
			{
				return 3;
			}

			$unameChecker = User::where('username','=',Input::get('uname'))->first();
			if(!empty($unameChecker))
			{
				return 4;
			}
			$user = new User();
			$user -> email = Input::get('email');
			$user -> username = Input::get('uname');
			$user -> password = Hash::make(Input::get('pass'));
			$user -> vCode = $vCode;

			if ($user -> save())
			{
				$userInfo = new UserInfo();
				$userInfo -> user_id = $user['id'];
				$userInfo -> lastname = Input::get('lname');
				$userInfo -> firstname = Input::get('fname');
				$userInfo -> middleInitial = Input::get('mname');
				$userInfo -> address = Input::get('address');
				$userInfo -> contactNo = Input::get('contact');
				$userInfo -> email = Input::get('email');
				$userInfo -> availability = Input::get('uname');
				if ($userInfo -> save())
				{
					$emailcontent = array (
						'username' => $user -> username,
					    'link' => URL::route('confirmation', [$vCode , $user -> id])
				    );
	   				Mail::send('emails.confirmation.index', $emailcontent, function($message)
	    			{ 
					    $message->to(Input::get('email'),'Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Confirmation Email');
					    
	     			});

					//return View::make('index')->with('mt', "HOME")->with('alert', 'success')->with('msg', 'Your regestered successfully. You can now log in.');
					//return Redirect::Route('home')->with('success','Your regestered successfully. You can now log in.');
					return 1;
				}
			}
			else
			{
				//return View::make('index')->with('mt', "HOME")->with('alert', 'fail')->with('msg', 'An error occured while creating the user. Please try again.');
				//return Redirect::Route('home')->with('fail','An error occured while creating the user. Please try again.');
				return 2;
			}
		}

		public function postLogin()
		{
			$validator = Validator::make(Input::all(), array(
				'email' => 'required',
				'pass1' => 'required'
			));

			if ($validator -> fails())
			{
				return View::make('index')->with('mt', "HOME")->with('alert', 'fail')->with('msg', 'Please input your credentials.');
			}
			else
			{
				$remember = (Input::has('remember')) ? true : false;
				
				$auth = Auth::attempt(array(
					'email' => Input::get('email'),
					'password' => Input::get('pass1')
				), $remember);

				if($auth)
				{
					if(Auth::User()->isVerified())
					{
						return View::make('index')->with('mt', "HOME")->with('alert', 'success')->with('msg', 'Welcome. You successfully Log-in.');
					}
					else
					{
						Auth::logout();
						return View::make('index')->with('mt', "HOME")->with('alert', 'success')->with('msg', 'Please Check your email and verify your account.');
					}

				}
				else
				{
					return View::make('index')->with('mt', "HOME")->with('alert', 'fail')->with('msg', 'You entered the wrong login crdebtials, please try again');
				}
			}
		}

		public function getLogout()
		{
			Auth::logout();
			return Redirect::route('home');
		}
	}