<?php

namespace MSergeev\Packages\Iblock\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Lib\TableHelper;

class TypeTable extends DataManager
{
	public static function getTableName ()
	{
		return 'ms_iblock_type';
	}

	public static function getTableTitle ()
	{
		return 'Типы инфоблоков';
	}

	public static function getTableLinks ()
	{
		return array(
			'CODE' => array(
				'ms_iblock_ib' => 'IBLOCK_TYPE_CODE'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID типа инфоблоков'
			)),
			new Entity\StringField('CODE',array(
				'required' => true,
				'unique' => true,
				'title' => 'Код типа инфоблоков'
			)),
			TableHelper::sortField()
		);
	}
}