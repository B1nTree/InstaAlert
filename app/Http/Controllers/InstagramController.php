<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MetzWeb\Instagram\Instagram;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use App\Post;

class InstagramController extends Controller 
{
	protected $courier;

	const APP_KEY = 'a8813a12de174b009df721fb3889fa65';

	const JINXED_USER_ID = '32576604';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{

	}

	public function dashboard()
	{
		return response()->view('dashboard');
	}

}
