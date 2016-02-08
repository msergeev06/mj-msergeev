<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('ICAR_ROOT',Config::getConfig('PACKAGES_ROOT')."icar/");
Config::addConfig('ICAR_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."icar/");
Config::addConfig('ICAR_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."icar/tools/"));

//***** Tables ********
Loader::includeFiles(Config::getConfig('ICAR_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('ICAR_ROOT')."lib/");

