<?php
class GalleryController extends BaseController {

	public function index()
	{
		return View::make('gallery.index')->with('mt', "GALLERY");
	}

}