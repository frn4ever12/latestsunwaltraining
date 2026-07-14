$(document).ready(function () {
    setTimeout(function () {
        $("#success-alert").fadeOut();
    }, 5000);

    $(".close").on("click", function () {
        $("#success-alert").fadeOut();
    });
});
