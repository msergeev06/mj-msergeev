<?php

//error_reporting( E_ERROR );
use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('APIHELP_ROOT',Config::getConfig('PACKAGES_ROOT')."apihelp/");
Config::addConfig('APIHELP_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."apihelp/");
//Config::addConfig('APIHELP_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."apihelp/tools/"));


//***** Tables ********
Loader::includeFiles(Config::getConfig('APIHELP_ROOT')."tables/");

//***** Lib ********
//Loader::includeFiles(Config::getConfig('APIHELP_ROOT')."lib/");

