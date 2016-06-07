<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountsTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_accounts';
	}

	public static function getTableTitle ()
	{
		return 'Счета';
	}

	public static function getTableLinks ()
	{
		return array(
			'ID' => array(
				'ms_finances_account_bank' => 'ACCOUNT_ID',
				'ms_finances_account_emoney' => 'ACCOUNT_ID',
				'ms_finances_account_debts' => 'ACCOUNT_ID',
				'ms_finances_account_real_estate' => 'ACCOUNT_ID',
				'ms_finances_account_car' => 'ACCOUNT_ID',
				'ms_finances_targets' => 'ACCOUNT_ID',
				'ms_finances_procedures' => array('ACCOUNT_ID', 'ACCOUNT_TO_ID'),
			)
		);
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID счета'
			)),
			new Entity\IntegerField('ACCOUNT_TYPE_ID',array(
				'required' => true,
				'link' => 'ms_finances_account_types.ID',
				'title' => 'Тип счета'
			)),
			new Entity\IntegerField('STATUS',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Статус счета (1 - обычный, 2 - избранный, 0 - скрытый)'
			)),
			new Entity\StringField('NAME',array(
				'size' => 20,
				'required' => true,
				'title' => 'Название счета'
			)),
			new Entity\TextField('DESCRIPTION',array(
				'title' => 'Примечание'
			)),
			new Entity\FloatField('START_BALANCE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Начальный баланс'
			)),
			new Entity\FloatField('CURRENT_MARKET_PRICE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Текущая рыночная стоимость'
			)),
			new Entity\StringField('CURRENCY',array(
				'required' => true,
				'size' => 3,
				'title' => 'Валюта счета'
			)),
			new Entity\BooleanField('LIKE',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Избранный счет'
			))
		);
	}
}