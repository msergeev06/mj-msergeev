function hideAllImages ()
{
	$('.target-image .image').removeClass('img-car-1');
	$('.target-image .image').removeClass('img-car-2');
	$('.target-image .image').removeClass('img-car-3');

	$('.target-image .image').removeClass('img-computer-1');
	$('.target-image .image').removeClass('img-computer-2');
	$('.target-image .image').removeClass('img-computer-3');

	$('.target-image .image').removeClass('img-education-1');
	$('.target-image .image').removeClass('img-education-2');
	$('.target-image .image').removeClass('img-education-3');

	$('.target-image .image').removeClass('img-electronics-1');
	$('.target-image .image').removeClass('img-electronics-2');
	$('.target-image .image').removeClass('img-electronics-3');

	$('.target-image .image').removeClass('img-flat-1');
	$('.target-image .image').removeClass('img-flat-2');
	$('.target-image .image').removeClass('img-flat-3');

	$('.target-image .image').removeClass('img-fur-coat-1');
	$('.target-image .image').removeClass('img-fur-coat-2');
	$('.target-image .image').removeClass('img-fur-coat-3');

	$('.target-image .image').removeClass('img-furniture-1');
	$('.target-image .image').removeClass('img-furniture-2');
	$('.target-image .image').removeClass('img-furniture-3');

	$('.target-image .image').removeClass('img-health-1');
	$('.target-image .image').removeClass('img-health-2');
	$('.target-image .image').removeClass('img-health-3');

	$('.target-image .image').removeClass('img-house-1');
	$('.target-image .image').removeClass('img-house-2');
	$('.target-image .image').removeClass('img-house-3');

	$('.target-image .image').removeClass('img-jewelry-1');
	$('.target-image .image').removeClass('img-jewelry-2');
	$('.target-image .image').removeClass('img-jewelry-3');

	$('.target-image .image').removeClass('img-land-1');
	$('.target-image .image').removeClass('img-land-2');
	$('.target-image .image').removeClass('img-land-3');

	$('.target-image .image').removeClass('img-motocycle-1');
	$('.target-image .image').removeClass('img-motocycle-2');
	$('.target-image .image').removeClass('img-motocycle-3');

	$('.target-image .image').removeClass('img-pillow-1');
	$('.target-image .image').removeClass('img-pillow-2');
	$('.target-image .image').removeClass('img-pillow-3');

	$('.target-image .image').removeClass('img-rest-1');
	$('.target-image .image').removeClass('img-rest-2');
	$('.target-image .image').removeClass('img-rest-3');

	$('.target-image .image').removeClass('img-target-1');
	$('.target-image .image').removeClass('img-target-2');
	$('.target-image .image').removeClass('img-target-3');

	$('.target-image .image').removeClass('img-technic-1');
	$('.target-image .image').removeClass('img-technic-2');
	$('.target-image .image').removeClass('img-technic-3');

	$('.target-image .image').removeClass('img-wedding-1');
	$('.target-image .image').removeClass('img-wedding-2');
	$('.target-image .image').removeClass('img-wedding-3');
}
$(document).on('ready',function(){
	hideAllImages();
	$('.target-image .image').addClass('img-target-1');
	$('#target-want').on('change',function(){
		var val = $(this).val();
		var name = $(this).text();
		if (val==1)
		{
			$('.target-category-pay').show();           //Категория типа Выплатить
			$('.target-category-buy').hide();           //Категория типа Накопить
			$('.target-account-pay').show();            //Счета для погашения
			$('.target-account-pay-credit').show();     //Счета типа Кредиты
			$('.target-account-pay-credit-card').hide();//Счета типа Кредитные карты
			$('.target-account-pay-debt-other').hide(); //Счета типа Прочие долги
			$(".target-account-buy").hide();            //Счета для накопления
			$('.target-sum').hide();                    //Сумма
			$('#target-name').val('Долг по ипотеке');   //Название
			$('.target-pay-sum').show();                //Всего к выплате
			$('.target-pay-first').show();              //Дата первого взноса

			$('#monthly-i-can-pay').show();     //Я могу выплачивать ежемесячно
			$('#date-i-will-pay').show();       //Я выплачу к дате
			$('#monthly-need-to-pay').hide();   //Мне нужно выплачивать ежемесячно
			$('#date-need-to-pay').hide();      //Мне нужно выплатить к дате
			$('#monthly-i-can-save').hide();    //Я могу откладывать ежемесячно
			$('#date-i-will-save').hide();      //Я накоплю к дате
			$('#monthly-need-to-save').hide();  //Мне нужно откладывать ежемесячно
			$('#date-need-to-save').hide();     //Мне нужно накопить к дате
			$('#monthly-average-pay').show();   //Выводится усредненная сумма к выплате за 30 дней
			$('#monthly-average-buy').hide();   //Выводится усредненная сумма к накоплению за 30 дней

			hideAllImages();
			$('.target-image .image').addClass('img-target-1');

		}
		else
		{
			$('.target-category-pay').hide();           //Категория типа Выплатить
			$('.target-category-buy').show();           //Категория типа Накопить
			$('.target-account-pay').hide();            //Счета для погашения
			$('.target-account-pay-credit').hide();     //Счета типа Кредиты
			$('.target-account-pay-credit-card').hide();//Счета типа Кредитные карты
			$('.target-account-pay-debt-other').hide(); //Счета типа Прочие долги
			$(".target-account-buy").show();            //Счета для накопления
			$('.target-sum').show();                    //Сумма
			$('#target-name').val('Автомобиль');        //Название
			$('.target-pay-sum').hide();                //Всего к выплате
			$('.target-pay-first').hide();              //Дата первого взноса

			$('#monthly-i-can-pay').hide();     //Я могу выплачивать ежемесячно
			$('#date-i-will-pay').hide();       //Я выплачу к дате
			$('#monthly-need-to-pay').hide();   //Мне нужно выплачивать ежемесячно
			$('#date-need-to-pay').hide();      //Мне нужно выплатить к дате
			$('#monthly-i-can-save').show();    //Я могу откладывать ежемесячно
			$('#date-i-will-save').show();      //Я накоплю к дате
			$('#monthly-need-to-save').hide();  //Мне нужно откладывать ежемесячно
			$('#date-need-to-save').hide();     //Мне нужно накопить к дате
			$('#monthly-average-pay').hide();   //Выводится усредненная сумма к выплате за 30 дней
			$('#monthly-average-buy').show();   //Выводится усредненная сумма к накоплению за 30 дней

			hideAllImages();
			$('.target-image .image').addClass('img-car-1');
		}
		});
	$('#target-category-pay').on('change',function(){
		var type = $(this).val();
		var name = $("#target-category-pay option:selected").text();
		$('#target-name').val(name);

		if (type == 1 || type == 2)
		{
			$('.target-account-pay-credit').show();     //Счета типа Кредиты
			$('.target-account-pay-credit-card').hide();//Счета типа Кредитные карты
			$('.target-account-pay-debt-other').hide(); //Счета типа Прочие долги
		}
		else if (type == 3)
		{
			$('.target-account-pay-credit').hide();     //Счета типа Кредиты
			$('.target-account-pay-credit-card').show();//Счета типа Кредитные карты
			$('.target-account-pay-debt-other').hide(); //Счета типа Прочие долги
		}
		else if (type == 4)
		{
			$('.target-account-pay-credit').hide();     //Счета типа Кредиты
			$('.target-account-pay-credit-card').hide();//Счета типа Кредитные карты
			$('.target-account-pay-debt-other').show(); //Счета типа Прочие долги
		}

	});
	$('#target-category-buy').on('change',function(){
		var cat = $(this).val();
		var name = $("#target-category-buy option:selected").text();
		$('#target-name').val(name);
		if (cat == 5) //Автомобиль
		{
			hideAllImages();
			$('.target-image .image').addClass('img-car-1');
		}
		else if (cat == 6) //Бытовая техника
		{
			hideAllImages();
			$('.target-image .image').addClass('img-technic-1');
		}
		else if (cat == 7) //Дом
		{
			hideAllImages();
			$('.target-image .image').addClass('img-house-1');
		}
		else if (cat == 8) //Земельный участок
		{
			hideAllImages();
			$('.target-image .image').addClass('img-land-1');
		}
		else if (cat == 9 || cat == 17) //Квартира //Ремонт квартиры/дома
		{
			hideAllImages();
			$('.target-image .image').addClass('img-flat-1');
		}
		else if (cat == 10) //Компьютер
		{
			hideAllImages();
			$('.target-image .image').addClass('img-computer-1');
		}
		else if (cat == 11) //Лечение
		{
			hideAllImages();
			$('.target-image .image').addClass('img-health-1');
		}
		else if (cat == 12) //Мебель
		{
			hideAllImages();
			$('.target-image .image').addClass('img-furniture-1');
		}
		else if (cat == 13) //Мотоцикл
		{
			hideAllImages();
			$('.target-image .image').addClass('img-motocycle-1');
		}
		else if (cat == 14) //Образование
		{
			hideAllImages();
			$('.target-image .image').addClass('img-education-1');
		}
		else if (cat == 15) //Отпуск
		{
			hideAllImages();
			$('.target-image .image').addClass('img-rest-1');
		}
		else if (cat == 18) //Свадьба
		{
			hideAllImages();
			$('.target-image .image').addClass('img-wedding-1');
		}
		else if (cat == 19) //Финансовая подушка
		{
			hideAllImages();
			$('.target-image .image').addClass('img-pillow-1');
		}
		else if (cat == 20) //Шуба
		{
			hideAllImages();
			$('.target-image .image').addClass('img-fur-coat-1');
		}
		else if (cat == 21) //Электроника
		{
			hideAllImages();
			$('.target-image .image').addClass('img-electronics-1');
		}
		else if (cat == 22) //Ювелирные украшения
		{
			hideAllImages();
			$('.target-image .image').addClass('img-jewelry-1');
		}
		else
		{
			hideAllImages();
			$('.target-image .image').addClass('img-target-1');
		}
	});
	$('#target-pay-monthly').on('focus',function(){
		var want = $('#target-want option:selected').val();
		if (want == 1)
		{
			$('#monthly-i-can-pay').show();     //Я могу выплачивать ежемесячно
			$('#date-i-will-pay').show();       //Я выплачу к дате
			$('#monthly-need-to-pay').hide();   //Мне нужно выплачивать ежемесячно
			$('#date-need-to-pay').hide();      //Мне нужно выплатить к дате
		}
		else
		{
			$('#monthly-i-can-save').show();    //Я могу откладывать ежемесячно
			$('#date-i-will-save').show();      //Я накоплю к дате
			$('#monthly-need-to-save').hide();  //Мне нужно откладывать ежемесячно
			$('#date-need-to-save').hide();     //Мне нужно накопить к дате
		}
	});
	$('#target-pay-date').on('focus',function(){
		var want = $('#target-want option:selected').val();
		if (want == 1)
		{
			$('#monthly-i-can-pay').hide();     //Я могу выплачивать ежемесячно
			$('#date-i-will-pay').hide();       //Я выплачу к дате
			$('#monthly-need-to-pay').show();   //Мне нужно выплачивать ежемесячно
			$('#date-need-to-pay').show();      //Мне нужно выплатить к дате
		}
		else
		{
			$('#monthly-i-can-save').hide();    //Я могу откладывать ежемесячно
			$('#date-i-will-save').hide();      //Я накоплю к дате
			$('#monthly-need-to-save').show();  //Мне нужно откладывать ежемесячно
			$('#date-need-to-save').show();     //Мне нужно накопить к дате
		}
	});

	/*Очистка формы*/
	$(".button-submit .cancel").on("click",function(){
		$('.target-category-pay').show();           //Категория типа Выплатить
		$('.target-category-buy').hide();           //Категория типа Накопить
		$('.target-account-pay').show();            //Счета для погашения
		$('.target-account-pay-credit').show();     //Счета типа Кредиты
		$('.target-account-pay-credit-card').hide();//Счета типа Кредитные карты
		$('.target-account-pay-debt-other').hide(); //Счета типа Прочие долги
		$(".target-account-buy").hide();            //Счета для накопления
		$('.target-sum').hide();                    //Сумма
		$('#target-name').val('Долг по ипотеке');   //Название
		$('.target-pay-sum').show();                //Всего к выплате
		$('.target-pay-first').show();              //Дата первого взноса

		$('#monthly-i-can-pay').show();     //Я могу выплачивать ежемесячно
		$('#date-i-will-pay').show();       //Я выплачу к дате
		$('#monthly-need-to-pay').hide();   //Мне нужно выплачивать ежемесячно
		$('#date-need-to-pay').hide();      //Мне нужно выплатить к дате
		$('#monthly-i-can-save').hide();    //Я могу откладывать ежемесячно
		$('#date-i-will-save').hide();      //Я накоплю к дате
		$('#monthly-need-to-save').hide();  //Мне нужно откладывать ежемесячно
		$('#date-need-to-save').hide();     //Мне нужно накопить к дате
		$('#monthly-average-pay').show();   //Выводится усредненная сумма к выплате за 30 дней
		$('#monthly-average-buy').hide();   //Выводится усредненная сумма к накоплению за 30 дней

		$('#add-target')[0].reset();
	});

	/*Сабмит формы*/
	$(".button-submit .submit").on("click",function(){
		//Перед сабмитом формы осуществляется проверка всех полей на правильность заполнения

		//Сам сабмит
		//$('#add-target')[0].submit();
		alert('submit');
	});
});
