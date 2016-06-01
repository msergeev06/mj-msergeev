<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountDebtsTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_account_debts';
	}

	public static function getTableTitle ()
	{
		return 'Счет, связанные с дачей/взятием в долг';
	}

	public static function getMap ()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID записи'
			)),
			new Entity\IntegerField('ACCOUNT_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_accounts.ID',
				'title' => 'ID счета'
			)),
			new Entity\DateField('DATE_START',array(
				'title' => 'Дата выдачи/пролучения'
			)),
			new Entity\DateField('DATE_END',array(
				'title' => 'Дата возврата/погашения'
			)),
			new Entity\StringField('EMAIL',array(
				'title' => 'E-mail'
			)),
			new Entity\StringField('PHONE',array(
				'title' => 'Телефон'
			)),
			new Entity\FloatField('ANNUAL_RATE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Годовая ставка, %'
			))
		);
	}
}