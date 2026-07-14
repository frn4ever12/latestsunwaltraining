document.querySelectorAll('input').forEach(function(field) {
    field.addEventListener('input', function() {
        const errorMessage = field.closest('.form-group').querySelector('.text-danger');

        if (errorMessage) {
            errorMessage.style.display = 'none';
        }

        field.classList.remove('is-invalid');
    });

});

$('.select2,select').on('change', function() {
    const fieldName = $(this).attr('name');
    const errorMessage = $(this).closest('.form-group').find(`.text-danger`);

    if (errorMessage.length) {
        errorMessage.hide();
    }

    $(this).removeClass('is-invalid');
});