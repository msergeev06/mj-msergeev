<?php
$usePackage = "finances";

include_once ($_SERVER["DOCUMENT_ROOT"]."/msergeev_config.php");
MSergeev\Core\Lib\Loader::IncludePackage($usePackage);
__include_once(MSergeev\Core\Lib\Loader::getTemplate($usePackage)."header.php");

MSergeev\Core\Lib\Buffer::addCSS(MSergeev\Core\Lib\Loader::getTemplate($usePackage)."css/style.css");
MSergeev\Core\Lib\Buffer::addJS(MSergeev\Core\Lib\Config::getConfig("CORE_ROOT")."js/jquery-1.11.3.min.js");
MSergeev\Core\Lib\Buffer::addJS(MSergeev\Core\Lib\Loader::getTemplate($usePackage)."js/script.js");
MSergeev\Core\Lib\Loc::setModuleMessages($usePackage);


