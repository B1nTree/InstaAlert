<?php
namespace App\Services\SMS;

/**
 * SMS \ Twilio
 *
 * @author Dylan Pierce <me@dylanjpierce.com>
 */

class Twilio implements Courier
{
	const ACCOUNT_SID = 'AC16d9735b5bc62d2da35645a57592a7ac';
	const AUTH_TOKEN = 'fe83b2c93584ff131eb1cd7f9704b5a8';

	protected $client;

	public function make()
	{
		$this->message = array();
		$this->client = new \Services_Twilio($AccountSid, $AuthToken);
	}

	public function setRecipent($recipent)
	{
		$this->message['To'] = $recipent;

		return $this;
	}

	public function setSender($sender = '786-393-6488')
	{
		$this->message['From'] = $sender;

		return $this;
	}

	public function setBody($body)
	{
		$this->message['Body'] = $body;

		return $this;
	}

	public function send()
	{
		$this->client->account->messages->create($this->message);

		$this->message = array();

		return $this;
	}
}