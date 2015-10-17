<?php
	class UserController extends BaseController
	{

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
			//if(!empty($unameChecker))
			//{
				//return 4;
			//}
			$user = new User();
			$user -> email = Input::get('email');
			$user -> username = Input::get('uname');
			if(!empty(Input::get('pass')))
			{
				$user -> password = Hash::make(Input::get('pass'));
			}
			else
			{
				$tempPass = str_random(6);
				$user -> password = Hash::make($tempPass);
			}
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
				if ($userInfo -> save())
				{
					if(!empty(Input::get('pass')))
					{
						$emailcontent = array (
							'username' => $user -> username,
						    'link' => URL::route('confirmation', [$vCode , $user -> id])
					    );
		   				Mail::send('emails.confirmation.index', $emailcontent, function($message)
		    			{ 
						    $message->to(Input::get('email'),'Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Confirmation Email');
						    
		     			});

						return 1;
					}
					else
					{
						$emailcontent = array (
							'tempPass' => $tempPass,
							'email' => Input::get('email'),
							'username' => $user -> username,
						    'link' => URL::route('confirmation', [$vCode , $user -> id])
					    );
		   				Mail::send('emails.confirmation.walk-in', $emailcontent, function($message)
		    			{ 
						    $message->to(Input::get('email'),'Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Confirmation Email');
						    
		     			});
		     			
						return 1;
					}
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

		public function forgotPassword()
		{
			$emailChecker = User::where('email','=',Input::get('email'))->first();
			if(empty($emailChecker))
			{
				return 1;
			}
			else
			{
				$rCode = str_random(120);
				$emailChecker['reset_pass_token'] = $rCode;
				if($emailChecker->save())
				{
					$userInfo = UserInfo::where('user_id','=',$emailChecker['id'])->first();
					$emailcontent = array (
						'fname' => $userInfo -> firstname,
						'lname' => $userInfo -> lastname,
					    'link' => URL::route('passwordreset', [$rCode , $userInfo ->user_id])
				    );
	   				Mail::send('emails.confirmation.pass_reset', $emailcontent, function($message)
	    			{ 
					    $message->to(Input::get('email'),'Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Confirmation Email');
	     			});
	     			return 2;
				}
				else
				{
					return 3;
				}
				
			}
		}

		public function passwordreset($rcode,$id)
		{
			$emailChecker = User::where('id','=',$id)->where('reset_pass_token','=',$rcode)->first();
			if(!empty($emailChecker))
			{
				return View::Make('user.resetpass')->with('mt', "HOME")->with('passid', $id);
			}
			else
			{	
				return View::make('index')->with('mt', "HOME")->with('alert', 'fail')->with('msg', 'Invalid token to continue password request. Please try again.');
			}
		}

		public function postPassReset()
		{
			$password = Input::get('pass1');
			$user_id = Input::get('passid');

			$updatePass =User::find($user_id);
			$updatePass['password'] = Hash::make($password);
			$updatePass['reset_pass_token'] = "";

			if($updatePass->save())
			{
				return 1;
			}
			else
			{
				return 2;
			}
		}
	}