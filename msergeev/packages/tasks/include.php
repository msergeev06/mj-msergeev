<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('TASKS_ROOT',Config::getConfig('PACKAGES_ROOT')."tasks/");
Config::addConfig('TASKS_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."tasks/");
//Config::addConfig('PRODUCTS_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."products/tools/"));

//***** Tables ********
Loader::includeFiles(Config::getConfig('TASKS_ROOT')."tables/");

//***** Lib ********
Loader::includeFiles(Config::getConfig('TASKS_ROOT')."lib/");

