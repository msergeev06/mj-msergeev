<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Запчасти - Добавление информации о приобретенных зап.частях");
use MSergeev\Packages\Icar\Lib;
use MSergeev\Core\Lib as CoreLib;

if (isset($_REQUEST['car']))
{
	$carID = intval($_REQUEST["car"]);
}
else
{
	$carID = Lib\MyCar::getDefaultCarID();
}
$pService = Lib\Points::getPointTypeIdByCode ("service");
$pStore = Lib\Points::getPointTypeIdByCode ("shop");
$pCarwash = Lib\Points::getPointTypeIdByCode ("wash");

if (isset($_POST["action"])) {
	if ($res = Lib\RepairParts::addRepairPartsFromPost($_POST)) {
		?><span style="color: green;">Данные успешно добавлены</span><?
	}
	else {
		?><span style="color: red;">Ошибка добавления данных</span><?
	}
}
?>
<form action="" method="post">
	<input type="hidden" name="car" value="<?=$carID?>">
	<table class="add_ts">
		<tr>
			<td class="title">Автомобиль</td>
			<td><? echo Lib\MyCar::showSelectCars("my_car",$carID,'class="myCar"'); ?></td>
		</tr>
		<tr>
			<td class="title">Дата</td>
			<?
			if (isset($_POST['date']))
			{
				$date = $_POST['date'];
			}
			else
			{
				$date = date('d.m.Y');
			}
			?>
			<td><?=InputCalendar ('date', $date, 'class="calendarDate"', $strId="")?></td>
		</tr>
		<tr>
			<td class="title">Название</td>
			<td><input type="text" name="name" value=""></td>
		</tr>
		<tr>
			<td class="title">Место хранения</td>
			<td><? echo CInvestToCarShowSelect::Storage("storage"); ?></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("CATALOG_NUMBER")?></td>
			<td><input type="text" name="catalog_number" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("NUMBER")?></td>
			<td><input type="text" name="number" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("AMOUNT")?></td>
			<td><input type="text" name="cost" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("REASON_REPLACEMENT")?></td>
			<td><? echo CInvestToCarShowSelect::ReasonReplacement("reason"); ?></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("REASON_DETAILS")?></td>
			<td class="reason_add">
				<? echo CInvestToCarShowSelect::ReasonTs("reason_ts",$car); ?>
				<? echo CInvestToCarShowSelect::ReasonRepair("reason_breakdown",$car,0,' style="display: none;"'); ?>
				<? echo CInvestToCarShowSelect::ReasonDtp("reason_dtp",$car,0,' style="display: none;"'); ?>
				<? echo CInvestToCarShowSelect::ReasonRepair("reason_tuning",$car,0,' style="display: none;"'); ?>
				<? echo CInvestToCarShowSelect::ReasonRepair("reason_upgrade",$car,0,' style="display: none;"'); ?>
				<span class="reason_tire" style="display: none;">-</span>
			</td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("WHO_PAID")?></td>
			<td><? echo CInvestToCarShowSelect::WhoPaid("who_paid"); ?></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("ODOMETER_VALUE")?></td>
			<td><input type="text" name="odo" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("WAYPOINT")?></td>
			<td><? echo CInvestToCarShowSelect::Points("waypoint",0,array($pService,$pStore,$pCarwash)); ?></td>
		</tr>
		<tr>
			<td class="center" colspan="2"><?=GetMessage("OR")?></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("NAME_NEW_WAYPOINT")?></td>
			<td><input type="text" name="newpoint_name" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("ADDRESS_NEW_WAYPOINT")?></td>
			<td><input type="text" name="newpoint_address" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("LONGITUDE_NEW_WAYPOINT")?></td>
			<td><input type="text" name="newpoint_lon" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("LATITUDE_NEW_WAYPOINT")?></td>
			<td><input type="text" name="newpoint_lat" value=""></td>
		</tr>
		<tr>
			<td class="title"><?=GetMessage("COMMENT")?></td>
			<td><input type="text" name="comment" value=""></td>
		</tr>
		<tr>
			<td class="center" colspan="2"><input type="hidden" name="action" value="1"><input type="submit" value="<?=GetMessage("SUBMIT_ADD")?>"></td>
		</tr>
	</table>
</form>
<script type="text/javascript">

	$(document).on("ready",function(){
		$(".reason").on("change",function(){
			sel = $(this).val();
			if (sel==<?=intval(CInvestToCarMain::GetInfoByCode ("reason","ts"))?>) {
				$(".reason_ts").show();
				$(".reason_breakdown").hide();
				$(".reason_dtp").hide();
				$(".reason_tuning").hide();
				$(".reason_upgrade").hide();
				$(".reason_tire").hide();
			}
			if (sel==<?=intval(CInvestToCarMain::GetInfoByCode ("reason","breakdown"))?>) {
				$(".reason_ts").hide();
				$(".reason_breakdown").show();
				$(".reason_dtp").hide();
				$(".reason_tuning").hide();
				$(".reason_upgrade").hide();
				$(".reason_tire").hide();
			}
			if (sel==<?=intval(CInvestToCarMain::GetInfoByCode ("reason","dtp"))?>) {
				$(".reason_ts").hide();
				$(".reason_breakdown").hide();
				$(".reason_dtp").show();
				$(".reason_tuning").hide();
				$(".reason_upgrade").hide();
				$(".reason_tire").hide();
			}
			if (sel==<?=intval(CInvestToCarMain::GetInfoByCode ("reason","tuning"))?>) {
				$(".reason_ts").hide();
				$(".reason_breakdown").hide();
				$(".reason_dtp").hide();
				$(".reason_tuning").show();
				$(".reason_upgrade").hide();
				$(".reason_tire").hide();
			}
			if (sel==<?=intval(CInvestToCarMain::GetInfoByCode ("reason","upgrade"))?>) {
				$(".reason_ts").hide();
				$(".reason_breakdown").hide();
				$(".reason_dtp").hide();
				$(".reason_tuning").hide();
				$(".reason_upgrade").show();
				$(".reason_tire").hide();
			}
			if (sel==<?=intval(CInvestToCarMain::GetInfoByCode ("reason","tire"))?>) {
				$(".reason_ts").hide();
				$(".reason_breakdown").hide();
				$(".reason_dtp").hide();
				$(".reason_tuning").hide();
				$(".reason_upgrade").hide();
				$(".reason_tire").show();
			}
		});
	});

</script>
<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("icar")."include/footer.php"); ?>
