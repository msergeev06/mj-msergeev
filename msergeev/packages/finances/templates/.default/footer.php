<?$path=MSergeev\Core\Lib\Loader::getSitePublic('finances');?>
</div>
<div class="right">

</div>
</td>
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
<?
echo \MSergeev\Core\Lib\Buffer::showWebixJS();
?>
</body>
</html>

<?

\MSergeev\Core\Lib\Buffer::end();

?>