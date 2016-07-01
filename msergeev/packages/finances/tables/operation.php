<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class OperationTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_operation';
	}

	public static function getTableTitle ()
	{
		return 'Операции';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_operation' => 'PARENT_ID'
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID операции'
			)),
			new Entity\IntegerField('PARENT_ID',array(
				'required' => true,
				'default_value' => true,
				'link' => 'ms_finances_operation.ID',
				'title' => 'ID родительской операции'
			)),
			new Entity\FloatField('SUM',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Сумма'
			)),
			new Entity\DatetimeField('DATE_TIME',array(
				'required' => true,
				'title' => 'Дата и время операции'
			)),
			new Entity\IntegerField('OPERATION_TYPE',array(
				'required' => true,
				'default_value' => -1,
				'title' => 'Тип операции (-1-расход, 0-перевод со счета, 1-доход)'
			)),
			new Entity\IntegerField('ACCOUNT_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_accounts.ID',
				'title' => 'Основной счет операции'
			)),
			new Entity\IntegerField('ACCOUNT_TO_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_accounts.ID',
				'title' => 'Счет для перевода средств'
			)),
			new Entity\IntegerField('CATEGORY_ID',array(
				'requried' => true,
				'default_value' => 0,
				'link' => 'ms_finances_categories.ID',
				'title' => 'Категория дохода/расхода'
			)),
			new Entity\StringField('TAGS',array(
				'title' => 'Метки'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Комментарий'
			))
		);
	}
}