$(document).ready(function () {
    // API pour récupérer la liste des pays et préfixes
    const apiUrl = 'https://restcountries.com/v3.1/all';

    // Charger les pays et préfixes
    $.get(apiUrl, function (data) {
        data.forEach(country => {
            const countryName = country.name.common;
            const countryCode = country.idd.root + (country.idd.suffixes ? country.idd.suffixes[0] : '');
            $('#country').append(`<option value="${countryCode}">${countryName}</option>`);
        });
    });

    // Mettre à jour le préfixe lorsque le pays est sélectionné
    $('#country').change(function () {
        const prefix = $(this).val();
        $('#phonePrefix').val(prefix);
    });

    // Validation du numéro de téléphone
    $('#loanForm').submit(function (e) {
        const phonePrefix = $('#phonePrefix').val();
        const phoneNumber = $('#phoneNumber').val();
        if (!phoneNumber.startsWith(phonePrefix)) {
            alert('Le numéro de téléphone doit commencer par le préfixe sélectionné.');
            e.preventDefault();
        }
    });
});