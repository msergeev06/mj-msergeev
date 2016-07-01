<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Добавление операции"); ?>
<?
use MSergeev\Packages\Finances\Lib\Operation;
use MSergeev\Packages\Finances\Lib\Accounts;
use MSergeev\Packages\Finances\Lib\Currency;
if (isset($_POST["action"]))
{
	//Обрабатываем форму
	if (Operation::addOperationFromPost($_POST))
	{
		//OK
	}
	else
	{
		//ERROR
	}
}
?>
<form id="add-operation" name="add-operation" method="post">
	<div class="form-element operation-beat clearfix">
		<input type="checkbox" name="operation-beat" value="1">&nbsp;Разбить операцию
	</div>
	<div class="default-form">
		<div class="form-element operation-sum clearfix">
			<label>Сумма:</label>
			<input id="operation-sum" type="text" name="operation-sum" value="">
		</div>
		<div class="form-element operation-date">
			<label>Дата:</label>
			<input id="operation-date" type="text" name="operation-date" value="<?=date('d.m.Y')?>">
		</div>
		<div class="form-element operation-time clearfix">
			<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Время:</label>
			<input id="operation-time-hours" type="text" name="operation-time-hours" value="<?=date('H')?>">&nbsp;:&nbsp;<input id="operation-time-minutes" type="text" name="operation-time-minutes" value="<?=date('i')?>">
		</div>
		<div class="form-element operation-type clearfix">
			<label>Тип операции:</label>
			<select name="operation-type" id="operation-type">
				<option value="-1" selected>Расход</option>
				<option value="0">Перевод со счёта</option>
				<option value="1">Доход</option>
			</select>
		</div>
		<div class="form-element operation-account1 clearfix">
			<label>Счёт:</label>
			<?=Accounts::showSelectAccountsTypes('all','operation-account1',false);?>
		</div>
		<div class="form-element operation-category clearfix">
			<label>Категория:</label>
			<div class="operation-category-pay">
				<?=Operation::showSelectTargetCategory(false);?>
			</div>
			<div class="operation-category-buy" style="display: none">
				<?=Operation::showSelectTargetCategory(true);?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="beat-form" style="display: none">

	</div>
	<div class="button-submit">
		<div class="cancel"><span>Отмена</span></div>
		<div class="submit"><span>Сохранить</span></div>
	</div>
	<input type="hidden" name="action" value="1">
</form>

<script type="text/javascript" src="../../../packages/finances/templates/.default/js/targets.js"></script>
<? $curDir = basename(__DIR__); ?>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("finances")."include/footer.php"); ?>
