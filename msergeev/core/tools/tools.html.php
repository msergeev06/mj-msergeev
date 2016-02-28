<?php
/**
 * Majordomo MSergeev
 * @package core
 * @copyright 2016 MSergeev
 */

use \MSergeev\Core\Lib\DBResult;
use \MSergeev\Core\Exception;
use \MSergeev\Core\Lib;

/**
 * Returns HTML "input"
 *
 * @param string        $strType        input type
 * @param string        $strName        input name
 * @param string        $strValue       input value
 * @param string|array  $strCmp         checked
 * @param bool          $strPrintValue  Выводить strValue или strPrint
 * @param string        $strPrint       Вывод описания поля
 * @param string        $field1         Дополнительный вывод данных для input
 * @param string        $strId          input id
 *
 * @return string
 */
function InputType($strType, $strName, $strValue, $strCmp, $strPrintValue=false, $strPrint="", $field1="", $strId="")
{
	$bCheck = false;
	if($strValue <> '')
	{
		if(is_array($strCmp))
			$bCheck = in_array($strValue, $strCmp);
		elseif($strCmp <> '')
			$bCheck = in_array($strValue, explode(",", $strCmp));
	}
	$bLabel = false;
	if ($strType == 'radio')
		$bLabel = true;
	return ($bLabel? '<label>': '').'<input type="'.$strType.'" '.$field1.' name="'.$strName.'" id="'.($strId <> ''? $strId : $strName).'" value="'.$strValue.'"'.
	($bCheck? ' checked':'').'>'.($strPrintValue? $strValue:$strPrint).($bLabel? '</label>': '');
}

/**
 * Returns HTML "select"
 *
 * @param string    $strBoxName     Input name
 * @param array     $arValues       Array with items
 * @param string    $strDetText     Empty item text
 * @param string    $strSelectedVal Selected item value
 * @param string    $field1         Additional attributes
 * @return string
 */
function SelectBox($strBoxName, $arValues, $strDetText = "", $strSelectedVal = "null", $field1="class=\"typeselect\"")
{
	$strReturnBox = "<select ".$field1." name=\"".$strBoxName."\" id=\"".$strBoxName."\">";
	if ($strDetText <> '')
	{
		$strReturnBox = $strReturnBox."<option value=\"NULL\"";
		if (strtolower($strSelectedVal) == "null")
		{
			$strReturnBox.= " selected";
		}
		$strReturnBox.= ">".$strDetText."</option>";
	}
	if (empty($arValues))
	{
		return false;
	}
	foreach ($arValues as $arValue) {
		$strReturnBox = $strReturnBox."<option ";
		if (
			(isset($arValue["SELECTED"]) && $arValue["SELECTED"])
			|| ($strSelectedVal != "" && $strSelectedVal == $arValue["VALUE"])
		)
		{
			$strReturnBox = $strReturnBox." selected ";
		}
		$strReturnBox = $strReturnBox."value=\"".$arValue["VALUE"]. "\">".$arValue["NAME"]."</option>";
	}
	return $strReturnBox."</select>";
}

function SelectBoxBool ($strBoxName, $strSelectedVal = "", $strYes='', $strNo='', $field1="class=\"typeselect\"")
{
	if ($strYes == '') $strYes = 'Да';
	if ($strNo == '') $strNo = 'Нет';
	if ($strSelectedVal == "") $strSelectedVal = 0;

	$arValues = array(
		array(
			'VALUE' => 0,
			'NAME' => $strNo
		),
		array(
			'VALUE' => 1,
			'NAME' => $strYes
		)
	);

	return SelectBox($strBoxName, $arValues, '', $strSelectedVal, $field1);
}

/**
 * Returns HTML multiple "select"
 *
 * @param string    $strBoxName             Input name
 * @param array     $arValues               Array with items
 * @param string    $strDetText             Empty item text
 * @param bool      $strDetText_selected    Allow to choose an empty item
 * @param string    $size                   Size attribute
 * @param string    $field1                 Additional attributes
 * @return string
 */
function SelectBoxM($strBoxName, $arValues, $strDetText = "", $strDetText_selected = false, $size = "5", $field1="class=\"typeselect\"")
{
	$strReturnBox = "<select ".$field1." multiple name=\"".$strBoxName."\" id=\"".$strBoxName."\" size=\"".$size."\">";
	if ($strDetText <> '')
	{
		$strReturnBox = $strReturnBox."<option ";
		if ($strDetText_selected)
			$strReturnBox = $strReturnBox." selected ";
		$strReturnBox = $strReturnBox." value='NULL'>".$strDetText."</option>";
	}
	foreach ($arValues as $arValue) {
		$strReturnBox = $strReturnBox."<option ";
		if (isset($arValue["SELECTED"]) && $arValue["SELECTED"])
		{
			$strReturnBox = $strReturnBox." selected ";
		}
		$strReturnBox = $strReturnBox."value=\"".$arValue["VALUE"]. "\">".$arValue["NAME"]."</option>";
	}
	return $strReturnBox."</select>";
}

/**
 * Show Input for select Date
 *
 * @param string $strName
 * @param string $strValue
 * @param string $field1
 * @param string $strId
 *
 * @throw Exception\ArgumentNullException
 *
 * @return string
 */
function InputCalendar ($strName, $strValue="", $field1="", $strId="")
{
	try
	{
		if (strlen($strName)==0)
		{
			throw new Exception\ArgumentNullException("strName");
		}
		if (strlen($strValue)==0) $strValue = date("d.m.Y");
		Lib\Buffer::addJS(Lib\Config::getConfig("CORE_ROOT")."js/calendar.js");
		$strReturnBox = "<input ".$field1." type=\"text\" id=\"".(($strId!="")?$strId:$strName);
		$strReturnBox.= "\" name=\"".$strName."\" value=\"".$strValue."\"";
		$strReturnBox.= " onfocus=\"this.select();lcs(this)\"";
		$strReturnBox.= " onclick=\"event.cancelBubble=true;this.select();lcs(this)\"";
		$strReturnBox.= ">";

		return $strReturnBox;
	}
	catch (Exception\ArgumentNullException $e)
	{
		$e->showException();
	}
}