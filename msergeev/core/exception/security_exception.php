<?php

namespace MSergeev\Core\Exception;

class SecurityException extends SystemException
{
	public function __construct($message = "", $code = 0, \Exception $previous = null)
	{
		parent::__construct($message, $code, '', '', $previous);
	}
}
