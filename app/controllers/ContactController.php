<?php
class ContactController extends BaseController {
	public function index()
	{
		return View::make('contactus.index')->with('mt', "CONTACT");
	}

	public function sendContactMsg()
	{
		$emailcontent = array (
			'fname' => Input::get('fname'),
		    'email' => Input::get('email'),
		    'msg' => Input::get('message')
	    );
		Mail::send('emails.contactus.index', $emailcontent, function($message)
		{ 
	    	$message->to('14kalugdangardenresort@gmail.com','Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Inquiry Email');
		});	
		return 1;
	}
}