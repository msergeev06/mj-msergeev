<?php

namespace MSergeev\Packages\Iblock\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Lib\TableHelper;

class IbTables extends DataManager
{
	public static function getTableName ()
	{
		return 'ms_iblock_ib';
	}

	public static function getTableTitle ()
	{
		return 'Инфоблоки';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_iblock_section' => 'IBLOCK_ID'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID инфоблока'
			)),
			new Entity\StringField('IBLOCK_TYPE_CODE',array(
				'required' => true,
				'link' => "ms_iblock_type.CODE",
				'title' => 'Код типа инфоблоков'
			)),
			new Entity\StringField('CODE',array(
				'title' => 'Код инфоблока'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название инфоблока'
			)),
			TableHelper::activeField(),
			TableHelper::sortField(),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Описание инфоблока'
			)),
			new Entity\StringField('DESCRIPTION_TYPE',array(
				'size' => 4,
				'values' => array('text','html'),
				'default_value' => 'text',
				'title' => 'Описание инфоблока'
			))
		);
	}

}