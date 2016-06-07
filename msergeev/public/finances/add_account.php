<? include_once(__DIR__."/include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Добавить счёт"); ?>
<?if (!isset($_POST["action"])):?>
<form name="add-account" method="post">
	<div class="form-element account-type clearfix">
		<label>Тип счета:</label>
		<select id="account-type" name="account-type">
			<optgroup label="Деньги">
				<option class="item" value="1" selected>Наличные</option>
				<option class="item" value="2">Дебетовая карта</option>
				<option class="item" value="3">Депозит</option>
				<option class="item" value="4">Электронный кошелёк</option>
				<option class="item" value="5">Банковский счёт</option>
			</optgroup>
			<optgroup label="Мне должны">
				<option class="item" value="6">Мне должны (заем выданный)</option>
			</optgroup>
			<optgroup label="Я должен">
				<option class="item" value="7">Я должен (заем полученный)</option>
				<option class="item" value="8">Кредитная карта</option>
				<option class="item" value="9">Кредит</option>
			</optgroup>
			<optgroup label="Инвестиции">
				<option class="item" value="10">Брокерский счет</option>
				<option class="item" value="11">Металлический счет (ОМС)</option>
				<option class="item" value="12">Акции</option>
				<option class="item" value="13">Облигации</option>
				<option class="item" value="14">Другие ценные бумаги</option>
				<option class="item" value="15">ПИФ</option>
				<option class="item" value="16">ОФБУ</option>
				<option class="item" value="17">Фонд</option>
				<option class="item" value="18">Накопительное страхование жизни</option>
				<option class="item" value="19">Накопительный план</option>
				<option class="item" value="20">Негосударственный пенсионный фонд</option>
				<option class="item" value="21">Пенсионный счет</option>
				<option class="item" value="22">ПАММ-счет</option>
			</optgroup>
			<optgroup label="Имущество">
				<option class="item" value="23">Недвижимость</option>
				<option class="item" value="24">Автомобиль</option>
				<option class="item" value="25">Водный транспорт</option>
				<option class="item" value="26">Произведение искусства</option>
				<option class="item" value="27">Бизнес</option>
				<option class="item" value="28">Прочее имущество</option>
				<option class="item" value="29">Мототехника</option>
				<option class="item" value="30">Воздушный транспорт</option>
			</optgroup>
			<optgroup label="Карты лояльности">
				<option class="item" value="31">Бонусная карта</option>
			</optgroup>
		</select>
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
		<select name="account-emoney-type">
			<option value="0">Выберите тип электронных денег</option>
			<option value="1">WebMoney</option>
			<option value="2">Яндекс.Деньги</option>
			<option value="3">QIWI</option>
			<option value="4">Деньги@Mail.Ru</option>
			<option value="5">RBK Money</option>
			<option value="6">Rapida Online</option>
			<option value="7">Единый кошелёк (Wallet1, W1)</option>
			<option value="8">Z-Payment</option>
			<option value="9">MoneyMail</option>
			<option value="10">HandyBank</option>
			<option value="11">Perfect Money</option>
			<option value="12">OKPAY</option>
			<option value="13">Payeer</option>
			<option value="14">IntellectMoney</option>
			<option value="15">GlobalMoney</option>
			<option value="16">LiqPay</option>
			<option value="17">EasyPay</option>
			<option value="18">PayPal</option>
			<option value="19">E-gold</option>
			<option value="20">Google Wallet</option>
			<option value="21">Payoneer</option>
			<option value="22">Skrill (ex-Moneybookers)</option>
			<option value="23">Payza (ex-AlertPay)</option>
			<option value="24">Paxum</option>
			<option value="25">NETELLER</option>
			<option value="26">SolidTrustPay</option>
			<option value="27">Click2Pay</option>
			<option value="28">Commerce Gold (c-gold)</option>
			<option value="29">EgoPay</option>
			<option value="30">KZM</option>
			<option value="31">cashU</option>
			<option value="32">Другой</option>
		</select>
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
			<select name="account-card-type">
				<option value="1" selected>Visa</option>
				<option value="2">Mastercard</option>
				<option value="3">Maestro</option>
				<option value="4">American Express</option>
				<option value="5">ПРО100</option>
				<option value="6">China Unionpay</option>
				<option value="7">JCB</option>
				<option value="8">Diners Club</option>
				<option value="9">УЭК</option>
				<option value="10">Золотая Корона</option>
				<option value="11">Сберкарт</option>
				<option value="12">ChronoPay</option>
				<option value="13">Белкарт</option>
				<option value="14">KAZNNSS</option>
				<option value="15">Армениан Кард</option>
				<option value="16">НСМЭП</option>
				<option value="17">Алтын Асыр</option>
			</select>
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
			<select name="account-real-estate-type">
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
			<select name="account-auto-fuel-type">
				<option value="0">&nbsp;</option>
				<option value="1">Бензин</option>
				<option value="2">Дизель</option>
				<option value="3">Газ</option>
				<option value="4">Любой</option>
				<option value="5">Инжектор</option>
				<option value="6">Карбюратор</option>
				<option value="7">Гибрид</option>
				<option value="8">Бензин / Газ</option>
				<option value="9">Электро</option>
			</select>
		</div>
		<div class="form-element account-auto-gearbox-type" style="display: none">
			<label>Тип коробки передач</label>
			<select name="account-auto-gearbox-type">
				<option value="0">&nbsp;</option>
				<option value="1">Механическая</option>
				<option value="2">Автоматическая</option>
				<option value="3">Любая</option>
				<option value="4">Робот</option>
			</select>
		</div>
		<div class="form-element account-auto-color" style="display: none">
			<label>Цвет</label>
			<select name="account-auto-color">
				<option value="0">&nbsp;</option>
				<option value="1">Бежевый</option>
				<option value="2">Бежевый металлик</option>
				<option value="3">Белый</option>
				<option value="4">Белый металлик</option>
				<option value="5">Голубой</option>
				<option value="6">Голубой металлик</option>
				<option value="7">Желтый</option>
				<option value="8">Желтый металлик</option>
				<option value="9">Зеленый</option>
				<option value="10">Зеленый металлик</option>
				<option value="11">Золотой</option>
				<option value="12">Золотой металлик</option>
				<option value="13">Коричневый</option>
				<option value="14">Коричневый металлик</option>
				<option value="15">Красный</option>
				<option value="16">Красный металлик</option>
				<option value="17">Оранжевый</option>
				<option value="18">Оранжевый металлик</option>
				<option value="19">Пурпурный</option>
				<option value="20">Пурпурный металлик</option>
				<option value="21">Серебряный</option>
				<option value="22">Серебряный металлик</option>
				<option value="23">Серый</option>
				<option value="24">Серый металлик</option>
				<option value="25">Синий</option>
				<option value="26">Синий металлик</option>
				<option value="27">Фиолетовый</option>
				<option value="28">Фиолетовый металлик</option>
				<option value="29">Черный</option>
				<option value="30">Черный металлик</option>
				<option value="31">Розовый</option>
				<option value="32">Розовый металлик</option>
			</select>
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
			<select name="account-auto-region">
				<option value="0">&nbsp;</option>
				<option value="1">Москва</option>
				<option value="2">Московская область</option>
				<option value="3">Санкт-Петербург</option>
				<option value="4">Ленинградская область</option>
			</select>
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
</form>
<script type="text/javascript" src="../../packages/finances/templates/.default/js/accounts.js"></script>
<?else:?>
<?endif;?>

<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("finances")."include/footer.php"); ?>
