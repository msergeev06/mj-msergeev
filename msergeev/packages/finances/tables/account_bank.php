<?php

namespace MSergeev\Packages\Finances\Tables;

use MSergeev\Core\Lib;
use MSergeev\Core\Entity;

class AccountBankTable extends Lib\DataManager
{
	public static function getTableName ()
	{
		return 'ms_finances_account_bank';
	}

	public static function getTableTitle ()
	{
		return 'Счет, связанный с банками';
	}

	//Банковский счет, Кредитная карта, Кредит, Дебетовая карта, Депозит
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
			new Entity\StringField('BANK_NAME',array(
				'title' => 'Название банка'
			)),
			new Entity\IntegerField('CARD_TYPE_ID',array(
				'required' => true,
				'default_value' => 0,
				'link' => 'ms_finances_card_types.ID',
				'title' => 'Тип карты'
			)),
			new Entity\DateField('DATE_CARD',array(
				'title' => 'Срок действия карты'
			)),
			new Entity\FloatField('CREDIT_LIMIT',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Кредитный лимит'
			)),
			new Entity\FloatField('ANNUAL_RATE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Годовая ставка, %'
			)),
			new Entity\IntegerField('GRACE_PERIOD',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Льготный период, дней'
			)),
			new Entity\FloatField('MINIMUM_PAYMENT_PERCENTAGE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Минимальный платеж, %'
			)),
			new Entity\IntegerField('DAY_MINIMUM_PAYMENT',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'День минимального платежа'
			)),
			new Entity\FloatField('CASH_BANK_ATM',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Снятие наличных в банкомате банка, %'
			)),
			new Entity\FloatField('CASH_OTHER_ATM',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Снятие наличных в других банкоматах, %'
			)),
			new Entity\FloatField('ANNUAL_MAINTENANCE_COST',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Стоимость ежегодного обслуживания'
			)),
			new Entity\IntegerField('PAYMENT_TYPE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Тип платежа (0 - аннуитетный, 1 - дифференцированный)'
			)),
			new Entity\DateField('DATE_START',array(
				'title' => 'Дата открытия'
			)),
			new Entity\DateField('DATE_END',array(
				'title' => 'Дата закрытия'
			)),
			new Entity\FloatField('ONE_TIME_FEE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Единоразовая комиссия, %'
			)),
			new Entity\FloatField('MONTHLY_FEE',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Ежемесячная комиссия, %'
			)),
			new Entity\IntegerField('ACCRUAL_PERIOD',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Период начисления процентов'
			)),
			new Entity\BooleanField('CAPITALIZATION',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Капитализация'
			)),
			new Entity\IntegerField('DEPOSIT_TYPE',array(
				'required' => true,
				'default_value' => 1,
				'title' => 'Тип депозита'
			))
		);
	}
}