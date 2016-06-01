<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class ProceduresTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_procedures';
	}

	public static function getTableTitle ()
	{
		return 'Операции';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID операции'
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
			new Entity\IntegerField('PROCEDURE_TYPE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Тип операции (0-расход, 1-доход, 2-перевод со счета)'
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
			new Entity\StringField('TAGS',array(
				'title' => 'Метки'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Комментарий'
			))
		);
	}
}