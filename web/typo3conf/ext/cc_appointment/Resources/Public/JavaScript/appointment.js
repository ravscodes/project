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
        defaultDate: ((!calendar.val()) ? today : calendar.val()),
        minDate: today
    });

    // Configure Ajax call
    var appointment     = $('#appointment').val(),
        timeslotWrapper = $('#timeslotWrapper'),
        timeslotError   = $('#timeslotError'),
        timeslots       = $('#timeslots'),
        timeFrom        = $('#timeFrom'),
        timeTo          = $('#timeTo');


    // Clear timeslots
    function clearTimeslots() {
        timeslots.empty();
    }

    // Fill in timeslots
    function fillTimeslots(result) {

        if (jQuery.isEmptyObject(result)) {
            timeslotError.removeClass('hidden');
        } else {
            timeslotError.addClass('hidden');
        }

        $.each(result, function (i, obj) {
            var column = $('<div/>')
                .addClass('col-lg-6')
                .appendTo(timeslots);
            var label = $('<label/>')
                .attr('for', obj['from'])
                .addClass('btn btn-default btn-block')
                .text(obj['label'])
                .appendTo(column);
            var radio = $('<input />', {
                        type: 'radio',
                        id: obj['from'],
                        name: 'timeslot'
                    }
                )
                .attr('data-from', obj['from'])
                .attr('data-to', obj['to'])
                .prependTo(label);
        });

        timeslotWrapper.fadeIn('fast');
    }

    var pagetype = 'type=42795',
        controller = 'tx_ccappointment_contactform[controller]=InquiryStep2',
        action = 'tx_ccappointment_contactform[action]=ajaxCall';

    var service = {
        ajaxCall: function (date) {
            $.ajax({
                url: '/index.php/?' + controller + '&' + action + '&' + pagetype,
                type: 'POST',
                cache: false,
                data: {
                    arguments: {
                        'appointmentUid': appointment,
                        'date': date
                    }
                },
                dataType: "json",
                success: function (result) {
                    timeslotWrapper.fadeOut('fast', function () {
                        clearTimeslots();
                        fillTimeslots(result);
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    };

    // Trigger calendar date change for ajax call
    calendar.on('dp.change', function (ev) {
        service.ajaxCall($(this).val());
    });

    timeslots.on('change', "input[name='timeslot']", function(){
        // Highlight chosen timeslot
        $('#timeslots .btn').removeClass('active');
        $(this).parent().addClass('active');

        // Fill in data
        timeFrom.val($(this).data('from'));
        timeTo.val($(this).data('to'));
    });
});