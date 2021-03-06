<?php

include_once ($_SERVER["DOCUMENT_ROOT"]."/msergeev_config.php");
MSergeev\Core\Lib\Loader::IncludePackage("events");
__include_once(MSergeev\Core\Lib\Loader::getTemplate("events")."header.php");

MSergeev\Core\Lib\Buffer::addCSS(MSergeev\Core\Lib\Loader::getTemplate("events")."css/style.css");
MSergeev\Core\Lib\Buffer::addJS(MSergeev\Core\Lib\Config::getConfig("CORE_ROOT")."js/jquery-1.11.3.min.js");
MSergeev\Core\Lib\Buffer::addJS(MSergeev\Core\Lib\Loader::getTemplate("events")."js/script.js");
