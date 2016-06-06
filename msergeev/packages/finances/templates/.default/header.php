<?
use MSergeev\Core\Lib;

header('Content-type: text/html; charset=utf-8');
Lib\Buffer::start("page");
Lib\Webix::init();
$path=Lib\Loader::getSitePublic('finances');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Семейные Финансы - <?=Lib\Buffer::showTitle("Главная");?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?=Lib\Buffer::showCSS()?>
	<?=Lib\Buffer::showJS()?>
</head>
<body>
<table class="finances">
	<tr>
		<td class="logo"><a href="<?=$path?>">Главная</a></td>
		<td class="menu">
			<div id="header_menu"></div>
		</td>
	</tr>
	<tr>
		<td class="left">
			<div class="buttons">
				<a href="#" class="left-button button-op">Добавить в учет</a>
				<a href="#" class="left-button button-cal">Добавить в календарь</a>
			</div>
			<div class="left-tabs">
				<div class="tab-menu">
					<div class="tab-1 active" data-id="1" title="Счета"></div>
					<div class="tab-2" data-id="2" title="Метки"></div>
					<div class="tab-3" data-id="3" title="Операции"></div>
				</div>
				<div class="tab-content">
					<div class="content-1">
						<a href="#" class="add">&nbsp;&nbsp;&nbsp;&nbsp;Добавить счет</a>
						<div class="category liked">
							<div class="header open" data-id="1">
								<div class="arrow"></div>
								<div class="name">Избранные</div>
								<div class="money green">17 976 Р</div>
							</div>
							<div id="cat-list" class="list-1">
								<div class="item" data-id="1">
									<div class="name">ЗП Макслевел</div>
									<div class="money green">42&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">ЗП Макслевел</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Дебетовая карта</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">Промсвязьбанк</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">42.71&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">42.71&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Срок действия карты</td>
												<td class="right">02/20</td>
											</tr>
											<tr>
												<td class="left">Стоимость годового обслуживания</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка на остаток, %</td>
												<td class="right red">Не указано</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="2">
									<div class="name">Кошелек</div>
									<div class="money green">17&nbsp;931&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Кошелёк</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Наличные</td>
											</tr>
											<tr>
												<td class="left">Описание</td>
												<td class="right">Мои наличные деньги</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">17&nbsp;931.15&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">17&nbsp;931.15&nbsp;Р</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="3">
									<div class="name">QiWi</div>
									<div class="money green">2&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">QiWi</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Электронный кошелек</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">2.80&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">2.80&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Тип эл. денег</td>
												<td class="right">QIWI</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="header open" data-id="2">
								<div class="arrow"></div>
								<div class="name">Деньги</div>
								<div class="money green">18&nbsp;185&nbsp;Р</div>
							</div>
							<div id="cat-list" class="list-2">
								<div class="item" data-id="1">
									<div class="name">ЗП Макслевел</div>
									<div class="money green">42&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">ЗП Макслевел</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Дебетовая карта</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">Промсвязьбанк</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">42.71&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">42.71&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Срок действия карты</td>
												<td class="right">02/20</td>
											</tr>
											<tr>
												<td class="left">Стоимость годового обслуживания</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка на остаток, %</td>
												<td class="right red">Не указано</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="2">
									<div class="name">ЗП Сбербанк</div>
									<div class="money green">0&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">ЗП Сбербанк</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Дебетовая карта</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">Сбербанк России</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">0&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">0&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Срок действия карты</td>
												<td class="right">11/18</td>
											</tr>
											<tr>
												<td class="left">Стоимость годового обслуживания</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка на остаток, %</td>
												<td class="right red">Не указано</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="3">
									<div class="name">Кошелек</div>
									<div class="money green">17&nbsp;931&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Кошелёк</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Наличные</td>
											</tr>
											<tr>
												<td class="left">Описание</td>
												<td class="right">Мои наличные деньги</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">17&nbsp;931.15&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">17&nbsp;931.15&nbsp;Р</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="4">
									<div class="name">ПЛЮС-Банк (Оплачено)</div>
									<div class="money green">206&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">ПЛЮС-Банк (Оплачено)</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Депозит</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">ПЛЮС-Банк</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">206.36&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">206.36&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка, %</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Дата закрытия</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Период начисления %</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Капитализация</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Тип депозита</td>
												<td class="right red">Не указано</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="5">
									<div class="name">Сберегательный счет</div>
									<div class="money green">1&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Сберегательный счет</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Банковский счет</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">Сбербанк России</td>
											</tr>
											<tr>
												<td class="left">Описание</td>
												<td class="right">1,5%</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">1.58&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">1.58&nbsp;Р</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="6">
									<div class="name">Momentum</div>
									<div class="money green">1&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Momentum</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Дебетовая карта</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">Сбербанк России</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">1.11&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">1.11&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Срок действия карты</td>
												<td class="right">11/16</td>
											</tr>
											<tr>
												<td class="left">Стоимость годового обслуживания</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка на остаток, %</td>
												<td class="right red">Не указано</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="7">
									<div class="name">QiWi</div>
									<div class="money green">2&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">QiWi</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Электронный кошелек</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">2.80&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">2.80&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Тип эл. денег</td>
												<td class="right">QIWI</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="header open" data-id="3">
								<div class="arrow"></div>
								<div class="name">Я должен</div>
								<div class="money red">-694&nbsp;570&nbsp;Р</div>
							</div>
							<div id="cat-list" class="list-3">
								<div class="item" data-id="1">
									<div class="name">Автокредит ПЛЮС-банк</div>
									<div class="money red">-656&nbsp;402&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Автокредит ПЛЮС-банк</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Кредит</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">ПЛЮС-Банк</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">-656&nbsp;402.75&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">-656&nbsp;402.75&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка, %</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Дата закрытия</td>
												<td class="right">07.03.2022</td>
											</tr>
											<tr>
												<td class="left">День очередного платежа</td>
												<td class="right">5</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="item" data-id="2">
									<div class="name">Тинькофф карта</div>
									<div class="money red">-38&nbsp;167&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Тинькофф карта</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Кредитная карта</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">Тинькофф Банк</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">-38&nbsp;167.62&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">-38&nbsp;167.62&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Срок действия карты</td>
												<td class="right">10/18</td>
											</tr>
											<tr>
												<td class="left">Тип карты</td>
												<td class="right">Mastercard</td>
											</tr>
											<tr>
												<td class="left">Кредитный лимит</td>
												<td class="right">39000.00&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Льготный период, дней</td>
												<td class="right">55</td>
											</tr>
											<tr>
												<td class="left">День минимального платежа</td>
												<td class="right">3</td>
											</tr>
											<tr>
												<td class="left">Стоимость ежегодного обслуживания</td>
												<td class="right">1180.00&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток кредитных средств</td>
												<td class="right">832.38</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="header open" data-id="4">
								<div class="arrow"></div>
								<div class="name">Имущество</div>
								<div class="money green">565&nbsp;000&nbsp;Р</div>
							</div>
							<div id="cat-list" class="list-4">
								<div class="item" data-id="1">
									<div class="name">Datsun</div>
									<div class="money green">565&nbsp;000&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Datsun</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Автомобиль</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">565&nbsp;000&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">565&nbsp;000&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Марка</td>
												<td class="right">Datsun</td>
											</tr>
											<tr>
												<td class="left">Модель</td>
												<td class="right">on-DO</td>
											</tr>
											<tr>
												<td class="left">Год выпуска</td>
												<td class="right">2014</td>
											</tr>
											<tr>
												<td class="left">Текущая рыночная стоимость</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Дата последней проверки стоимости</td>
												<td class="right red">Никогда</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<div class="header open" data-id="5">
								<div class="arrow"></div>
								<div class="name">МОЙ КАПИТАЛ:</div>
							</div>
							<div id="cat-list" class="list-5">
								<div class="item" data-id="1">
									<div class="name"><b>Р</b></div>
									<div class="money red">-111&nbsp;384</div>
									<?/*<div class="description" style="display: none"></div>*/?>
								</div>
								<div class="item" data-id="2">
									<div class="name"><b>Итого:</b></div>
									<div class="money red">-111&nbsp;384&nbsp;Р</div>
									<?/*<div class="description" style="display: none"></div>*/?>
								</div>
							</div>
							<div class="header" data-id="6">
								<div class="arrow"></div>
								<div class="name">Скрытые</div>
								<div class="money green">0&nbsp;Р</div>
							</div>
							<div id="cat-list" class="list-6" style="display: none">
								<div class="item" data-id="1">
									<div class="name">Миг кредит</div>
									<div class="money green">0&nbsp;Р</div>
									<div class="description" style="display: none">
										<table class="info">
											<tr>
												<td class="left">Название</td>
												<td class="right">Миг кредит</td>
											</tr>
											<tr>
												<td class="left">Тип</td>
												<td class="right">Кредит</td>
											</tr>
											<tr>
												<td class="left">Банк</td>
												<td class="right">МИГОМ</td>
											</tr>
											<tr>
												<td class="left">Остаток</td>
												<td class="right">0&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Остаток в валюте по умолчанию</td>
												<td class="right">0&nbsp;Р</td>
											</tr>
											<tr>
												<td class="left">Годовая ставка, %</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">Дата закрытия</td>
												<td class="right red">Не указано</td>
											</tr>
											<tr>
												<td class="left">День очередного платежа</td>
												<td class="right">1</td>
											</tr>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="content-2" style="display: none;">
						<a href="#" class="add">&nbsp;&nbsp;&nbsp;&nbsp;Добавить метку</a>
						<div class="labels">
							<h2>Метки</h2>
							<div class="search">
								<form name="label-search" method="post">
									<input type="text" name="search" value="">
								</form>
							</div>
							<div class="nav"></div>
							<div class="list">
								<div class="item" data-id="1">день рождения</div>
								<div class="item" data-id="2">метро</div>
							</div>
						</div>
					</div>
					<div class="content-3" style="display: none;">
						<a href="#" class="journal">&nbsp;&nbsp;&nbsp;&nbsp;Журнал событий</a>
					</div>
				</div>
			</div>
		</td>
		<td class="info"></td>
	</tr>
	<tr>
		<td colspan="2" class="bottom"></td>
	</tr>
</table>
<script type="text/javascript">
	/*Верхнее меню*/
	webix.ui({
		container:"header_menu",
		view:"menu",
		data:[
			{
				//id:"1",
				value:"Инфо",
				links:"<?=$path?>info/"
			},
			{
				//id:"2",
				value:"Учет",
				links:"<?=$path?>operation/",
				submenu:[
					{
						//id:"2",
						value:"Операции",
						links:"<?=$path?>operation/"
					},
					{
						//id:"3",
						value:"Категории",
						links:"<?=$path?>category/"
					},
					{
						//id:"4",
						value:"Корзина",
						links:"<?=$path?>bucket/"
					}
				]
			},
			{
				//id:"5",
				value:"План",
				links:"<?=$path?>budget/",
				config: {
					width: 210
				},
				submenu:[
					{
						//id:"5",
						value:"Бюджет",
						links:"<?=$path?>budget/"
					},
					{
						//id:"6",
						value:"Финансовые цели",
						links:"<?=$path?>targets/"
					},
					{
						//id:"7",
						value:"Кредитный калькулятор",
						links:"<?=$path?>calculator-credit/"
					},
					{
						//id:"8",
						value:"Депозитный калькулятор",
						links:"<?=$path?>calculator-deposit/"
					}
				]
			},
			{
				//id:"9",
				value:"Календарь",
				links:"<?=$path?>calendar/",
				submenu:[
					{
						//id:"9",
						value:"Календарь",
						link:"<?=$path?>calendar/"
					},
					{
						//id:"10",
						value:"События",
						links:"<?=$path?>events/"
					}
				]
			},
			{
				//id:"11",
				value:"Отчеты",
				links:"<?=$path?>reports/"
			},
			{
				//id:"12",
				value:"Настройки",
				links:"<?=$path?>setup/"
			},
			{
				//id:"13",
				value:"Пользователь",
				links:"<?=$path?>user/"
			}
		],
		on:{
			onMenuItemClick:function(id){
				//webix.message("Click: "+this.getMenuItem(id).links);
				location.pathname = this.getMenuItem(id).links;
			}
		},
		type:{
			subsign:true,
			height: 50,
			width: 120
		}
	});
</script>