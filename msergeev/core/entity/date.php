<?php

namespace MSergeev\Core\Entity;

class Date
{
	protected
		$timestamp=null;

	public function __construct ($timestamp=null)
	{
		if (is_null($timestamp)) $this->timestamp=time();
		else $this->timestamp = $timestamp;
	}

	public function getTimestamp ()
	{
		return $this->timestamp;
	}

	public function getDate ($format="Y-m-d")
	{
		return date($format,$this->getTimestamp());
	}

	public function getDateDB ()
	{
		return date("Y-m-d",$this->getTimestamp());
	}

	public static function getDateTimestamp ($format="Y-m-d", $timestamp=null)
	{
		if (is_null($timestamp)) $timestamp = time();
		return date($format,$timestamp);
	}

	public static function getDateDBTimestamp ($timestamp=null)
	{
		if (is_null($timestamp)) $timestamp = time();
		return date("Y-m-d",$timestamp);
	}
}