<?php

namespace MSergeev\Core\Lib;

class Loader {

	protected static $arPackage;
	protected static $packagesRoot;
	protected static $publicRoot;

	public static function init () {
		static::$packagesRoot = Config::getConfig("PACKAGES_ROOT");
		static::$publicRoot = Config::getConfig("PUBLIC_ROOT");
		if (is_dir(static::$packagesRoot)) {
			if ($dh = opendir(static::$packagesRoot)) {
				while (($file = @readdir($dh)) !== false) {
					if ($file != "." && $file != ".." && $file != "packages.php") {
						static::$arPackage[$file]["INCLUDE"] = static::$packagesRoot.$file."/include.php";
						static::$arPackage[$file]["PUBLIC"] = static::$publicRoot.$file."/";
						if ($temp = Config::getConfig($file."_TEMPLATE")) {
							static::$arPackage[$file]["TEMPLATE"] = static::$packagesRoot.$file."/templates/".$temp."/";
						}
						else {
							static::$arPackage[$file]["TEMPLATE"] = static::$packagesRoot.$file."/templates/.default/";
						}
					}
				}
				@closedir($dh);
			}
		}
	}

	public static function IncludePackage ($namePackage=null) {
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage])) {
			__include_once(static::$arPackage[$namePackage]["INCLUDE"]);
			return true;
		}
		else {
			return false;
		}
	}

    public static function issetPackage ($namePackage=null) {
        if (!is_null($namePackage) && isset(static::$arPackage[$namePackage])) {
            return true;
        }
        else {
            return false;
        }
    }

	public static function getPublic ($namePackage=null) {
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage])) {
			return static::$arPackage[$namePackage]["PUBLIC"];
		}
		else {
			return false;
		}
	}

	public static function getTemplate ($namePackage=null) {
		if (!is_null($namePackage) && isset(static::$arPackage[$namePackage])) {
			return static::$arPackage[$namePackage]["TEMPLATE"];
		}
		else {
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
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
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