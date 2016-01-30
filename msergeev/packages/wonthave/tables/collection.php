<?php

namespace MSergeev\Packages\Wonthave\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class CollectionTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_wanthave_collection';
	}

	public static function getTableTitle()
	{
		return 'Коллекции желаний';
	}

	public static function getTableLinks()
	{
		return array(
			'ID' => array(
				'ms_wanthave_want' => 'COLLECTION_ID'
			)
		);
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID коллекции'
			)),
			new Entity\IntegerField('COLLECTION_GROUP_ID',array(
				'required' => true,
				'default_value' => 1,
				'link' => 'ms_wanthave_collection_group.ID',
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
				'title' => 'Название коллекции'
			)),
			new Entity\IntegerField('USER_ID',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Владелец коллекции'
			)),
			new Entity\BooleanField('HIDDEN',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Коллекцию видит только владелец'
			)),
			new Entity\BooleanField('SYSTEM',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Системная (общая) коллекция'
			))
		);
	}
}