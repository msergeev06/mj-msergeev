<?php

namespace MSergeev\Packages\Tasks\Tables;

use MSergeev\Core\Lib\DataManager;
use MSergeev\Core\Entity;

class TaskTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_tasks_task';
	}

	public static function getTableTitle()
	{
		return 'Задачи';
	}

	public static function getTableLinks()
	{
		return array(
			'ID' => array(
				'ms_tasks_task' => 'TASK_ID'
			)
		);
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID задачи'
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
				'title' => 'Название задачи'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Описание задачи'
			)),
			new Entity\DatetimeField('DEADLINE',array(
				'title' => 'Deadline'
			)),
			new Entity\IntegerField('GROUP_ID',array(
				'required' => true,
				'default_value' => 1,
				'link' => 'ms_tasks_group.ID',
				'title' => 'Группа задач'
			)),
			new Entity\IntegerField('USER_ID',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Владелец/исполнитель задачи'
			)),
			new Entity\IntegerField('TASK_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_tasks_task.ID',
				'title' => 'ID родительской задачи'
			)),
			new Entity\BooleanField('HIDDEN',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Видима только владельцу'
			))
		);
	}
}