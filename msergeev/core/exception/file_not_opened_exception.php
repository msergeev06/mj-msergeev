<?php

namespace MSergeev\Core\Exception;

class FileNotOpenedException extends IoException
{
	public function __construct($path, \Exception $previous = null)
	{
		$message = sprintf("The file '%s' is not opened.", $path);
		parent::__construct($message, $path, $previous);
	}
}
