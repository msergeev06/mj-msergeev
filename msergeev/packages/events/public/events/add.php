<? include_once(__DIR__."/../include/header.php"); MSergeev\Core\Lib\Buffer::setTitle("Добавление нового события"); ?>

<? /*
<div class="hidden">
	<p>Вы можете создать событие из шаблона: <select id="event_template" name="event_template">
			<option value="0" selected>--- Выбрать ---</option>
	</select><button id="use_event_template" name="use_event_template">Применить шаблон</button></p>
	<p>Либо создать, заполнив форму:</p>

<?//	<form action="" method="post" name="event_add">?>
		<hr><h2>Добавление события</h2>
		<table>
			<tr>
				<td>Имя события<span class="require">*</span></td>
				<td><input id="name" type="text" name="NAME" value=""></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Начало события<span class="require">*</span></td>
				<td>
					<table>
						<tr>
							<td><input id="day" type="text" size="5" name="DAY" value="0"></td>
							<td><input id="month" type="text" size="5" name="MONTH" value="0"></td>
							<td><input id="year" type="text" size="5" name="YEAR" value="0"></td>
							<td><input id="hour" type="text" size="5" name="HOUR" value="0"></td>
							<td><input id="min" type="text" size="5" name="MIN" value="0"></td>
						</tr>
						<tr>
							<td class="center">день</td>
							<td class="center">месяц</td>
							<td class="center">год</td>
							<td class="center">час</td>
							<td class="center">минута</td>
						</tr>
					</table>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Повторяемое событие</td>
				<td><input id="repeat" type="checkbox" name="REPEAT" value="Y"></td>
				<td>&nbsp;</td>
			</tr>
			<tr class="every">
				<td>Повторяется каждые<span class="require">*</span></td>
				<td>
					<table>
						<tr>
							<td><input id="every_day" type="text" size="5" name="EVERY_DAY" value=""></td>
							<td><input id="every_month" type="text" size="5" name="EVERY_MONTH" value=""></td>
							<td><input id="every_year" type="text" size="5" name="EVERY_YEAR" value=""></td>
							<td><input id="every_hour" type="text" size="5" name="EVERY_HOUR" value=""></td>
							<td><input id="every_min" type="text" size="5" name="EVERY_MIN" value=""></td>
						</tr>
						<tr>
							<td class="center">день</td>
							<td class="center">месяц</td>
							<td class="center">год</td>
							<td class="center">час</td>
							<td class="center">минута</td>
						</tr>
					</table>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Тип события<span class="require">*</span></td>
				<td>
					<select id="type_id" name="TYPE_ID">
						<option value="0" selected>--- Выбрать ---</option>
						<option value="1">День рождения</option>
						<option value="2">Праздник</option>
					</select>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><input id="save_template" type="checkbox" name="save_template" value="Y"></td>
				<td>Сохранить как шаблон</td>
				<td>&nbsp;</td>
			</tr>
			<? /*
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Добавить событие"></td>
			</tr>
	        * ?>
		</table>
		<hr><h2>Добавление напоминаний</h2>
		<div class="add_notice">
			<p>Добавить напоминание из шаблона <select id="notice_template_0" name="notice_template_0">
					<option value="0" selected>--- Выбрать ---</option>
				</select><button id="use_notice_template_0" name="use_notice_template_0">Применить шаблон</button></p>
			<table>
				<tr>
					<td>Напомнить в</td>
					<td>
						<table>
							<tr>
								<td><input id="notice_hour_0" type="text" size="5" name="NOTICE_HOUR[0]" value=""></td>
								<td><input id="notice_min_0" type="text" size="5" name="NOTICE_MIN[0]" value=""></td>
							</tr>
							<tr>
								<td class="center">часов</td>
								<td class="center">минут</td>
							</tr>
						</table>
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Напомнить за</td>
					<td>
						<table>
							<tr>
								<td><input id="in_min_0" type="text" size="5" name="IN_MIN[0]" value=""></td>
								<td><input id="in_hour_0" type="text" size="5" name="IN_HOUR[0]" value=""></td>
								<td><input id="in_day_0" type="text" size="5" name="IN_DAY[0]" value=""></td>
								<td><input id="in_month_0" type="text" size="5" name="IN_MONTH[0]" value=""></td>
								<td><input id="in_year_0" type="text" size="5" name="IN_YEAR[0]" value=""></td>
							</tr>
							<tr>
								<td class="center">минут</td>
								<td class="center">часов</td>
								<td class="center">дней</td>
								<td class="center">месяцев</td>
								<td class="center">лет</td>
							</tr>
						</table>
					</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Сортировка<span class="require">*</span></td>
					<td><input id="notice_sort_0" type="text" name="NOTICE_SORT[0]" value="500"></td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<hr>
			<h2>Добавление действий</h2>
			<div class="add_action_now">
				<p>Выбрать тип действия <select id="action_type_template_0" name="action_type_template_0">
						<option value="0" selected>--- Выбрать ---</option>
						<option value="1">Выполнить код</option>
						<option value="2">Создать задачу</option>
						<option value="3">Воспроизвести мелодию</option>
						<option value="4">Произнести текст</option>
					</select><button id="use_action_type_template_0" name="use_action_type_template_0">Выбрать тип</button></p>
				<p>Добавить действие из шаблона <select id="action_template_0" name="action_template_0">
						<option value="0" selected>--- Выбрать ---</option>
					</select><button id="use_action_template_0" name="use_action_template_0">Применить шаблон</button></p>
				<table>
					<tr>
						<td>Имя действия</td>
						<td><input type="text" name="NAME" value=""></td>
					</tr>
					<tr>
						<td>Порядок выполнения<span class="require">*</span></td>
						<td><input type="text" name="SORT" value="500"></td>
					</tr>
					<tr>
						<td>Код<span class="require">*</span></td>
						<td><textarea name="CODE"></textarea></td>
					</tr>
					<tr>
						<td>Модуль задач<span class="require">*</span></td>
						<td>
							<select name="MODULE_ID">
								<option value="0" selected>--- Выбрать ---</option>
								<option value="1">MajorDoMo.Задачи</option>
								<option value="2">MSergeev.Задачи</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Имя задачи<span class="require">*</span></td>
						<td><input type="text" name="TASK_NAME" value=""></td>
					</tr>
					<tr>
						<td>Срок выполнения<span class="require">*</span></td>
						<td>
							<table>
								<tr>
									<td><input type="text" size="5" name="DEADLINE_DAY" value=""></td>
									<td><input type="text" size="5" name="DEADLINE_MONTH" value=""></td>
									<td><input type="text" size="5" name="DEADLINE_YEAR" value=""></td>
									<td><input type="text" size="5" name="DEADLINE_HOUR" value=""></td>
									<td><input type="text" size="5" name="DEADLINE_MIN" value=""></td>
								</tr>
								<tr>
									<td class="center">день</td>
									<td class="center">месяц</td>
									<td class="center">год</td>
									<td class="center">часы</td>
									<td class="center">минуты</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>Путь к файлу<span class="require">*</span></td>
						<td><input type="text" name="FILE" value="/music/"></td>
					</tr>
					<tr>
						<td>Громкость<span class="require">*</span></td>
						<td><input type="text" name="VOLUME" value="100"></td>
					</tr>
					<tr>
						<td>Произнести текст<span class="require">*</span></td>
						<td><input type="text" name="TEXT" value=""></td>
					</tr>
				</table>
			</div>
			<p><a href="#" class="add_notice_now">Добавить действие</a></p>
		</div>
		<hr>
		<p><a href="#" class="add_notice_now">Добавить напоминание</a></p>
<?//	</form>?>
</div> */ ?>
<p><a href="#" class="popup-link-1">Добавить событие</a></p>
<div class="event_info" <?/*style="display: none;"*/?>>
<? /*
	&nbsp;
</div>
<div class="popup-box" id="popup-box-1">
	<div class="close">X</div>
 */?>
	<div class="top">
		<h2>Добавление события:</h2>
	</div>
	<div class="bottom">
		<p>Вы можете создать событие из шаблона:<br> <select id="event_template" name="event_template">
				<option value="0" selected>--- Выбрать ---</option>
			</select><br><button id="use_event_template" name="use_event_template">Применить шаблон</button></p>
		<p>Либо создать, заполнив форму:</p>

		<table style="width: 100%;">
			<tr>
				<td>Событие активно<span class="require">*</span></td>
				<td><input id="active" type="checkbox" name="ACTIVE" value="Y" checked="checked"></td>
				<td style="width: 100px;">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td>Имя события<span class="require">*</span></td>
				<td><input id="name" type="text" name="NAME" value=""></td>
				<td id="event_name">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td>Начало события<span class="require">*</span></td>
				<td>
					<table>
						<tr>
							<td><input id="day" type="text" size="5" name="DAY" value=""></td>
							<td>
								<select id="month" name="MONTH">
									<option value="0" selected>-- Выбрать --</option>
									<option value="1">01 - Январь</option>
									<option value="2">02 - Февраль</option>
									<option value="3">03 - Март</option>
									<option value="4">04 - Апрель</option>
									<option value="5">05 - Май</option>
									<option value="6">06 - Июнь</option>
									<option value="7">07 - Июль</option>
									<option value="8">08 - Август</option>
									<option value="9">09 - Сентябрь</option>
									<option value="10">10 - Октябрь</option>
									<option value="11">11 - Ноябрь</option>
									<option value="12">12 - Декабрь</option>
								</select>
							</td>
							<td><input id="year" type="text" size="5" name="YEAR" value=""></td>
							<td>
								<select id="hour" name="HOUR">
									<option value="-1" selected>--</option>
									<?for($i=0;$i<=23;$i++):?>
										<option value="<?=$i?>"><?=$i?></option>
									<?endfor;?>
								</select>
							</td>
							<td>
								<select id="min" name="MIN">
									<option value="-1" selected>--</option>
									<?for($i=0;$i<=59;$i++):?>
										<option value="<?=$i?>"><?=$i?></option>
									<?endfor;?>
								</select>
							</td>
						</tr>
						<tr>
							<td class="center">день</td>
							<td class="center">месяц</td>
							<td class="center">год</td>
							<td class="center">час</td>
							<td class="center">минута</td>
						</tr>
						<tr>
							<td colspan="2">
								<select id="plusminusday" name="PLUSMINUSDAY">
									<option value="1" selected>Плюс</option>
									<option value="0">Минус</option>
								</select>
							</td>
							<td colspan="2"><input type="text" id="addday" name="ADDDAY" value=""></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2">прибавить/отнять</td>
							<td colspan="2">дни к дате/от даты</td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<table>
						<tr>
							<td><input id="noday" type="radio" name="STARTDAYOFWEEK" value="0" title="нет" checked></td>
							<td><input id="monday" type="radio" name="STARTDAYOFWEEK" value="1" title="Пн."></td>
							<td><input id="tuesday" type="radio" name="STARTDAYOFWEEK" value="2" title="Вт."></td>
							<td><input id="wednesday" type="radio" name="STARTDAYOFWEEK" value="3" title="Ср."></td>
							<td><input id="thursday" type="radio" name="STARTDAYOFWEEK" value="4" title="Чт."></td>
							<td><input id="friday" type="radio" name="STARTDAYOFWEEK" value="5" title="Пт."></td>
							<td><input id="saturday" type="radio" name="STARTDAYOFWEEK" value="6" title="Сб."></td>
							<td><input id="sunday" type="radio" name="STARTDAYOFWEEK" value="7" title="Вс."></td>
						</tr>
						<tr>
							<td class="center">нет</td>
							<td class="center"><span class="workday">Пн.</span></td>
							<td class="center"><span class="workday">Вт.</span></td>
							<td class="center"><span class="workday">Ср.</span></td>
							<td class="center"><span class="workday">Чт.</span></td>
							<td class="center"><span class="workday">Пт.</span></td>
							<td class="center"><span class="weekend">Сб.</span></td>
							<td class="center"><span class="weekend">Вс.</span></td>
						</tr>
						<tr>
							<td class="center" colspan="4"><input id="workday" type="radio" name="STARTDAYOFWEEK" value="8" title="будние дни"></td>
							<td class="center" colspan="4"><input id="weekend" type="radio" name="STARTDAYOFWEEK" value="9" title="выходные дни"></td>
						</tr>
						<tr>
							<td class="center" colspan="4"><span class="workday">будние&nbsp;дни</span></td>
							<td class="center" colspan="4"><span class="weekend">выходные&nbsp;дни</span></td>
						</tr>
					</table>
				</td>
				<td style="vertical-align: top;">
					<table style="width: 100%;">
						<tr>
							<td><a id="clearstrtevent" href="#">Очистить поля</a></td>
						</tr>
						<tr>
							<td class="nearest_event"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td>Повторяемое событие</td>
				<td><input id="repeat" class="repeat" type="checkbox" name="REPEAT" value="Y"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr class="every hidden">
				<td>Повторяется каждые<span class="require">*</span></td>
				<td>
					<table>
						<tr>
							<td><input id="every_day" type="text" size="5" name="EVERY_DAY" value=""></td>
							<td><input id="every_month" type="text" size="5" name="EVERY_MONTH" value=""></td>
							<td><input id="every_year" type="text" size="5" name="EVERY_YEAR" value=""></td>
							<td><input id="every_hour" type="text" size="5" name="EVERY_HOUR" value=""></td>
							<td><input id="every_min" type="text" size="5" name="EVERY_MIN" value=""></td>
						</tr>
						<tr>
							<td class="center">день</td>
							<td class="center">месяц</td>
							<td class="center">год</td>
							<td class="center">час</td>
							<td class="center">минута</td>
						</tr>
					</table>
					<table>
						<tr>
							<td><input id="every_monday" type="checkbox" name="EVERY_MONDAY" value="Y"></td>
							<td><input id="every_tuesday" type="checkbox" name="EVERY_TUESDAY" value="Y"></td>
							<td><input id="every_wednesday" type="checkbox" name="EVERY_WEDNESDAY" value="Y"></td>
							<td><input id="every_thursday" type="checkbox" name="EVERY_THURSDAY" value="Y"></td>
							<td><input id="every_friday" type="checkbox" name="EVERY_FRIDAY" value="Y"></td>
							<td><input id="every_saturday" type="checkbox" name="EVERY_SATURDAY" value="Y"></td>
							<td><input id="every_sunday" type="checkbox" name="EVERY_SUNDAY" value="Y"></td>
						</tr>
						<tr>
							<td class="center"><span class="workday">Пн.</span></td>
							<td class="center"><span class="workday">Вт.</span></td>
							<td class="center"><span class="workday">Ср.</span></td>
							<td class="center"><span class="workday">Чт.</span></td>
							<td class="center"><span class="workday">Пт.</span></td>
							<td class="center"><span class="weekend">Сб.</span></td>
							<td class="center"><span class="weekend">Вс.</span></td>
						</tr>
						<tr>
							<td class="center" colspan="3"><input id="every_workday" type="checkbox" name="EVERY_WORKDAY" value="Y"></td>
							<td>&nbsp;</td>
							<td class="center" colspan="3"><input id="every_weekend" type="checkbox" name="EVERY_WEEKEND" value="Y"></td>
						</tr>
						<tr>
							<td class="center" colspan="3"><span class="workday">будние&nbsp;дни</span></td>
							<td>&nbsp;</td>
							<td class="center" colspan="3"><span class="weekend">выходные&nbsp;дни</span></td>
						</tr>
					</table>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr class="every hidden">
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td>Тип события<span class="require">*</span></td>
				<td>
					<select id="type_id" name="TYPE_ID">
						<option value="0" selected>--- Выбрать ---</option>
						<option value="1">День рождения</option>
						<option value="2">Праздник</option>
					</select>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td><input id="save_template" type="checkbox" name="save_template" value="Y"></td>
				<td>Сохранить как шаблон</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><hr></td>
			</tr>
			<tr class="input_template_name hidden">
				<td>Имя шаблона<span class="require">*</span></td>
				<td><input id="name" type="text" name="TEMPLATE_NAME" value=""></td>
				<td>&nbsp;</td>
			</tr>
			<tr class="input_template_name hidden">
				<td colspan="3"><hr></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><button id="submit_event" name="submit_event">Добавить событие</button></td>
			</tr>
		</table>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {

		if ($('#repeat').prop('checked')) {
			$('.every').removeClass('hidden');
		}
		else{
			$('.every').addClass('hidden');
		}

		$('#repeat').on("click",function(){
			if ($(this).prop('checked')) {
				$('.every').removeClass('hidden');
			}
			else{
				$('.every').addClass('hidden');
			}
		});


		if ($('#save_template').prop('checked')) {
			$('.input_template_name').removeClass('hidden');
		}
		else{
			$('.input_template_name').addClass('hidden');
		}

		$('#save_template').on("click",function(){
			if ($(this).prop('checked')) {
				$('.input_template_name').removeClass('hidden');
			}
			else{
				$('.input_template_name').addClass('hidden');
			}
		});

		$('#clearstrtevent').on('click',function(){
			$('#day').val(0);
			$('#month').val(0);
			$('#year').val(0);
			$('#hour').val(-1);
			$('#min').val(-1);
			$('#addday').val(0);
			$('#plusminusday').val(1);
			$('[name=STARTDAYOFWEEK]').removeAttr("checked");
			$('#noday').attr("checked",true);
			nearestEvent();
		});

		$('#name').on('keyup',function(){
			console.log($(this).val());
			$('#event_name').text($(this).val());
		});

		$('#day').on('keyup',function(){
			//console.log(this.value);
			this.value = Number(this.value);
			if (this.value >= 1 && this.value <= 31) {
				//console.log(this.value);
				nearestEvent();
			}
			else {
				this.value = 0;
				nearestEvent();
			}
		});
		$('#month').on('change',function(){
			nearestEvent();
		});
		$('#year').on('keyup',function(){
			this.value = Number(this.value);
			if (this.value >= 0) {
				nearestEvent();
			}
			else {
				this.value = 0;
				nearestEvent();
			}
		});
		$('#hour').on('change',function(){
				nearestEvent();
		});
		$('#min').on('change',function(){
				nearestEvent();
		});
		$('#addday').on('keyup',function(){
			this.value = Number(this.value);
			if (this.value >=0 && this.value <= 366) {
				nearestEvent();
			}
			else
			{
				this.value = 0;
				nearestEvent();
			}
		});
		$('[name=STARTDAYOFWEEK]').on("change",function(){
			nearestEvent();
		});

		function nearestEvent() {
			var eday, emonth, eyear, ehour, emin,
				eplusminus, eaddday,
				enoday, emonday, etuesday, ewednesday, ethursday, efriday, esaturday, esunday,
				eworkday, eweekend;
			var ntimezone, nday, ndayofweek, nmonth, nyear, nhour, nmin;
			var now = new Date();
			eday = Number($('#day').val());
			emonth = Number($('#month').val());
			eyear = Number($('#year').val());
			ehour = Number($('#hour').val());
			emin = Number($('#min').val());
			eplusminus = Number($('#plusminusday').val());
			eaddday = Number($('#addday').val());
			enoday = $('#noday').prop('checked');
			emonday = $('#monday').prop('checked');
			etuesday = $('#tuesday').prop('checked');
			ewednesday = $('#wednesday').prop('checked');
			ethursday = $('#thursday').prop('checked');
			efriday = $('#friday').prop('checked');
			esaturday = $('#saturday').prop('checked');
			esunday = $('#sunday').prop('checked');
			eworkday = $('#workday').prop('checked');
			eweekend = $('#weekend').prop('checked');
			ntimezone = -now.getTimezoneOffset()/60;
			nday = now.getUTCDate();
			ndayofweek = now.getUTCDay();
			nmonth = now.getUTCMonth()+1;
			nyear = now.getUTCFullYear();
			nhour = now.getUTCHours()+ntimezone;
			nmin = now.getUTCMinutes();
			/*
			console.log(eday + "." + emonth + "." + eyear + " " + ehour + ":" + emin
			+ "(Пн-" + emonday + ", Вт-" + etuesday + ", Ср-" + ewednesday + ", Чт-" + ethursday + ", Пт-" + efriday
			+ ", Сб-" + esaturday + ", Вс-" + esunday + ", Буд-" + eworkday + ", Вых-" + eweekend + ")");
			console.log(nday + "." + nmonth + "." + nyear + " " + nhour + ":" + nmin + " " + ntimezone + "(" + ndayofweek + ")");
			*/

			$.post(
				"<?=\MSergeev\Core\Lib\Config::getConfig("EVENTS_TOOLS_ROOT").'get_nearest_date.php'?>",
				{
					eday: eday,
					emonth: emonth,
					eyear: eyear,
					ehour: ehour,
					emin: emin,
					eplusminus: eplusminus,
					eaddday: eaddday,
					enoday: enoday,
					emonday: emonday,
					etuesday: etuesday,
					ewednesday: ewednesday,
					ethursday: ethursday,
					efriday: efriday,
					esaturday: esaturday,
					esunday: esunday,
					eworkday: eworkday,
					eweekend: eweekend,
					ntimezone: ntimezone,
					nday: nday,
					ndayofweek: ndayofweek,
					nmonth: nmonth,
					nyear: nyear,
					nhour: nhour,
					nmin: nmin
				},
				function(data) {
					console.log(data);
					$('.nearest_event').html("<br>Установленная<br>дата:<br>" + data.date.day + "." + data.date.month + "." + data.date.year + "<br>" + data.date.hour + ":" + data.date.minute + "&nbsp;(" + data.date.dayofweekname + ")<br>"
					+"<br>Ближайная<br>дата&nbsp;события:<br>" + data.nearestDate.day + "." + data.nearestDate.month + "." + data.nearestDate.year + "<br>" + data.nearestDate.hour + ":" + data.nearestDate.minute + "&nbsp;(" + data.nearestDate.dayofweekname + ")");
				},
				"json"
			);
		}

		$('body').append('<div id="blackout"></div>');

		var boxWidth = 700;
		$(window).resize(centerBox);
		$(window).scroll(centerBox);
		centerBox();

		function centerBox() {

			/* определяем нужные данные */
			var winWidth = $(window).width();
			var winHeight = $(document).height();
			var scrollPos = $(window).scrollTop();

			/* Вычисляем позицию */

			var disWidth = (winWidth - boxWidth) / 2
			var disHeight = scrollPos + 150;

			/* Добавляем стили к блокам */
			$('.popup-box').css({'width' : boxWidth+'px', 'left' : disWidth+'px', 'top' : disHeight+'px'});
			$('#blackout').css({'width' : winWidth+'px', 'height' : winHeight+'px'});

			return false;
		}

		$('[class*=popup-link]').click(function(e) {

			/* Предотвращаем действия по умолчанию */
			e.preventDefault();
			e.stopPropagation();

			/* Получаем id (последний номер в имени класса ссылки) */
			var name = $(this).attr('class');
			var id = name[name.length - 1];
			var scrollPos = $(window).scrollTop();

			/* Корректный вывод popup окна, накрытие тенью, предотвращение скроллинга */
			$('#popup-box-'+id).show();
			$('#blackout').show();
			$('html,body').css('overflow', 'hidden');

			/* Убираем баг в Firefox */
			$('html').scrollTop(scrollPos);
		});

		$('[class*=popup-box]').click(function(e) {
			/* Предотвращаем работу ссылки, если она являеться нашим popup окном */
			e.stopPropagation();
		});

		$('html').click(function() {
			var scrollPos = $(window).scrollTop();
			/* Скрыть окно, когда кликаем вне его области */
			$('[id^=popup-box-]').hide();
			$('#blackout').hide();
			$("html,body").css("overflow","auto");
			$('html').scrollTop(scrollPos);
		});

		$('.close').click(function() {
			var scrollPos = $(window).scrollTop();
			/* Скрываем тень и окно, когда пользователь кликнул по X */
			$('[id^=popup-box-]').hide();
			$('#blackout').hide();
			$("html,body").css("overflow","auto");
			$('html').scrollTop(scrollPos);
		});
	});


</script>
<? include_once(MSergeev\Core\Lib\Loader::getPublic("events")."include/footer.php"); ?>
