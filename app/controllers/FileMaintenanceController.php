<?php
class FileMaintenanceController extends BaseController {

	public function getFM()
	{
		if(Auth::Check())
		{
			if(Auth::User()->isAdmin())
			{
				return View::make('filemaintenance.filemaintenance');
			}
			else
			{
				return Redirect::Route('home');
			}
		}
		else
		{
			return Redirect::Route('home');
		}
		
	}

	public function getReserve($reserve_id)
	{
		return View::make('filemaintenance.Reserve_Information')->with('reserve_id',$reserve_id);
	}

	public function updateInfo()
	{
		$id = Input::get('id');
		$fname = Input::get('fname');
		$lname = Input::get('lname');
		$mname = Input::get('mname');
		$address = Input::get('address');
		$contact = Input::get('contact');
		$email = Input::get('email');
		$isAdmin = Input::get('isAdmin');
		$getInformation = UserInfo::where('user_id','=',$id)->first();
		$getInformation['firstname'] = $fname;
		$getInformation['lastname'] = $lname;
		$getInformation['middleInitial'] = $mname;
		$getInformation['address'] = $address;
		$getInformation['contactNo'] = $contact;
		$getInformation['email'] = $email;
		if($getInformation->save())
		{
			$updateUser = User::find($getInformation['user_id']);
			$updateUser['isAdmin'] = $isAdmin;
			if($updateUser->save())
			{
				return $response = array(
					"reserve_id"=> $id,
					"fname"		=> $fname,
					"lname"		=> $lname,
					"mname"		=> $mname,
					"address"	=> $address,
					"contact"	=> $contact,
					"email"		=> $email,
				);
			}
		}
	}

	public function deleteInfo()
	{
		$id = Input::get('id');
		$deleteReserveInfo = UserInfo::where('user_id','=',$id)->first();
		if($deleteReserveInfo->delete())
		{
			$allReserves = UserInfo::all();
			foreach ($allReserves as $allReserve) 
			{
				$response[] = array(
				"reserve_id"=> $allReserve['id'],
				"fname"		=> $allReserve['firstname'],
				"lname"		=> $allReserve['lastname'],
				"mname"		=> $allReserve['middleInitial'],
				"address"	=> $allReserve['address'],
				"contact"	=> $allReserve['contactNo'],
				"email"		=> $allReserve['email'],
				);
			}
		}
		return $response;

	}
	public function getEditInfo()
	{
		$id = Input::get('id');
		$allReserve = UserInfo::where('user_id','=',$id)->first();
		$userInfo = User::find($id);
		return $response[] = array(
				"reserve_id"=> $allReserve['id'],
				"fname"		=> $allReserve['firstname'],
				"lname"		=> $allReserve['lastname'],
				"mname"		=> $allReserve['middleInitial'],
				"address"	=> $allReserve['address'],
				"contact"	=> $allReserve['contactNo'],
				"email"		=> $allReserve['email'],
				"isAdmin"	=> $userInfo['isAdmin'],
				);
	}
	public function saveInfo()
	{
		$fname = Input::get('fname');
		$lname = Input::get('lname');
		$mname = Input::get('mname');
		$address = Input::get('address');
		$contact = Input::get('contact');
		$email = Input::get('email');

		$getInformation = new UserInfo();
		$getInformation['firstname'] = $fname;
		$getInformation['lastname'] = $lname;
		$getInformation['middleInitial'] = $mname;
		$getInformation['address'] = $address;
		$getInformation['contactNo'] = $contact;
		$getInformation['email'] = $email;
		if($getInformation->save())
		{
			$allReserves = UserInfo::all();
			foreach ($allReserves as $allReserve) 
			{
				$response[] = array(
					"reserve_id"=> $allReserve['id'],
					"fname"		=> $allReserve['firstname'],
					"lname"		=> $allReserve['lastname'],
					"mname"		=> $allReserve['middleInitial'],
					"address"	=> $allReserve['address'],
					"contact"	=> $allReserve['contactNo'],
					"email"		=> $allReserve['email'],
				);
			}
			
		}
		return $response;

	}
	public function getFMReservation()
	{
		if(Auth::User()->isAdmin())
		{
			return View::make('filemaintenance.reservation_list');
		}
		else
		{
			return Redirect::Route('home');
		}
	}

	public function updateReservationDate()
	{
		$id = Input::get('id');
		$type = Input::get('type');
		$date = date('Y-m-d',strtotime(Input::get('date')));
		$transaction = CottageReservation::where('reservation_date','=',$date)
						->where('reservation_type','=',$type)->first();
		if(!empty($transaction))
		{
			return 1;
		}
		else
		{
			$transaction = CottageReservation::find($id);
			$transaction['reservation_date'] = $date;
			if(!$transaction->save())
			{
				return 2;
			}
			return 0;
		}
		return $transaction;
	}
	public function updateTransactionStatus()
	{
		$id = Input::get('id');
		$status = Input::get('status');
		$getTransaction = CottageReservation::find($id);
		$getTransaction['status'] = $status;
		if(!$getTransaction->save())
		{
			
			return 1;
		}
		else
		{
			if($status == "Reserved")
			{
				$userInfo = UserInfo::where('user_id','=',$getTransaction['user_id'])->first();
				$emailcontent = array (
					'fname' => $userInfo['firstname'],
					'lname' => $userInfo['lastname'],
				    'link' => URL::route('getReservation_step2', Input::get('id'))
			    );
				Mail::send('emails.confirmation.reserve', $emailcontent, function($message)
				{ 
					$id = Input::get('id');
					$getTransaction = CottageReservation::find($id);
					$userInfo = UserInfo::where('user_id','=',$getTransaction['user_id'])->first();
				    $message->to($userInfo['email'],'Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Confirmation Email');
	 			});
			}
			if($status == "Void")
			{
					$userInfo = UserInfo::where('user_id','=',$getTransaction['user_id'])->first();
				$emailcontent = array (
					'fname' => $userInfo['firstname'],
					'lname' => $userInfo['lastname'],
				    'link' => URL::route('getReservation_step2', Input::get('id'))
			    );
				Mail::send('emails.confirmation.void', $emailcontent, function($message)
				{ 
					$id = Input::get('id');
					$getTransaction = CottageReservation::find($id);
					$userInfo = UserInfo::where('user_id','=',$getTransaction['user_id'])->first();
				    $message->to($userInfo['email'],'Kalugdan Garden Resort')->subject('Kalugdan Garden Resort Confirmation Email');
	 			});
			}
			return 0;
		}
		
	}

	public function filterTransaction()
	{
		$rType = Input::get('rType');
		$sType = Input::get('sType');
		$response = array();
		if(empty($sType) && !empty($rType))
		{
			$transactions = CottageReservation::where('reservation_type','=',$rType)->get();
		}
		elseif(!empty($sType) && !empty($rType))
		{
			$transactions = CottageReservation::where('reservation_type','=',$rType)->where('status','=',$sType)->get();
		}
		else
		{
			$transactions = CottageReservation::where('status','=',$sType)->get();
		}
		
		foreach ($transactions as $transaction) {
			$userInfo = UserInfo::where('user_id','=',$transaction['user_id'])->first();
            $reservation_type= ReservationType::find($transaction['reservation_type'])->first();
            $response[] = array(
	            	"id"		=> $transaction['id'],
	            	"fname"		=> $userInfo['firstname'],
	            	"lname"		=> $userInfo['lastname'],
	            	"rtpe" 		=> $reservation_type['name'],
	            	"rdate"		=> $transaction['reservation_date'],
	            	"status" 	=> $transaction['status'],
            	);
		}
		return $response;
	}

	public function getBanners()
	{
		if(Auth::User()->isAdmin())
		{
			return View::make('filemaintenance.banners');
		}
		else
		{
			return Redirect::Route('home');
		}
	}

	public function getFMNews()
	{
		if(Auth::User()->isAdmin())
		{
			return View::make('news.fm_news');
		}
		else
		{
			return Redirect::Route('home');
		}
		
	}

	public function updateNewsInfo()
	{
		$id = Input::get('id');
		$title = Input::get('title');
		$content = Input::get('content');
		$getInformation = News::find($id);
		$getInformation['title'] = $title;
		$getInformation['content'] = $content;
		if($getInformation->save())
		{
			return $response = array(
					"ban_id"=> $id,
					"ban_title"=> $title,
					"ban_content"=> $content,
				);
		}
	}

	public function deleteNewsInfo()
	{
		$id = Input::get('id');
		$deleteReserveInfo = News::find($id);
		if($deleteReserveInfo->delete())
		{
			$allNews = News::all();
			foreach ($allNews as $allNew) 
			{
				$response[] = array(
					"ban_id"=> $allNew['id'],
					"ban_title"=> $allNew['title'],
					"ban_content"=> $allNew['content'],
				);
			}
		}
		return $response;
	}

	public function getEditNewsInfo()
	{
		$id = Input::get('id');
		$allNews = News::find($id);
		return $response[] = array(
				"ban_id"=> $allNews['id'],
				"ban_title"=> $allNews['title'],
				"ban_content"=> $allNews['content'],
		);
	}

	public function saveNewsInfo()
	{
		$title = Input::get('title');
		$content = Input::get('content');

		if(!empty($title))
		{
			$getInformation = new News();
			$getInformation['title'] = $title;
			$getInformation['content'] = $content;
			if($getInformation->save())
			{
				return $response = array(
					"ban_id"=> $getInformation['id'],
					"ban_title"=> $title,
					"ban_content"=> $content,
				);
			}
		}
		else
		{
			return 2;
		}
	}

	public function updateBannerInfo()
	{
		$id = Input::get('id');
		$title = Input::get('title');
		$content = Input::get('content');
		$getInformation = Banners::find($id);
		$getInformation['title'] = $title;
		$getInformation['content'] = $content;
		if($getInformation->save())
		{
			return $response = array(
					"ban_id"=> $id,
					"ban_title"=> $title,
					"ban_content"=> $content,
				);
		}
	}

	public function deleteBannerInfo()
	{
		$id = Input::get('id');
		$deleteReserveInfo = Banners::find($id);
		if($deleteReserveInfo->delete())
		{
			$allBanners = Banners::all();
			foreach ($allBanners as $allBanner) 
			{
				$response[] = array(
					"ban_id"=> $allBanner['id'],
					"ban_title"=> $allBanner['title'],
					"ban_content"=> $allBanner['content'],
				);
			}
		}
		return $response;

	}

	public function getEditBannerInfo()
	{
		$id = Input::get('id');
		$allBanners = Banners::find($id);
		return $response[] = array(
				"ban_id"=> $allBanners['id'],
				"ban_title"=> $allBanners['title'],
				"ban_content"=> $allBanners['content'],
		);
	}

	public function saveBannerInfo()
	{
		$id = Input::get('id');
		$title = Input::get('title');
		$content = Input::get('content');
		$images = Input::file('images');

		if(empty($id))
		{
			if (empty($images))
			{
				return Redirect::Route('getBanners')->with('fail','Please choose a picture to upload.');
			}
			else
			{
				$iname = str_random(112).'.'.$images->getClientOriginalExtension();
				$move = Image::make($images->getRealPath())->resize('750','750')->save('images/'.$iname);
				if($move)
				{	
					$getInformation = new Banners();
					$getInformation['title'] = $title;
					$getInformation['content'] = $content;
					$getInformation['img'] = $iname;
					if($getInformation->save())
					{
						return Redirect::Route('getBanners')->with('success','Information successfully added.');
					}
				}
				else
				{
					return Redirect::Route('getBanners')->with('fail','Error Uploading! Please try again.');
				}
			}
		}
		else
		{
			if (empty($images))
			{
				$getInformation = Banners::find($id);
				$getInformation['title'] = $title;
				$getInformation['content'] = $content;
				if($getInformation->save())
				{
					return Redirect::Route('getBanners')->with('success','Information successfully added.');
				}
			}
			else
			{
				$iname = str_random(112).'.'.$images->getClientOriginalExtension();
				$move = Image::make($images->getRealPath())->resize('750','750')->save('images/'.$iname);
				if($move)
				{	
					$getInformation = Banners::find($id);
					$getInformation['title'] = $title;
					$getInformation['content'] = $content;
					$getInformation['img'] = $iname;
					if($getInformation->save())
					{
						return Redirect::Route('getBanners')->with('success','Information successfully added.');
					}
				}
				else
				{
					return Redirect::Route('getBanners')->with('fail','Error Uploading! Please try again.');
				}
			}
		}
	}


	public function getFMGallery()
	{
		if(Auth::User()->isAdmin())
		{
			return View::make('gallery.fm_gallery');
		}
		else
		{
			return Redirect::Route('home');
		}
		
	}

	public function galleryImgs()
	{
		return Gallery::all();
	}

	public function addPhotoGallery()
	{
		$images = Input::file('images');
		
		if (empty($images))
		{
			return Redirect::Route('getFMGallery')->with('fail','Please choose a picture to upload.');
		}
		else
		{
			$iname = str_random(112).'.'.$images->getClientOriginalExtension();
			$move = Image::make($images->getRealPath())->resize('750','750')->save('images/'.$iname);
			if($move)
			{	
				
				$getInformation = new Gallery();
				$getInformation['img_file'] = $iname;
				if($getInformation->save())
				{
					return Redirect::Route('getFMGallery')->with('success','Image successfully added.');
				}
			}
			else
			{
				return Redirect::Route('getFMGallery')->with('fail','Error Uploading! Please try again.');
			}
		}
	}

	public function deletePhotoGallery()
	{
		$id =Input::get('imgId');
		$galleryPhoto = Gallery::find($id);

		if($galleryPhoto->delete())
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
	}

	public function getFMWalkin()
	{
		if(Auth::User()->isAdmin())
		{
			return View::make('reservation.fm_walkin');
		}
		else
		{
			return Redirect::Route('home');
		}
		
	}
}