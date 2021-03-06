$( document ).ready(function() {

    // Initialize calendar widget
    var calendar = $('#calendar');

    calendar.datetimepicker({
        inline:             true,
        keepOpen:           true,
        format:             'DD.MM.YYYY',
        viewMode:           'days',
        locale:             'de',
        defaultDate:        calendar.data('default'),
        minDate:            calendar.data('min'),
        maxDate:            calendar.data('max'),
        daysOfWeekDisabled: calendar.data('disabled').split(',')
    });

    // Configure Ajax call
    var timeslotAppointment = $('#timeslotAppointment'),
        timeslotDate        = $('#timeslotDate'),
        timeslotFrom        = $('#timeslotFrom'),
        timeslotTo          = $('#timeslotTo'),
        timeslotWrapper     = $('#timeslotWrapper'),
        timeslotError       = $('#timeslotError'),
        timeslots           = $('#timeslots');

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
                .attr('data-appointment', obj['appointment'])
                .attr('data-date', obj['date'])
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
                        'appointmentUid': timeslotAppointment.val(),
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

    // Avoid picker switch
    $('.datepicker .picker-switch').on('click', function (e) {
        e.stopImmediatePropagation();
        $(this).removeAttr('title');
    });

    timeslots.on('change', "input[name='timeslot']", function(){
        // Highlight chosen timeslot
        $('#timeslots .btn').removeClass('active');
        $(this).parent().addClass('active');

        // Fill in data
        timeslotAppointment.val($(this).data('appointment'));
        timeslotDate.val($(this).data('date'));
        timeslotFrom.val($(this).data('from'));
        timeslotTo.val($(this).data('to'));
    });
});