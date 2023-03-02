

//Pour les calendrier
$(document).ready(function() {
    // you may need to change this code if you are not using Bootstrap Datepicker
    $('.js-datepicker').datepicker({
        dateFormat: 'dd/mm/yy', // format de date
        minDate: 0 // empêche de sélectionner des dates antérieures à aujourd'hui
    });
});

// const telephoneInput = document.querySelector('[data-telephone]');
//
// telephoneInput.addEventListener('input', (e) => {
//     const cleanedValue = e.target.value.replace(/\D/g, '').slice(0, 10);
//     const formattedValue = cleanedValue.replace(/(\d{2})(?=\d)/g, '$1 ');
//     e.target.value = formattedValue;
// });