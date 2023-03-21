<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

	public function signInAdmin(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_\-]*$/',
			'password' => 'required|min:8|max:64|regex:/^[a-zA-Z0-9_\-]*$/',
		]);

		$adm = R::findOne("admins", "login = ? AND password = ?", [$req -> login, hash('sha256', $req -> password)]);

		if(isset($adm)) {
			$_SESSION['admin'] = $adm;

			return redirect() -> route('admin') -> with('success', 'Sign In was successed');
		} else {
			return back() -> withErrors(['login' => 'Login was Failed']);
		}
	}

	public function addAdmin(Request $req) {
		$req -> validate([
			'login' => 'required|min:4|max:20|regex:/^[a-zA-Z0-9_\-]*$/',
			'password' => 'required|min:8|max:64|regex:/^[a-zA-Z0-9_\-]*$/',
		]);

		if(R::count("admins", "login = ?", [$req -> login]) == 0) {
			$adm = R::dispense('admins');

			$adm -> login = $req -> login;
			$adm -> password = hash('sha256', $req -> password);
			$adm -> level = 1;

			if(R::store($adm)) {
				return redirect() -> route('admin_creator') -> with('success', 'Administrator was created');
			} else {
				return back() -> withErrors(['login' => 'Administrator was NOT created']);
			}
		} else {
			return back() -> withErrors(['login' => 'Еhere is already such an Administrator']);
		}
	}

	public function addCar(Request $req) {

		$max_img_size = 4 * 1024 * 1024;

		if(empty($req -> img_car_alpha)) {
			return back() -> withErrors(['img_car_alpha' => 'Wallpaper image not found.']);
		}

		$file = $req -> img_car_alpha;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['img_car_alpha' => 'Incorrect Wallpaper image extension.']);
		}

		if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['img_car_alpha' => 'The Wallpaper image is too heavy.']);
		}

		$img_car_alpha_path = date("YmdHis").rand(0, 99999999);

		Image::make($file->path())->save(public_path('upl_data/imgs/alpha/').$img_car_alpha_path, 100, 'png');


		if(empty($req -> img_bg)) {
			return back() -> withErrors(['img_bg' => 'Preview image not found.']);
		}

		$file = $req -> img_bg;
		$type = $file -> getMimeType();
		$error = $file -> getError();
		$size = $file -> getSize();

		if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
			return back() -> withErrors(['img_bg' => 'Incorrect Preview image extension.']);
		}

		if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
			return back() -> withErrors(['img_bg' => 'The Preview image is too heavy.']);
		}

		$img_bg_path = date("YmdHis").rand(0, 99999999);

		Image::make($file->path())->save(public_path('upl_data/imgs/background/').$img_bg_path, 100);


		$imgs_json = [];

		$i = 1;
		while($i <= 9) {
			$fil_path = '';
			eval('$file = $req -> img'.$i.';');
			if(!$file) {
				$imgs_json['img'.$i] = '';
				$i++;
				continue;
			}
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			eval('$fil_ttl = $req -> img'.$i.'_title;');

			$imgs_json['img'.$i] = $fil_path;

			$i++;
		}

		$car = R::dispense("cars");

		$car -> model = $req -> model;
		$car -> img_car_alpha = $img_car_alpha_path;
		$car -> img_bg = $img_bg_path;
		$car -> stamp_id = $req -> stamp_id;
		$car -> price = $req -> price;
		$car -> color = $req -> color;
		$car -> color_uz = $req -> color_uz;
		$car -> battery_power = $req -> battery_power;
		$car -> year_release = $req -> year_release;
		$car -> max_speed = $req -> max_speed;
		$car -> engine_power = $req -> engine_power;
		$car -> acceleration = $req -> acceleration;
		$car -> range_travel = $req -> range_travel;
		$car -> places = $req -> places;
		$car -> regular_charging = $req -> regular_charging;
		$car -> speed_charging = $req -> speed_charging;
		$car -> size = $req -> size;
		$car -> size_b = $req -> size_b;
		$car -> description = $req -> description;
		$car -> description_uz = $req -> description_uz;
		$car -> imgs = (string)json_encode($imgs_json);
		$car -> views = 0;
		// $car ->  = $req -> ;

		R::store($car);

		return redirect('admin') -> with('success', 'Car was created.');

	}

	public function updCar(Request $req) {

		$max_img_size = 4 * 1024 * 1024;

		if(isset($req -> img_car_alpha)) {

			$file = $req -> img_car_alpha;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_car_alpha' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_car_alpha' => 'The Wallpaper image is too heavy.']);
			}

			$img_car_alpha_path = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/alpha/').$img_car_alpha_path, 100, 'png');

		}


		if(isset($req -> img_bg)) {

			$file = $req -> img_bg;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_bg' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_bg' => 'The Preview image is too heavy.']);
			}

			$img_bg_path = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/background/').$img_bg_path, 100, 'png');
		}




		$car = R::findOne("cars", "id = ?", [$req -> id]);


		$imgs_json = [];

		$i = 1;
		while($i <= 9) {
			$fil_path = '';
			$gallery = json_decode($car -> imgs, true);
			eval('$file = $req -> img'.$i.';');
			if(!$file) {
				$imgs_json['img'.$i] = (isset($gallery['img'.$i])) ? $gallery['img'.$i] : "";
				$i++;
				continue;
			}
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['imgs' => 'Incorrect image '.$i.' extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['imgs' => 'The image '.$i.' is too heavy.']);
			}

			$fil_path = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/').$fil_path, 100, 'jpg');

			$imgs_json['img'.$i] = $fil_path;

			$i++;
		}


		$car -> model = $req -> model;
		if(isset($img_car_alpha_path)) $car -> img_car_alpha = $img_car_alpha_path;
		if(isset($img_bg_path)) $car -> img_bg = $img_bg_path;
		if(isset($req -> stamp_id)) $car -> stamp_id = $req -> stamp_id;
		$car -> price = $req -> price;
		$car -> color = $req -> color;
		$car -> color_uz = $req -> color_uz;
		$car -> battery_power = $req -> battery_power;
		$car -> year_release = $req -> year_release;
		$car -> max_speed = $req -> max_speed;
		$car -> engine_power = $req -> engine_power;
		$car -> acceleration = $req -> acceleration;
		$car -> range_travel = $req -> range_travel;
		$car -> places = $req -> places;
		$car -> regular_charging = $req -> regular_charging;
		$car -> speed_charging = $req -> speed_charging;
		$car -> size = $req -> size;
		$car -> size_b = $req -> size_b;
		$car -> description = $req -> description;
		$car -> description_uz = $req -> description_uz;
		$car -> imgs = (string)json_encode($imgs_json);
		// $car ->  = $req -> ;

		R::store($car);

		return redirect('admin') -> with('success', 'Car was created.');

	}

	public function updSlider(Request $req) {

		$max_img_size = 4 * 1024 * 1024;

		if(isset($req -> img_alpha1)) {

			$file = $req -> img_alpha1;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_alpha1' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_alpha1' => 'The Wallpaper image is too heavy.']);
			}

			$img_alpha_path1 = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/alpha/').$img_alpha_path1, 100, 'png');

		}


		if(isset($req -> img_bg1)) {

			$file = $req -> img_bg1;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_bg1' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_bg1' => 'The Preview image is too heavy.']);
			}

			$img_bg_path1 = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/background/').$img_bg_path1, 100, 'png');
		}


		if(isset($req -> img_alpha2)) {

			$file = $req -> img_alpha2;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_alpha2' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_alpha2' => 'The Wallpaper image is too heavy.']);
			}

			$img_alpha_path2 = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/alpha/').$img_alpha_path2, 100, 'png');

		}


		if(isset($req -> img_bg2)) {

			$file = $req -> img_bg2;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_bg2' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_bg2' => 'The Preview image is too heavy.']);
			}

			$img_bg_path2 = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/background/').$img_bg_path2, 100, 'png');
		}


		if(isset($req -> img_alpha3)) {

			$file = $req -> img_alpha3;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_alpha3' => 'Incorrect Wallpaper image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_alpha3' => 'The Wallpaper image is too heavy.']);
			}

			$img_alpha_path3 = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/alpha/').$img_alpha_path3, 100, 'png');

		}


		if(isset($req -> img_bg3)) {

			$file = $req -> img_bg3;
			$type = $file -> getMimeType();
			$error = $file -> getError();
			$size = $file -> getSize();

			if(($type != "image/png") and ($type != "image/jpg") and ($type != "image/jpeg")) {
				return back() -> withErrors(['img_bg3' => 'Incorrect Preview image extension.']);
			}

			if(($size > $max_img_size) || ($error == 2) || ($error == 1)) {
				return back() -> withErrors(['img_bg3' => 'The Preview image is too heavy.']);
			}

			$img_bg_path3 = date("YmdHis").rand(0, 99999999);

			Image::make($file->path())->save(public_path('upl_data/imgs/background/').$img_bg_path3, 100, 'png');
		}




		$slide = R::findAll("slides");


		if(isset($img_alpha_path1)) $slide[1] -> img_alpha = $img_alpha_path1;
		if(isset($img_bg_path1)) $slide[1] -> img_bg = $img_bg_path1;
		$slide[1] -> name = $req -> name1;
		$slide[1] -> name_uz = $req -> name1_uz;
		$slide[1] -> description = $req -> desc1;
		$slide[1] -> description_uz = $req -> desc1_uz;
		$slide[1] -> sub_desc = $req -> sub_desc1;
		$slide[1] -> sub_desc_uz = $req -> sub_desc_uz1;
		$slide[1] -> tag1 = $req -> tag1_1;
		$slide[1] -> tag2 = $req -> tag2_1;
		$slide[1] -> tag3 = $req -> tag3_1;

		if(isset($img_alpha_path2)) $slide[2] -> img_alpha = $img_alpha_path2;
		if(isset($img_bg_path2)) $slide[2] -> img_bg = $img_bg_path2;
		$slide[2] -> name = $req -> name2;
		$slide[2] -> name_uz = $req -> name2_uz;
		$slide[2] -> description = $req -> desc2;
		$slide[2] -> description_uz = $req -> desc_uz2;
		$slide[2] -> sub_desc = $req -> sub_desc2;
		$slide[2] -> sub_desc_uz = $req -> sub_desc_uz2;
		$slide[2] -> tag1 = $req -> tag1_2;
		$slide[2] -> tag2 = $req -> tag2_2;
		$slide[2] -> tag3 = $req -> tag3_2;

		if(isset($img_alpha_path3)) $slide[3] -> img_alpha = $img_alpha_path3;
		if(isset($img_bg_path3)) $slide[3] -> img_bg = $img_bg_path3;
		$slide[3] -> name = $req -> name3;
		$slide[3] -> name_uz = $req -> name3_uz;
		$slide[3] -> description = $req -> desc3;
		$slide[3] -> description_uz = $req -> desc_uz3;
		$slide[3] -> sub_desc = $req -> sub_desc3;
		$slide[3] -> sub_desc_uz = $req -> sub_desc_uz3;
		$slide[3] -> tag1 = $req -> tag1_3;
		$slide[3] -> tag2 = $req -> tag2_3;
		$slide[3] -> tag3 = $req -> tag3_3;
		// $slide ->  = $req -> ;

		R::store($slide[1]);
		R::store($slide[2]);
		R::store($slide[3]);

		return redirect('admin') -> with('success', 'Slide was updated.');

	}
	
	public function addStamp(Request $req) {
		$req -> validate([
			'name' => 'required|min:2|max:255'
		]);

		$st = R::dispense("stamps");

		$st -> name = $req -> name;

		R::store($st);

		return redirect('admin_add_stamp') -> with('success', 'Stamp was created.');
	}

	public function updData(Request $req) {
		
		$data = R::findOne("data", "id = ?", [1]);

		
		$data -> address_desc = $req -> address_desc;
		$data -> address_desc_uz = $req -> address_desc_uz;
		$data -> email = $req -> email;
		$data -> tel = $req -> tel;
		$data -> address = $req -> address;
		$data -> time_work = $req -> time_work;
		$data -> time_work_uz = $req -> time_work_uz;
		$data -> telegram = $req -> telegram;
		$data -> instagram = $req -> instagram;
		$data -> facebook = $req -> facebook;
		$data -> about_desc = $req -> about_desc;
		$data -> about_desc_uz = $req -> about_desc_uz;
		$data -> charge_desc = $req -> charge_desc;
		$data -> charge_desc_uz = $req -> charge_desc_uz;
		$data -> lizing_desc = $req -> lizing_desc;
		$data -> lizing_desc_uz = $req -> lizing_desc_uz;

		R::store($data);

		return redirect() -> route('admin') -> with('success', 'Data was updated');

	}

	public function updStamp(Request $req) {
		$req -> validate([
			'id' => 'required|min:0',
			'name' => 'required|min:2|max:255'
		]);

		$st = R::findOne("stamps", "id = ?", [$req -> id]);

		$st -> name = $req -> name;

		R::store($st);

		return redirect('admin') -> with('success', 'Stamp was updated.');
	}

	public function delCar(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin'])) {
			$car = R::findOne("cars", "id = ?", [$req -> id]);
			R::trash($car);
			echo "true";
		} else {
			echo "false";
		}
	}

	public function delStamp(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin']) && empty(R::findOne("cars", "stamp_id = ?", [$req -> id]))) {
			$st = R::findOne("stamps", "id = ?", [$req -> id]);
			R::trash($st);
			echo "true";
		} else {
			echo "false";
		}
	}

	public function delAdmin(Request $req) {
		if(isset($req -> id) && isset($_SESSION['admin']) && @$_SESSION['admin'] -> level >= 5) {
			$adm = R::findOne("admins", "id = ? AND level < ?", [$req -> id, 5]);
			R::trash($adm);
			echo "true";
		} else {
			echo false;
		}
	}

}