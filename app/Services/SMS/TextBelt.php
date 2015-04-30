<?php
namespace App\Services\SMS;

/**
 * Service \ SMS \ TextBelt
 *
 * @author <me@dylanjpierce.com>
 */
use App\Services\SMS\Courier;
use App\Services\SMS\CourierAbstract;

class TextBelt extends CourierAbstract implements Courier
{
	const TEXTBELT_URL = 'http://textbelt.com/text';

	public function make()
	{
		$this->message = array();

		return $this;
	}

	public function send()
	{
		$message = http_build_query([
			'number' => $this->message['recipent'],
		    'message' => $this->message['body']
		]);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, self::TEXTBELT_URL );
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $message);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec ($ch);

		curl_close ($ch);

		$this->message = array();

		return $this;
	}
}