<?php

class ConfirmationController extends BaseController {

	public function confirmation($code,$id)
	{
		/*$genders = Gender::all();
		$months = Month::all();
		$user = User::find($id);*/
		$account = User::find($id);
		if($account['vCode'] == $code)
		{
			$account['isVerified'] = 1;
			if($account ->save())
			{
				if(Auth::Check())
				{
					return View::make('index')->with('mt', "HOME")->with('alert', 'success')->with('msg', 'You already confirmed your email');
					//return Redirect::Route('home')->with('success','You already confirmed your email');
				}
				else
				{
					return View::make('index')->with('mt', "HOME")->with('alert', 'success')->with('msg', 'You already confirmed your email. Please log in now.');
					//return Redirect::Route('home')->with('success','You already confirmed your email. Please log in now.');
				}	
			}
			else
			{
				return View::make('index')->with('mt', "HOME")->with('alert', 'fail')->with('msg', 'Fail to verify your email. please try again.');
				//return Redirect::Route('home')->with('fail','Fail to verify your email. please try again.');
			}
		}
	}
}