<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Мои машины - Добавление автомобиля");

use \MSergeev\Packages\Icar\Lib;

?>

<table class="car_add">
	<tr>
		<td>Марка авто:</td>
		<td><?=Lib\CarBrand::getHtmlSelect()?></td>
		<td></td>
	</tr>
	<tr>
		<td>Модель:</td>
		<td><?=InputType('text','car_model','','',false,'','class="car_model"')?></td>
		<td><?=Lib\CarModel::getHtmlSelect()?></td>
	</tr>
	<tr>
		<td>Год выпуска:</td>
		<td><?=InputType('text','car_year','','',false,'','class="car_year"')?></td>
		<td></td>
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
		<td></td>
	</tr>
	<tr>
		<td>Тип кузова:</td>
		<td><?=Lib\CarBody::getHtmlSelect()?></td>
		<td></td>
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
		<td></td>
	</tr>
	<tr>
		<td>Сумма кредита:</td>
		<td><?=InputType('text','car_credit','','',false,'','class="car_credit"')?></td>
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
		<td><input type="submit" name="submit" value="Добавить"></td>
		<td></td>
	</tr>
</table>

</table>
<script type="text/javascript">
	$(document).on("ready",function(){
		$('#car_brand').on('change',function(){
			alert('OK');
		});
	});
</script>
<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("icar")."include/footer.php"); ?>
