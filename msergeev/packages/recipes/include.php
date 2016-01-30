<?php

use \MSergeev\Core\Lib\Config;
use \MSergeev\Core\Lib\Loader;

Config::addConfig('RECIPES_ROOT',Config::getConfig('PACKAGES_ROOT')."products/");
Config::addConfig('RECIPES_PUBLIC_ROOT',Config::getConfig('PUBLIC_ROOT')."products/");
//Config::addConfig('PRODUCTS_TOOLS_ROOT',str_replace(Config::getConfig("SITE_ROOT"),"",Config::getConfig('PACKAGES_ROOT')."products/tools/"));

//***** Tables ********
Loader::includeFiles(Config::getConfig('RECIPES_ROOT')."tables/");

//***** Lib ********
//Loader::includeFiles(Config::getConfig('RECIPES_ROOT')."lib/");

