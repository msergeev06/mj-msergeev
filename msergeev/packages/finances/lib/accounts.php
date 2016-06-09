<?php

namespace MSergeev\Packages\Finances\Lib;

use MSergeev\Core\Lib as CoreLib;
use MSergeev\Core\Exception;
use MSergeev\Core\Entity;
use MSergeev\Packages\Finances\Tables;

class Accounts
{
	public static $arError = array();
	protected static    $a_cash = 2,
						$a_debet_card = 3,
						$a_deposit = 4,
						$a_emoney = 5,
						$a_bank = 6,
						$a_mne = 8,
						$a_i = 10,
						$a_credit_card = 11,
						$a_credit = 12,
						$a_broker = 14,
						$a_oms = 15,
						$a_akcii = 16,
						$a_obligacii = 17,
						$a_other_parer = 18,
						$a_pif = 19,
						$a_ofbu = 20,
						$a_fond = 21,
						$a_nak_strah = 22,
						$a_nak_plan = 23,
						$a_pens_fond = 24,
						$a_pens_acc = 25,
						$a_pamm = 26,
						$a_estate = 28,
						$a_car = 29,
						$a_water = 30,
						$a_paint = 31,
						$a_busines = 32,
						$a_other_real = 33,
						$a_moto = 34,
						$a_air = 35,
						$a_bonus = 37,
						$e_house = 1,
						$e_flat = 2;

	public static function showSelectAccountType ($name='account-type', $id='account-type')
	{
		$arRes = Tables\AccountTypesTable::getList(array(
			'order' => array('LEFT_MARGIN'=>'ASC')
		));
		//msDebug($arRes);

		$echo = '<select id="'.$id.'" name="'.$name.'">'."\n";
		$bFirst = true;
		foreach ($arRes as $arOption)
		{
			if ($arOption['DEPTH_LEVEL']==0)
			{
				if ($bFirst)
				{
					$bFirst = false;
				}
				else
				{
					$echo .= "\t".'</optgroup>'."\n";
				}
				$echo .= "\t".'<optgroup label="'.$arOption['NAME'].'">'."\n";

			}
			else
			{
				$echo .= "\t\t".'<option class="item" value="'.$arOption['ID'].'"';
				if ($arOption['ID'] == 2) $echo .= ' selected';
				$echo .= '>'.$arOption['NAME'].'</option>'."\n";
			}
		}
		$echo .= "\t".'</optgroup>'."\n";
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function showSelectEMoneyType ($name='account-emoney-type')
	{
		$arRes = Tables\EmoneyTypesTable::getList(array(
			'order' => array('SORT'=>'ASC')
		));

		$echo = '<select name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="0" selected>Выберите тип электронных денег</option>'."\n";
		foreach ($arRes as $arOption)
		{
			$echo .= "\t".'<option value="'.$arOption['ID'].'">'.$arOption['NAME'].'</option>'."\n";
		}
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function showSelectCardType ($name='account-card-type')
	{
		$arRes = Tables\CardTypesTable::getList(array(
			'order' => array('SORT'=>'ASC')
		));

		$echo = '<select name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="0" selected>&nbsp;</option>'."\n";
		foreach ($arRes as $arOption)
		{
			$echo .= "\t".'<option value="'.$arOption['ID'].'">'.$arOption['NAME'].'</option>'."\n";
		}
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function showSelectFuelType ($name='account-auto-fuel-type')
	{
		$arRes = Tables\FuelTypesTable::getList(array(
			'order' => array('SORT'=>'ASC')
		));

		$echo = '<select name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="0" selected>&nbsp;</option>'."\n";
		foreach ($arRes as $arOption)
		{
			$echo .= "\t".'<option value="'.$arOption['ID'].'">'.$arOption['NAME'].'</option>'."\n";
		}
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function showSelectGearboxType ($name='account-auto-gearbox-type')
	{
		$arRes = Tables\GearboxTypesTable::getList(array(
			'order' => array('SORT'=>'ASC')
		));

		$echo = '<select name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="0" selected>&nbsp;</option>'."\n";
		foreach ($arRes as $arOption)
		{
			$echo .= "\t".'<option value="'.$arOption['ID'].'">'.$arOption['NAME'].'</option>'."\n";
		}
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function showSelectColor ($name='account-auto-color')
	{
		$arRes = Tables\ColorsTable::getList(array(
			'order' => array('NAME'=>'ASC')
		));

		$echo = '<select name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="0" selected>&nbsp;</option>'."\n";
		foreach ($arRes as $arOption)
		{
			$echo .= "\t".'<option value="'.$arOption['ID'].'">'.$arOption['NAME'].'</option>'."\n";
		}
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function showSelectRegion ($name='account-auto-region')
	{
		$arRes = Tables\RegionsTable::getList(array(
			'order' => array('SORT'=>'ASC','NAME'=>'ASC')
		));

		$echo = '<select name="'.$name.'">'."\n";
		$echo .= "\t".'<option value="0" selected>&nbsp;</option>'."\n";
		foreach ($arRes as $arOption)
		{
			$echo .= "\t".'<option value="'.$arOption['ID'].'">'.$arOption['NAME'].'</option>'."\n";
		}
		$echo .= '</select>'."\n";

		return $echo;
	}

	public static function addAccountFromPost ($arPost=null)
	{
		try
		{
			if (is_null($arPost))
			{
				throw new Exception\ArgumentNullException('$arPost');
			}
			elseif (!is_array($arPost))
			{
				throw new Exception\ArgumentTypeException('$arPost','array');
			}
		}
		catch (Exception\ArgumentNullException $e)
		{
			static::$arError['null'][] = $e->getMessage();
			$e->showException();
			return false;
		}
		catch (Exception\ArgumentTypeException $e2)
		{
			static::$arError['type'][] = $e2->getMessage();
			$e2->showException();
			return false;
		}

		//msDebug($arPost);
		$arData = array();
		//Тип счета
		if (!isset($arPost['account-type']) || intval($arPost['account-type'])==0)
		{
			static::$arError['not-isset'][] = "Не задан тип счета";
			return false;
		}
		else
		{
			$arData['ACCOUNT']['ACCOUNT_TYPE_ID'] = intval($arPost['account-type']);
		}

		//Статус счета
		if (!isset($arPost['account-status']))
		{
			$arData['ACCOUNT']['STATUS'] = 1;
		}
		else
		{
			$arData['ACCOUNT']['STATUS'] = intval($arPost['account-status']);
		}

		//Название счета
		if (!isset($arPost['account-name']))
		{
			static::$arError['not-isset'][] = "Не задано название счета";
			return false;
		}
		else
		{
			$arData['ACCOUNT']['NAME'] = trim(htmlspecialchars($arPost['account-name']));
			$arData['ACCOUNT']['NAME'] = substr($arData['ACCOUNT']['NAME'],0,20);
		}

		//Примечание счета
		if (isset($arPost['account-description']))
		{
			$arData['ACCOUNT']['DESCRIPTION'] = trim(htmlspecialchars($arPost['account-description']));
		}
		else
		{
			$arData['ACCOUNT']['DESCRIPTION'] = '';
		}

		//Валюта счета
		if (!isset($arPost['account-currency']))
		{
			$currency = Currency::getDefaultCurrency();
			if (!$currency){
				static::$arError['currency'][] = "Не задано тип валюты по умолчанию! Необходимо перейти в настройки и указать валюту по умолчанию!";
				return false;
			}
			else
			{
				$arData['ACCOUNT']['CURRENCY'] = $currency;
			}
		}
		else
		{
			$arData['ACCOUNT']['CURRENCY'] = $arPost['account-currency'];
		}

		$arData['ACCOUNT']['START_BALANCE'] = floatval($arPost['account-start-balance']);
		$arData['ACCOUNT']['CURRENT_MARKET_PRICE'] = floatval($arPost['account-market-price']);

		//Дальнейшие поля зависят от типа счета
		if ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_debet_card)
		{
			/**Дебетовая карта*/
			//Название банка
			if (!isset($arPost['account-bank']) || strlen($arPost['account-bank'])<3)
			{
				static::$arError['not-isset'][] = "Не указано название банка";
				return false;
			}
			else
			{
				$arData['BANK']['BANK_NAME'] = trim(htmlspecialchars($arPost['account-bank']));
			}

			//Тип карты
			$arData['BANK']['CARD_TYPE_ID'] = intval($arPost['account-card-type']);

			//Срок действия
			$month = intval($arPost['account-card-validity-month']);
			$year = intval($arPost['account-card-validity-year']);
			if ($month>0 && $year>0)
			{
				$arData['BANK']['DATE_CARD'] = "01.";
				if ($month >= 1&& $month <= 9) $arData['BANK']['DATE_CARD'] .= "0";
				$arData['BANK']['DATE_CARD'] .= $month.".20".$year;
			}

			//Стоимость ежегодного обслуживания
			$arData['BANK']['ANNUAL_MAINTENANCE_COST'] = floatval($arPost['account-maintenance']);

			//Годовая ставка, %
			$arData['BANK']['ANNUAL_RATE'] = floatval($arPost['account-year-rate']);

			//Снятие наличных в банкомате банка, %
			$arData['BANK']['CASH_BANK_ATM'] = floatval($arPost['account-money-bank']);

			//Снятие наличных в других банкоматах, %
			$arData['BANK']['CASH_OTHER_ATM'] = floatval($arPost['account-money-other']);
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_deposit)
		{
			/**Депозит*/
			//Название банка
			if (!isset($arPost['account-bank']) || strlen($arPost['account-bank'])<3)
			{
				static::$arError['not-isset'][] = "Не указано название банка";
				return false;
			}
			else
			{
				$arData['BANK']['BANK_NAME'] = trim(htmlspecialchars($arPost['account-bank']));
			}

			//Дата открытия
			$day = intval($arPost['account-date-open-day']);
			$month = intval($arPost['account-date-open-month']);
			$year = intval($arPost['account-date-open-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				$nowYear = intval(date("y"));
				if ($day>=1 && $day<=9) $arData['BANK']['DATE_START'] = "0";
				$arData['BANK']['DATE_START'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['BANK']['DATE_START'] .= "0";
				$arData['BANK']['DATE_START'] .= $month.".";
				if ($year>=70 && $year<=99) $arData['BANK']['DATE_START'] .= "19";
				if ($year>=0 && $year<=$nowYear) $arData['BANK']['DATE_START'] .= "20";
				$arData['BANK']['DATE_START'] .= $year;
			}

			//Дата закрытия
			$day = intval($arPost['account-date-close-day']);
			$month = intval($arPost['account-date-close-month']);
			$year = intval($arPost['account-date-close-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				if ($day>=1 && $day<=9) $arData['BANK']['DATE_END'] = "0";
				$arData['BANK']['DATE_END'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['BANK']['DATE_END'] .= "0";
				$arData['BANK']['DATE_END'] .= $month.".20".$year;
			}

			//Годовая ставка, %
			$arData['BANK']['ANNUAL_RATE'] = floatval($arPost['account-year-rate']);

			//Период начисления %
			$arData['BANK']['ACCRUAL_PERIOD'] = intval($arPost['account-period-procent']);

			//Капитализация
			if (isset($arPost['account-capitalization']) && intval($arPost['account-capitalization'])>0)
			{
				$arData['BANK']['CAPITALIZATION'] = true;
			}
			else
			{
				$arData['BANK']['CAPITALIZATION'] = false;
			}

			//Тип депозита
			$arData['BANK']['DEPOSIT_TYPE'] = intval($arPost['account-deposit-type']);
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_emoney)
		{
			/**Электронный кошелек*/
			//Тип электронных денег
			$arData['EMONEY']['EMONEY_TYPE_ID'] = intval($arPost['account-emoney-type']);
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_bank)
		{
			/**Банковский счёт*/
			//Название банка
			if (!isset($arPost['account-bank']) || strlen($arPost['account-bank'])<3)
			{
				static::$arError['not-isset'][] = "Не указано название банка";
				return false;
			}
			else
			{
				$arData['BANK']['BANK_NAME'] = trim(htmlspecialchars($arPost['account-bank']));
			}
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_mne || $arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_i)
		{
			/**Мне должны (заем выданный)*/
			/**Я должен (заем полученный)*/
			//Дата выдачи
			$day = intval($arPost['account-date-open-day']);
			$month = intval($arPost['account-date-open-month']);
			$year = intval($arPost['account-date-open-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				$nowYear = intval(date("y"));
				if ($day>=1 && $day<=9) $arData['DEBT']['DATE_START'] = "0";
				$arData['DEBT']['DATE_START'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['DEBT']['DATE_START'] .= "0";
				$arData['DEBT']['DATE_START'] .= $month.".";
				if ($year>=70 && $year<=99) $arData['DEBT']['DATE_START'] .= "19";
				if ($year>=0 && $year<=$nowYear) $arData['DEBT']['DATE_START'] .= "20";
				$arData['DEBT']['DATE_START'] .= $year;
			}

			//Дата возврата
			$day = intval($arPost['account-date-close-day']);
			$month = intval($arPost['account-date-close-month']);
			$year = intval($arPost['account-date-close-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				if ($day>=1 && $day<=9) $arData['DEBT']['DATE_END'] = "0";
				$arData['DEBT']['DATE_END'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['DEBT']['DATE_END'] .= "0";
				$arData['DEBT']['DATE_END'] .= $month.".20".$year;
			}

			//Email
			$arData['DEBT']['EMAIL'] = trim(htmlspecialchars($arPost['account-email-recipient']));

			//Телефон
			$arData['DEBT']['PHONE'] = trim(htmlspecialchars($arPost['account-phone-recipient']));

			//Годовая ставка, %
			$arData['DEBT']['ANNUAL_RATE'] = floatval($arPost['account-year-rate']);
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_credit_card)
		{
			/**Кредитная карта*/
			//Название банка
			if (!isset($arPost['account-bank']) || strlen($arPost['account-bank'])<3)
			{
				static::$arError['not-isset'][] = "Не указано название банка";
				return false;
			}
			else
			{
				$arData['BANK']['BANK_NAME'] = trim(htmlspecialchars($arPost['account-bank']));
			}

			//Тип карты
			$arData['BANK']['CARD_TYPE_ID'] = intval($arPost['account-card-type']);

			//Срок действия
			$month = intval($arPost['account-card-validity-month']);
			$year = intval($arPost['account-card-validity-year']);
			if ($month>0 && $year>0)
			{
				$arData['BANK']['DATE_CARD'] = "01.";
				if ($month >= 1&& $month <= 9) $arData['BANK']['DATE_CARD'] .= "0";
				$arData['BANK']['DATE_CARD'] .= $month.".20".$year;
			}

			//Кредитный лимит
			$arData['BANK']['CREDIT_LIMIT'] = floatval($arPost['account-credit-limit']);

			//Годовая ставка, %
			$arData['BANK']['ANNUAL_RATE'] = floatval($arPost['account-year-rate']);

			//Льготный период, дней
			$arData['BANK']['GRACE_PERIOD'] = intval($arPost['account-grace-period']);

			//Минимальный платеж, %
			$arData['BANK']['MINIMUM_PAYMENT_PERCENTAGE'] = floatval($arPost['account-minimal-pay']);

			//День минимального платежа
			$arData['BANK']['DAY_MINIMUM_PAYMENT'] = intval($arPost['account-minimal-payday']);

			//Стоимость ежегодного обслуживания
			$arData['BANK']['ANNUAL_MAINTENANCE_COST'] = floatval($arPost['account-maintenance']);

			//Снятие наличных в банкомате банка, %
			$arData['BANK']['CASH_BANK_ATM'] = floatval($arPost['account-money-bank']);

			//Снятие наличных в других банкоматах, %
			$arData['BANK']['CASH_OTHER_ATM'] = floatval($arPost['account-money-other']);
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_credit)
		{
			/**Кредит*/
			//Название банка
			if (!isset($arPost['account-bank']) || strlen($arPost['account-bank'])<3)
			{
				static::$arError['not-isset'][] = "Не указано название банка";
				return false;
			}
			else
			{
				$arData['BANK']['BANK_NAME'] = trim(htmlspecialchars($arPost['account-bank']));
			}

			//Годовая ставка, %
			$arData['BANK']['ANNUAL_RATE'] = floatval($arPost['account-year-rate']);

			//Тип платежа (0 - аннуитетный, 1 - дифференцированный)
			$arData['BANK']['PAYMENT_TYPE'] = intval($arPost['account-payment-type']);

			//Дата открытия
			$day = intval($arPost['account-date-open-day']);
			$month = intval($arPost['account-date-open-month']);
			$year = intval($arPost['account-date-open-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				$nowYear = intval(date("y"));
				if ($day>=1 && $day<=9) $arData['BANK']['DATE_START'] = "0";
				$arData['BANK']['DATE_START'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['BANK']['DATE_START'] .= "0";
				$arData['BANK']['DATE_START'] .= $month.".";
				if ($year>=70 && $year<=99) $arData['BANK']['DATE_START'] .= "19";
				if ($year>=0 && $year<=$nowYear) $arData['BANK']['DATE_START'] .= "20";
				$arData['BANK']['DATE_START'] .= $year;
			}

			//Дата закрытия
			$day = intval($arPost['account-date-close-day']);
			$month = intval($arPost['account-date-close-month']);
			$year = intval($arPost['account-date-close-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				if ($day>=1 && $day<=9) $arData['BANK']['DATE_END'] = "0";
				$arData['BANK']['DATE_END'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['BANK']['DATE_END'] .= "0";
				$arData['BANK']['DATE_END'] .= $month.".20".$year;
			}

			//Единоразовая комиссия, %
			$arData['BANK']['ONE_TIME_FEE'] = floatval($arPost['account-one-time-fee']);

			//Ежемесячная комиссия, %
			$arData['BANK']['MONTHLY_FEE'] = floatval($arPost['account-monthly-fee']);
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_estate)
		{
			/**Недвижимость*/
			//Тип имущества (1 - дом, 2 - квартира)
			$arData['ESTATE']['ESTATE_TYPE'] = intval($arPost['account-real-estate-type']);

			//Площадь общая, кв.м.
			$arData['ESTATE']['TOTAL_AREA'] = floatval($arPost['account-real-estate-total-area']);

			//Полезная площадь, кв.м.
			$arData['ESTATE']['AREA_USEFUL'] = floatval($arPost['account-real-estate-useful-area']);

			//Только для типа недвижимости "Дом" необходимы следующие поля
			if ($arData['ESTATE']['ESTATE_TYPE'] == static::$e_house)
			{
				//Площадь земельного участка, сот.
				$arData['ESTATE']['LAND_AREA'] = floatval($arPost['account-real-estate-land-area']);

				//Удаленность от города, км.
				$arData['ESTATE']['DISTANCE_TOWN'] = floatval($arPost['account-real-estate-town-distance']);
			}
			//Этаж
			$arData['ESTATE']['FLOOR'] = floatval($arPost['account-real-estate-floor']);

			//Этажность дома
			$arData['ESTATE']['FLOORS'] = floatval($arPost['account-real-estate-floors']);

			//Город
			$arData['ESTATE']['CITY'] = trim(htmlspecialchars($arPost['account-real-estate-city']));

			//Район
			$arData['ESTATE']['AREA'] = trim(htmlspecialchars($arPost['account-real-estate-area']));

			//Дата покупки
			$day = intval($arPost['account-real-estate-date-buy-day']);
			$month = intval($arPost['account-real-estate-date-buy-month']);
			$year = intval($arPost['account-real-estate-date-buy-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				if ($day>=1 && $day<=9) $arData['ESTATE']['DATE_BUY'] = "0";
				$arData['ESTATE']['DATE_BUY'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['ESTATE']['DATE_BUY'] .= "0";
				$arData['ESTATE']['DATE_BUY'] .= $month.".".$year;
			}
		}
		elseif ($arData['ACCOUNT']['ACCOUNT_TYPE_ID'] == static::$a_car)
		{
			/**Автомобиль*/
			//Марка
			$arData['CAR']['BRAND'] = trim(htmlspecialchars($arPost['account-auto-brand']));

			//Модель
			$arData['CAR']['MODEL'] = trim(htmlspecialchars($arPost['account-auto-model']));

			//Модификация
			$arData['CAR']['MODIFICATION'] = trim(htmlspecialchars($arPost['account-auto-modification']));

			//Тип топлива
			$arData['CAR']['FUEL_TYPE_ID'] = intval($arPost['account-auto-fuel-type']);

			//Тип коробки передач
			$arData['CAR']['GEARBOX_TYPE_ID'] = intval($arPost['account-auto-gearbox-type']);

			//Цвет
			$arData['CAR']['COLOR_ID'] = intval($arPost['account-auto-color']);

			//Год выпуска
			$arData['CAR']['CREATE_YEAR'] = intval($arPost['account-auto-year']);

			//Объем двигателя, л
			$arData['CAR']['ENGINE'] = floatval($arPost['account-auto-engine']);

			//Регион регистации
			$arData['CAR']['REGION_ID'] = intval($arPost['account-auto-region']);

			//Начальный пробег, км.
			$arData['CAR']['START_ODO'] = floatval($arPost['account-auto-start-odo']);

			//Дата покупки
			$day = intval($arPost['account-auto-date-buy-day']);
			$month = intval($arPost['account-auto-date-buy-month']);
			$year = intval($arPost['account-auto-date-buy-year']);
			if ($day>0 && $month>0 && $year>0)
			{
				if ($day>=1 && $day<=9) $arData['CAR']['DATE_BUY'] = "0";
				$arData['CAR']['DATE_BUY'] .= $day.".";
				if ($month>=1 && $month<=9) $arData['CAR']['DATE_BUY'] .= "0";
				$arData['CAR']['DATE_BUY'] .= $month.".".$year;
			}
		}

		return static::addAccount($arData);
	}

	public static function getAccountsList ()
	{
		$arAccounts = array();
		$arRes = Tables\AccountsTable::getList(array(
			'select' => array(
				'ID',
				'ACCOUNT_TYPE_ID',
				'ACCOUNT_TYPE_ID.NAME' => 'ACCOUNT_TYPE_NAME',
				'STATUS',
				'NAME',
				'DESCRIPTION',
				'START_BALANCE',
				'CURRENT_MARKET_PRICE',
				'CURRENCY'
			)//,
			//'filter' => array('STATUS'=>2)//,
			//'order' => array('NAME'=>'ASC')
		));
		//msDebug($arRes);
		if ($arRes)
		{
			foreach ($arRes as $ar_res)
			{
				$ar_res['BALANCE'] = static::getAccountBalance($ar_res['ID']);

				if ($ar_res['STATUS']==0)
				{
					//Скрытый
					$accountCode = 'HIDDEN';
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID']>=static::$a_cash && $ar_res['ACCOUNT_TYPE_ID']<=static::$a_bank)
				{
					//Деньги
					$accountCode = 'MONEY';
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID']==static::$a_mne)
				{
					//Мне должны
					$accountCode = 'ME';
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID']>=static::$a_i && $ar_res['ACCOUNT_TYPE_ID']<=static::$a_credit)
				{
					//Я должел
					$accountCode = 'I_AM';
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID']>=static::$a_broker && $ar_res['ACCOUNT_TYPE_ID']<=static::$a_pamm)
				{
					//Инвестиции
					$accountCode = 'INVEST';
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID']>=static::$a_estate && $ar_res['ACCOUNT_TYPE_ID']<=static::$a_air)
				{
					//Имущество
					$accountCode = 'ESTATE';
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID']==static::$a_bonus)
				{
					//Карты лояльности
					$accountCode = 'BONUS';
				}
				else
				{
					//Если что-то пошло не так, делаем счет скрытым
					$accountCode = 'HIDDEN';
				}

				$arData = $ar_res;
				$arData['BALANCE_SHOW'] = number_format(
					floor($ar_res['BALANCE']),
					0,
					'.',
					'&nbsp;'
				);
				//Далее идет запрос дополнительных параметров баланса для вывода, в зависимости от типа счета
				if ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_cash)
				{
					//Наличные
					$arData['ADDITIONAL'] = static::getAdditionalInfoCash($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_debet_card)
				{
					//Дебетовая карта
					$arData['ADDITIONAL'] = static::getAdditionalInfoDebetCard($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_deposit)
				{
					//Дебетовая карта
					$arData['ADDITIONAL'] = static::getAdditionalInfoDeposit($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_emoney)
				{
					//Электронный кошелек
					$arData['ADDITIONAL'] = static::getAdditionalInfoEMoney($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_bank)
				{
					//Банковский счет
					$arData['ADDITIONAL'] = static::getAdditionalInfoBank($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_mne)
				{
					//Мне должны
					$arData['ADDITIONAL'] = static::getAdditionalInfoMe($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_i)
				{
					//Я должен
					$arData['ADDITIONAL'] = static::getAdditionalInfoIam($ar_res);
				}
				elseif ($ar_res['ACCOUNT_TYPE_ID'] == static::$a_credit_card)
				{
					//Кредитная карта
					$arData['ADDITIONAL'] = static::getAdditionalInfoCreditCard($ar_res);
				}


				$arAccounts[$accountCode]['DATA'][$ar_res['ID']] = $arData;
				if (!isset($arAccounts[$accountCode]['SUM'])) $arAccounts[$accountCode]['SUM'] = 0;
				$arAccounts[$accountCode]['SUM'] += $ar_res['BALANCE'];
				if ($ar_res['STATUS']==2)
				{
					$arAccounts['LIKE']['DATA'][$ar_res['ID']] = $arData;
					if (!isset($arAccounts['LIKE']['SUM'])) $arAccounts['LIKE']['SUM'] = 0;
					$arAccounts['LIKE']['SUM'] += $ar_res['BALANCE'];
				}
			}
		}

		//msDebug($arAccounts);

		if (empty($arAccounts))
		{
			return false;
		}
		else
		{
			return $arAccounts;
		}
	}

	protected static function getAdditionalInfoCash ($ar_res)
	{
		$arAdditional = array();
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		if (strlen($ar_res['DESCRIPTION'])>0)
		{
			$arAdditional[] = array(
				'NAME' => 'Описание',
				'VALUE' => $ar_res['DESCRIPTION']
			);
		}
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);

		return $arAdditional;
	}

	protected static function getAdditionalInfoDebetCard ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountBankInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Банк',
				'VALUE' => $arRes2['BANK_NAME']
			);
		}
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Срок действия карты',
				'VALUE' => $arRes2['DATE_CARD']
			);
			$arAdditional[] = array(
				'NAME' => 'Стоимость годового обслуживания',
				'VALUE' => number_format($arRes2['ANNUAL_MAINTENANCE_COST'],2,'.','&nbsp;')
			);
			$arAdditional[] = array(
				'NAME' => 'Годовая ставка на остаток, %',
				'VALUE' => number_format($arRes2['ANNUAL_RATE'],2,'.','&nbsp;')
			);
		}

		return $arAdditional;
	}

	protected static function getAdditionalInfoDeposit ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountBankInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Банк',
				'VALUE' => $arRes2['BANK_NAME']
			);
		}
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Годовая ставка, %',
				'VALUE' => number_format($arRes2['ANNUAL_RATE'],2,'.',' ')
			);
			$arAdditional[] = array(
				'NAME' => 'Дата открытия',
				'VALUE' => $arRes2['DATE_START']
			);
			$arAdditional[] = array(
				'NAME' => 'Дата закрытия',
				'VALUE' => $arRes2['DATE_END']
			);
			$arAdditional[] = array(
				'NAME' => 'Период начисления %',
				'VALUE' => $arRes2['ACCRUAL_PERIOD_NAME']
			);
			$arAdditional[] = array(
				'NAME' => 'Капитализация',
				'VALUE' => $arRes2['CAPITALIZATION_NAME']
			);
			$arAdditional[] = array(
				'NAME' => 'Тип депозита',
				'VALUE' => $arRes2['DEPOSIT_TYPE_NAME']
			);
		}

		return $arAdditional;
	}

	protected static function getAdditionalInfoEMoney ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountEMoneyInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Тип эл. денег',
				'VALUE' => $arRes2['EMONEY_TYPE_NAME']
			);
		}

		return $arAdditional;
	}

	protected static function getAdditionalInfoBank ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountBankInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Банк',
				'VALUE' => $arRes2['BANK_NAME']
			);
		}
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);

		return $arAdditional;
	}

	protected static function getAdditionalInfoMe ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountDebtInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Годовая ставка, %',
				'VALUE' => $arRes2['ANNUAL_RATE']
			);
			$arAdditional[] = array(
				'NAME' => 'Дата выдачи',
				'VALUE' => $arRes2['DATE_START']
			);
			$arAdditional[] = array(
				'NAME' => 'Дата возврата',
				'VALUE' => $arRes2['DATE_END']
			);
			$arAdditional[] = array(
				'NAME' => 'Email получателя',
				'VALUE' => $arRes2['EMAIL']
			);
			$arAdditional[] = array(
				'NAME' => 'Телефон получателя',
				'VALUE' => $arRes2['PHONE']
			);
		}

		return $arAdditional;
	}

	protected static function getAdditionalInfoIam ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountDebtInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Годовая ставка, %',
				'VALUE' => $arRes2['ANNUAL_RATE']
			);
			$arAdditional[] = array(
				'NAME' => 'Дата получения',
				'VALUE' => $arRes2['DATE_START']
			);
			$arAdditional[] = array(
				'NAME' => 'Дата погашения',
				'VALUE' => $arRes2['DATE_END']
			);
			$arAdditional[] = array(
				'NAME' => 'Email кредитора',
				'VALUE' => $arRes2['EMAIL']
			);
			$arAdditional[] = array(
				'NAME' => 'Телефон кредитора',
				'VALUE' => $arRes2['PHONE']
			);
		}

		return $arAdditional;
	}

	protected static function getAdditionalInfoCreditCard ($ar_res)
	{
		$arAdditional = array();

		$arRes2 = static::getAccountBankInfoByAccountID($ar_res['ID']);
		$arAdditional[] = array(
			'NAME' => 'Название',
			'VALUE' => $ar_res['NAME']
		);
		$arAdditional[] = array(
			'NAME' => 'Тип',
			'VALUE' => $ar_res['ACCOUNT_TYPE_NAME']
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Банк',
				'VALUE' => $arRes2['BANK_NAME']
			);
		}
		$arAdditional[] = array(
			'NAME' => 'Остаток',    //В валюте счета
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		$arAdditional[] = array(
			'NAME' => 'Остаток в валюте по умолчанию',
			'VALUE' => number_format($ar_res['BALANCE'],2,'.','&nbsp;')
		);
		if ($arRes2)
		{
			$arAdditional[] = array(
				'NAME' => 'Срок действия карты',
				'VALUE' => $arRes2['DATE_CARD']
			);
			$arAdditional[] = array(
				'NAME' => 'Тип карты',
				'VALUE' => $arRes2['CARD_TYPE_NAME']
			);
			$arAdditional[] = array(
				'NAME' => 'Кредитный лимит',
				'VALUE' => number_format($arRes2['CREDIT_LIMIT'],2,'.','&nbsp;')
			);
			$arAdditional[] = array(
				'NAME' => 'Льготный период, дней',
				'VALUE' => $arRes2['GRACE_PERIOD']
			);
			$arAdditional[] = array(
				'NAME' => 'День минимального платежа',
				'VALUE' => $arRes2['DAY_MINIMUM_PAYMENT']
			);
			$arAdditional[] = array(
				'NAME' => 'Стоимость ежегодного обслуживания',
				'VALUE' => number_format($arRes2['ANNUAL_MAINTENANCE_COST'],2,'.','&nbsp;')
			);
			$balance = $ar_res['BALANCE'];
			if ($balance>0) $balance = $balance * (-1);
			$arAdditional[] = array(
				'NAME' => 'Остаток кредитных средств',
				'VALUE' => number_format(($arRes2['CREDIT_LIMIT']+$balance),2,'.','&nbsp;')
			);
		}

		return $arAdditional;
	}

	protected static function getAccountBankInfoByAccountID ($accountID)
	{
		$arRes = Tables\AccountBankTable::getList(array(
			'select' => array(
				'ID',
				'ACCOUNT_ID',
				'BANK_NAME',
				'CARD_TYPE_ID',
				'CARD_TYPE_ID.NAME' => 'CARD_TYPE_NAME',
				'DATE_CARD',
				'CREDIT_LIMIT',
				'ANNUAL_RATE',
				'GRACE_PERIOD',
				'MINIMUM_PAYMENT_PERCENTAGE',
				'DAY_MINIMUM_PAYMENT',
				'CASH_BANK_ATM',
				'CASH_OTHER_ATM',
				'ANNUAL_MAINTENANCE_COST',
				'PAYMENT_TYPE',
				'DATE_START',
				'DATE_END',
				'ONE_TIME_FEE',
				'MONTHLY_FEE',
				'ACCRUAL_PERIOD',
				'CAPITALIZATION',
				'DEPOSIT_TYPE'
			),
			'filter' => array('ACCOUNT_ID'=>$accountID)
		));
		if ($arRes)
		{
			$arRes = $arRes[0];
			$arRes['DATE_CARD'] = substr($arRes['DATE_CARD'],3);
			$arRes['DATE_CARD'] = str_replace('.','/',$arRes['DATE_CARD']);
			if ($arRes['PAYMENT_TYPE']==1)
			{
				$arRes['PAYMENT_TYPE_NAME'] = 'Аннуитетный';
			}
			else
			{
				$arRes['PAYMENT_TYPE_NAME'] = 'Дифференцированный';
			}
			if ($arRes['DATE_START']=='30.11.1999')
			{
				$arRes['DATE_START'] = null;
			}
			if ($arRes['DATE_END']=='30.11.1999')
			{
				$arRes['DATE_END'] = null;
			}
			switch ($arRes['ACCRUAL_PERIOD'])
			{
				case 1:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'В конце срока';
					break;
				case 2:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Ежедневно';
					break;
				case 3:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Еженедельно';
					break;
				case 4:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Ежемесячно на дату вложения';
					break;
				case 5:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Ежемесячно в последний день месяца';
					break;
				case 6:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Ежемесячно в первый день месяца';
					break;
				case 7:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Раз в три месяца на день вклада';
					break;
				case 8:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Ежеквартально в последний день квартала';
					break;
				case 9:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Раз в полугодие';
					break;
				case 10:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Раз в год';
					break;
				case 11:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Через заданный интервал';
					break;
				default:
					$arRes['ACCRUAL_PERIOD_NAME'] = 'Не задано';
					break;
			}
			switch ($arRes['DEPOSIT_TYPE'])
			{
				case 1:
					$arRes['DEPOSIT_TYPE_NAME'] = 'Непополняемый';
					break;
				case 2:
					$arRes['DEPOSIT_TYPE_NAME'] = 'Пополняемый';
					break;
				default:
					$arRes['DEPOSIT_TYPE_NAME'] = 'Не задано';
					break;
			}
			if ($arRes['CAPITALIZATION'])
			{
				$arRes['CAPITALIZATION_NAME'] = 'Да';
			}
			else
			{
				$arRes['CAPITALIZATION_NAME'] = 'Нет';
			}
		}

		return $arRes;
	}

	protected static function getAccountEMoneyInfoByAccountID ($accountID)
	{
		$arRes = Tables\AccountEmoneyTable::getList(array(
			'select' => array(
				'ID',
				'ACCOUNT_ID',
				'EMONEY_TYPE_ID',
				'EMONEY_TYPE_ID.NAME' => 'EMONEY_TYPE_NAME'
			),
			'filter' => array('ACCOUNT_ID'=>$accountID)
		));
		if ($arRes)
		{
			$arRes = $arRes[0];
		}

		return $arRes;
	}

	protected static function getAccountDebtInfoByAccountID ($accountID)
	{
		$arRes = Tables\AccountDebtsTable::getList(array(
			'filter' => array('ACCOUNT_ID'=>$accountID)
		));
		if ($arRes)
		{
			$arRes = $arRes[0];
		}

		return $arRes;
	}

	protected static function getAccountBalance ($accountID)
	{
		$arRes = Tables\AccountsTable::getList(array(
			'select' => array('START_BALANCE'),
			'filter' => array('ID'=>$accountID)
		));
		$fSum = 0;
		if ($arRes)
		{
			$fSum += floatval($arRes[0]['START_BALANCE']);
		}

		//TODO: Далее будет запрос операций по данному счету

		return $fSum;
	}

	protected static function addAccount ($arData)
	{
		msDebug($arData);
		$arAccount = $arData['ACCOUNT'];
		$query = new Entity\Query('insert');
		$query->setInsertParams(
			$arAccount,
			Tables\AccountsTable::getTableName(),
			Tables\AccountsTable::getMapArray()
		);
		$res = $query->exec();
		$accountID = $res->getInsertId();
		if ($accountID)
		{
			if ($arAccount['ACCOUNT_TYPE_ID']==static::$a_debet_card        //Дебетовая карта
				|| $arAccount['ACCOUNT_TYPE_ID']==static::$a_deposit        //Депозит
				|| $arAccount['ACCOUNT_TYPE_ID']==static::$a_bank           //Банковский счёт
				|| $arAccount['ACCOUNT_TYPE_ID']==static::$a_credit_card    //Кредитная карта
				|| $arAccount['ACCOUNT_TYPE_ID']==static::$a_credit         //Кредит
			)
			{
				$arBank = $arData['BANK'];
				$arBank['ACCOUNT_ID'] = $accountID;
				$query = new Entity\Query('insert');
				$query->setInsertParams(
					$arBank,
					Tables\AccountBankTable::getTableName(),
					Tables\AccountBankTable::getMapArray()
				);
				$res = $query->exec();
				$bankID = $res->getInsertId();
				if (!$bankID)
				{
					static::deleteAccount($accountID,true);
					return false;
				}
			}
			elseif ($arAccount['ACCOUNT_TYPE_ID']==static::$a_emoney)   //Электронный кошелёк
			{
				$arEMoney = $arData['EMONEY'];
				$arEMoney['ACCOUNT_ID'] = $accountID;
				$query = new Entity\Query('insert');
				$query->setInsertParams(
					$arEMoney,
					Tables\AccountEmoneyTable::getTableName(),
					Tables\AccountEmoneyTable::getMapArray()
				);
				$res = $query->exec();
				$emoneyID = $res->getInsertId();
				if (!$emoneyID)
				{
					static::deleteAccount($accountID,true);
					return false;
				}
			}
			elseif ($arAccount['ACCOUNT_TYPE_ID']==static::$a_mne    //Мне должны (заем выданный)
				|| $arAccount['ACCOUNT_TYPE_ID']==static::$a_i     //Я должен (заем полученный)
			)
			{
				$arDebts = $arData['DEBT'];
				$arDebts['ACCOUNT_ID'] = $accountID;
				$query = new Entity\Query('insert');
				$query->setInsertParams(
					$arDebts,
					Tables\AccountDebtsTable::getTableName(),
					Tables\AccountDebtsTable::getMapArray()
				);
				$res = $query->exec();
				$debtsID = $res->getInsertId();
				if (!$debtsID)
				{
					static::deleteAccount($accountID,true);
					return false;
				}
			}
			elseif ($arAccount['ACCOUNT_TYPE_ID']==static::$a_estate)  //Недвижимость
			{
				$arEstate = $arData['ESTATE'];
				$arEstate['ACCOUNT_ID'] = $accountID;
				$query = new Entity\Query('insert');
				$query->setInsertParams(
					$arEstate,
					Tables\AccountRealEstateTable::getTableName(),
					Tables\AccountRealEstateTable::getMapArray()
				);
				$res = $query->exec();
				$estateID = $res->getInsertId();
				if (!$estateID)
				{
					static::deleteAccount($accountID,true);
					return false;
				}
			}
			elseif ($arAccount['ACCOUNT_TYPE_ID']==static::$a_car)  //Автомобиль
			{
				$arCar = $arData['CAR'];
				$arCar['ACCOUNT_ID'] = $accountID;
				$query = new Entity\Query('insert');
				$query->setInsertParams(
					$arCar,
					Tables\AccountCarTable::getTableName(),
					Tables\AccountCarTable::getMapArray()
				);
				$res = $query->exec();
				$carID = $res->getInsertId();
				if (!$carID)
				{
					static::deleteAccount($accountID,true);
					return false;
				}
			}

			return true;
		}
		else
		{
			return false;
		}
	}



	protected static function deleteAccount ($primary,$confirm=null)
	{
		$query = new Entity\Query('delete');
		$query->setDeleteParams(
			$primary,
			$confirm,
			Tables\AccountsTable::getTableName(),
			Tables\AccountsTable::getMapArray(),
			Tables\AccountsTable::getTableLinks()
		);
		$res = $query->exec();
	}


}