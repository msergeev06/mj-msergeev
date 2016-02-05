<?php

namespace MSergeev\Core\Lib;

use \MSergeev\Core\Entity;

class TableHelper
{
	public static function activeField()
	{
		return new Entity\BooleanField('ACTIVE',array(
			'required' => true,
			'default_value' => true,
			'title' => 'Активность'
		));
	}

	public static function sortField()
	{
		return new Entity\IntegerField('SORT',array(
			'required' => true,
			'default_value' => 500,
			'title' => 'Сортировка'
		));
	}
}