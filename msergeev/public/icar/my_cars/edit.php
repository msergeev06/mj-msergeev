<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Мои машины - Редактирование автомобиля");

use \MSergeev\Packages\Icar\Lib;
$arCar = Lib\MyCar::getCarByID();
?>
<form name="car_add" method="post" action="">
	<input type="hidden" name="step" value="1">
	<table class="car_add">
		<tr>
			<td>Название авто:</td>
			<td><?=InputType('text','car_name','','',false,'','class="car_name"')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Автомобиль активен:</td>
			<td><?=SelectBoxBool('car_active',1)?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Сортировка:</td>
			<td><?=InputType('text','car_sort','500','',false,'','class="car_sort"')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Марка авто:</td>
			<td><?=Lib\CarBrand::getHtmlSelect()?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Модель:</td>
			<td class="td_model"><?=InputType('text','car_model_text','','',false,'','class="car_model_text"')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Год выпуска:</td>
			<td><?=InputType('text','car_year','','',false,'','class="car_year"')?></td>
			<td class="td_year_error error">&nbsp;</td>
		</tr>
		<tr>
			<td>VIN:</td>
			<td><?=InputType('text','car_vin','','',false,'','class="car_vin"')?></td>
			<td>Цифры и латинские буквы</td>
		</tr>
		<tr>
			<td>Гос номер:</td>
			<td><?=InputType('text','car_number','','',false,'','class="car_number"')?></td>
			<td>Цифры и латинские буквы</td>
		</tr>
		<tr>
			<td>Объём двигателя:</td>
			<td><?=InputType('text','car_engine','','',false,'','class="car_engine"')?></td>
			<td>литра</td>
		</tr>
		<tr>
			<td>КПП:</td>
			<td><?=Lib\CarGearbox::getHtmlSelect()?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Тип кузова:</td>
			<td><?=Lib\CarBody::getHtmlSelect()?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Интервал прохождения ТО:</td>
			<td><?=InputType('text','car_ts','','',false,'','class="car_ts"')?></td>
			<td>км</td>
		</tr>
		<tr>
			<td>Стоимость при покупке:</td>
			<td><?=InputType('text','car_cost','','',false,'','class="car_cost"')?></td>
			<td>руб.</td>
		</tr>
		<tr>
			<td>Пробег при покупке:</td>
			<td><?=InputType('text','car_mileage','','',false,'','class="car_mileage"')?></td>
			<td>км</td>
		</tr>
		<tr>
			<td>Автомобиль в кредит:</td>
			<td><?=SelectBoxBool('car_credit')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Сумма кредита:</td>
			<td><?=InputType('text','car_credit_cost','','',false,'','class="car_credit_cost"')?></td>
			<td>руб.</td>
		</tr>
		<tr>
			<td>Дата окончания ОСАГО:</td>
			<td><?=InputCalendar('car_osago','','class="car_osago"')?></td>
			<td>Настроить напоминание</td>
		</tr>
		<tr>
			<td>Дата окончания ГТО:</td>
			<td><?=InputCalendar('car_gto','','class="car_gto"')?></td>
			<td>Настроить напоминание</td>
		</tr>
		<tr>
			<td>Автомобиль по-умолчанию:</td>
			<td><?=SelectBoxBool('car_default')?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><input class="submit" type="submit" name="submit" value="Добавить"></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</form>

<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("icar")."include/footer.php"); ?>
