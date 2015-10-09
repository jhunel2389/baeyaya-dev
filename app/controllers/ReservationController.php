<?php
class ReservationController extends BaseController {
	public function index()
	{
		return View::make('reservation.index')->with('mt', "RESERV");
	}
	public function getRoom()
	{
		$date = date('Y-m-d',strtotime(Input::get('date')));
		$rtype_id = Input::get('rtype_id');
		$reserves = CottageReservation::where('reservation_date','=',$date)
							->where('reservation_type','=',$rtype_id)->get();
		if(!empty($reserves))
		{
			$id = array();
			foreach ($reserves as $reserve) 
			{
				if(!in_array($reserve['room_id'], $id))
				{
					$id[count($id)] = $reserve['room_id'];
				}
			}
			$response=array();
			$rooms = Room::all();
			foreach ($rooms as $room) 
			{

				if(!in_array($room['rnid'], $id))
				{
					$response[] = array(
					"id"=>$room['rnid'],
					"name"	=>$room['roomname'],
					);
				}
			}
			return $response;

		}
		else
		{
			$rooms = Room::all();
			foreach ($rooms as $room) 
			{
				$response[] = array(			
					"id" => $room['rnid'],
					"name" =>$room['roomname'],
				);
			}
			return $response;
		}
		
	}
	public function compute()
	{
		$day = Input::get('day');
		$ctype = Input::get('ctype');
		$kid = Input::get('kid');
		$adult = Input::get('adult');
		$check = Input::get('check');
		$getcountcheck = (count(explode(",", $check))-1);
		$cottageType = CottageType::where('Cottage_ID','=',$ctype)->first();
		$price = (int)$cottageType['price'];
		$season= 1;// 1: regular 2:week and holidays 3: summer (mar,apr,may)
		if($day == "1")
		{
			if($season == "1")
			{
				$priceAdult = PricingSwimming::where('day','=','Morning')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Morning')->where('desc_a','=','Kids')->first();
			}
			elseif($season == "2")
			{
				$priceAdult = PricingSwimming::where('day','=','Weekend And Holiday Morning')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Weekend And Holiday Morning')->where('desc_a','=','Kids')->first();
			}else
			{
				$priceAdult = PricingSwimming::where('day','=','Summer Morning')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Summer Morning')->where('desc_a','=','Kids')->first();
			}
		}
		else
		{
			if($season == "1")
			{
				$priceAdult = PricingSwimming::where('day','=','Overnight')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Overnight')->where('desc_a','=','Kids')->first();
			}
			elseif($season == "2")
			{
				$priceAdult = PricingSwimming::where('day','=','Weekend And Holiday Overnight')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Weekend And Holiday Overnight')->where('desc_a','=','Kids')->first();
			}else
			{
				$priceAdult = PricingSwimming::where('day','=','Summer Overnight')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Summer Overnight')->where('desc_a','=','Kids')->first();
			}
		}
		return $response = array(			
				"cottageprice" => $cottageprice = $getcountcheck * $price,
				"kidprice" =>$kidprice = $kid * (int)$priceAdult['price'],
				"adultprice" =>$adultprice = $adult * (int)$priceKid['price'],
				"total"=> $total = $cottageprice + $kidprice +$adultprice,
				);
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
				$chosenCottages = explode(",", $reserve['cottagelist_id']);
				foreach ($chosenCottages as $cottage) {
					if(!$cottage == "")
					{
						if(!in_array($cottage, $id))
						{
							$id[count($id)] = $cottage;
						}
					}
				}
			}
			$cottagelists = CottageList::where('cottage_id','=',$cottageType)->get();
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
		$package		= Input::get('roomPackage');
		$room 			= Input::get('room');
		$userInfo		= UserInfo::where('user_id','=',Auth::User()['id'])->first();
		$season= 1;// 1: regular 2:week and holidays 3: summer (mar,apr,may)

		//for addtional
		$addPerson 			= Input::get('addPerson');
		$addBed 			= Input::get('addBed');
		$addLinen 			= Input::get('addLinen');
		$addTowel 			= Input::get('addTowel');
		$addPillow 			= Input::get('addPillow');
		

		$getcountcheck = (count(explode(",", $checkCottage))-1);
		$cottageType = CottageType::where('Cottage_ID','=',$cType)->first();
			$price = (int)$cottageType['price'];
		if($chosenDay == "1")
		{
			if($season == "1")
			{
				$priceAdult = PricingSwimming::where('day','=','Morning')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Morning')->where('desc_a','=','Kids')->first();
			}
			elseif($season == "2")
			{
				$priceAdult = PricingSwimming::where('day','=','Weekend And Holiday Morning')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Weekend And Holiday Morning')->where('desc_a','=','Kids')->first();
			}else
			{
				$priceAdult = PricingSwimming::where('day','=','Summer Morning')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Summer Morning')->where('desc_a','=','Kids')->first();
			}
		}
		else
		{
			if($season == "1")
			{
				$priceAdult = PricingSwimming::where('day','=','Overnight')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Overnight')->where('desc_a','=','Kids')->first();
			}
			elseif($season == "2")
			{
				$priceAdult = PricingSwimming::where('day','=','Weekend And Holiday Overnight')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Weekend And Holiday Overnight')->where('desc_a','=','Kids')->first();
			}else
			{
				$priceAdult = PricingSwimming::where('day','=','Summer Overnight')->where('desc_a','=','Adult')->first();
				$priceKid = PricingSwimming::where('day','=','Summer Overnight')->where('desc_a','=','Kids')->first();
			}
		}
		
		if(!empty($priceAdult) && !empty($priceKid))
		{
			$cottageprice = $getcountcheck * $price;
			$kidprice = $kid * (int)$priceAdult['price'];
			$adultprice = $adult * (int)$priceKid['price'];
			$total = $cottageprice + $kidprice +$adultprice;
		}
		$getReservation = new CottageReservation();
		$getReservation['user_id'] 			= $userInfo['user_id'];
		$getReservation['reservation_type'] 	= $rType;
		$getReservation['cottage_type'] 	= $cType;
		$getReservation['cottagelist_id'] 	= $checkCottage;
		$getReservation['day_type'] 		= $chosenDay;
		$getReservation['reservation_date'] = $date;
		$getReservation['room_id'] 			= $room;
		$getReservation['package_id'] 		= $package;
		$getReservation['check_in_datetime'] ="";
		$getReservation['check_out_datetime'] ="";
		$getReservation['num_adult'] 		= $adult;
		$getReservation['num_kid'] 			= $kid;
		$getReservation['status'] 			= "1";
		$getReservation['total_amount']		=$total;
		if(!$getReservation->save())
		{
			return Redirect::route('home');
		}
		return Redirect::route('getReservation_step2',$getReservation['id'])->with('id',$getReservation['id'])->with('mt', "HOME")->with('id',$getReservation['id'])->with('alert', 'success')->with('msg', 'You have successfully reserve.');
		//return View::make('reservation.reservation_step2')->with('mt', "HOME")->with('id',$getReservation['id'])->with('alert', 'success')->with('msg', 'You have successfully reserve.');
	}
	public function getReservation_step2($reserve_id)
	{
		return View::make('reservation.reservation_step2')->with('mt', "RESERV")->with('reserve_id', $reserve_id);
	}

	public function postCharges()
	{
		$trans_id = Input::get('transId');
		$reservation_type = Input::get('resId');
		$prod_type = Input::get('prodType');
		$prodId = Input::get('prodId');
		$qty = Input::get('qty');

		$addCharges = new Charges();
		$addCharges['transaction_id'] = $trans_id;
		$addCharges['reservation_type	'] = $reservation_type;
		$addCharges['product_type'] = $prod_type;
		$addCharges['product_id'] = $prodId;
		$addCharges['qty'] = $qty;
		if($addCharges->save())
		{
			return 1;
		}
		else
		{
			return 2;
		}
	}
}