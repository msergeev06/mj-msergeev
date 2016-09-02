<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('CALENDAR_ROOT',Config::getConfig('PACKAGES_ROOT')."calendar/");
Config::addConfig('CALENDAR_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."calendar/");
Config::addConfig('CALENDAR_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."calendar/tools/"));
Config::addConfig('CALENDAR_DEFAULT_COLOR','#c6c6c6');

//***** Tables ********
Loader::includeFiles(Config::getConfig('CALENDAR_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('CALENDAR_ROOT')."lib/");