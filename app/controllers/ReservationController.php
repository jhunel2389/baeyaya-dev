<?php
class ReservationController extends BaseController {
	public function index()
	{
		return View::make('reservation.index')->with('mt', "RESERV");
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
					"cottage_list"=>$list['cottage_list'],
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