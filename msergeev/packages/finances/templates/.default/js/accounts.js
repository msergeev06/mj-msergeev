function hideAll ()
{
    $(".account-bank").hide();
    $(".account-emoney-type").hide();
    $("#start-balance").show();
    $("#start-debt").hide();
    $("#start-debet").hide();
    $("#price-buy").hide();
    $(".account-market-price").hide();
    $(".button-additional").hide();
    $(".additional").hide();
    $(".account-card-type").hide();
    $(".account-card-validity").hide();
    $(".account-date-open").hide();
    $("#date-open").hide();
    $("#date-extradition").hide();
    $("#date-receipt").hide();
    $(".account-date-close").hide();
    $("#date-close").hide();
    $("#date-return").hide();
    $("#date-repayment").hide();
    $(".account-email-recipient").hide();
    $("#email-recipient").hide();
    $("#email-creditor").hide();
    $(".account-phone-recipient").hide();
    $("#phone-recipient").hide();
    $("#phone-creditor").hide();
    $(".account-maintenance").hide();
    $(".account-credit-limit").hide();
    $(".account-year-rate").hide();
    $(".account-payment-type").hide();
    $(".account-one-time-fee").hide();
    $(".account-monthly-fee").hide();
    $(".account-grace-period").hide();
    $(".account-minimal-pay").hide();
    $(".account-minimal-payday").hide();
    $("#minimal-payday").hide();
    $("#next-payday").hide();
    $(".account-period-procent").hide();
    $(".account-capitalization").hide();
    $(".account-money-bank").hide();
    $(".account-money-other").hide();
    $(".account-deposit-type").hide();
    $(".account-real-estate-type").hide();
    $(".account-real-estate-total-area").hide();
    $(".account-real-estate-useful-area").hide();
    $(".account-real-estate-land-area").hide();
    $(".account-real-estate-town-distance").hide();
    $(".account-real-estate-floor").hide();
    $(".account-real-estate-floors").hide();
    $(".account-real-estate-city").hide();
    $(".account-real-estate-area").hide();
    $(".account-real-estate-date-buy").hide();
    $(".account-auto-type").hide();
    $(".account-auto-brand").hide();
    $(".account-auto-model").hide();
    $(".account-auto-modification").hide();
    $(".account-auto-fuel-type").hide();
    $(".account-auto-gearbox-type").hide();
    $(".account-auto-color").hide();
    $(".account-auto-year").hide();
    $(".account-auto-engine").hide();
    $(".account-auto-region").hide();
    $(".account-auto-start-odo").hide();
    $(".account-auto-date-buy").hide();
}

var a_cash = 2,
    a_debet_card = 3,
    a_deposit = 4,
    a_emoney = 5,
    a_bank = 6,
    a_mne = 8,
    a_i = 10,
    a_credit_card = 11,
    a_credit = 12,
    a_broker = 14,
    a_oms = 15,
    a_akcii = 16,
    a_obligacii = 17,
    a_other_parer = 18,
    a_pif = 19,
    a_ofbu = 20,
    a_fond = 21,
    a_nak_strah = 22,
    a_nak_plan = 23,
    a_pens_fond = 24,
    a_pens_acc = 25,
    a_pamm = 26,
    a_estate = 28,
    a_car = 29,
    a_water = 30,
    a_paint = 31,
    a_busines = 32,
    a_other_real = 33,
    a_moto = 34,
    a_air = 35,
    a_bonus = 37,
    e_house = 1,
    e_flat = 2;

$(document).on("ready",function(){
    /*Кнопка отображающая дополнительные настройки*/
    $(".button-additional").on("click",function(){
        $(".additional").show();
        $(this).hide();
    });
    /*При выборе типа счета показываются дополнительные поля настройки*/
    $("#account-type").on("change",function(){
        var type = $(this).val();
        /*Прячем все-все поля в начале, чтобы потом вновь показать нужные*/
        hideAll();

        /*В зависимости от выбранного типа показываем те или иные поля*/
        if (type == a_debet_card)
        {
            //Дебетовая карта
            $(".account-bank").show();              //Банк
            $(".account-market-price").show();      //Текущая рыночная стоимость
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-card-type").show();         //Тип карты
            $(".account-card-validity").show();     //Срок действия карты
            $(".account-maintenance").show();       //Стоимость ежегодного обслуживания
            $(".account-year-rate").show();         //Готовая ставка, %
            $(".account-money-bank").show();        //Снятие наличных в банкомате банка, %
            $(".account-money-other").show();       //Снятие наличных в других банкоматах, %
        }
        else if (type == a_deposit)
        {
            //Депозит
            $(".account-bank").show();              //Банк
            $(".account-market-price").show();      //Текущая рыночная стоимость
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-date-open").show();         //Дата открытия
            $("#date-open").show();                 //Текст. Дата открытия
            $(".account-date-close").show();        //Дата закрытия
            $("#date-close").show();                //Текст. Дата закрытия
            $(".account-year-rate").show();         //Готовая ставка, %
            $(".account-period-procent").show();    //Период начисления %
            $(".account-capitalization").show();    //Капитализация
            $(".account-deposit-type").show();      //Тип депозита
        }
        else if (type == a_emoney)
        {
            //Электронный кошелек
            $(".account-emoney-type").show();       //Тип электронных денег
        }
        else if (type == a_bank)
        {
            //Банковский счёт
            $(".account-bank").show();              //Банк
            $(".account-market-price").show();      //Текущая рыночная стоимость
        }
        else if (type == a_mne)
        {
            //Мне должны (заем выданный)
            $("#start-balance").hide();             //Текст. Начальный баланс
            $("#start-debt").show();                //Текст. Начальный долг
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-date-open").show();         //Дата открытия
            $("#date-extradition").show();          //Текст. Дата выдачи
            $(".account-date-close").show();        //Дата закрытия
            $("#date-return").show();               //Текст. Дата возврата
            $(".account-email-recipient").show();   //Email получателя
            $("#email-recipient").show();           //Текст. Email получателя
            $(".account-phone-recipient").show();   //Телефон получателя
            $("#phone-recipient").show();           //Текст. Телефон получателя
            $(".account-year-rate").show();         //Готовая ставка, %
        }
        else if (type == a_i)
        {
            //Я должен (заем полученный)
            $("#start-balance").hide();             //Текст. Начальный баланс
            $("#start-debt").show();                //Текст. Начальная задолженность
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-date-open").show();         //Дата открытия
            $("#date-receipt").show();              //Текст. Дата получения
            $(".account-date-close").show();        //Дата закрытия
            $("#date-repayment").show();            //Текст. Дата погашения
            $(".account-email-recipient").show();   //Email получателя
            $("#email-creditor").show();            //Текст. Email кредитора
            $(".account-phone-recipient").show();   //Телефон получателя
            $("#phone-creditor").show();            //Текст. Телефон кредитора
            $(".account-year-rate").show();         //Готовая ставка, %
        }
        else if (type == a_credit_card)
        {
            //Кредитная карта
            $(".account-bank").show();              //Банк
            $("#start-balance").hide();             //Текст. Начальный баланс
            $("#start-debet").show();                //Текст. Начальная задолженность
            $(".account-market-price").show();      //Текущая рыночная стоимость
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-card-type").show();         //Тип карты
            $(".account-card-validity").show();     //Срок действия карты
            $(".account-credit-limit").show();      //Кредитный лимит
            $(".account-year-rate").show();         //Готовая ставка, %
            $(".account-grace-period").show();      //Льготный период, дней
            $(".account-minimal-pay").show();       //Минимальный платеж, %
            $(".account-minimal-payday").show();    //День минимального платежа
            $("#minimal-payday").show();            //Текст. День минимального платежа
            $(".account-money-bank").show();        //Снятие наличных в банкомате банка, %
            $(".account-money-other").show();       //Снятие наличных в других банкоматах, %
            $(".account-maintenance").show();       //Стоимость ежегодного обслуживания
        }
        else if (type == a_credit)
        {
            //Кредит
            $(".account-bank").show();              //Банк
            $("#start-balance").hide();             //Текст. Начальный баланс
            $("#start-debet").show();                //Текст. Начальная задолженность
            $(".account-market-price").show();      //Текущая рыночная стоимость
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-year-rate").show();         //Готовая ставка, %
            $(".account-payment-type").show();      //Тип платежа
            $(".account-date-open").show();         //Дата открытия
            $("#date-open").show();                 //Текст. Дата открытия
            $(".account-date-close").show();        //Дата закрытия
            $("#date-close").show();                //Текст. Дата закрытия
            $(".account-one-time-fee").show();      //Единоразовая комиссия, %
            $(".account-monthly-fee").show();       //Ежемесячная комиссия, %
            $(".account-minimal-payday").show();    //День минимального платежа
            $("#next-payday").show();               //Текст. День очередного платежа
        }
        else if ((type >= a_broker && type <= a_pamm) || (type >= a_water && type <= a_air))
        {
            //Брокерский счет
            //Металлический счет (ОМС)
            //Акции
            //Облигации
            //Другие ценные бумаги
            //ПИФ
            //ОФБУ
            //Фонд
            //Накопительное страхование жизни
            //Накопительный план
            //Негосударственный пенсионный фонд
            //Пенсионный счет
            //ПАММ-счет
            //Водный транспорт
            //Произведение искусства
            //Бизнес
            //Прочее имущество
            //Мототехника
            //Воздушный транспорт
            $("#start-balance").hide();             //Текст. Начальный баланс
            $("#price-buy").show();                 //Текст. Цена покупки
        }
        else if (type == a_estate)
        {
            //Недвижимость
            $("#start-balance").hide();                     //Текст. Начальный баланс
            $("#price-buy").show();                         //Текст. Цена покупки
            $(".button-additional").show();                 //Дополнительные настройки
            $(".account-real-estate-type").show();          //Тип имущества
            $(".account-real-estate-total-area").show();    //Площадь общая, кв.м.
            $(".account-real-estate-useful-area").show();   //Полезная площадь, кв.м.
            $(".account-real-estate-land-area").show();     //Площадь земельного участка, сот
            $(".account-real-estate-town-distance").show(); //Удаленность от города, км
            $(".account-real-estate-floor").show();         //Этаж
            $(".account-real-estate-floors").show();        //Этажность дома
            $(".account-real-estate-city").show();          //Город
            $(".account-real-estate-area").show();          //Район
            $(".account-real-estate-date-buy").show();      //Дата покупки

        }
        else if (type == a_car)
        {
            //Автомобиль
            $("#start-balance").hide();             //Текст. Начальный баланс
            $("#price-buy").show();                 //Текст. Цена покупки
            $(".account-market-price").show();      //Текущая рыночная стоимость
            $(".button-additional").show();         //Дополнительные настройки
            $(".account-auto-type").show();         //Тип имущества
            $(".account-auto-brand").show();        //Марка
            $(".account-auto-model").show();        //Модель
            $(".account-auto-modification").show(); //Модификация
            $(".account-auto-fuel-type").show();    //Тип топлива
            $(".account-auto-gearbox-type").show(); //Тип коробки передач
            $(".account-auto-color").show();        //Цвет
            $(".account-auto-year").show();         //Год выпуска
            $(".account-auto-engine").show();       //Объем двигателя, л.
            $(".account-auto-region").show();       //Регион регистрации
            $(".account-auto-start-odo").show();    //Начальный пробег, км
            $(".account-auto-date-buy").show();     //Дата покупки
        }

    });

    /*При выборе типа недвижимости меняется количество необходимых полей*/
    $("#account-real-estate-type").on("change",function(){
        var estate = $(this).val();
        if (estate == e_flat)
        {
            $(".account-real-estate-land-area").hide();     //Площадь земельного участка, сот
            $(".account-real-estate-town-distance").hide(); //Удаленность от города, км
        }
        else
        {
            $(".account-real-estate-land-area").show();     //Площадь земельного участка, сот
            $(".account-real-estate-town-distance").show(); //Удаленность от города, км
        }
    });

    /*Очистка формы*/
    $(".button-submit .cancel").on("click",function(){
        hideAll();
        $('#add-account')[0].reset();
    });

    /*Сабмит формы*/
    $(".button-submit .submit").on("click",function(){
        //Перед сабмитом формы осуществляется проверка всех полей на правильность заполнения

        //Сам сабмит
        $('#add-account')[0].submit();
    });
});