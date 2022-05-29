/*-------------------------------------------
  userUpdate.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

$('.select').select2({
    minimumResultsForSearch: Infinity
});

dateOfBirth = new Litepicker({
    element: document.getElementById('dateofbirth'),
    lang: 'es-MX',
    singleMode: true,
    dropdowns: { minYear: 1970, maxYear: (new Date()).getFullYear(), months: 1, years: 1 }
});

dateOfBirth2 = new Litepicker({
    element: document.getElementById('dateuseradmission'),
    lang: 'es-MX',
    singleMode: true,
    dropdowns: { minYear: 1970, maxYear: (new Date()).getFullYear(), months: 1, years: 1 }
});

$('#dateofbirth').focus(function (event) {
    dateOfBirth.show();
});

$(".select").next(".select2").find(".select2-selection").focus(function () {
    dateOfBirth.hide();
});