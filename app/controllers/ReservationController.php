<?php
class ReservationController extends BaseController {
	public function index()
	{
		return View::make('reservation.index')->with('mt', "RESERV");
	}
	public function compute()
	{
		$ctype = Input::get('ctype');
		$kid = Input::get('kid');
		$adult = Input::get('adult');
		$check = Input::get('check');
		$getcountcheck = (count(explode(",", $check))-1);
		if($ctype == 1)
		{
			return $response[] = array(			
				"cottageprice" => $cottageprice = $getcountcheck * 600,
				"kidprice" =>$kidprice = $kid * 120,
				"adultprice" =>$adultprice = $adult * 150,
				"total"=> $total = $cottageprice + $kidprice +$adultprice,
				)
		}
		return 0;

	}
	public function getCottagelist()
	{
		$response = array();
		$cottageType = Input::get('cottageType');
		$getCottage_lists = CottageList::where('cottage_id','=',$cottageType)->get();
		if(!empty($getCottage_lists))
		{
			foreach ($getCottage_lists as $list) 
			{
				$response[] = array(
					"cottage_list"=>$list['cottagelist_id'],
					"name"	=>$list['cottagename'],
					);
			}
		}
		return $response;

	}
	public function getCottageType()
	{
		$response = array();
		$rtype_id = Input::get('rtype_id');
		$getCottageTypes = CottageType::where('R_Type','=',$rtype_id)->get();
		if(!empty($getCottageTypes))
		{
			foreach ($getCottageTypes as $list) 
			{
				$response[] = array(
					"Cottage_ID"=>$list['Cottage_ID'],
					"description"	=>$list['description'],
					);
			}
		}
		
		return $response;
	}
}