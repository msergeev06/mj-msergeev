<?php

namespace MSergeev\Core\Lib;

use MSergeev\Core\Exception\ArgumentNullException;

class Uploader
{
	protected $tmpFilename=null;
	protected $tmpPath=null;

	public function __construct($arFile=array())
	{
		if (empty($arFile)) $arFile = $_FILES;

	}

	public static function getUploadDir ()
	{
		return Config::getConfig("MSERGEEV_ROOT")."upload/";
	}

	public static function getUploadDirPackage ($strPackageName)
	{
		try
		{
			if (strlen($strPackageName)==0)
			{
				throw new ArgumentNullException("strPackageName");
			}
			return Loader::getUpload($strPackageName);
		}
		catch (ArgumentNullException $e)
		{
			$e->showException();
		}
	}
}