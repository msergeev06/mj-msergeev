<?php

namespace MSergeev\Packages\Tasks\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class GroupTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_tasks_group';
	}

	public static function getTableTitle()
	{
		return 'Группы задач';
	}

	public static function getTableLinks()
	{
		return array(
			'ID' => array(
				'ms_tasks_group' => 'GROUP_ID',
				'ms_tasks_task' => 'GROUP_ID'
			)
		);
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID группы'
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
			new Entity\IntegerField('DEPTH_LEVEL',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Уровень вложенности'
			)),
			new Entity\IntegerField('GROUP_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_tasks_group.ID',
				'title' => 'Родительская группа'
			)),
			new Entity\IntegerField('LEFT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Левая граница'
			)),
			new Entity\IntegerField('RIGHT_MARGIN',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Правая граница'
			)),
			new Entity\IntegerField('USER_ID',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Владелец группы'
			)),
			new Entity\BooleanField('HIDDEN',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Видима только владельцу'
			)),
			new Entity\BooleanField('SYSTEM',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Системная категория'
			))
		);
	}

	/*
	1 Общие задачи 14
		2 Домоводство 9
			3 Ежедневные дела 4
			5 Комунальные платежи 6
			7 Обслуживание 8
		10 Развлечения 13
			11 Дни рождения 12
	 */

	public static function getArrayDefaultValues()
	{
		return array(
			array(
				'ID' => 1,
				'SORT' => 100,
				'NAME' => 'Общие задачи',
				'LEFT_MARGIN' => 1,
				'RIGHT_MARGIN' => 14,
				'SYSTEM' => true
			),
			array(
				'ID' => 2,
				'NAME' => 'Домоводство',
				'GROUP_ID' => 1,
				'LEFT_MARGIN' => 2,
				'RIGHT_MARGIN' => 9,
				'DEPTH_LEVEL'=> 1
			),
			array(
				'ID' => 3,
				'NAME' => 'Комунальные платежи',
				'GROUP_ID' => 2,
				'LEFT_MARGIN' => 5,
				'RIGHT_MARGIN' => 6,
				'DEPTH_LEVEL' => 2
			),
			array(
				'ID' => 4,
				'NAME' => 'Ежедневные дела',
				'GROUP_ID' => 2,
				'LEFT_MARGIN' => 3,
				'RIGHT_MARGIN' => 4,
				'DEPTH_LEVEL' => 2
			),
			array(
				'ID' => 5,
				'NAME' => 'Обслуживание',
				'GROUP_ID' => 2,
				'LEFT_MARGIN' => 7,
				'RIGHT_MARGIN' => 8,
				'DEPTH_LEVEL' => 2
			),
			array(
				'ID' => 6,
				'NAME' => 'Развлечения',
				'GROUP_ID' => 1,
				'LEFT_MARGIN' => 10,
				'RIGHT_MARGIN' => 13,
				'DEPTH_LEVEL' => 1
			),
			array(
				'ID' => 7,
				'NAME' => 'Дни рождения',
				'GROUP_ID' => 6,
				'LEFT_MARGIN' => 11,
				'RIGHT_MARGIN' => 12,
				'DEPTH_LEVEL' => 2
			)
		);
	}
}