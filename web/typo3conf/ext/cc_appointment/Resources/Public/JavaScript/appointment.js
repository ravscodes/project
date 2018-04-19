$( document ).ready(function() {

    // Initialize calendar widget
    var calendar        = $('#calendar'),
        currentLanguage = document.documentElement.lang,
        today           = new Date();

    calendar.datetimepicker({
        inline: true,
        keepOpen: true,
        format: 'DD.MM.YYYY',
        viewMode: 'days',
        locale: currentLanguage,
        defaultDate: today,
        minDate: today
    });

    // Configure Ajax call
    var form            = $('#inquiry-form-step2'),
        timeslotsList   = $('#list-timeslots'),
        timeslotLabel   = $('#list-timeslots label');

    var service = {
        ajaxCall: function (data) {

            console.log(data);
            $.ajax({
                url: '/index.php?type=42795',
                type: 'POST',
                cache: false,
                data: data.serialize(),
                dataType: "json",
                success: function (result) {
                    console.log(result);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    };

    // Trigger calendar date change for ajax call
    calendar.on('dp.change', function (ev) {
        service.ajaxCall(form);
    });

    // Highlight selected timeslot
    timeslotsList.on('click', 'label', function () {
        var elem = $(this);
        elem.parent('.list-group-item').addClass('active').siblings().removeClass('active');
    });
});