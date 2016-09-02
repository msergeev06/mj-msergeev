<?php

namespace MSergeev\Core\Lib;

use MSergeev\Core\Lib\Loc;

class Loader {

	protected static $arPackage;
	protected static $packagesRoot;
	protected static $publicRoot;
	protected static $uploadRoot;
	protected static $arIncludedPackages;

	public static function init () {
		static::$packagesRoot = Config::getConfig("PACKAGES_ROOT");
		static::$publicRoot = Config::getConfig("PUBLIC_ROOT");
		static::$uploadRoot = Config::getConfig("MSERGEEV_ROOT")."upload/";
		if (is_dir(static::$packagesRoot))
		{
			if ($dh = opendir(static::$packagesRoot))
			{
				while (($file = @readdir($dh)) !== false)
				{
					if ($file != "." && $file != ".." && $file != "packages.php")
					{
						static::$arPackage[$file]["INCLUDE"] = static::$packagesRoot.$file."/include.php";
						static::$arPackage[$file]["REQUIRED"] = static::$packagesRoot.$file."/required.php";
						static::$arPackage[$file]["PUBLIC"] = static::$publicRoot.$file."/";
						static::$arPackage[$file]["SITE_PUBLIC"] = str_replace(Config::getConfig('SITE_ROOT'),"",static::$arPackage[$file]["PUBLIC"]);
						static::$arPackage[$file]["SITE_PUBLIC"] = str_replace('\\',"/",static::$arPackage[$file]["SITE_PUBLIC"]);
						//msDebug(static::$arPackage[$file]["SITE_PUBLIC"]);
						static::$arPackage[$file]["UPLOAD"] = static::$uploadRoot.$file."/";
						if ($temp = Config::getConfig($file."_TEMPLATE"))
						{
							static::$arPackage[$file]["TEMPLATE"] = static::$packagesRoot.$file."/templates/".$temp."/";
						}
						else
						{
							static::$arPackage[$file]["TEMPLATE"] = static::$packagesRoot.$file."/templates/.default/";
						}
						static::$arPackage[$file]["SITE_TEMPLATE"] = str_replace(Config::getConfig("SITE_ROOT"),"",static::$arPackage[$file]["TEMPLATE"]);
					}
				}
				@closedir($dh);
			}
		}
	}

	public static function IncludePackage ($namePackage=null)
	{
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]) && !isset(static::$arIncludedPackages[$namePackage]))
		{
			if (file_exists(static::$arPackage[$namePackage]["REQUIRED"]))
			{
				include_once(static::$arPackage[$namePackage]["REQUIRED"]);
				if (!empty($arRequiredPackages))
				{
					foreach ($arRequiredPackages as $required)
					{
						if (isset(static::$arPackage[$required]) && !isset(static::$arIncludedPackages[$required]))
						{
							static::IncludePackage($required);
						}
						else
						{
							die("ERROR-[".$namePackage."]: Необходимо установить обязательный пакет [".$required."]");
						}
					}
				}
				if (!empty($arAdditionalPackages))
				{
					foreach ($arAdditionalPackages as $additional)
					{
						if (isset(static::$arPackage[$additional]) && !isset(static::$arIncludedPackages[$additional]))
						{
							static::IncludePackage($additional);
						}
					}
				}
			}
			__include_once(static::$arPackage[$namePackage]["INCLUDE"]);
			static::$arIncludedPackages[$namePackage] = true;
			Loc::setModuleMessages($namePackage);
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function issetPackage ($namePackage=null) {
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function getPublic ($namePackage=null)
	{
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]))
		{
			return static::$arPackage[$namePackage]["PUBLIC"];
		}
		else
		{
			return false;
		}
	}

	public static function getSitePublic ($namePackage=null)
	{
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]))
		{
			return static::$arPackage[$namePackage]["SITE_PUBLIC"];
		}
		else
		{
			return false;
		}
	}

	public static function getTemplate ($namePackage=null)
	{
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]))
		{
			return static::$arPackage[$namePackage]["TEMPLATE"];
		}
		else
		{
			return false;
		}
	}

	public static function getSiteTemplate ($namePackage=null)
	{
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]))
		{
			return static::$arPackage[$namePackage]["SITE_TEMPLATE"];
		}
		else
		{
			return false;
		}
	}

	public static function getUpload ($namePackage=null)
	{
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage]))
		{
			return static::$arPackage[$namePackage]["UPLOAD"];
		}
		else
		{
			return false;
		}
	}

	public static function includeFiles ($dir, $firstLoad=array(), $noLoad=array())
	{
		//$dir = Config::getConfig('CORE_ROOT')."lib/";
		if (empty($noLoad))
		{
			$noLoad = array(".","..");
		}
		else
		{
			if (!in_array(".",$noLoad))
			{
				$noLoad[] = ".";
			}
			if (!in_array("..",$noLoad))
			{
				$noLoad[] = "..";
			}
			if (!in_array(".readme",$noLoad))
			{
				$noLoad[] = ".readme";
			}
		}

		if (!empty($firstLoad))
		{
			foreach ($firstLoad as $files)
			{
				__include_once($dir.$files);
				$noLoad[] = $files;
			}
		}
		if (is_dir($dir))
		{
			if ($dh = opendir($dir))
			{
				while (($file = readdir($dh)) !== false)
				{
					if (!in_array($file,$noLoad))
					{
						__include_once($dir . $file);
					}
				}
				closedir($dh);
			}
		}

	}
}