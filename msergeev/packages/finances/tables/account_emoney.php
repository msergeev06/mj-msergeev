<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountEmoneyTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_account_emoney';
	}

	public static function getTableTitle ()
	{
		return 'Счет - электронный кошелек';
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
			new Entity\IntegerField('EMONEY_TYPE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_emoney_types.ID',
				'title' => 'Тип электронных денег'
			))
		);
	}
}