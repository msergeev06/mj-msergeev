<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class TargetsTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_targets';
	}

	public static function getTableTitle ()
	{
		return 'Финансовые цели';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID цели'
			)),
			new Entity\IntegerField('TARGET_TYPE',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Хочу (1-накопить, 0-выплатить)'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Наименование'
			)),
			new Entity\IntegerField('STATUS',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Статус (1-обычная, 2-избранная, 3-скрытая)'
			)),
			new Entity\StringField('CURRENCY',array(
				'size' => 3,
				'title' => 'Валюта цели'
			)),
			new Entity\FloatField('SUM',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Сумма цели'
			)),
			new Entity\DateField('DATE_FIRST',array(
				'title' => 'Дата первого взноса'
			)),
			new Entity\IntegerField('ACCOUNT_ID',array(
				'link' => 'ms_finances_accounts.ID',
				'title' => 'ID счета'
			)),
			new Entity\FloatField('PAY_MONTHLY',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Ежемесячное внесение'
			)),
			new Entity\DateField('TO_DATE',array(
				'title' => 'Нужно к дате'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Комментарий'
			)),
			new Entity\BooleanField('DONE',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Цель выполнена'
			))
		);
	}
}