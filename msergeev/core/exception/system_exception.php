<?php

namespace MSergeev\Core\Exception;

class SystemException extends \Exception
{
	public function __construct ($message = "", $code = 0, $file = "", $line = 0, \Exception $previous = null)
	{
		parent::__construct($message,$code,$previous);

		if (!empty($file) && !empty($line))
		{
			$this->file = $file;
			$this->line = $line;
		}
	}

}