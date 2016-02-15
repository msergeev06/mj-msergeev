<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Мои машины - Редактирование автомобиля");

use \MSergeev\Packages\Icar\Lib;

if (isset($_POST['step']))
{
}
else
{
	if (isset($_REQUEST['car']) && intval ($_REQUEST['car']) > 0)
	{
		$carID = $_REQUEST['car'];
	} else
	{
		$carID = Lib\MyCar::getDefaultCarID ();
	}

	$arCar = Lib\MyCar::getCarByID ($carID);
	msDebug ($arCar);
}
?>
<form name="car_add" method="post" action="">
	<input type="hidden" name="step" value="1">
	<table class="car_add">
		<tr>
			<td>Название авто:</td>
			<td><?=InputType('text','car_name',$arCar['NAME'],'',false,'','class="car_name"')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Автомобиль активен:</td>
			<td><?=SelectBoxBool('car_active',(($arCar['ACTIVE'])?1:0))?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Сортировка:</td>
			<td><?=InputType('text','car_sort',$arCar['SORT'],'',false,'','class="car_sort"')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Марка авто:</td>
			<td><?=Lib\CarBrand::getHtmlSelect($arCar['CAR_BRANDS_ID'])?></td>
			<td>&nbsp;</td>
		</tr>
		<?if($arCar['CAR_BRANDS_ID']>0):?>
			<tr>
				<td>Выберите модель:</td>
				<td class="td_model"><?=Lib\CarModel::getHtmlSelect($arCar['CAR_BRANDS_ID'], $arCar['CAR_MODEL_ID'])?></td>
				<td>&nbsp;</td>
			</tr>
		<?else:?>
		<tr>
			<td>Добавьте модель:</td>
			<td class="td_model"><?=InputType('text','car_model_text','','',false,'','class="car_model_text"')?></td>
			<td>&nbsp;</td>
		</tr>
		<?endif;?>
		<tr>
			<td>Год выпуска:</td>
			<td><?=InputType('text','car_year',$arCar['YEAR'],'',false,'','class="car_year"')?></td>
			<td class="td_year_error error">&nbsp;</td>
		</tr>
		<tr>
			<td>VIN:</td>
			<td><?=InputType('text','car_vin',$arCar['VIN'],'',false,'','class="car_vin"')?></td>
			<td>Цифры и латинские буквы</td>
		</tr>
		<tr>
			<td>Гос номер:</td>
			<td><?=InputType('text','car_number',$arCar['CAR_NUMBER'],'',false,'','class="car_number"')?></td>
			<td>Цифры и латинские буквы</td>
		</tr>
		<tr>
			<td>Объём двигателя:</td>
			<td><?=InputType('text','car_engine',$arCar['ENGINE_CAPACITY'],'',false,'','class="car_engine"')?></td>
			<td>литра</td>
		</tr>
		<tr>
			<td>КПП:</td>
			<td><?=Lib\CarGearbox::getHtmlSelect($arCar['CAR_GEARBOX_ID'])?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Тип кузова:</td>
			<td><?=Lib\CarBody::getHtmlSelect($arCar['CAR_BODY_ID'])?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Интервал прохождения ТО:</td>
			<td><?=InputType('text','car_ts',$arCar['INTERVAL_TS'],'',false,'','class="car_ts"')?></td>
			<td>км</td>
		</tr>
		<tr>
			<td>Стоимость при покупке:</td>
			<td><?=InputType('text','car_cost',Lib\Main::moneyFormat($arCar['COST'],true),'',false,'','class="car_cost"')?></td>
			<td>руб.</td>
		</tr>
		<tr>
			<td>Пробег при покупке:</td>
			<td><?=InputType('text','car_mileage',Lib\Main::mileageFormat($arCar['MILEAGE'],true),'',false,'','class="car_mileage"')?></td>
			<td>км</td>
		</tr>
		<tr>
			<td>Автомобиль в кредит:</td>
			<td><?=SelectBoxBool('car_credit',(($arCar['CREDIT'])?1:0))?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Сумма кредита:</td>
			<td><?=InputType('text','car_credit_cost',Lib\Main::moneyFormat($arCar['CREDIT_COST'],true),'',false,'','class="car_credit_cost"')?></td>
			<td>руб.</td>
		</tr>
		<tr>
			<td>Дата окончания ОСАГО:</td>
			<td><?=InputCalendar('car_osago',$arCar['DATE_OSAGO_END'],'class="car_osago"')?></td>
			<td>Настроить напоминание</td>
		</tr>
		<tr>
			<td>Дата окончания ГТО:</td>
			<td><?=InputCalendar('car_gto',$arCar['DATE_GTO_END'],'class="car_gto"')?></td>
			<td>Настроить напоминание</td>
		</tr>
		<tr>
			<td>Автомобиль по-умолчанию:</td>
			<td><?=SelectBoxBool('car_default',(($arCar['DEFAULT'])?1:0))?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><input class="submit" type="submit" name="submit" value="Сохранить изменения"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</form>

<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("icar")."include/footer.php"); ?>
