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

	public function computeRoom()
	{
		$roomPackage = Input::get('roomPackage');
		$addPerson = Input::get('addPerson');
		$addBed = Input::get('addBed');
		$addLinen = Input::get('addLinen');
		$addTowel = Input::get('addTowel');
		$addPillow = Input::get('addPillow');
		$totalAdd = 0;
		if(!empty($addPerson))
		{
			$totalAdd = $totalAdd + ($addPerson * (int)AdditionalPrice::where('additional','=','AdditionalPerson')->first()['price']);
		}
		if(!empty($addBed))
		{
			$totalAdd = $totalAdd + ($addBed * (int)AdditionalPrice::where('additional','=','ExtraBed')->first()['price']);
		}
		if(!empty($addLinen))
		{
			$totalAdd = $totalAdd + ($addLinen * (int)AdditionalPrice::where('additional','=','ExtraLinen')->first()['price']);
		}
		if(!empty($addTowel))
		{
			$totalAdd = $totalAdd + ($addTowel * (int)AdditionalPrice::where('additional','=','ExtraTowel')->first()['price']);
		}
		if(!empty($addPillow))
		{
			$totalAdd = $totalAdd + ($addPillow * (int)AdditionalPrice::where('additional','=','ExtraPillow')->first()['price']);
		}
		return $response = array(			
				"roomPrice" => RoomPackage::where('packid','=',$roomPackage)->first()['Price'],
				"addCharges" => $totalAdd,
				"total"=> $total = RoomPackage::where('packid','=',$roomPackage)->first()['Price'] + $totalAdd,
				);
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
		$season= Input::get('seasoncode');// 1: regular 2:week and holidays 3: summer (mar,apr,may)
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
		$month = date('m',strtotime(Input::get('date')));
		
		
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
			$weekDay = date('w', strtotime($date));
			$holidayCheck = Holidays::where('holidays','=',$date)->first();
			if($month == 3 || $month == 4 || $month == 5)
			{
				$details = "Summer Season";
				$season = 3;
			}
			elseif(!empty($holidayCheck))
			{
				$details = $holidayCheck['holidays'];
				$season = 2;
			}
			elseif($weekDay == 0 || $weekDay == 6)
			{
				$details = "Weekend";
				$season = 2;
			}
			else
			{
				$details = "Regular Season";
				$season = 1;
			}
			$response[] = array(
			"cottage_list"=>'',
			"name"	=>'',
			"details"=>$details,
			"season"	=>$season,
			);
			$cottagelists = CottageList::where('cottage_id','=',$cottageType)->get();
			foreach ($cottagelists as $list) {

				if(!in_array($list['cottagelist_id'], $id))
				{
					$response[] = array(
					"cottage_list"=>$list['cottagelist_id'],
					"name"	=>$list['cottagename'],
					"details"=>$details,
					"season"	=>$season,
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
		if(empty($email))
		{

			$email = Input::get('emailRes');
			$userInfo	= UserInfo::where('email','=',str_replace(' ','',$email))->first();
		}
		else
		{
			$userInfo	= UserInfo::where('user_id','=',Auth::User()['id'])->first();
		}
		$season= Input::get('seasoncode');// 1: regular 2:week and holidays 3: summer (mar,apr,may)

		$addPerson = Input::get('addPerson');
		$addBed = Input::get('addBed');
		$addLinen = Input::get('addLinen');
		$addTowel = Input::get('addTowel');
		$addPillow = Input::get('addPillow');
		$totalAdd = 0;
		if(!empty($addPerson))
		{
			$totalAdd = $totalAdd + ($addPerson * (int)AdditionalPrice::where('additional','=','AdditionalPerson')->first()['price']);
		}
		if(!empty($addBed))
		{
			$totalAdd = $totalAdd + ($addBed * (int)AdditionalPrice::where('additional','=','ExtraBed')->first()['price']);
		}
		if(!empty($addLinen))
		{
			$totalAdd = $totalAdd + ($addLinen * (int)AdditionalPrice::where('additional','=','ExtraLinen')->first()['price']);
		}
		if(!empty($addTowel))
		{
			$totalAdd = $totalAdd + ($addTowel * (int)AdditionalPrice::where('additional','=','ExtraTowel')->first()['price']);
		}
		if(!empty($addPillow))
		{
			$totalAdd = $totalAdd + ($addPillow * (int)AdditionalPrice::where('additional','=','ExtraPillow')->first()['price']);
		}
		
		
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

		if(!empty($package))
		{
			$total = (int)RoomPackage::where('packid','=',$package)->first()['Price'] + $totalAdd;
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
		$getReservation['status'] 			= "Pending";
		$getReservation['total_amount']		=$total;
		if(!$getReservation->save())
		{
			return Redirect::route('home');
		}
		else
		{
			if($rType == 1)
			{
				if(!empty($priceAdult))
				{
					$this->postCharges($getReservation['id'], $rType , "Swimming_Entrance" , $priceAdult['idp'] , $adult);
				}
				if(!empty($priceKid))
				{
					$this->postCharges($getReservation['id'], $rType , "Swimming_Entrance" , $priceKid['idp'] , $kid);
				}
				if(!empty($checkCottage))
				{
					$this->postCharges($getReservation['id'], $rType , "Cottages" , $checkCottage , count($chosenCottages)-1);
				}
			}
			else
			{
				if(!empty($addPerson))
				{
					//$totalAdd = $totalAdd + ($addPerson * (int)AdditionalPrice::where('additional','=','AdditionalPerson')->first()['price']);
					$this->postCharges($getReservation['id'], $rType , "Additional_room" , AdditionalPrice::where('additional','=','AdditionalPerson')->first()['aid'] , $addPerson);
				}
				if(!empty($addBed))
				{
					//$totalAdd = $totalAdd + ($addBed * (int)AdditionalPrice::where('additional','=','ExtraBed')->first()['price']);
					$this->postCharges($getReservation['id'], $rType , "Additional_room" , AdditionalPrice::where('additional','=','ExtraBed')->first()['aid'] , $addBed);
				}
				if(!empty($addLinen))
				{
					//$totalAdd = $totalAdd + ($addLinen * (int)AdditionalPrice::where('additional','=','ExtraLinen')->first()['price']);
					$this->postCharges($getReservation['id'], $rType , "Additional_room" , AdditionalPrice::where('additional','=','ExtraLinen')->first()['aid'] , $addLinen);
				}
				if(!empty($addTowel))
				{
					//$totalAdd = $totalAdd + ($addTowel * (int)AdditionalPrice::where('additional','=','ExtraTowel')->first()['price']);
					$this->postCharges($getReservation['id'], $rType , "Additional_room" , AdditionalPrice::where('additional','=','ExtraTowel')->first()['aid'] , $addTowel);
				}
				if(!empty($addPillow))
				{
					//$totalAdd = $totalAdd + ($addPillow * (int)AdditionalPrice::where('additional','=','ExtraPillow')->first()['price']);
					$this->postCharges($getReservation['id'], $rType , "Additional_room" , AdditionalPrice::where('additional','=','ExtraPillow')->first()['aid'] , $addPillow);
				}

				if(!empty($package))
				{
					//$totalAdd = $totalAdd + ($addPillow * (int)AdditionalPrice::where('additional','=','ExtraPillow')->first()['price']);
					$this->postCharges($getReservation['id'], $rType , "Package_room" , (int)RoomPackage::where('packid','=',$package)->first()['packid'] , 1);
				}
			}
			
			return Redirect::route('getReservation_step2',$getReservation['id'])->with('id',$getReservation['id'])->with('mt', "HOME")->with('id',$getReservation['id'])->with('alert', 'success')->with('msg', 'You have successfully reserve.');
			//return View::make('reservation.reservation_step2')->with('mt', "HOME")->with('id',$getReservation['id'])->with('alert', 'success')->with('msg', 'You have successfully reserve.');
		}
	}


	public function getReservation_step2($reserve_id)
	{
		return View::make('reservation.reservation_step2')->with('mt', "RESERV")->with('reserve_id', $reserve_id);
	}

	public function postCharges($trans_id, $reservation_type , $prod_type , $prodId , $qty)
	{
		/*$trans_id = Input::get('transId');
		$reservation_type = Input::get('resId');
		$prod_type = Input::get('prodType');
		$prodId = Input::get('prodId');
		$qty = Input::get('qty');*/

		$addCharges = new Charges();
		$addCharges['transaction_id'] = $trans_id;
		$addCharges['reservation_type'] = $reservation_type;
		$addCharges['product_type'] = $prod_type;
		$addCharges['product_id'] = $prodId;
		$addCharges['qty'] = $qty;
		$addCharges->save();
	}
}