jQuery( document ).ready(function() {

    $('#appointment-calendar').datepicker({
        startDate: "today",
        maxViewMode: 0,
        todayBtn: true,
        language: "de",
        keyboardNavigation: false,
        todayHighlight: true,
        datesDisabled: ['04/06/2018', '04/21/2018'],
        toggleActive: true
    });

    console.log('Test');
});