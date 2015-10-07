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
		$getInformation = UserInfo::where('user_id','=',$id)->first();
		$getInformation['firstname'] = $fname;
		$getInformation['lastname'] = $lname;
		$getInformation['middleInitial'] = $mname;
		$getInformation['address'] = $address;
		$getInformation['contactNo'] = $contact;
		$getInformation['email'] = $email;
		if($getInformation->save())
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
		return $response[] = array(
				"reserve_id"=> $allReserve['id'],
				"fname"		=> $allReserve['firstname'],
				"lname"		=> $allReserve['lastname'],
				"mname"		=> $allReserve['middleInitial'],
				"address"	=> $allReserve['address'],
				"contact"	=> $allReserve['contactNo'],
				"email"		=> $allReserve['email'],
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
}