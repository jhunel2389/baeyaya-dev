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
		
			return $response[] = array(			
				"cottageprice" => $cottageprice = $getcountcheck * 600,
				"kidprice" =>$kidprice = $kid * 120,
				"adultprice" =>$adultprice = $adult * 150,
				"total"=> $total = $cottageprice + $kidprice +$adultprice,
				);
		
		return 0;

	}
	public function getCottagelist()
	{
		$response = array();
		$cottageType = Input::get('cottageType');
		$date = date('Y-m-d',strtotime(Input::get('date')));
		
		
		$reserves = CottageReservation::where('reservation_date','=',$date)->get();
		$id = array();
		if(!empty($reserves))
		{
			foreach ($reserves as $reserve) 
			{
				//$cottage[] = $reserve['cottagelist_id'];
				if(!in_array($reserve['cottagelist_id'], $id))
				{
					$id[count($id)] = $reserve['cottagelist_id'];
				}
			}
			$cottagelists = CottageList::all();
			foreach ($cottagelists as $list) {

				if(!in_array($list['cottagelist_id'], $id))
				{
					$response[] = array(
					"cottage_list"=>$list['cottagelist_id'],
					"name"	=>$list['cottagename'],
					);
				}
			}
			return $response;
			
		}
		else
		{
			$getCottage_lists = CottageList::where('cottage_id','=',$cottageType)->get();
			foreach ($getCottage_lists as $list) 
			{
				$response[] = array(
				"cottage_list"=>$list['cottagelist_id'],
				"name"	=>$list['cottagename'],
				);
			}
			return $response;
		}

		/*$CottageLists = CottageList::all();
		foreach ($CottageLists as $list) 
		{
			if(!in_array($list['cottagelist_id'], $reserves['cottagelist_id']))
			{

				$response[] = array(
				"cottage_list"=>$list['cottagelist_id'],
				"name"	=>$list['cottagename'],
				);
			
			}
		}*/
		

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

	public function postReservation()
	{
		$rType 			= Input::get('rType');
		$cType 			= Input::get('cType');
		$checkCottage 	= Input::get('checkCottage');
		$chosenCottages = explode(",", $checkCottage);
		$kid 			= Input::get('kid');
		$adult 			= Input::get('adult');
		$email 			= Input::get('email');
		$date 			= date('Y-m-d',strtotime(Input::get('date')));
		$time 			= Input::get('time');
		$chosenDay		= Input::get('chosenDay');
		$userInfo		= UserInfo::where('user_id','=',Auth::User()['id'])->first();
		foreach ($chosenCottages as $cottage) 
		{
			if(!$cottage=="")
			{
				$getReservation = new CottageReservation();
				$getReservation['user_id'] 			= $userInfo['user_id'];
				$getReservation['reservation_type'] 	= $rType;
				$getReservation['cottage_type'] 	= $cType;
				$getReservation['cottagelist_id'] 	= $cottage;
				$getReservation['day_type'] 		= $chosenDay;
				$getReservation['reservation_date'] = $date;
				$getReservation['room_id'] 			= "";
				$getReservation['package_id'] 		= "";
				$getReservation['check_in_datetime'] ="";
				$getReservation['check_out_datetime'] ="";
				$getReservation['num_adult'] 		= $adult;
				$getReservation['num_kid'] 			= $kid;
				$getReservation['status'] 			= "1";
				if(!$getReservation->save())
				{
					return Redirect::route('home');
				}
			}
		}
		return View::make('index')->with('mt', "HOME")->with('alert', 'success')->with('msg', 'You have successfully reserve.');
	}
	public function getReservation_step2($reserve_id)
	{
		return View::make('reservation.reservation_step2')->with('mt', "RESERV")->with('reserve_id', $reserve_id);
	}
}