<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Добавление цели"); ?>
<?
use MSergeev\Packages\Finances\Lib\Targets;
use MSergeev\Packages\Finances\Lib\Accounts;
use MSergeev\Packages\Finances\Lib\Currency;
if (isset($_POST["action"]))
{
	//Обрабатываем форму
	if (Targets::addTargetFromPost($_POST))
	{
		//OK
	}
	else
	{
		//ERROR
	}
}
?>
<form id="add-target" name="add-target" method="post">
	<div class="target-image">
		<div class="image img-wedding-3"></div>
		<div class="button-img"><span>Изменить</span></div>
	</div>
	<div class="form-element target-want clearfix">
		<label>Хочу:</label>
		<?=Targets::showSelectTargetWant('target-want','target-want');?>
	</div>
	<div class="form-element target-category clearfix">
		<label>Категория:</label>
		<div class="target-category-pay">
			<?=Targets::showSelectTargetCategory(false);?>
		</div>
		<div class="target-category-buy" style="display: none">
			<?=Targets::showSelectTargetCategory(true);?>
		</div>
	</div>
	<div class="form-element target-name clearfix">
		<label>Наименование:</label>
		<input id="target-name" type="text" name="target-name" value="Долг по ипотеке">
	</div>
	<div class="form-element target-sum clearfix" style="display: none">
		<label>Сумма:</label>
		<input type="text" name="target-sum" value="">
	</div>
	<div class="form-element target-status clearfix">
		<label>Статус:</label>
		<input type="radio" name="target-status" value="1" checked> Обычная
		<input type="radio" name="target-status" value="2"> <span class="img-like"></span> Избранная
	</div>
	<div class="form-element target-currency clearfix">
		<label>Валюта цели:</label>
		<select name="target-currency">
			<option value="RUB">Р - Российский рубль</option>
			<option value="USD">$ - Доллар США</option>
			<option value="EUR">&euro; - Евро</option>
		</select>
		<div class="setup-link"><a href="#">Настроить валюты</a></div>
	</div>
	<div class="form-element target-account clearfix">
		<label class="target-account-pay">Счёта для погашения:</label>
		<label class="target-account-buy" style="display: none">Счёта для накопления:</label>
		<div class="target-account-pay">
			<div class="target-account-pay-credit">
				<?=Accounts::showSelectAccountsTypes('credit');?>
			</div>
			<div class="target-account-pay-credit-card" style="display: none">
				<?=Accounts::showSelectAccountsTypes('credit-card');?>
			</div>
			<div class="target-account-pay-debt-other" style="display: none">
				<?=Accounts::showSelectAccountsTypes('debt-other');?>
			</div>
			<p>Я должен: <span class="my-debt-money">0</span>&nbsp;<span class="curr">Р</span></p>
		</div>
		<div class="target-account-buy" style="display: none">
			<?=Accounts::showSelectAccountsTypes('income');?>
			<p>Еще копить: <span class="my-income-money">0</span>&nbsp;<span class="curr">Р</span>
				&nbsp;&nbsp;&nbsp;&nbsp;Итого накоплено:
				<span class="my-income-sum">0</span>&nbsp;<span class="curr">Р</span></p>
		</div>
	</div>
	<div class="form-element target-pay-sum">
		<label>Всего к выплате:</label>
		<input type="text" name="target-pay-sum" value="">
	</div>
	<div class="form-element target-pay-first clearfix">
		<label>Дата первого взноса:</label>
		<input type="text" name="target-pay-first" value="<?=date("d.m.Y")?>">
	</div>
	<div class="form-element target-pay-monthly">
		<label id="monthly-i-can-pay">Я могу выплачивать ежемесячно:</label>
		<label id="monthly-need-to-pay" style="display: none">Мне нужно выплачивать ежемесячно:</label>
		<label id="monthly-i-can-save" style="display: none">Я могу откладывать ежемесячно:</label>
		<label id="monthly-need-to-save" style="display: none">Мне нужно откладывать ежемесячно:</label>
		<input type="text" id="target-pay-monthly" name="target-pay-monthly" value="">
		<label id="monthly-average-pay">Выводится усредненная сумма к выплате за 30 дней</label>
		<label id="monthly-average-buy" style="display: none">Выводится усредненная сумма к накоплению за 30 дней</label>
	</div>
	<div class="form-element target-pay-date clearfix">
		<label id="date-i-will-pay">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Я выплачу к дате:</label>
		<label id="date-need-to-pay" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Мне нужно выплатить к дате:</label>
		<label id="date-i-will-save" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Я накоплю к дате:</label>
		<label id="date-need-to-save" style="display: none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Мне нужно накопить к дате:</label>
		&nbsp;&nbsp;или<input type="text" id="target-pay-date" name="target-pay-date" value="">
	</div>
	<div class="form-element clearfix">&nbsp;</div>
	<div class="form-element target-description clearfix">
		<label>Комментарии:</label>
		<textarea name="target-description"></textarea>
	</div>
	<div class="form-element target-final clearfix">
		<input type="checkbox" name="target-final" value="1"> <span class="img-final"></span> Фин. цель выполнена
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
