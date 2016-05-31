<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('FINANCES_ROOT',Config::getConfig('PACKAGES_ROOT')."finances/");
Config::addConfig('FINANCES_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."finances/");
Config::addConfig('FINANCES_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."finances/tools/"));

//***** Tables ********
Loader::includeFiles(Config::getConfig('FINANCES_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('FINANCES_ROOT')."lib/");

