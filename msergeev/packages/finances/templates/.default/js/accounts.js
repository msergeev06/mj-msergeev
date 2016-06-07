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
        $(".account-bank").hide();
        $(".account-emoney-type").hide();
        $("#start-balance").show();
        $("#start-debt").hide();
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

        /*В зависимости от выбранного типа показываем те или иные поля*/
    });
});