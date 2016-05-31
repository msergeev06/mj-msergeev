<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class RegionsTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finences_regions';
	}

	public static function getTableTitle ()
	{
		return 'Регионы';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID региона'
			)),
			Lib\TableHelper::activeField(),
			Lib\TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название региона'
			))
		);
	}
	
//http://hramy.ru/regions/regfull.htm
	public static function getArrayDefaultValues ()
	{
		return array(
			array(
				"NAME" => ""
			),
		);
	}
}