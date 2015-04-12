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

	public function subscribe()
	{
		$this->courier->subscribe();
	}

	public function update(Request $request)
	{
		$instagram = new Instagram(self::APP_KEY);

		$results = $instagram->getUserMedia(self::JINXED_USER_ID);

		$posts = new Collection;

		foreach($results->data as $key => $result) {
			$post = new Post;

			$post->service_id = $result->id;
			$post->post_path = $result->link;
			$post->media_link = $result->images->standard_resolution->url;
			$post->type = $result->type;
			$post->poster_id = $result->user->id;
			$post->created_time = $result->created_time;
			$posts->add($post);
		}

		$newPosts = $posts->filter(function($posts) use ($post) {
			return is_null(Post::where('service_id', $post->service_id)->first());
		});
		dd($newPosts);
		foreach($newPosts as $post) {
			$post->save();
			$AccountSid = 'AC16d9735b5bc62d2da35645a57592a7ac';
			$AuthToken = 'fe83b2c93584ff131eb1cd7f9704b5a8';

			$numbers = array('330-730-9623', '609-410-8626');

			$post_time = Carbon::createFromTimeStamp($post->created_time)->toFormattedDateString();

			$body = sprintf("Hey hi hello. Just want to let you know that %s just uploaded a post on Instagram at %s. View it here: %s \n -- Dylan's Server", 'Jinxed', $post_time, $post->post_path);

			// Sending text
			$client = new \Services_Twilio($AccountSid, $AuthToken);

			foreach($numbers as $number) {
				$message = $client->account->messages->create(array(
				    "From" => "786-393-6488",
				    "To" => "330-730-9623",
				    "Body" => $body,
				));
			}

		}



	}

	public function getChallengeTokens(Request $request)
	{

	}

}
