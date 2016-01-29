<?php

//error_reporting( E_ERROR );
use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('DATES_ROOT',Config::getConfig('PACKAGES_ROOT')."dates/");
Config::addConfig('DATES_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."dates/");
Config::addConfig('DATES_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."dates/tools/"));


//***** Tables ********
Loader::includeFiles(Config::getConfig('DATES_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('DATES_ROOT')."lib/");

