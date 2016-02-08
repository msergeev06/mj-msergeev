<?php

require_once ("tools/tools.msdebug.php");
require_once ("tools/tools.html.php");

function __include_once ($path)
{
	//echo $path."<br>";
	include_once($path);
}

/*
function getMessage ($name, $arReplace=array())
{
	$message = \MSergeev\Core\Lib\Loc::getMessage($name,$arReplace);

	return $message;
}
*/

