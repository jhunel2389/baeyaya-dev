<?php
class TestimonialsController extends BaseController {

	public function index()
	{
		return View::make('testimonials.index')->with('mt', "TESTIMONIALS");
	}

}