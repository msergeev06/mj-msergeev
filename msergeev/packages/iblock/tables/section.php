<?php

namespace MSergeev\Packages\Iblock\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;
use MSergeev\Core\Lib\TableHelper;

class SectionTable extends DataManager
{
	public static function getTableName ()
	{
		return 'ms_iblock_section';
	}

	public static function getTableTitle ()
	{
		return 'Разделы инфоблока';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_iblock_section' => 'IBLOCK_SECTION_ID'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID раздела инфоблока'
			)),
			new Entity\IntegerField('IBLOCK_ID',array(
				'required' => true,
				'link' => 'ms_iblock_ib.ID',
				'title' => 'ID инфоблока'
			)),
			new Entity\IntegerField('IBLOCK_SECTION_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_iblock_section.ID',
				'title' => 'ID раздела инфоблока'
			)),
			TableHelper::activeField(),
			TableHelper::sortField(),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название раздела инфоблока'
			)),
			new Entity\IntegerField('LEFT_MARGIN',array(
				'title' => 'Левое поле'
			)),
			new Entity\IntegerField('RIGHT_MARGIN',array(
				'title' => 'Правое поле'
			)),
			new Entity\IntegerField('DEPTH_LEVEL',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Уровень вложенности'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Описание раздела инфоблока'
			)),
			new Entity\StringField('DESCRIPTION_TYPE',array(
				'required' => true,
				'default_value' => 'text',
				'values' => array('text','html'),
				'title' => 'Тип поля Описание'
			)),
			new Entity\StringField('CODE',array(
				'title' => 'Код раздела инфоблока'
			))
		);
	}
}