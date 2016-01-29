<?php

namespace MSergeev\Packages\Icar\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class InsuranceTable extends DataManager {
	public static function getTableName() {
		return 'ms_icar_insurance';
	}
	public static function getTableTitle() {
		return 'Страховая компания';
	}
	public static function getTableLinks() {
		return array(
			'ID' => array(
				'ms_icar_accident' => array('YOU_INSURANCE_ID','SECOND_INSURANCE_ID')
			)
		);
	}
	public static function getMap() {
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID страховой компании'
			)),
			new Entity\StringField('NAME',array(
				'required' => true,
				'title' => 'Название страховой компании'
			)),
			new Entity\IntegerField('SORT',array(
				'required' => true,
				'default_value' => 500,
				'title' => 'Сортировка'
			)),
		);
	}
}