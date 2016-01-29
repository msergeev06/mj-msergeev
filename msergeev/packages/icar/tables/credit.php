<?php

namespace MSergeev\Packages\Icar\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class CreditTable extends DataManager {
	public static function getTableName () {
		return 'ms_icar_credit';
	}
	public static function getTableTitle() {
		return 'Расходы на кредит';
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID расхода на кредит'
			)),
			new Entity\IntegerField('MY_CAR_ID',array(
				'required' => true,
				'link' => 'ms_icar_my_car.ID',
				'title' => 'ID автомобиля'
			)),
			new Entity\IntegerField('DATE',array(
				'required' => true,
				'default_value' => 'date("Y-m-d")',
				'title' => 'Дата расхода'
			)),
			new Entity\IntegerField('SUM',array(
				'required' => true,
				'default_value' => 0,
				'title' => 'Сумма'
			)),
			new Entity\IntegerField('NAME',array(
				'required' => true,
				'title' => 'Название'
			)),
			new Entity\IntegerField('DESCRIPTION',array(
				'title' => 'Примечание'
			))
		);
	}
}