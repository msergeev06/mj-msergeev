<?php

namespace MSergeev\Packages\Recipes\Tables;

use MSergeev\Core\Entity;
use MSergeev\Core\Lib\DataManager;

class MeasureTable extends DataManager
{
	public static function getTableName()
	{
		return 'ms_recipes_measure';
	}

	public static function getTableTitle()
	{
		return 'Единицы измерения';
	}

	public static function getMap()
	{
		return array(
			new Entity\IntegerField('ID',array(
				'primary' => true,
				'autocomplete' => true,
				'title' => 'ID единицы измерения'
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
				'title' => 'Название'
			)),
			new Entity\StringField('CODE',array(
				'required' => true,
				'run' => array(
					'function' => '\MSergeev\Core\Lib\Tools::generateCode',
					'column' => 'NAME'
				),
				'title' => 'Символьный код'
			)),
			new Entity\StringField('SHORT_NAME',array(
				'title' => 'Краткое наименование'
			)),
			new Entity\StringField('MANY_NAME',array(
				'title' => 'Множественное наименование'
			)),
			new Entity\BooleanField('SYSTEM',array(
				'required' => true,
				'default_value' => false,
				'title' => 'Системная единица измерения'
			))
		);
	}

	public static function getArrayDefaultValues()
	{
		return array(
			array(
				'NAME' => 'Литр',
				'SHORT_NAME' => 'л.',
				'MANY_NAME' => 'Литров',
				'SYSTEM' => true
			),
			array(
				'NAME' => 'Килограмм',
				'SHORT_NAME' => 'кг.',
				'MANY_NAME' => 'Килограмм',
				'SYSTEM' => true
			),
			array(
				'NAME' => 'Грамм',
				'SHORT_NAME' => 'г.',
				'MANY_NAME' => 'Грамм',
				'SYSTEM' => true
			),
			array(
				'NAME' => 'Стакан',
				'SHORT_NAME' => 'ст.',
				'MANY_NAME' => 'Стаканов',
				'SYSTEM' => true
			),
			array(
				'NAME' => 'Чайная ложка',
				'SHORT_NAME' => 'ч.л.',
				'MANY_NAME' => 'Чайных ложек',
				'SYSTEM' => true
			),
			array(
				'NAME' => 'Столовая ложка',
				'SHORT_NAME' => 'ст.л.',
				'MANY_NAME' => 'Столовых ложек',
				'SYSTEM' => true
			)
			/*
			array(
				'NAME' => '',
				'SHORT_NAME' => '',
				'MANY_NAME' => '',
				'SYSTEM' => true
			),
			*/
		);
	}
}