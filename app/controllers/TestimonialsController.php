<?php
class TestimonialsController extends BaseController {

	public function index()
	{
		return View::make('testimonials.index')->with('mt', "TESTIMONIALS");
	}
	public function postTestimonials()
	{
		$txt = Input::get('txt');
		$getTestimonials = new Testimonials();
		$getTestimonials['user_id'] = Auth::User()['id'];
		$getTestimonials['testimonials'] = $txt;
		if(!$getTestimonials->save())
		{
			return View::make('testimonials.index')->with('mt', "TESTIMONIALS")->with('alert', 'fail')->with('msg', 'You have failed to created testimonials');
		}
		return View::make('testimonials.index')->with('mt', "TESTIMONIALS")->with('alert', 'success')->with('msg', 'Successfully created testimonials');
		
	}
	public function deleteTestimonials()
	{
		$id = Input::get('id');
		$getTestimonials = Testimonials::find($id);
		if(!$getTestimonials->delete())
		{
			return 1;
		}
		return 0;
	}

}