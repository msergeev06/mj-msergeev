<?php

//error_reporting( E_ERROR );
use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('EVENTS_ROOT',Config::getConfig('PACKAGES_ROOT')."events/");
Config::addConfig('EVENTS_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."events/");
Config::addConfig('EVENTS_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."events/tools/"));


//***** Tables ********
Loader::includeFiles(Config::getConfig('EVENTS_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('EVENTS_ROOT')."lib/");

