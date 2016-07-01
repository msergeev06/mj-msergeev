<?php

namespace MSergeev\Packages\Finances\Lib;

use MSergeev\Core\Lib as CoreLib;
use MSergeev\Core\Exception;

class Targets
{
	public static function showSelectTargetWant ($name='target-want', $id='target-want')
	{
		$echo = '<select id="'.$id.'" name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="1" selected>Выплатить</option>'."\n";
		$echo .= "\t".'<option value="2">Накопить</option>'."\n";
		$echo .= "</select>\n";

		return $echo;
	}

	public static function showSelectTargetCategory ($income=true, $name='target-category', $id='target-category')
	{
		$echo = '<select id="'.$id.(($income)?'-buy':'-pay').'" name="'.$name.(($income)?'-buy':'-pay').'">'."\n";
		if (!$income)
		{
			$echo .= "\t".'<option value="1" selected>Долг по ипотеке</option>'."\n";
			$echo .= "\t".'<option value="2">Долг по кредитам</option>'."\n";
			$echo .= "\t".'<option value="3">Долг по кредитным картам</option>'."\n";
			$echo .= "\t".'<option value="4">Прочие долги</option>'."\n";
		}
		else
		{
			$echo .= "\t".'<option value="5" selected>Автомобиль</option>'."\n";
			$echo .= "\t".'<option value="6">Бытовая техника</option>'."\n";
			$echo .= "\t".'<option value="7">Дом</option>'."\n";
			$echo .= "\t".'<option value="8">Земельный участок</option>'."\n";
			$echo .= "\t".'<option value="9">Квартира</option>'."\n";
			$echo .= "\t".'<option value="10">Компьютер</option>'."\n";
			$echo .= "\t".'<option value="11">Лечение</option>'."\n";
			$echo .= "\t".'<option value="12">Мебель</option>'."\n";
			$echo .= "\t".'<option value="13">Мотоцикл</option>'."\n";
			$echo .= "\t".'<option value="14">Образование</option>'."\n";
			$echo .= "\t".'<option value="15">Отпуск</option>'."\n";
			$echo .= "\t".'<option value="16">Прочее</option>'."\n";
			$echo .= "\t".'<option value="17">Ремонт квартиры/дома</option>'."\n";
			$echo .= "\t".'<option value="18">Свадьба</option>'."\n";
			$echo .= "\t".'<option value="19">Финансовая подушка</option>'."\n";
			$echo .= "\t".'<option value="20">Шуба</option>'."\n";
			$echo .= "\t".'<option value="21">Электроника</option>'."\n";
			$echo .= "\t".'<option value="22">Ювелирные украшения</option>'."\n";
		}
		$echo .= "</select>\n";

		return $echo;
	}

	public static function addTargetFromPost ($arPost)
	{

	}


}