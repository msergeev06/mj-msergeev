<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

$packageName = "currency";

$packageBigName = strtoupper($packageName);

Config::addConfig($packageBigName.'_ROOT',Config::getConfig('PACKAGES_ROOT').$packageName."/");
Config::addConfig($packageBigName.'_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT').$packageName."/");
Config::addConfig($packageBigName.'_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT').$packageName."/tools/"));

//***** Tables ********
Loader::includeFiles(Config::getConfig($packageBigName.'_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig($packageBigName.'_ROOT')."lib/");

