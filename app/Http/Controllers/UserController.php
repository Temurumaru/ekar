<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RedBeanPHP\R as R;

class UserController extends Controller
{
	public function getStampCars(Request $req) {
		$cars = R::find("cars", "stamp_id = ?", [$req -> id]);

		foreach($cars as $val) {?>

			<option class="block w-[300px] p-5 border  shadow-xl" value="<?=$val -> price?>"><?=$val -> model?></option>

		<?php
		}
	}
}
