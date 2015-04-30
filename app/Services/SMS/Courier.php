<?php
namespace App\Services\SMS;

/**
 * SMS \ Courier Interface
 *
 * @author Dylan Pierce <me@dylanjpierce.com>
 */

interface Courier
{
	public function make();

	public function setRecipent($recipent);

	public function setSender($sender);

	public function setBody($body);

	public function send();
}