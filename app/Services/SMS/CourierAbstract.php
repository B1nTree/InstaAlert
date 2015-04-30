<?php
namespace App\Services\SMS;

/**
 * Courier Abstract
 *
 * @author Dylan Pierce <me@booksmart.it>
 */

abstract class CourierAbstract
{
	protected $message;

	public function __construct()
	{
		$this->message = array();
	}
	
	public function setSender($sender)
	{
		$this->message['sender'] = $sender;

		return $this;
	}

	public function setRecipent($recipent)
	{
		$this->message['recipent'] = $recipent;

		return $this;
	}

	public function setBody($body)
	{
		$this->message['body'] = $body;

		return $this;
	}
}