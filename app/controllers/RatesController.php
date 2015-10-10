<?php
class RatesController extends BaseController {

	public function getRates()
	{
		return View::make('rates.index')->with('mt', "RATES");
	}

}
/*Controller-storage of all function */