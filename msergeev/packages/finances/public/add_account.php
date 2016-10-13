<? include_once(__DIR__."/include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Добавить счёт"); ?>
<?
use MSergeev\Packages\Finances\Lib\Accounts;
if (isset($_POST["action"]))
{
	//Обрабатываем форму
	if (Accounts::addAccountFromPost($_POST))
	{
		//OK
	}
	else
	{
		//ERROR
	}
}
?>
<form id="add-account" name="add-account" method="post">
	<div class="form-element account-type clearfix">
		<label>Тип счета:</label>
		<?=Accounts::showSelectAccountType('account-type','account-type');?>
	</div>
	<div class="form-element account-status clearfix">
		<label>Статус:</label>
		<input type="radio" name="account-status" value="1" checked> Обычный
		<input type="radio" name="account-status" value="2"> <span class="img-like"></span> Избранный
		<input type="radio" name="account-status" value="0"> <span class="img-hidden"></span> Скрытый
	</div>
	<div class="form-element account-bank clearfix" style="display: none">
		<label>Банк:</label>
		<input type="text" name="account-bank" value="">
	</div>
	<div class="form-element account-emoney-type clearfix" style="display: none">
		<label>Тип электронных денег</label>
		<?=Accounts::showSelectEMoneyType('account-emoney-type');?>
	</div>
	<div class="form-element account-name clearfix">
		<label>Название:</label>
		<input type="text" name="account-name" value="">
	</div>
	<div class="form-element account-description clearfix">
		<label>Примечание:</label>
		<textarea name="account-description"></textarea>
	</div>
	<div class="form-element account-start-balance clearfix">
		<label id="start-balance">Начальный баланс:</label>
		<label id="start-debt" style="display: none">Начальный долг:</label>
		<label id="start-debet" style="display: none">Начальная задолженность:</label>
		<label id="price-buy" style="display: none">Цена покупки:</label>
		<input type="text" name="account-start-balance" value="0">
	</div>
	<div class="form-element account-market-price clearfix" style="display: none">
		<label>Текущая рыночная стоимость:</label>
		<input type="text" name="account-market-price" value="">
	</div>
	<div class="form-element account-currency clearfix">
		<label>Валюта счёта:</label>
		<select name="account-currency">
			<option value="RUB">Р - Российский рубль</option>
			<option value="USD">$ - Доллар США</option>
			<option value="EUR">&euro; - Евро</option>
		</select>
		<div class="setup-link"><a href="#">Настроить валюты</a></div>
	</div>
	<div class="button-additional" style="display: none">Дополнительные настройки</div>
	<div class="additional" style="display: none">
		<div class="form-element account-card-type" style="display: none">
			<label>Тип карты:</label>
			<?=Accounts::showSelectCardType('account-card-type');?>
		</div>
		<div class="form-element account-card-validity" style="display: none">
			<label>Срок действия карты:</label>
			<select name="account-card-validity-month">
				<option value="0">&nbsp;</option>
				<?for($i=1;$i<=12;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-card-validity-year">
				<option value="0">&nbsp;</option>
				<? $year = intval(date("y")); ?>
				<?for($i=$year;$i<=50;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-date-open" style="display: none">
			<label id="date-open" style="display: none">Дата открытия</label>
			<label id="date-extradition" style="display: none">Дата выдачи</label>
			<label id="date-receipt" style="display: none">Дата получения</label>
			<select name="account-date-open-day">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=31;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-date-open-month">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=12;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-date-open-year">
				<option value="0" selected>&nbsp;</option>
				<? $year = intval(date("y")); ?>
				<?for($i=70;$i<=($year+100);$i++):?>
					<? if ($i>=100) $n=$i-100; else $n = $i; ?>
					<option value="<?=$n?>"><?if($n>=0 && $n<=9):?>0<?endif;?><?=$n?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-date-close" style="display: none">
			<label id="date-close" style="display: none">Дата закрытия</label>
			<label id="date-return" style="display: none">Дата возврата</label>
			<label id="date-repayment" style="display: none">Дата погашения</label>
			<select name="account-date-close-day">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=31;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-date-close-month">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=12;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-date-close-year">
				<option value="0" selected>&nbsp;</option>
				<? $year = intval(date("y")); ?>
				<?for($i=$year;$i<=($year+10);$i++):?>
					<option value="<?=$i?>"><?if($i>=0 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-email-recipient" style="display: none">
			<label id="email-recipient" style="display: none">Email получателя</label>
			<label id="email-creditor" style="display: none">Email кредитора</label>
			<input type="text" name="account-email-recipient" value="">
		</div>
		<div class="form-element account-phone-recipient" style="display: none">
			<label id="phone-recipient" style="display: none">Телефон получателя</label>
			<label id="phone-creditor" style="display: none">Телефон кредитора</label>
			<input type="text" name="account-phone-recipient" value="">
		</div>
		<div class="form-element account-maintenance" style="display: none">
			<label>Стоимость годового обслуживания:</label>
			<input type="text" name="account-maintenance" value="" placeholder="0.00">
		</div>
		<div class="form-element account-credit-limit" style="display: none">
			<label>Кредитный лимит</label>
			<input type="text" name="account-credit-limit" value="" placeholder="0.00">
		</div>
		<div class="form-element account-year-rate" style="display: none">
			<label>Годовая ставка, %</label>
			<input type="text" name="account-year-rate" value="" placeholder="0.00">
		</div>
		<div class="form-element account-payment-type" style="display: none">
			<label>Тип платежа</label>
			<select name="account-payment-type">
				<option value="1">Аннуитетный</option>
				<option value="2">Дифференцированный</option>
			</select>
		</div>
		<div class="form-element account-one-time-fee" style="display: none">
			<label>Единоразовая комиссия, %</label>
			<input type="text" name="account-one-time-fee" value="" placeholder="0.00">
		</div>
		<div class="form-element account-monthly-fee" style="display: none">
			<label>Ежемесячная комиссия, %</label>
			<input type="text" name="account-monthly-fee" value="" placeholder="0.00">
		</div>
		<div class="form-element account-grace-period" style="display: none">
			<label>Льготный период, дней</label>
			<select name="account-grace-period">
				<?for($i=0;$i<1000;$i++):?>
					<option value="<?=$i?>"><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-minimal-pay" style="display: none">
			<label>Минимальный платеж, %</label>
			<input type="text" name="account-minimal-pay" value="" placeholder="0.00">
		</div>
		<div class="form-element account-minimal-payday" style="display: none">
			<label id="minimal-payday" style="display: none">День минимального платежа</label>
			<label id="next-payday" style="display: none">День очередного платежа</label>
			<select name="account-minimal-payday">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=31;$i++):?>
					<option value="<?=$i?>"><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-period-procent" style="display: none">
			<label>Период начисления %</label>
			<select name="account-period-procent">
				<option value="1">В конце срока</option>
				<option value="2">Ежедневно</option>
				<option value="3">Еженедельно</option>
				<option value="4">Ежемесячно на дату вложения</option>
				<option value="5">Ежемесячно в последний день месяца</option>
				<option value="6">Ежемесячно в первый день месяца</option>
				<option value="7">Раз в три месяца на день вклада</option>
				<option value="8">Ежеквартально в последний день квартала</option>
				<option value="9">Раз в полугодие</option>
				<option value="10">Раз в год</option>
				<option value="11">Через заданный интервал</option>
			</select>
		</div>
		<div class="form-element account-capitalization" style="display: none">
			<label>Капитализация</label>
			<input type="checkbox" name="account-capitalization" value="1">
		</div>
		<div class="form-element account-money-bank" style="display: none">
			<label>Снятие наличных в банкомате банка, %</label>
			<input type="text" name="account-money-bank" value="" placeholder="0.00">
		</div>
		<div class="form-element account-money-other" style="display: none">
			<label>Снятие наличных в других банкоматах, %</label>
			<input type="text" name="account-money-other" value="" placeholder="0.00">
		</div>
		<div class="form-element account-deposit-type" style="display: none">
			<label>Тип депозита</label>
			<select name="account-deposit-type">
				<option value="1">непополняемый</option>
				<option value="2">пополняемый</option>
			</select>
		</div>
		<div class="form-element account-real-estate-type" style="display: none">
			<label>Тип имущества</label>
			<select id="account-real-estate-type" name="account-real-estate-type">
				<option value="1">Дом</option>
				<option value="2">Квартира</option>
			</select>
		</div>
		<div class="form-element account-real-estate-total-area" style="display: none">
			<label>Площадь общая, кв.м.</label>
			<input type="text" name="account-real-estate-total-area" value="" placeholder="0.00">
		</div>
		<div class="form-element account-real-estate-useful-area" style="display: none">
			<label>Полезная площадь, кв.м.</label>
			<input type="text" name="account-real-estate-useful-area" value="" placeholder="0.00">
		</div>
		<div class="form-element account-real-estate-land-area" style="display: none">
			<label>Площадь земельного участка, сот</label>
			<input type="text" name="account-real-estate-land-area" value="" placeholder="0.00">
		</div>
		<div class="form-element account-real-estate-town-distance" style="display: none">
			<label>Удаленность от города, км</label>
			<input type="text" name="account-real-estate-town-distance" value="" placeholder="0.00">
		</div>
		<div class="form-element account-real-estate-floor" style="display: none">
			<label>Этаж</label>
			<input type="text" name="account-real-estate-floor" value="" placeholder="0">
		</div>
		<div class="form-element account-real-estate-floors" style="display: none">
			<label>Этажность дома</label>
			<input type="text" name="account-real-estate-floors" value="" placeholder="0">
		</div>
		<div class="form-element account-real-estate-city" style="display: none">
			<label>Город</label>
			<input type="text" name="account-real-estate-city" value="">
		</div>
		<div class="form-element account-real-estate-area" style="display: none">
			<label>Район</label>
			<input type="text" name="account-real-estate-area" value="">
		</div>
		<div class="form-element account-real-estate-date-buy" style="display: none">
			<label>Дата покупки</label>
			<select name="account-real-estate-date-buy-day">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=31;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-real-estate-date-buy-month">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=12;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-real-estate-date-buy-year">
				<option value="0" selected>&nbsp;</option>
				<? $year = intval(date("Y")); ?>
				<?for($i=1900;$i<=$year;$i++):?>
					<option value="<?=$i?>"><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-auto-type" style="display: none">
			<label>Тип имущества</label>
			<select name="account-auto-type">
				<option value="1">Авто</option>
			</select>
		</div>
		<div class="form-element account-auto-brand" style="display: none">
			<label>Марка</label>
			<input type="text" name="account-auto-brand" value="">
		</div>
		<div class="form-element account-auto-model" style="display: none">
			<label>Модель</label>
			<input type="text" name="account-auto-model" value="">
		</div>
		<div class="form-element account-auto-modification" style="display: none">
			<label>Модификация</label>
			<input type="text" name="account-auto-modification" value="">
		</div>
		<div class="form-element account-auto-fuel-type" style="display: none">
			<label>Тип топлива</label>
			<?=Accounts::showSelectFuelType('account-auto-fuel-type');?>
		</div>
		<div class="form-element account-auto-gearbox-type" style="display: none">
			<label>Тип коробки передач</label>
			<?=Accounts::showSelectGearboxType('account-auto-gearbox-type');?>
		</div>
		<div class="form-element account-auto-color" style="display: none">
			<label>Цвет</label>
			<?=Accounts::showSelectColor('account-auto-color');?>
		</div>
		<div class="form-element account-auto-year" style="display: none">
			<label>Год выпуска</label>
			<select name="account-auto-year">
				<option value="0">&nbsp;</option>
				<? $year = intval(date("Y")); ?>
				<?for($i=1960;$i<=$year;$i++):?>
					<option value="<?=$i?>"><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
		<div class="form-element account-auto-engine" style="display: none">
			<label>Объем двигателя, л.</label>
			<input type="text" name="account-auto-engine" value="" placeholder="0.00">
		</div>
		<div class="form-element account-auto-region" style="display: none">
			<label>Регион регистрации</label>
			<?=Accounts::showSelectRegion('account-auto-region');?>
		</div>
		<div class="form-element account-auto-start-odo" style="display: none">
			<label>Начальный пробег, км</label>
			<input type="text" name="account-auto-start-odo" value="" placeholder="0.00">
		</div>
		<div class="form-element account-auto-date-buy" style="display: none">
			<label>Дата покупки</label>
			<select name="account-auto-date-buy-day">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=31;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-auto-date-buy-month">
				<option value="0" selected>&nbsp;</option>
				<?for($i=1;$i<=12;$i++):?>
					<option value="<?=$i?>"><?if($i>=1 && $i<=9):?>0<?endif;?><?=$i?></option>
				<?endfor;?>
			</select>&nbsp;/&nbsp;<select name="account-auto-date-buy-year">
				<option value="0" selected>&nbsp;</option>
				<? $year = intval(date("Y")); ?>
				<?for($i=1960;$i<=$year;$i++):?>
					<option value="<?=$i?>"><?=$i?></option>
				<?endfor;?>
			</select>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="button-submit">
		<div class="cancel"><span>Отмена</span></div>
		<div class="submit"><span>Сохранить</span></div>
	</div>
	<input type="hidden" name="action" value="1">
</form>
<script type="text/javascript" src="../../packages/finances/templates/.default/js/accounts.js"></script>

<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("finances")."include/footer.php"); ?>
