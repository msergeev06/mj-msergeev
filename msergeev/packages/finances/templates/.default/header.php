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
					<div class="tab-1 active" data-id="1"></div>
					<div class="tab-2" data-id="2"></div>
					<div class="tab-3" data-id="3"></div>
				</div>
				<div class="tab-content">
					<div class="content-1 hidden">
						<a href="#" class="add">&nbsp;&nbsp;&nbsp;&nbsp;Добавить счет</a>
					</div>
					<div class="content-2">
						<a href="#" class="add">&nbsp;&nbsp;&nbsp;&nbsp;Добавить метку</a>
					</div>
					<div class="content-3 hidden">
						<a href="#" class="journal"><i></i>Журнал событий</a>
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
	webix.ui({
		container:"header_menu",
		view:"menu",
		data:[
			{
				id:"1",
				value:"Инфо",
				links:"<?=$path?>info/"
			},
			{
				id:"2",
				value:"Учет",
				links:"<?=$path?>operation/",
				submenu:[
					{
						id:"2",
						value:"Операции",
						links:"<?=$path?>operation/"
					},
					{
						id:"3",
						value:"Категории",
						links:"<?=$path?>category/"
					},
					{
						id:"4",
						value:"Корзина",
						links:"<?=$path?>bucket/"
					}
				]
			},
			{
				id:"5",
				value:"План",
				links:"<?=$path?>budget/",
				config: {
					width: 210
				},
				submenu:[
					{
						id:"5",
						value:"Бюджет",
						links:"<?=$path?>budget/"
					},
					{
						id:"6",
						value:"Финансовые цели",
						links:"<?=$path?>targets/"
					},
					{
						id:"7",
						value:"Кредитный калькулятор",
						links:"<?=$path?>calculator-credit/"
					},
					{
						id:"8",
						value:"Депозитный калькулятор",
						links:"<?=$path?>calculator-deposit/"
					}
				]
			},
			{
				id:"9",
				value:"Календарь",
				links:"<?=$path?>calendar/",
				submenu:[
					{
						id:"9",
						value:"Календарь",
						link:"<?=$path?>calendar/"
					},
					{
						id:"10",
						value:"События",
						links:"<?=$path?>events/"
					}
				]
			},
			{
				id:"11",
				value:"Отчеты",
				links:"<?=$path?>reports/"
			},
			{
				id:"12",
				value:"Настройки",
				links:"<?=$path?>setup/"
			},
			{
				id:"13",
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