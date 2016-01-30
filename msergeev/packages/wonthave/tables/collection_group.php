<?php

namespace MSergeev\Packages\Wonthave\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class CollectionGroupTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_wanthave_collection_group';
	}

	public static function getTableTitle()
	{
		return 'Группы коллекций';
	}

	public static function getTableLinks()
	{
		return array(
			'ID' => array(
				'ms_wanthave_collection' => 'COLLECTION_GROUP_ID',
				'ms_wanthave_collection_group' => 'PARENT_GROUP_ID'
			)
		);
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID группы коллекций'
			)),
			new Entity\BooleanField('ACTIVE',array(
				'required' => true,
				'default_value' => true,
				'title' => 'Активность'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название группы'
			)),
			new Entity\IntegerField('PARENT_GROUP_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_wanthave_collection_group.ID',
				'title' => 'Родительская группа'
			)),
			new Entity\IntegerField('DEPTH_LEVEL',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Уровень вложенности'
			)),
			new Entity\BooleanField('SYSTEM',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Системная категория'
			))
		);
	}

	public static function getArrayDefaultValues()
	{
		return array(
			array(
				'ID' => 1,
				'NAME' => 'Совместные желания',
				'SYSTEM' => true
			)
		);
	}
}