<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('SMSSEND_ROOT',Config::getConfig('PACKAGES_ROOT')."smssend/");
//Config::addConfig('SMSSEND_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."smssend/");
//Config::addConfig('SMSSEND_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."smssend/tools/"));

//***** Tables ********
Loader::includeFiles(Config::getConfig('SMSSEND_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('SMSSEND_ROOT')."lib/");