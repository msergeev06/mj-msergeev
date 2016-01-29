<?php

namespace MSergeev\Core\Lib;
use \MSergeev\Core\Tables;

class Options {

	protected static $arOptions;

	public static function init () {
        include_once(Config::getConfig('CORE_ROOT')."default_options.php");

		foreach ($arDefaultOptions as $option => $value) {
			static::$arOptions[$option] = $value;
		}
	}

	public function getStrOption ($optionName) {
		$optionName = strtoupper($optionName);

		return static::getOption ($optionName);
	}


	public function getIntOption($optionName) {
		$optionName = strtoupper($optionName);

		return intval(static::getOption($optionName));
	}

	public function getFloatOption($optionName) {
		$optionName = strtoupper($optionName);

		return floatval(static::getOption($optionName));
	}

	public function setOption ($optionName, $optionValue) {
		$optionName = strtoupper($optionName);
		static::$arOptions[$optionName] = $optionValue;

	}

	protected function getOption ($optionName) {

		if (isset(static::$arOptions[$optionName])) {
			return static::$arOptions[$optionName];
		}
		else {
			$result = Tables\OptionsTable::getList(array(
				"filter" => array(
					"=NAME" => $optionName
				),
				"table" => Tables\OptionsTable::getTableName()
			));
		}

	}


}